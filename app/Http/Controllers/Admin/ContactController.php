<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function index(){
        $contact = Contact::first();
        return view('pages.contact.index',compact('contact'));
    }

    function update(Request $request,int $id){
        $request->validate([
            'email'=>'required|email|unique:contacts,email,'.$id,
            'fax'=>'string|nullable|max:200',
            'tel'=> 'string|nullable|max:200',
            'phone' => 'string|nullable|max:200',
            'address' => 'string|nullable|max:200',
        ]);
        $contact = Contact::findOrFail($id);
        $contact->email = $request->email;
        $contact->fax = $request->fax;
        $contact->tel = $request->tel;
        $contact->phone = $request->phone;
        $contact->address = $request->address;
        $contact->save();
        return view('pages.contact.index',compact('contact'))->with('status','Contact Updated successfully');
    }
}
