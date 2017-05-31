<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\KelasKategori;
use App\Models\KelasProgram;

class HomeController extends Controller
{
	function index(){
		$callKelasKategori = KelasKategori::select(
            'kategori_kelas',
            'img_thumb', 
            'slug'
        )
        ->where('flag_publish', '1')
        ->orderby('kategori_kelas', 'asc')
        ->get();

        $callKelasProgram = KelasProgram::select(
            'program_kelas',
            'img_thumb', 
            'slug'
        )
        ->where('flag_publish', '1')
        ->orderby('program_kelas', 'asc')
        ->get();


	    return view('frontend.home-page.index', compact(
	    	'callKelasKategori',
	    	'callKelasProgram'
	    ));
	}
	
}
