<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChildrenClassController extends Controller
{
    function index(){
    	$titlePage = "Children Class";
	    $routePage = "frontend.children.";

	    return view('frontend.children-page.index', compact(
	    	'titlePage',
	    	'routePage'
	    ));
	}
	function view($slug){
		$indexPage = "Children Class";
	    $routePage = "frontend.children.index";

	    return view('frontend.children-page.view', compact(
	    	'indexPage',
	    	'routePage'
	    ));
	}
}
