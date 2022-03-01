<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Borrower;
use App\Models\Consultant;
use App\Models\Reminder;

class DashboardController extends Controller
{
    public function index()
    {
        $borrowersCount = Borrower::count();
        $applicationsCount = Application::count();
        $consultantsCount = Consultant::count();
        $remindersCount = Reminder::count();
        return view('admin.sections.index', [
            'title' => 'Dashboard',
            'nav_active' => 'dashboard',
            'sub_nav_active' => 'dashboard',
            'borrowersCount' => $borrowersCount,
            'consultantsCount' => $consultantsCount,
            'applicationsCount' => $applicationsCount,
            'remindersCount' => $remindersCount
        ]);
    }

    public function test()
    {
        return view('admin.sections.admin');
    }
}
