<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Member;
use App\Models\Kelas;
use App\Models\KelasRuang;
use App\Models\KelasProgram;
use App\Models\LogAkses;

use Auth;
use DB;
use Validator;


class ScheduleController extends Controller
{

    public function index()
    {
        $getKelas = Kelas::get();

        return view('backend.jadwal.index', compact('getKelas'));
    }

    public function seeSchedule($id)
    {
        $getJadwal = Jadwal::where('id_kelas', $id)->get();

        return view('backend.jadwal.seeSchedule', compact('getJadwal'));
    }
}
