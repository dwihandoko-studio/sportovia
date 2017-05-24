<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EducationController extends Controller
{
    function index(){
	    return view('frontend.index-page.index');
	}
}
