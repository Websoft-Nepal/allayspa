<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermsCondition;
use Illuminate\Http\Request;

class TermsConditionController extends Controller
{
    public function index(){
        return view('pages.terms-condition.index');
    }
    public function edit(string $id){
        $terms = TermsCondition::findOrFail($id);
        return view('pages.terms-condition.edit',compact('terms'));
    }
    public function update(Request $request,string $id){
        $request->validate([
            'title'=>'required|max:255|string',
            'description'=>'nullable|string',
        ]);
        $terms = TermsCondition::findOrFail($id);
        $terms->title = $request->title;
        $terms->description = $request->description;
        $terms->save();
        return redirect()->route('admin.terms.index')->with('status','Terms and Condition updated successfully');
    }
}
