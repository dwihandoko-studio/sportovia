<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\User;
use Validator;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/member-area';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getLoginForm()
    {

        return view('frontend.member-page.index');
    }

    public function authenticate(Request $request)
    {

        $email = $request->input('email');
        $password = $request->input('password');

        $message = [
          'email.required' => 'This field is required.',
          'email.email' => 'Email format',
          'password.required' => 'This field is required.',
        ];

        $validator = Validator::make($request->all(), [
          'email' => 'required|email',
          'password' => 'required',
        ], $message);

        if($validator->fails())
        {
          return redirect(url()->previous() . '#login')->withErrors($validator)->withInput();
        }

        if (auth()->guard('user')->attempt(['email' => $email, 'password' => $password, 'confirmed'=>1 ]))
        {
            $set = User::find(Auth::guard('user')->user()->id);
            $getCounter = $set->login_count;
            $set->login_count = $getCounter+1;
            $set->update();

            // return redirect()->intended('member/dashboard');
            return 'berhasil login';
        }
        else
        {
          return redirect(url()->previous() . '#login')->withErrors($validator)->with('status', 'Invalid Login Credentials !')->withInput();
        }
    }


    public function getLogout()
    {
        auth()->guard('admin')->logout();
        return redirect()->intended('admin/login');
    }

}
