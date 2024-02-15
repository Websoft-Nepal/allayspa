<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        return view('pages.user.index');
    }
    public function update(Request $request,int $id){
        $request->validate([
            'name'=>'required|max:255|string|alpha',
            'email'=>'required|email|unique:users,email,except,$id'
        ]);
        $user = User::findOrFail($id);
        $user->name= $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('admin.profile.index')->with('status','Profile updated successfully');
    }

    public function updatePass(Request $request,int $id){

    }
}
