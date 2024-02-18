<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.user.index');
    }
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|max:255|string|alpha',
            'email' => 'required|email|unique:users,email,except,$id'
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('admin.profile.index')->with('status', 'Profile updated successfully');
    }

    public function updatePass(Request $request, int $id)
    {
        $request->validate([
            'password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        // Retrieve the user from the database
        $user = User::findOrFail($id);

        // Verify that the provided password matches the user's current password
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        // Update the user's password with the new password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('admin.profile.index')->with('status', 'Password updated successfully');
    }
}
