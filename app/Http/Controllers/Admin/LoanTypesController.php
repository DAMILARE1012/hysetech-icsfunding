<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoanType;
use Illuminate\Http\Request;

class LoanTypesController extends Controller
{
    public function index()
    {
        $loanTypes = LoanType::all();
        return view('admin.sections.loan-types.index', [
            'title' => 'Loan Types',
            'nav_active' => 'loan-types',
            'sub_nav_active' => 'index',
            'loanTypes' => $loanTypes
        ]);
    }

    public function create()
    {
        return view('admin.sections.loan-types.create', [
            'title' => 'Loan Types',
            'nav_active' => 'loan-types',
            'sub_nav_active' => 'index'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'interest_rate' => 'required',
            'late_fee' => 'required',
            'contract_variation_fee' => 'required',
        ]);
        $loanType = new LoanType();
        $loanType->title = $request->title;
        $loanType->interest_rate = $request->interest_rate;
        $loanType->late_fee = $request->late_fee;
        $loanType->contract_variation_fee = $request->contract_variation_fee;
        if ($request->icon) {
            $loanType->icon = $request->icon->store('loan-types/icons', 'public');
        }
        $loanType->save();

        return redirect()->route('admin.loan-types')->with('success', 'Loan type created');

    }

    public function edit(LoanType $loanType)
    {
        return view('admin.sections.loan-types.edit', [
            'title' => 'Loan Types',
            'nav_active' => 'loan-types',
            'sub_nav_active' => 'index',
            'loanType' => $loanType
        ]);
    }

    public function update(Request $request, LoanType $loanType)
    {
        $request->validate([
            'title' => 'required',
            'interest_rate' => 'required',
            'late_fee' => 'required',
            'contract_variation_fee' => 'required',
        ]);
        $loanType->title = $request->title;
        $loanType->interest_rate = $request->interest_rate;
        $loanType->late_fee = $request->late_fee;
        $loanType->contract_variation_fee = $request->contract_variation_fee;
        if ($request->icon) {
            $loanType->icon = $request->icon->store('loan-types/icons', 'public');
        }
        $loanType->save();
        return redirect()->route('admin.loan-types')->with('success', 'Loan type updated');

    }

    public function destroy(LoanType $loanType)
    {
        $loanType->delete();
        return redirect()->route('admin.loan-types')->with('success', 'Loan type deleted');
    }

    public function loanJson(LoanType $loanType)
    {
        return response()->json($loanType);
    }
}
