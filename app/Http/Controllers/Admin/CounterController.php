<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function index(){
        $counter = Counter::first();
        return view('pages.counter.index',compact('counter'));
    }

    public function update(Request $request,int $id){
        // return $request;
        $request->validate([
            'years_of_experience' => 'required|numeric',
            'happy_clients' => 'required|numeric',
            'certifications' => 'required|numeric',
        ]);
        $counter = Counter::findOrFail($id);
        $counter->years_of_experience = $request->years_of_experience;
        $counter->happy_clients = $request->happy_clients;
        $counter->certifications = $request->certifications;
        $counter->save();

        return redirect()->route('admin.counter.index')->with('status','Counter updated successfully');
    }
}
