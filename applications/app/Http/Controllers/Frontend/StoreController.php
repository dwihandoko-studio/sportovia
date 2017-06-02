<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Trial;
use Validator;

class StoreController extends Controller
{
    function classFT(Request $request){
    	$message = [
          'name.required' => 'Required',
          'subject.required' => 'Required',
          'phone.required' => 'Required',
          'message.required' => 'Required',
          'email.email' => 'Invalid email',
          'email.required' => 'Required',
          'class.required' => 'Choose One',
        ];

        $validator = Validator::make($request->all(), [
          'name' => 'required',
          'subject' => 'required',
          'message' => 'required',
          'email' => 'required|email',
          'phone' => 'required',
          'class' => 'required'
        ], $message);

        if($validator->fails()){
          return redirect()->back()->withErrors($validator)->withInput();
        }

        $store = New Trial;
        $store->id_kelas_kategori = 0;
        $store->nama = $request->name;
        $store->telp = $request->phone;
        $store->email = $request->email;
        $store->id_kelas = $request->class;
        $store->subjek = $request->subject;
        $store->pesan = $request->message;
        $store->save();
        return redirect()->back()->with('successfully', 'Your data has been successfully saved.');
    }
}
