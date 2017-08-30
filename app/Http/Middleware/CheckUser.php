<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckUser
{
    public function handle($request, Closure $next){
        if(!empty(auth()->guard('user')->id())){
            $data = DB::table('amd_users')
                    ->select('id')
                    ->where('id',auth()->guard('user')->id())
                    ->get();

            if (!$data[0]->id  ){
                return redirect()->intended('member-area/login/')->with('log_user_info', 'You do not have access to user admin side');
            }
            return $next($request);
        }
        else{
            return redirect()->intended('member-area/login/')->with('log_user_info', 'Please Login to access user admin area');
        }
    }
}
