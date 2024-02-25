<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Blog;
use Illuminate\Http\Request;

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
            'status' => 'required|in:active,inactive',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $blog = new Blog();
        $blog->slug = $blog->slugValidate('blogs');
        $blog->status = $blog->status($request->status);
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->save();
    }

    function edit(){

    }

    function update(){

    }

    function delete(){

    }
}
