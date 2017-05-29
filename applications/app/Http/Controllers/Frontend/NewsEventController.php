<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsEventController extends Controller
{
    function index(){

    	$titlePage = "News & Event";
	    $routePage = "frontend.news-event.";

	    return view('frontend.news-event-page.index', compact(
	    	'titlePage',
	    	'routePage'
	    ));
	}

	function view(){

    	$indexPage = "News & Event";
	    $routePage = "frontend.news-event.index";

	    return view('frontend.news-event-page.view', compact(
	    	'indexPage',
	    	'routePage'
	    ));
	}

}
