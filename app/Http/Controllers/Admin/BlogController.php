<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends BaseController
{
    function index(){
        $blogs = Blog::paginate(10);
        return view('pages.blog.index',compact('blogs'));
    }

    function create(){
        return view('pages.blog.create');
    }

    function store(Request $request){
        $request->validate([
            'status' => 'required|in:on',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $slug = Str::slug($request->title);
        $temp = $slug;
        do{
            $count = Blog::where('slug', $slug)->count();
            if($count>0){
                $temp = $slug.rand(0,999);
            }
        }while($count>0);
        $slug = $temp;
        $blog = new Blog();
        $blog->slug = $slug;
        $blog->status = $this->status($request->status);;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->save();
        return redirect()->route('admin.blog.index')->with('status','Blog created successfully');
    }

    function view(int $id){
        $blog = Blog::findOrFail($id);
        return view('pages.blog.view',compact('blog'));
    }
    function edit(int $id){
        $blog = Blog::findOrFail($id);
        return view('pages.blog.edit',compact('blog'));
    }

    function update(Request $request,int $id){
        $request->validate([
            'status' => 'required|in:on',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'slug' => $this->slugValidate($request->slug,$id),
        ]);

        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->status = $this->status($request->status);
        $blog->slug = str::slug($request->slug);
        $blog->description = $request->description;
        $blog->save();

    }

    function delete(int $id){
        $blog = Blog::findorFail($id);
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('status','Blog deleted successfully');
    }
}
