<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SportController extends Controller
{
    function index(){
	    return view('frontend.index-page.index');
	}
}
