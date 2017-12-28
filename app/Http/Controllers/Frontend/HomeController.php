<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Kelas;
use App\Models\KelasKategori;
use App\Models\KelasProgram;

use App\Models\ConfigContent;

class HomeController extends Controller
{
	function index(){
		$callKelasKategori = KelasKategori::select(
            'id',
            'kategori_kelas',
            'img_thumb',
            'slug'
        )
        ->where('flag_publish', '1')
        ->orderby('id', 'asc')
        ->get();

        $callKelasProgram = KelasProgram::select(
            'program_kelas',
            'img_thumb',
            'slug'
        )
        ->where('flag_publish', '1')
        ->orderby('program_kelas', 'asc')
        ->get();

        $callClass = Kelas::select(
            'id_kelas_kategori',
            'img_url'
        )
        ->where('flag_publish', '1')
        ->where('flag_homepage', '1')
        ->orderby('id_kelas_kategori', 'asc')
        ->get();

        $callConfigContent = ConfigContent::find(1);

	    return view('frontend.home-page.index', compact(
	    	'callKelasKategori',
            'callKelasProgram',
	    	'callClass',
            'callConfigContent'
	    ));
	}

}
