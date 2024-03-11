<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends BaseController
{
    function index()
    {
        $blogs = Blog::paginate(10);
        return view('pages.blog.index', compact('blogs'));
    }

    function create()
    {
        return view('pages.blog.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'status' => 'required|in:on',
            'image' => 'required|image|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $slug = Str::slug($request->title);
        $temp = $slug;
        do {
            $count = Blog::where('slug', $slug)->count();
            if ($count > 0) {
                $temp = $slug . rand(0, 999);
            }
        } while ($count > 0);
        $slug = $temp;
        $blog = new Blog();
        $blog->slug = $slug;
        $blog->image = $this->uploadImage('uploads/blog', $request->image);
        $blog->status = $this->status($request->status);;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->save();
        return redirect()->route('admin.blog.index')->with('status', 'Blog created successfully');
    }

    function view(int $id)
    {
        $blog = Blog::findOrFail($id);
        return view('pages.blog.view', compact('blog'));
    }
    function edit(int $id)
    {
        $blog = Blog::findOrFail($id);
        return view('pages.blog.edit', compact('blog'));
    }

    function update(Request $request, int $id)
    {
        $request->validate([
            'status' => 'required|in:on',
            'image' => 'nullable|image|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'slug' => $this->slugValidate('blogs', $id),
        ]);

        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;

        // If a new image is uploaded, handle it
        if ($request->hasFile('image')) {
            if ($blog->image) {
                // Remove the old image if exists
                unlink(public_path('uploads/blog/' . $blog->image));
            }
            $blog->image = $this->uploadImage('uploads/blog', $request->image);
        }
        $blog->status = $this->status($request->status);
        $blog->slug = str::slug($request->slug);
        $blog->description = $request->description;
        $blog->save();
        return redirect()->route('admin.blog.index')->with('status','Blog updated successfully');
    }

    function destroy(int $id)
    {
        $blog = Blog::findorFail($id);
        if ($blog->image) {
            // Remove the old image if exists
            unlink(public_path('uploads/blog/' . $blog->image));
        }
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('status', 'Blog deleted successfully');
    }
}
