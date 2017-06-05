<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Kelas;
use App\Models\KelasKategori;
use App\Models\KelasProgram;

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
        
        $arr = ['children','childrens','anak','anak-anak','kid','kids'];

	    $callKategori = KelasKategori::select(
            'kategori_kelas',
            'slug'
        )
        ->where('slug', $slug)
        ->where('flag_publish', '1')
        ->first();

        $callClass = Kelas::leftJoin('amd_kelas_program', 'amd_kelas_program.id', '=', 'amd_kelas.id_program')
        ->select(
            'amd_kelas.id as id',
            'program_kelas',
            'nama_kelas',
            'quotes',
            'deskripsi_kelas',
            'img_url', 
            'fasilitas',
            'video_url',
            'amd_kelas.slug as slug'
        )
        ->where('amd_kelas.slug', $subslug)
        ->where('amd_kelas.flag_publish', '1')
        ->where('amd_kelas_program.flag_publish', '1')
        ->first();

        if (in_array(strtolower($callClass->program_kelas), $arr)){
            $goView = 'frontend.children-page.view';
        }
        else{
            $goView = 'frontend.view-page.view-style-1';
        }

	    return view($goView, compact(
	    	'callKategori',
	    	'callClass'
	    ));
	}
}
