<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;

class BorrowersController extends Controller
{
    public function index()
    {
        return view('consultant.sections.borrowers.all', [
            'title' => 'Manage Borrowers',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers'
        ]);
    }

    public function corporate()
    {
        return view('consultant.sections.borrowers.corporate', [
            'title' => 'Manage Borrowers',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers'
        ]);
    }

    public function blacklisted()
    {
        return view('consultant.sections.borrowers.blacklisted', [
            'title' => 'Manage Borrowers',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers'
        ]);
    }

    public function details()
    {
        return view('consultant.sections.borrowers.details.info', [
            'title' => 'Manage Borrowers / Borrower Detail',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers'
        ]);
    }

    public function applications()
    {
        return view('consultant.sections.borrowers.details.applications', [
            'title' => 'Manage Borrowers / Borrower Detail',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers'
        ]);
    }

    public function documents()
    {
        return view('consultant.sections.borrowers.details.documents', [
            'title' => 'Manage Borrowers / Borrower Detail',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers'
        ]);
    }

    public function detailsCollectMoney()
    {
        return view('consultant.sections.borrowers.details.collect-money', [
            'title' => 'Manage Borrowers / Borrower Detail',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers'
        ]);
    }

    public function remindersLog()
    {
        return view('consultant.sections.borrowers.details.reminders-log', [
            'title' => 'Manage Borrowers / Borrower Detail',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'all-borrowers'
        ]);
    }

    public function collectMoney()
    {
        return view('consultant.sections.borrowers.collect-money.index', [
            'title' => 'Manage Borrowers / Collect Money',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'collect-money'
        ]);
    }

    public function collectMoneyBorrowerDetail()
    {
        return view('consultant.sections.borrowers.collect-money.details', [
            'title' => 'Manage Borrowers / Collect Money / Borrower Details',
            'nav_active' => 'borrowers',
            'sub_nav_active' => 'collect-money'
        ]);
    }


    public function test()
    {
        return view('consultant.sections.admin');
    }
}
