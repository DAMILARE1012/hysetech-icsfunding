<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\SubIndustry;
use Illuminate\Http\Request;

class SubIndustriesController extends Controller
{
    public function index()
    {
        $subIndustries = SubIndustry::with('industry')->get();
        return view('admin.sections.sub-industries.index', [
            'title' => 'Sub Industries',
            'nav_active' => 'sub-industries',
            'sub_nav_active' => 'index',
            'subIndustries' => $subIndustries
        ]);
    }

    public function create()
    {
        $industries = Industry::all();
        return view('admin.sections.sub-industries.create', [
            'title' => 'Sub Industries',
            'nav_active' => 'sub-industries',
            'sub_nav_active' => 'index',
            'industries' => $industries
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'industry_id' => 'required',
        ]);
        $subIndustry = new SubIndustry();
        $subIndustry->name = $request->name;
        $subIndustry->description = $request->description;
        $subIndustry->industry_id = $request->industry_id;
        $subIndustry->save();

        return redirect()->route('admin.sub-industries')->with('success', 'Sub industry created');

    }

    public function edit(SubIndustry $subIndustry)
    {
        $industries = Industry::all();
        return view('admin.sections.sub-industries.edit', [
            'title' => 'Sub Industries',
            'nav_active' => 'sub-industries',
            'sub_nav_active' => 'index',
            'industries' => $industries,
            'subIndustry' => $subIndustry
        ]);
    }

    public function update(Request $request, SubIndustry $subIndustry)
    {
        $request->validate([
            'name' => 'required',
            'industry_id' => 'required',
        ]);
        $subIndustry->name = $request->name;
        $subIndustry->description = $request->description;
        $subIndustry->industry_id = $request->industry_id;
        $subIndustry->save();
        return redirect()->route('admin.sub-industries')->with('success', 'Sub industry updated');

    }

    public function destroy(SubIndustry $subIndustry)
    {
        $subIndustry->delete();
        return redirect()->route('admin.sub-industries')->with('success', 'Sub industry deleted');
    }
}
