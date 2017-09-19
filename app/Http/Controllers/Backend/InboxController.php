<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Inbox;
use App\Models\GeneralConfig;

use DB;
use Validator;

class InboxController extends Controller
{

    public function index()
    {
        $getInbox = Inbox::orderBy('created_at', 'desc')->get();

        $setRead = DB::table('amd_inbox')->where('has_read', 0)->update(['has_read' => 1]);

        $getGeneralConfig = GeneralConfig::first();

        return view('backend.inbox.index', compact('getInbox', 'getGeneralConfig'));
    }

    public function emailAddress(Request $request)
    {
        $message = [
          'email_to.required'  => 'This field is required.',
          'email_to.email'  => 'Format email not valid.',
          'email_cc.email'  => 'Format email not valid.',
        ];

        $validator = Validator::make($request->all(), [
          'email_to' => 'required|email',
          'email_cc' => 'nullable|email',
        ], $message);


        if($validator->fails())
        {
          return redirect()->route('inbox.index')->withErrors($validator)->withInput();
        }

        $update = GeneralConfig::find($request->id);
        $update->email_to = $request->email_to;
        $update->email_cc = $request->email_cc;
        $update->update();

        $data_to = array(['email' => $request->email_to]);
        $data_cc = array(['email' => $request->email_cc]);

        return redirect()->route('inbox.index')->with('berhasil', 'Email has been registered as Inbox Email');

    }
}
