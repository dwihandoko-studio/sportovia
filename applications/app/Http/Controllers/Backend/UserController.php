<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Admin;
use App\Models\Role;
use App\Models\LogAkses;

use Auth;
use Hash;
use DB;
use Mail;
use Validator;

class UserController extends Controller
{
    public function index()
    {
        $getUsers = Admin::where('role_id', '!=', 1)->where('role_id', '!=', 3)->get();

        return view('backend.user.index', compact('getUsers'));
    }

    public function reset($id)
    {
        $getUser = Admin::find($id);

        if(!$getUser){
          abort('backend.errors.404');
        }

        $getUser->password = Hash::make(12345678);
        $getUser->save();

        $log = new LogAkses;
        $log->actor = auth()->guard('admin')->id();
        $log->aksi = 'Reset Password '.$getUser->name;
        $log->save();

        if($getUser->id == auth()->guard('admin')->id()){
            auth()->guard('admin')->logout();
        }

        $data = array([
            'name' => $getUser->name,
            'email' => $getUser->email,
            'password' => 12345678
          ]);

        Mail::send('backend.email.reset', ['data' => $data], function($message) use ($data) {
          $message->from('administrator@sportopia.com', 'Administrator')
                  ->to($data[0]['email'], $data[0]['name'])
                  ->subject('Reset Password Akun CMS Sportopia');
        });


        return redirect()->route('userAdmin.index')->with('berhasil', 'Berhasil Me Reset Password '.$getUser->name);
    }

    public function newUser(Request $request)
    {
        $message = [
          'name.required' => 'This field required',
          'email.required' => 'This field required',
          'email.email' => 'Email format',
          'email.unique' => 'Email already taken',
        ];

        $validator = Validator::make($request->all(), [
          'name' => 'required',
          'email' => 'required|email|unique:amd_admin'
        ], $message);

        if($validator->fails())
        {
          return redirect()->route('userAdmin.index')->withErrors($validator)->withInput();
        }


        DB::transaction(function() use($request){
          $confirmation_code = str_random(30).time();
          $user = new Admin;
          $user->name = $request->name;
          $user->avatar = 'userdefault.png';
          $user->email = $request->email;
          $user->password = Hash::make(12345678);
          $user->confirmed = 0;
          $user->confirmation_code = $confirmation_code;
          $user->role_id = 2;
          $user->login_count = 0;
          $user->save();

          $log = new LogAkses;
          $log->actor = auth()->guard('admin')->id();
          $log->aksi = 'Create New User '.$request->name;
          $log->save();

          $data = array([
              'name' => $request->name,
              'email' => $request->email,
              'confirmation_code' => $confirmation_code
            ]);

          Mail::send('backend.email.confirm', ['data' => $data], function($message) use ($data) {
            $message->to($data[0]['email'], $data[0]['name'])->subject('Aktifasi Akun CMS Sportopia');
          });


        });

        return redirect()->route('userAdmin.index')->with('berhasil', 'New Account Has Been Created, Please check '.$request->email.' for verification');

    }

    public function verify($confirmation_code)
    {
        $getUser = Admin::where('confirmation_code', $confirmation_code)->first();

        if(!$getUser){
          return view('errors.404');
        }

        return view('backend.user.verify', compact('getUser'));
    }

    public function store(Request $request)
    {
        $message = [
          'password.required' => 'This field required',
          'password.max' => 'Password too long',
          'password.min' => 'Password too short',
        ];

        $validator = Validator::make($request->all(), [
          'password' => 'required|min:8|max:20',
        ], $message);

        if($validator->fails())
        {
          return redirect()->route('userAdmin.verify', ['confirmation_code' => $request->confirmation_code])->withErrors($validator)->withInput();
        }

        $user = Admin::where('confirmation_code', $request->confirmation_code)->first();

        if(!$user){
          abort(404);
        }

        $user->password = Hash::make($request->password);
        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->login_count = 1;
        $user->update();


        auth()->guard('admin')->login($user);

        $log = new LogAkses;
        $log->actor = auth()->guard('admin')->id();
        $log->aksi = 'First Login '.$user->name;
        $log->save();

        return redirect()->route('profile.index')->with('berhasil', 'Selamat Datang '.$user->name.' Segera ganti password anda');

    }


}
