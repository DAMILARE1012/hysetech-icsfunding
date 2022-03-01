<?php

namespace App\Http\Controllers\Borrower;

use App\Http\Controllers\Controller;

class LoansController extends Controller
{
    public function index()
    {
        $borrower = auth('borrower')->user();
        $borrower->loadMissing('business');
        return view('borrower.sections.loans.index', [
            'title' => 'Current Loans',
            'nav_active' => 'loans',
            'sub_nav_active' => 'loans',
            'borrower' => $borrower
        ]);
    }

    public function history()
    {
        return view('borrower.sections.loans.history', [
            'title' => 'Current Loans',
            'nav_active' => 'loans',
            'sub_nav_active' => 'loans'
        ]);
    }

}
