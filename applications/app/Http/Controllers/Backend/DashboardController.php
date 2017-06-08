<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Kelas;
use App\Models\KelasRuang;
use App\Models\KelasKategori;
use App\Models\KelasProgram;
use App\Models\Fasilitas;
use App\Models\Member;
use App\Models\NewsEvent;
use App\Models\Staff;
use App\Models\Trial;

use DB;

class DashboardController extends Controller
{


    public function index()
    {
        $getMember = Member::get();
        $getClassCourse = Kelas::get();
        $getNews = NewsEvent::where('news_event', 1)->get();
        $getEvent = NewsEvent::where('news_event', 0)->get();

        return view('backend.dashboard.index', compact('getMember', 'getClassCourse', 'getNews', 'getEvent'));
    }
}
