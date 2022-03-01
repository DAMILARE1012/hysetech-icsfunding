<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Consultant;
use App\Models\FollowUp;
use App\Models\Industry;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(Request $request)
    {
        $query = Application::query();
        $query->whereHas('business')->whereHas('consultant')->where('consultant_status', '!=', 'Completed');
        if ($request->sort == 'Oldest Update') {
            $query->orderBy('consultant_assigned_date', 'DESC');
        } else {
            $query->orderBy('consultant_assigned_date', 'ASC');
        }
        if ($request->order == 'This Week') {
            $query->whereBetween('consultant_assigned_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($request->order == 'This Month') {
            $query->whereBetween('consultant_assigned_date', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]);
        } elseif ($request->order == 'This Year') {
            $query->whereBetween('consultant_assigned_date', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()]);
        }
        $applications = $query->get();

        $industries = Industry::all();
        return view('admin.sections.tasks.current', [
            'title' => 'Manage Tasks',
            'nav_active' => 'tasks',
            'sub_nav_active' => 'all-tasks',
            'applications' => $applications,
            'industries' => $industries
        ]);
    }


    public function history(Request $request)
    {
        $query = Application::query();
        $query->whereHas('business')->whereHas('consultant')->where('consultant_status', 'Completed');
        if ($request->sort == 'Oldest Update') {
            $query->orderBy('consultant_assigned_date', 'DESC');
        } else {
            $query->orderBy('consultant_assigned_date', 'ASC');
        }
        if ($request->order == 'This Week') {
            $query->whereBetween('consultant_assigned_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($request->order == 'This Month') {
            $query->whereBetween('consultant_assigned_date', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]);
        } elseif ($request->order == 'This Year') {
            $query->whereBetween('consultant_assigned_date', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()]);
        }
        $applications = $query->get();
        $industries = Industry::all();
        return view('admin.sections.tasks.history', [
            'title' => 'Manage Tasks',
            'nav_active' => 'tasks',
            'sub_nav_active' => 'all-tasks',
            'applications' => $applications,
            'industries' => $industries
        ]);
    }

    public function payment(Request $request)
    {
        $application = Application::whereHas('business')->with('loans')->get();
        dd($application, $request);
    }

    public function create()
    {
        $applications = Application::whereHas('business')->with('business')->get();
        $consultants = Consultant::all();
        return view('admin.sections.tasks.create', [
            'title' => 'Manage Tasks',
            'nav_active' => 'tasks',
            'sub_nav_active' => 'all-tasks',
            'applications' => $applications,
            'consultants' => $consultants
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'application_id' => 'required',
            'consultant_id' => 'required',
        ]);
        $application = Application::whereHas('business')->whereId($request->application_id)->first();
        $application->consultant_id = $request->consultant_id;
        $application->consultant_assigned_date = now();
        $application->remarks = $request->remarks;
        $application->save();
        return redirect()->route('admin.tasks')->with('success', 'Task Assigned');
    }

    public function delete(Application $application)
    {
        $application->consultant_id = null;
        $application->save();
        return redirect()->route('admin.tasks')->with('success', 'Task deleted');

    }

    public function updateStatus(Request $request, Application $application)
    {

        $application->consultant_status = $request->status;
        $application->save();
        return redirect()->route('admin.tasks')->with('success', 'Task updated');

    }

    public function followUps(Application $application)
    {
        $application->loadMissing('followUps');
        return view('admin.sections.tasks.followups', [
            'title' => 'Manage Tasks',
            'nav_active' => 'tasks',
            'sub_nav_active' => 'all-tasks',
            'application' => $application
        ]);
    }

    public function addFollowUp(Request $request)
    {
        $request->validate([
            'application_id' => 'required',
            'remarks' => 'required',
            'next_followup' => 'required',
        ]);
        $followUp = new FollowUp();
        $followUp->added_by_type = User::class;
        $followUp->added_by_id = auth('user')->user()->id;
        $followUp->application_id = $request->application_id;
        $followUp->remarks = $request->remarks;
        $followUp->next_followup = $request->next_followup;
        $followUp->save();
        return redirect()->route('admin.tasks.follow-ups', $request->application_id)->with('success', 'Followup added');
    }
}
