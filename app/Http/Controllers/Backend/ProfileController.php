<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Admin;
use App\Models\LogAkses;

use Auth;
use Validator;
use Hash;
use Image;

class ProfileController extends Controller
{


    public function index()
    {
        $getUser = Admin::where('id',auth()->guard('admin')->id())->first();

        return view('backend.profile.index', compact('getUser'));
    }

    public function changePassword(Request $request)
    {

        $getUser = Admin::where('id', $request->id)->first();

        $messages = [
          'name.unique' => "This field is required",
          'email.unique'  => "This email already taken",
          'oldpass.required' => "You must enter the old password",
          'newpass.required' => "You must enter the new password",
          'newpass.min' => "Too short",
          'newpass_confirmation.required' => "You must enter the new password confirmation",
          'newpass_confirmation.confirmed' => "Password don't match",
        ];

        $validator = Validator::make($request->all(), [
          'name'  => 'required',
          'email' => 'required|email|unique:amd_admin,email,'.$request->id,
          'oldpass' => 'required',
          'newpass' => 'required|min:6',
          'newpass_confirmation' => 'required|same:newpass'
        ], $messages);

        if ($validator->fails()) {
          return redirect()->route('profile.index')->withErrors($validator)->withInput();
        }

        if(Hash::check($request->oldpass, $getUser->password))
        {
          $getUser->name = $request->name;
          $getUser->password = Hash::make($request->newpass);
          $getUser->update();

          return redirect()->route('profile.index')->with('berhasil', "Your password successfully changed.");
        }
        else {
          return redirect()->route('profile.index')->with('erroroldpass', 'Your old password did not match');
        }
    }

}
