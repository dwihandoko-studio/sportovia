<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegulerClassController extends Controller
{
    function index(){
    	$titlePage = "Reguler Class";
	    $routePage = "frontend.reguler.";

	    return view('frontend.reguler-page.index', compact(
	    	'titlePage',
	    	'routePage'
	    ));
	}
	function view($slug){
		$indexPage = "Reguler Class";
	    $routePage = "frontend.reguler.index";

	    return view('frontend.view-page.view-style-1', compact(
	    	'indexPage',
	    	'routePage'
	    ));
	}
}
