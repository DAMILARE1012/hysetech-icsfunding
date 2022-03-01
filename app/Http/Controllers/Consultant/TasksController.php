<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationStatus;
use App\Models\Borrower;
use App\Models\Industry;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $consultant = auth('consultant')->user();
        $applications = $consultant->applications()->get();
        $industries = Industry::all();
        $applicationStatuses = ApplicationStatus::all();
        return view('consultant.sections.tasks.index', [
            'title' => 'Tasks',
            'nav_active' => 'tasks',
            'sub_nav_active' => 'tasks',
            'applications' => $applications,
            'industries' => $industries,
            'applicationStatuses' => $applicationStatuses
        ]);
    }

    public function details(Application $application)
    {
        $application->loadMissing(['activeLoan', 'business' => fn($business) => $business->with(['borrowers' => fn($borrowers) => $borrowers->with('documents'), 'nricDocs', 'bankStatements', 'acraDocs', 'cbsrDocs', 'bankAccount',])]);
        return view('consultant.sections.tasks.details', [
            'title' => 'Manage Applications / Review',
            'nav_active' => 'tasks',
            'sub_nav_active' => 'tasks',
            'application' => $application,
        ]);
    }

    public function personnelDetails(Borrower $borrower)
    {
        $borrower->loadMissing('documents');
        return view('consultant.sections.tasks.personnel-details', [
            'title' => 'Personnel',
            'nav_active' => 'tasks',
            'sub_nav_active' => 'tasks',
            'borrower' => $borrower,
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
        return view('consultant.sections.tasks.repayments', [
            'title' => 'Repayment History',
            'nav_active' => 'tasks',
            'sub_nav_active' => 'tasks',
            'application' => $application,
            'totalDue' => $totalDue,
            'totalProfit' => $totalProfit
        ]);
    }

    public function updateStatus(Request $request, Application $application)
    {
        $application->consultant_status = $request->status;
        $application->save();
        return redirect()->back()->with('success', 'Task status updated');
    }
}
