<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subscriber;

class WebController extends Controller
{
    public function index()
    {
        return view('web.sections.index', [
            'navCurrent' => 'home',
            'blogs' => Post::orderBy('id', 'DESC')->get()
        ]);
    }

    public function loanCalculator()
    {
        return view('web.sections.loan-calculator', [
            'navCurrent' => 'home'
        ]);
    }

    public function blogDetails(Post $blog)
    {
        return view('web.sections.blog-details', [
            'navCurrent' => 'home',
            'blogs' => Post::orderBy('id', 'DESC')->limit(6)->get(),
            'blog' => $blog
        ]);
    }

}
