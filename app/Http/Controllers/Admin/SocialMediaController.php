<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index(){
        $social = SocialMedia::first();
        $social = optional($social);
        return view('pages.social-media.index',compact('social'));
    }

    public function update(Request $request,int $id){
        $request->validate([
            'facebook'=>'string|max:255',
            'instagram'=>'string|max:255',
            'twitter'=>'string|max:255',
            'youtube'=>'string|max:255',
        ]);
        $social = SocialMedia::findOrFail($id);
        $social->facebook = $request->facebook;
        $social->instagram = $request->instagram;
        $social->twitter = $request->twitter;
        $social->youtube = $request->youtube;
        $social->save();
        return view('pages.social-media.index',compact('social'))->with('status','Social Media updated successfully');
    }
}
