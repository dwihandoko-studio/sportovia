<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GamesController extends Controller
{
    function index(){

    	$titlePage = "Games Class";
    	$titleSubPage = "Lorem Ipsum Doler Sit Amer";
    	$descriptionPage = "Lorem Ipsum Doler Sit Amer, Lorem Ipsum Doler Sit Amer, Lorem Ipsum Doler Sit Amer";
    	
	    $routePage = "frontend.games.";

	    return view('frontend.index-page.index', compact(
	    	'titlePage',
	    	'titleSubPage',
	    	'descriptionPage',
	    	'routePage'
	    ));
	}

	function view($slug){
    	$indexPage = "Games Class";
	    $routePage = "frontend.games.index";

	    return view('frontend.view-page.view-style-1', compact(
	    	'indexPage',
	    	'routePage'
	    ));
	}
}
