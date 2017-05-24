<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    function us(){
	    return view('frontend.about-page.us');
	}
	function staff(){
	    return view('frontend.about-page.staff');
	}
	
}
