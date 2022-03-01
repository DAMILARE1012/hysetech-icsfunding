<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.sections.blog.index', [
            'title' => 'Blog Posts',
            'nav_active' => 'blog',
            'sub_nav_active' => 'index',
            'blogs' => Post::orderBy('id', 'DESC')->get()
        ]);
    }

    public function create()
    {
        return view('admin.sections.blog.create', [
            'title' => 'Blog Posts',
            'nav_active' => 'blog',
            'sub_nav_active' => 'index'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'featured_image' => 'required'
        ],
            [
                'title.required' => 'required*',
                'body.required' => 'required*',
                'featured_image.required' => 'required*',
            ]);
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->body = $request->body;
        $post->published = $request->published;
        $post->featured_image = $request->featured_image->store('posts', 'public');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()->route('admin.blog')->with('success', 'Blog post created');

    }

    public function details(Post $blog)
    {
        return view('admin.sections.blog.details', [
            'title' => 'Blog Details',
            'nav_active' => 'blog',
            'sub_nav_active' => 'index',
            'blog' => $blog,
            'blogs' => Post::orderBy('id', 'DESC')->limit(6)->get()
        ]);
    }

    public function edit(Post $blog)
    {
        return view('admin.sections.blog.edit', [
            'title' => 'Blog Edit',
            'nav_active' => 'blog',
            'sub_nav_active' => 'index',
            'blog' => $blog
        ]);
    }

    public function update(Request $request, Post $blog)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'featured_image' => 'sometimes'
        ],
            [
                'title.required' => 'required*',
                'body.required' => 'required*',
                'featured_image.required' => 'required*',
            ]);

        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->body = $request->body;
        $blog->published = $request->published;
        if ($request->featured_image) {
            File::delete(public_path('storage/' . $blog->featured_image));
            $blog->featured_image = $request->featured_image->store('posts', 'public');
        }
        $blog->user_id = auth()->user()->id;
        $blog->save();

        return redirect()->route('admin.blog')->with('success', 'Blog post updated');

    }

    public function destroy(Post $blog)
    {
        File::delete(public_path('storage/' . $blog->featured_image));
        $blog->delete();

        return redirect()->route('admin.blog')->with('success', 'Blog post deleted');
    }
}
