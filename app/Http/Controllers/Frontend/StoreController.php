<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Inbox;
use App\Models\Trial;
use App\Models\GeneralConfig;

use Validator;
use Mail;

class StoreController extends Controller
{
    function store(Request $request){
    	$message = [
          'store_type.required' => 'Choose One',
          'store_name.required' => 'Required',
          'store_subject.required' => 'Required',
          'store_phone.required' => 'Required',
          'store_message.required' => 'Required',
          'store_email.email' => 'Invalid email',
          'store_email.required' => 'Required',
          'store_class.required' => 'Choose One',
          'store_day.required' => 'Choose One',
          'store_hour.required' => 'Choose One',
        ];

        $validator = Validator::make($request->all(), [
          'store_type' => 'required',
          'store_name' => 'required',
          'store_subject' => 'required',
          'store_message' => 'required',
          'store_email' => 'required|email',
          'store_phone' => 'required',
          'store_class' => 'required',
          'store_day' => 'required',
          'store_hour' => 'required',
        ], $message);

        if($validator->fails()){
          return redirect()->back()->with('store_info', 'Wrong Input')->withErrors($validator)->withInput();
        }

        $store = New Trial;
        $store->type        = $request->store_type;
        $store->id_content  = $request->store_class;
        $store->nama        = $request->store_name;
        $store->telp        = $request->store_phone;
        $store->email       = $request->store_email;
        $store->subjek      = $request->store_subject;
        $store->pesan       = $request->store_message.' || '.$request->store_day.' || '.$request->store_hour;
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

        $getSendTo = GeneralConfig::first();

        try {
          Mail::send('mails.contact', ['request' => $request], function($message) use ($request, $getSendTo) {
            $message->from('administrator@sportopia.id', 'Administrator')
                    ->to($getSendTo->email_to);
            if ($getSendTo->email_cc != null) {
                    $message->cc($getSendTo->email_cc);
            }
                    $message->subject('New Inbox From : '.$request->email);
          });
        } catch (\Exception $e) {
          // dd($e);
        }

        return redirect()->back()->with('contact_info', 'Your data has been successfully saved.');
    }
}
