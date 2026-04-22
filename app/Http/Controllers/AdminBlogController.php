<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|url',
            'description' => 'required|string',
        ]);

        Blog::create([
            'title' => $request->title,
            'image' => $request->image,
            'description' => $request->description,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|url',
            'description' => 'required|string',
        ]);

        $blog->update([
            'title' => $request->title,
            'image' => $request->image,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }

    public function publicIndex()
    {
        $blogs = Blog::latest()->get();
        return view('blogs', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        return view('blog-details', compact('blog'));
    }
}