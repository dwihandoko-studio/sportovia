<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Kelas;
use App\Models\KelasKategori;
use App\Models\KelasProgram;

class ProgramClassController extends Controller
{
    function index($slug){

    	$arr = ['children','childrens','anak','anak-anak','kid','kids'];

    	$callProgram = KelasProgram::select(
            'id',
            'program_kelas',
            'quotes_program',
            'deskripsi_program',
            'img_banner', 
            'slug'
        )
        ->where('slug', $slug)
        ->where('flag_publish', '1')
        ->first();

        if($callProgram == null){
            abort(404);
        }

        $callClass = Kelas::leftJoin('amd_kelas_kategori', 'amd_kelas_kategori.id', '=', 'amd_kelas.id_kelas_kategori')
        ->select(
            'nama_kelas',
            'img_url', 
            'deskripsi_kelas',
            'amd_kelas.slug as kelas_slug',
            'amd_kelas_kategori.slug as kategori_slug'
        )
        ->where('id_program', $callProgram->id)
        ->where('amd_kelas.flag_publish', '1')
        ->where('amd_kelas_kategori.flag_publish', '1')
        ->orderBy('nama_kelas', 'asc')
        ->get();
        
        if (in_array(strtolower($callProgram->program_kelas), $arr)){
		    $goView = 'frontend.children-page.index';
        }
        else{
		    $goView = 'frontend.reguler-page.index';
        }

        return view($goView, compact(
		    	'callProgram',
		    	'callClass'
		    ));
	}
}
