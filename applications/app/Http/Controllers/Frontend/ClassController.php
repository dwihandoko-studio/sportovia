<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Kelas;
use App\Models\KelasKategori;

class ClassController extends Controller
{
    function index($slug){

    	$callKategori = KelasKategori::select(
            'id',
            'kategori_kelas',
            'img_banner', 
            'quotes_kategori', 
            'deskripsi_kategori',
            'slug'
        )
        ->where('slug', $slug)
        ->where('flag_publish', '1')
        ->first();

        $callClass = Kelas::select(
            'nama_kelas',
            'img_url', 
            'deskripsi_kelas',
            'slug'
        )
        ->where('id_kelas_kategori', $callKategori->id)
        ->where('flag_publish', '1')
        ->orderBy('nama_kelas', 'asc')
        ->get();

	    return view('frontend.index-page.index', compact(
	    	'callKategori',
	    	'callClass'
	    ));
	}

	function view($slug, $subslug){
	    $callKategori = KelasKategori::select(
            'kategori_kelas',
            'slug'
        )
        ->where('slug', $slug)
        ->where('flag_publish', '1')
        ->first();

        $callClass = Kelas::select(
            'nama_kelas',
            'deskripsi_kelas',
            'img_url', 
            'fasilitas',
            'video_url',
            'slug'
        )
        ->where('slug', $subslug)
        ->where('flag_publish', '1')
        ->first();

	    return view('frontend.view-page.view-style-1', compact(
	    	'callKategori',
	    	'callClass'
	    ));
	}
}
