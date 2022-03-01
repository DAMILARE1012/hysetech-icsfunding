<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoanLimit;
use Illuminate\Http\Request;

class LoanLimitsController extends Controller
{
    public function index()
    {
        $loanLimits = LoanLimit::all();
        return view('admin.sections.loan-limits.index', [
            'title' => 'Loan limits',
            'nav_active' => 'loan-limits',
            'sub_nav_active' => 'index',
            'loan_limits' => $loanLimits
        ]);
    }

    public function create()
    {
        return view('admin.sections.loan-limits.create', [
            'title' => 'Loan limits',
            'nav_active' => 'loan-limits',
            'sub_nav_active' => 'index'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'value_start' => 'required',
            'value_end' => 'required'
        ]);
        $loanLimit = new LoanLimit();
        $loanLimit->value_start = $request->value_start;
        $loanLimit->value_end = $request->value_end;
        $loanLimit->save();

        return redirect()->route('admin.loan-limits')->with('success', 'Loan limit created');

    }

    public function edit(LoanLimit $loanLimit)
    {
        return view('admin.sections.loan-limits.edit', [
            'title' => 'Loan limits',
            'nav_active' => 'loan-limits',
            'sub_nav_active' => 'index',
            'loan_limit' => $loanLimit
        ]);
    }

    public function update(Request $request, LoanLimit $loanLimit)
    {
        $request->validate([
            'value_start' => 'required',
            'value_end' => 'required'
        ]);
        $loanLimit->value_start = $request->value_start;
        $loanLimit->value_end = $request->value_end;
        $loanLimit->save();
        return redirect()->route('admin.loan-limits')->with('success', 'Loan limit updated');

    }

    public function destroy(LoanLimit $loanLimit)
    {
        $loanLimit->delete();
        return redirect()->route('admin.loan-limits')->with('success', 'Loan limit deleted');
    }

    public function loanJson(LoanLimit $loanLimit)
    {
        return response()->json($loanLimit);
    }
}
