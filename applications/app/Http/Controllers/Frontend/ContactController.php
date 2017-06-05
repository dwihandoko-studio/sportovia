<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Kontak;

class ContactController extends Controller
{
    function index(){

    	$call = Kontak::first();
    	
	    return view('frontend.contact-page.index', compact(
	    	'call'
	    ));
	}
}
