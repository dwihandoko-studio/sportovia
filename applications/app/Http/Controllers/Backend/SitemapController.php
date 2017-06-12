<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\NewsEvent;
use App\Models\Kelas;
use App\Models\KelasKategori;
use App\Models\KelasProgram;


class SitemapController extends Controller
{
    public function index()
    {
        $now = date('Y-m-d');
        $getNews = NewsEvent::where('flag_publish', 1)->where('tanggal_publish', '<=', $now)->get();
        $getProgram = KelasProgram::where('flag_publish', 1)->get();

        $getKelasKategori = KelasKategori::where('flag_publish', 1)->get();

        $getKelas = Kelas::where('flag_publish', 1)->get();


        return response()->view('frontend.sitemap', [  'getNews' => $getNews,
                                                      'getProgram'  => $getProgram,
                                                      'getKelasKategori'  => $getKelasKategori,
                                                      'getKelas'  => $getKelas
                                                ])->header('Content-Type', 'text/xml');

        // return response()->view('frontend.sitemap')->header('Content-Type', 'text/xml');
    }
}
