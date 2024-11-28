<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Show the list of blogs
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }

    // Show the form to create a new blog
    public function create()
    {
        return view('admin.blog.create');
    }

    // Store a new blog
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
        ]);
    
        Blog::create($validated);
    
        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');
    }
    // Show the form to edit a blog
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    // Update a blog
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
        ]);
    
        $blog->update($validated);
    
        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }

    // Delete a blog
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }

    // Show the details of a single blog
    public function show(Blog $blog)
    {
        return view('admin.blog.show', compact('blog'));
    }
}

