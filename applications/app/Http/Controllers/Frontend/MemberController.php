<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    function index(){
	    return view('frontend.member-page.index');
	}

	function view($slug){
	    return view('frontend.member-page.view');
	}

}
