<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Kontak;
use App\Models\ConfigContent;

class ContactController extends Controller
{
    function index(){

    	$call = Kontak::first();
        $callConfigContent = ConfigContent::find(3);
    	
	    return view('frontend.contact-page.index', compact(
	    	'call',
	    	'callConfigContent'
	    ));
	}
}
