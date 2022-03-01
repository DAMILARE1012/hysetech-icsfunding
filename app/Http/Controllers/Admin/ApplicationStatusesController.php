<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApplicationStatus;
use Illuminate\Http\Request;

class ApplicationStatusesController extends Controller
{
    public function index()
    {
        $applicationStatuses = ApplicationStatus::all();
        return view('admin.sections.application-statuses.index', [
            'title' => 'Industries',
            'nav_active' => 'application-statuses',
            'sub_nav_active' => 'index',
            'applicationStatuses' => $applicationStatuses
        ]);
    }

    public function create()
    {
        return view('admin.sections.application-statuses.create', [
            'title' => 'Industries',
            'nav_active' => 'application-statuses',
            'sub_nav_active' => 'index'
        ]);
    }

    public function store(Request $request)
    { 
        $request->validate([
            'name' => 'required',
            'reasons' => 'sometimes|min:8',
        ]);

        $applicationStatus = new ApplicationStatus();
        $applicationStatus->name = $request->name;
        $applicationStatus->reasons = $request->reasons;
        $applicationStatus->save();
        return redirect()->route('admin.application-statuses')->with('success', 'Application Status created');

    }

    public function edit(ApplicationStatus $applicationStatus)
    {
        return view('admin.sections.application-statuses.edit', [
            'title' => 'Industries',
            'nav_active' => 'application-statuses',
            'sub_nav_active' => 'index',
            'applicationStatus' => $applicationStatus
        ]);
    }

    public function update(Request $request, ApplicationStatus $applicationStatus)
    {
        $request->validate([
            'name' => 'required',
            'reasons' => 'sometimes|min:8',
        ]);
        $applicationStatus->name = $request->name;
        $applicationStatus->reasons = $request->reasons;
        $applicationStatus->save();
        return redirect()->route('admin.application-statuses')->with('success', 'Application Status updated');

    }

    public function destroy(ApplicationStatus $applicationStatus)
    {
        $applicationStatus->delete();
        return redirect()->route('admin.application-statuses')->with('success', 'Application Status deleted');
    }
}
