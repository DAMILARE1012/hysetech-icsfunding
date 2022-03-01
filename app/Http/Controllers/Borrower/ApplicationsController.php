<?php

namespace App\Http\Controllers\Borrower;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationProgress;
use App\Models\Loan;
use App\Models\LoanType;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    public function index()
    {
        $borrower = auth('borrower')->user();
        $borrower->loadMissing('business');
        return view('borrower.sections.applications.index', [
            'title' => 'Loan Applications',
            'nav_active' => 'applications',
            'sub_nav_active' => 'applications',
            'borrower' => $borrower
        ]);
    }

    public function overview()
    {
        $borrower = auth('borrower')->user();
        $applications = Application::where('business_id', $borrower->business_id)->with('applicationProgress')->get();
        return view('borrower.sections.applications.overview', [
            'title' => 'Loan Applications',
            'nav_active' => 'applications',
            'sub_nav_active' => 'applications',
            'applications' => $applications
        ]);
    }

    public function create()
    {
        $loanTypes = LoanType::all();
        return view('borrower.sections.applications.create', [
            'title' => 'New Applications',
            'nav_active' => 'applications',
            'sub_nav_active' => 'applications',
            'loanTypes' => $loanTypes
        ]);

    }

    public function store(Request $request)
    {

        $request->validate([
            'loan_start_date' => 'required',
            'loan_type_id' => 'required',
            'loan_amount' => 'required',
            'loan_tenure' => 'required',
            'interest_rate' => 'required',
            'late_fee' => 'required',
            'contract_variation_fee' => 'required',
        ]);
        $borrower = auth('borrower')->user();
        $borrower->loadMissing('business');
        $application = new Application();
        $application->business_id = $borrower->business->id;
        $application->loan_start_date = $request->loan_start_date;
        $application->status = 'Pending';
        $application->save();
        $loan = new Loan();
        $loan->application_id = $application->id;
        $loan->loan_type_id = $request->loan_type_id;
        $loan->amount = $request->loan_amount;
        $loan->tenure = $request->loan_tenure;
        $loan->interest_rate = $request->interest_rate;
        $loan->late_fee = $request->late_fee;
        $loan->contract_variation_fee = $request->contract_variation_fee;
        $loan->save();
        $applicationProgress = new ApplicationProgress();
        $applicationProgress->application_id = $application->id;
        $applicationProgress->progress = 'Application submitted';
        $applicationProgress->save();

        $loan_date = new Carbon($request->loan_start_date);
        for ($i = 0; $i < (int)$request->loan_tenure; $i++) {
            $due_date = $loan_date->addMonth(1);
            $payment = new Payment();
            $payment->application_id = $application->id;
            $payment->payable_type = 'Principal';
            $payment->payment_date = $due_date;
            $payment->payable_amount = $request->loan_amount / $request->loan_tenure;
            $payment->save();
            $payment = new Payment();
            $payment->application_id = $application->id;
            $payment->payable_type = 'Interest';
            $payment->payment_date = $due_date;
            $payment->payable_amount = $request->loan_amount * ($request->interest_rate / 100);
            $payment->save();
        }

        $applicationProgress = new ApplicationProgress();
        $applicationProgress->application_id = $application->id;
        $applicationProgress->progress = 'Application pending approval';
        $applicationProgress->save();

        return redirect()->route('borrower.applications')->with('success', 'Applications created');
    }

    public function details(Application $application)
    {
        $application->loadMissing(['activeLoan', 'business' => fn($business) => $business->with(['borrowers' => fn($borrowers) => $borrowers->with('documents'), 'nricDocs', 'bankStatements', 'acraDocs', 'cbsrDocs', 'bankAccount',])]);
        return view('borrower.sections.applications.details', [
            'title' => 'Manage Applications ',
            'nav_active' => 'applications',
            'sub_nav_active' => 'applications',
            'application' => $application,
        ]);
    }

    public function repayments(Application $application)
    {
        $application->loadMissing('payments', 'activeLoan', 'business');
        $totalDue = 0;
        $totalProfit = 0;
        foreach ($application->payments as $payment) {
            if ($payment->status == 'Yet to pay') {
                $totalDue += $payment->payable_amount;
            } elseif ($payment->status == 'Paid' && $payment->payable_type == 'Interest') {
                $totalProfit += $payment->payable_amount;
            }

        }
        return view('borrower.sections.applications.repayments', [
            'title' => 'Repayment History',
            'nav_active' => 'applications',
            'sub_nav_active' => 'applications',
            'application' => $application,
            'totalDue' => $totalDue,
            'totalProfit' => $totalProfit
        ]);
    }

    public function loanJson(LoanType $loanType)
    {
        return response()->json($loanType);
    }
}
