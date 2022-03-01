<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Mailer;
use App\Models\Application;
use App\Models\Reminder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RemindersController extends Controller
{
    public function index(Request $request)
    {
        $query = Reminder::query();
        $query->whereHas('application')->with(['application' => fn($application) => $application->whereHas('business')->with('business')]);
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
        $reminders = $query->get();
        return view('admin.sections.reminders.all', [
            'title' => 'Manage Reminders',
            'nav_active' => 'reminders',
            'sub_nav_active' => 'all-reminders',
            'reminders' => $reminders
        ]);
    }

    public function create()
    {
        $applications = Application::all();
        return view('admin.sections.reminders.create', [
            'title' => 'Manage Reminders',
            'nav_active' => 'reminders',
            'sub_nav_active' => 'all-reminders',
            'content' => '',
            'reminderType' => '',
            'applicationId' => null,
            'applications' => $applications
        ]);
    }

    public function createEmail(Application $application)
    {
        $applications = Application::all();
        $business = $application->business()->first();
        $borrower = $application->borrower()->first();
        $content = '<br>';
        $content .= $borrower ? 'Dear ' . $borrower->first_name . '<br><br>' : '';
        if ($business) {
            $content .= 'This email reminder is in regards to your loan application <b>KP' . $application->id . '</b> for ' . '<b>' . $business->name . '</b>.';
            $content .= '<br><br>';
        }
        return view('admin.sections.reminders.create', [
            'title' => 'Manage Reminders',
            'nav_active' => 'reminders',
            'sub_nav_active' => 'all-reminders',
            'applications' => $applications,
            'applicationId' => $application->id,
            'reminderType' => 'Email',
            'content' => $content
        ]);
    }

    public function createSMS(Application $application)
    {
        $applications = Application::all();
        $business = $application->business()->first();
        $borrower = $application->borrower()->first();

        $content = '';
        $content .= $borrower ? 'Dear ' . $borrower->first_name . '\n' : '';
        if ($business)
            $content .= 'Your loan application KP' . $application->id . 'for ' . '' . $business->name . ' has over due payment. Please contact ICS Funding.';

        return view('admin.sections.reminders.create', [
            'title' => 'Manage Reminders',
            'nav_active' => 'reminders',
            'sub_nav_active' => 'all-reminders',
            'applications' => $applications,
            'applicationId' => $application->id,
            'reminderType' => 'SMS',
            'content' => $content
        ]);
    }

    public function createDemandLetter(Application $application)
    {
        $applications = Application::all();
        $business = $application->business()->first();
        $content = '<br>';
        if ($business) {
            $content = $business->name . '<br>' . $business->address . ', ' . $business->pnicode . '<br><br>';
            $content .= 'This letter is in regards to your loan application <b>KP' . $application->id . '</b> for ' . '<b>' . $business->name . '</b>';
        }
        return view('admin.sections.reminders.create', [
            'title' => 'Manage Reminders',
            'nav_active' => 'reminders',
            'sub_nav_active' => 'all-reminders',
            'applications' => $applications,
            'applicationId' => $application->id,
            'reminderType' => 'Demand Letter',
            'content' => $content
        ]);
    }

    public function createPDR(Application $application)
    {
        $applications = Application::all();
        $business = $application->business()->first();
        $content = '<br>';
        if ($business) {
            $content = $business->name . '<br>' . $business->address . ', ' . $business->pnicode . '<br><br>';
            $content .= 'This letter is in regards to your loan application <b>KP' . $application->id . '</b> for ' . '<b>' . $business->name . '</b>';
        }
        return view('admin.sections.reminders.create', [
            'title' => 'Manage Reminders',
            'nav_active' => 'reminders',
            'sub_nav_active' => 'all-reminders',
            'applications' => $applications,
            'applicationId' => $application->id,
            'reminderType' => 'Payment Due Report',
            'content' => $content
        ]);
    }

    public function storeReminder(Request $request)
    {
        $request->validate([
            'application_id' => 'required',
            'reminder_type' => 'required',
            'content' => 'required',
            'attachment' => 'sometimes',
        ], []);

        $application = Application::whereId($request->application_id)->with('business')->first();
        if ($application->business) {
            $reminder = new Reminder();
            $reminder->application_id = $request->application_id;
            $reminder->borrower_id = $application->borrower_id;
            $reminder->reminder_type = $request->reminder_type;
            if ($request->attachment)
                $reminder->attachment = $request->attachment->store('reminders/attachments', 'public');
            $reminder->content = \request('content');
            $reminder->creator_type = User::class;
            $reminder->creator_id = auth('user')->user()->id;
            $reminder->save();
            if ($request->reminder_type != 'SMS') {
                Mail::to($application->business->email)->send(new Mailer([
                    'subject' => 'Reminder from ICS Funding',
                    'body' => \request('content'),
                    'attachment' => asset('storage/' . $reminder->attachment),
                    'view' => 'emails.plain'
                ]));
            }

        } else {
            return redirect()->route('admin.reminders')->with('error', 'Company information not found.');
        }
        return redirect()->route('admin.reminders')->with('success', 'Reminder dispatched successfully');
    }

    public function demandLetter()
    {
        $reminders = Reminder::whereHas('application')->whereReminderType('Demand Letter')->with(['application' => fn($application) => $application->with('business')])->get();
        return view('admin.sections.reminders.demand-letter', [
            'title' => 'Manage Reminders',
            'nav_active' => 'reminders',
            'sub_nav_active' => 'all-reminders',
            'reminders' => $reminders
        ]);
    }

    public function email()
    {
        $reminders = Reminder::whereHas('application')->whereReminderType('Email')->with(['application' => fn($application) => $application->with('business')])->get();

        return view('admin.sections.reminders.email', [
            'title' => 'Manage Reminders',
            'nav_active' => 'reminders',
            'sub_nav_active' => 'all-reminders',
            'reminders' => $reminders
        ]);
    }

    public function sms()
    {
        $reminders = Reminder::whereHas('application')->whereReminderType('SMS')->with(['application' => fn($application) => $application->with('business')])->get();

        return view('admin.sections.reminders.sms', [
            'title' => 'Manage Reminders',
            'nav_active' => 'reminders',
            'sub_nav_active' => 'all-reminders',
            'reminders' => $reminders
        ]);
    }

    public function closedLoan()
    {
        return view('admin.sections.reminders.closed-loan', [
            'title' => 'Manage Reminders',
            'nav_active' => 'reminders',
            'sub_nav_active' => 'all-reminders'
        ]);
    }

    public function paymentDueReport()
    {
        $reminders = Reminder::whereHas('application')->whereReminderType('Payment Due Report')->with(['application' => fn($application) => $application->with('business')])->get();
        return view('admin.sections.reminders.payment-due-report', [
            'title' => 'Manage Reminders',
            'nav_active' => 'reminders',
            'sub_nav_active' => 'all-reminders',
            'reminders' => $reminders
        ]);
    }


    public function templates()
    {
        return view('admin.sections.reminders.templates', [
            'title' => 'Manage Reminders',
            'nav_active' => 'reminders',
            'sub_nav_active' => 'all-reminders'
        ]);
    }


}
