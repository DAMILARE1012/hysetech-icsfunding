<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;

class IndustriesController extends Controller
{
    public function index()
    {
        $industries = Industry::all();
        return view('admin.sections.industries.index', [
            'title' => 'Industries',
            'nav_active' => 'industries',
            'sub_nav_active' => 'index',
            'industries' => $industries
        ]);
    }

    public function create()
    {
        return view('admin.sections.industries.create', [
            'title' => 'Industries',
            'nav_active' => 'industries',
            'sub_nav_active' => 'index'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $industry = new Industry();
        $industry->name = $request->name;
        $industry->description = $request->description;
        $industry->save();
        return redirect()->route('admin.industries')->with('success', 'Industry created');

    }

    public function edit(Industry $industry)
    {
        return view('admin.sections.industries.edit', [
            'title' => 'Industries',
            'nav_active' => 'industries',
            'sub_nav_active' => 'index',
            'industry' => $industry
        ]);
    }

    public function update(Request $request, Industry $industry)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $industry->name = $request->name;
        $industry->description = $request->description;
        $industry->save();
        return redirect()->route('admin.industries')->with('success', 'Industry updated');

    }

    public function destroy(Industry $industry)
    {
        $industry->delete();
        return redirect()->route('admin.industries')->with('success', 'Industry deleted');
    }
}
