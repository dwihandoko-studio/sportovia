<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Inbox;
use App\Models\Trial;
use Validator;

class StoreController extends Controller
{
    function store(Request $request){
    	$message = [
          'type.required' => 'Choose One',
          'name.required' => 'Required',
          'subject.required' => 'Required',
          'phone.required' => 'Required',
          'message.required' => 'Required',
          'email.email' => 'Invalid email',
          'email.required' => 'Required',
          'class.required' => 'Choose One',
        ];

        $validator = Validator::make($request->all(), [
          'type' => 'required',
          'name' => 'required',
          'subject' => 'required',
          'message' => 'required',
          'email' => 'required|email',
          'phone' => 'required',
          'class' => 'required'
        ], $message);

        if($validator->fails()){
          return redirect()->back()->with('store_info', 'Wrong Input')->withErrors($validator)->withInput();
        }

        $store = New Trial;
        $store->type        = $request->type;
        $store->id_content  = $request->class;
        $store->nama        = $request->name;
        $store->telp        = $request->phone;
        $store->email       = $request->email;
        $store->subjek      = $request->subject;
        $store->pesan       = $request->message;
        $store->save();
        return redirect()->back()->with('store_info', 'Your data has been successfully saved.');
    }

    function storeContact(Request $request){
      $message = [
          'contact_name.required' => 'Required',
          'contact_subject.required' => 'Required',
          'contact_phone.required' => 'Required',
          'contact_message.required' => 'Required',
          'contact_email.email' => 'Invalid email',
          'contact_email.required' => 'Required',
        ];

        $validator = Validator::make($request->all(), [
          'contact_name' => 'required',
          'contact_subject' => 'required',
          'contact_message' => 'required',
          'contact_email' => 'required|email',
          'contact_phone' => 'required'
        ], $message);
        
        if($validator->fails()){
          return redirect()->back()->with('contact_info', 'Wrong Input')->withErrors($validator)->withInput();
        }

        $store = New Inbox;
        $store->nama = $request->contact_name;
        $store->telp = $request->contact_phone;
        $store->email = $request->contact_email;
        $store->subjek = $request->contact_subject;
        $store->pesan = $request->contact_message;
        $store->save();
        return redirect()->back()->with('contact_info', 'Your data has been successfully saved.');
    }
}
