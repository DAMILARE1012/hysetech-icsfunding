<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationProgress;
use App\Models\ApplicationStatus;
use App\Models\Business;
use App\Models\Consultant;
use App\Models\Industry;
use App\Models\Loan;
use App\Models\LoanLimit;
use App\Models\LoanType;
use App\Models\Notification;
use App\Models\Payment;
use App\Models\StatusLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    public function index(Request $request)
    {
        $applicationStatuses = ApplicationStatus::all();
        $query = Application::query();
        $query->with(['loans', 'business' => fn($business) => $business->with('borrowers')])->get();
        if ($request->sort == 'Oldest Update') {
            $query->orderBy('created_at', 'DESC');
        } else {
            $query->orderBy('created_at', 'ASC');
        }
        if ($request->order == 'This Week') {
            $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($request->order == 'This Month') {
            $query->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]);
        } elseif ($request->order == 'This Year') {
            $query->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()]);
        }
        $applications = $query->get();
        $industries = Industry::all();
        $loan_limits = LoanLimit::all();
        return view('admin.sections.applications.all', [
            'title' => 'Manage Applications',
            'nav_active' => 'applications',
            'sub_nav_active' => 'all-applications',
            'applications' => $applications,
            'industries' => $industries,
            'loanLimits' => $loan_limits,
            'applicationStatuses' => $applicationStatuses
        ]);
    }

    public function status(ApplicationStatus $applicationStatus)
    {
        $applicationStatuses = ApplicationStatus::all();
        $applications = Application::whereStatus($applicationStatus->name)->with(['loans', 'business' => fn($business) => $business->with('borrowers')])->get();
        return view('admin.sections.applications.index', [
            'title' => 'Manage Applications',
            'nav_active' => 'applications',
            'sub_nav_active' => 'all-applications',
            'applications' => $applications,
            'applicationStatuses' => $applicationStatuses,
            'status' => $applicationStatus
        ]);

    }

    public function create()
    {
        $applicationStatuses = ApplicationStatus::all();
        $businesses = Business::all();
        $loanTypes = LoanType::all();
        return view('admin.sections.applications.create', [
            'title' => 'Manage Applications',
            'nav_active' => 'applications',
            'sub_nav_active' => 'all-applications',
            'applicationStatuses' => $applicationStatuses,
            'businesses' => $businesses,
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
            'status' => 'required',
            'contract_variation_fee' => 'required',
        ]);
        $application = new Application();
        $application->business_id = $request->business_id;
        $application->loan_start_date = $request->loan_start_date;
        $application->status = $request->status;
        $application->verified = $request->verified;
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
        if ($application->verified) {
            $applicationProgress = new ApplicationProgress();
            $applicationProgress->application_id = $application->id;
            $applicationProgress->progress = 'Application verified';
            $applicationProgress->save();
        }
        $applicationProgress = new ApplicationProgress();
        $applicationProgress->application_id = $application->id;
        $applicationProgress->progress = 'Application moved to ' . $request->status . ' status';
        $applicationProgress->save();

        $notification = new Notification();
        $notification->notified_type = Business::class;
        $notification->notified_id = $application->business_id;
        $notification->title = 'Application submitted';
        $notification->body = 'Your application # KP' . $application->id . ' has been submitted and moved to ' . $request->status . ' by ICS Funding';
        $notification->save();
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
        return redirect()->route('admin.applications')->with('success', 'Applications created');
    }

    public function approved()
    {
        $applications = Application::whereStatus('Approved')->with(['loans', 'business' => fn($business) => $business->with('borrowers')])->get();

        return view('admin.sections.applications.approved', [
            'title' => 'Manage Applications',
            'nav_active' => 'applications',
            'sub_nav_active' => 'all-applications',
            'applications' => $applications
        ]);
    }

    public function rejected()
    {
        $applications = Application::whereStatus('Rejected')->with(['loans', 'business' => fn($business) => $business->with('borrowers')])->get();

        return view('admin.sections.applications.rejected', [
            'title' => 'Manage Applications',
            'nav_active' => 'applications',
            'sub_nav_active' => 'all-applications',
            'applications' => $applications
        ]);
    }

    public function counterOffer()
    {
        return view('admin.sections.applications.counter-offer', [
            'title' => 'Manage Applications',
            'nav_active' => 'applications',
            'sub_nav_active' => 'all-applications'
        ]);
    }

    public function incomplete()
    {
        return view('admin.sections.applications.incomplete', [
            'title' => 'Manage Applications',
            'nav_active' => 'applications',
            'sub_nav_active' => 'all-applications'
        ]);
    }

    public function blacklisted()
    {
        return view('admin.sections.applications.blacklisted', [
            'title' => 'Manage Applications',
            'nav_active' => 'applications',
            'sub_nav_active' => 'all-applications'
        ]);
    }

    public function details(Application $application)
    {
        $consultants = Consultant::all();
        $application->loadMissing(['activeLoan' => fn($activeLoan) => $activeLoan->with('loanType'), 'business' => fn($business) => $business->with(['borrowers' => fn($borrowers) => $borrowers->with('documents'), 'nricDocs', 'bankStatements', 'acraDocs', 'cbsrDocs', 'bankAccount',])]);

        return view('admin.sections.applications.details', [
            'title' => 'Manage Applications / Review',
            'nav_active' => 'applications',
            'sub_nav_active' => 'all-applications',
            'application' => $application,
            'consultants' => $consultants
        ]);
    }

    public function assignConsultant(Request $request, Application $application)
    {
        $application->consultant_id = $request->consultant_id;
        $application->consultant_assigned_date = now();
        $application->save();
        $applicationProgress = new ApplicationProgress();
        $applicationProgress->application_id = $application->id;
        $applicationProgress->progress = 'Consultant has been assigned to your application';
        $applicationProgress->save();
        $consultant = Consultant::whereId($request->consultant_id)->first();
        $notification = new Notification();
        $notification->notified_type = Business::class;
        $notification->notified_id = $application->business_id;
        $notification->title = 'Consultant Assigned';
        $notification->body = 'Consultant (' . $consultant->first_name . ' ' . $consultant->last_name . ') has been assigned to your application # KP' . $application->id . ' by ICS Funding';
        $notification->save();
        return redirect()->route('admin.applications.details', $application)->with('success', 'Consultant assigned');

    }

    public function removeConsultant(Application $application)
    {
        $application->consultant_id = null;
        $application->consultant_assigned_date = null;
        $applicationProgress = new ApplicationProgress();
        $applicationProgress->application_id = $application->id;
        $applicationProgress->progress = 'Consultant has been removed from your application';
        $applicationProgress->save();
        $application->save();
        $notification = new Notification();
        $notification->notified_type = Business::class;
        $notification->notified_id = $application->business_id;
        $notification->title = 'Consultant removed';
        $notification->body = 'Consultant has been removed from your application # KP' . $application->id . ' by ICS Funding';
        $notification->save();
        return redirect()->route('admin.applications.details', $application)->with('success', 'Consultant removed');

    }

    public function addProgress(Request $request, Application $application)
    {
        $applicationProgress = new ApplicationProgress();
        $applicationProgress->application_id = $application->id;
        $applicationProgress->progress = $request->progress;
        $applicationProgress->save();
        return redirect()->back()->with('success', 'Update sent to borrower');
    }

    public function updateStatus(Request $request, Application $application)
    {
        $statusLog = new StatusLog();
        $statusLog->module_type = Application::class;
        $statusLog->module_id = $application->id;
        $statusLog->status_from = $application->status;
        $statusLog->status_to = $request->status;
        $statusLog->clerk_type = User::class;
        $statusLog->clerk_id = auth('user')->user()->id;
        $statusLog->save();
        $application->status = $request->status;
        $application->save();

        $notification = new Notification();
        $notification->notified_type = Business::class;
        $notification->notified_id = $application->business_id;
        $notification->title = 'Application status updated';
        $notification->body = 'Your application # KP' . $application->id . ' has been moved to ' . $application->status . ' by ICS Funding';
        $notification->save();
        return redirect()->route('admin.applications.status', ApplicationStatus::whereName($request->status)->first())->with('success', 'Application status updated');
    }

    public function delete(Application $application)
    {
        $application->delete();
        return redirect()->route('admin.applications')->with('success', 'Applications deleted');

    }

    public function markPaymentPaid(Payment $payment)
    {
        $payment->status = 'Paid';
        $payment->save();
        return redirect()->back()->with('success', 'Payment marked as paid');
    }

    public function addPayment(Request $request, Payment $payment)
    {
        $payment->payable_amount = $request->payable;
        $payment->amount_to_principal = $request->amount;
        $payment->late_loan_fee = $request->late_fee;
        if ((($payment->payable_amount + $payment->late_loan_fee) > $payment->amount_to_principal))
            $payment->status = 'Pending Balance';
        else
            $payment->status = 'Paid';

        $payment->save();
        return redirect()->back()->with('success', 'Payment marked as paid');
    }

}
