<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    function index(){
        $aboutus = AboutUs::first();
        $aboutus = optional($aboutus);
        return view('pages.aboutus-page.index',compact('aboutus'));
    }

    function update(Request $request,int $id){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $aboutus = AboutUs::findOrFail($id);
        $aboutus->title = $request->title;
        $aboutus->description = $request->description;
        $aboutus->save();
        return view('pages.aboutus-page.index',compact('aboutus'))->with('status','About Us updated successfully');
    }
}
