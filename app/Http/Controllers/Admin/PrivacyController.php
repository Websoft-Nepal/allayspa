<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Privacy;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function index(){
        $privacy = Privacy::first();
        $privacy = optional($privacy);
        return view('pages.privacy-policy.index',compact('privacy'));
    }
    public function edit(string $id){
        $privacy = Privacy::findOrFail($id);
        return view('pages.privacy-policy.edit',compact('privacy'));
    }
    public function update(Request $request,string $id){
        $request->validate([
            'title'=>'required|max:255|string',
            'description'=>'nullable|string',
        ]);
        $privacy = Privacy::findOrFail($id);
        $privacy->title = $request->title;
        $privacy->description = $request->description;
        $privacy->save();
        return redirect()->route('admin.privacy.index')->with('status','Privacy policy updated successfully');
    }
}
