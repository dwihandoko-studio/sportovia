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

        $getKelas = Kelas::find($id);

        $getDay = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        return view('backend.jadwal.seeSchedule', compact('getJadwal', 'getDay', 'getKelas'));
    }

    public function class($id)
    {
        $getKelas = Kelas::find($id);

        $program = $getKelas->kelasProgram->program_kelas;
        if($program == 'Kids' || $program == 'kids' || $program == 'Child' || $program == 'child' || $program == 'Children' || $program == 'children'){
          $getMember = Member::whereNotNull('anak_member')->get();
        }else{
          $getMember = Member::whereNull('anak_member')->get();
        }

        $getKelasRuang = KelasRuang::orderBy('lantai_kelas', 'asc')->get();

        return view('backend.jadwal.class', compact('getKelas', 'getMember', 'getKelasRuang'));
    }

    public function classStore(Request $request)
    {
        $message = [
          'id_member.required' => 'This field is required.',
          'id_kelas_ruang.required' => 'This field is required.',
          'hari.required' => 'This field is required.',
          'jam_akhir.required' => 'This field is required.',
          'jam_akhir.required' => 'This field is required.',
        ];

        $validator = Validator::make($request->all(), [
          'id_member' => 'required',
          'id_kelas_ruang' => 'required',
          'hari' => 'required',
          'jam_mulai' => 'required',
          'jam_akhir' => 'required',
        ], $message);

        if($validator->fails()){
          return redirect()->route('jadwal.class', ['id' => $request->id_kelas])->withErrors($validator)->withInput();
        }


        // Validasi Jam Member
        $cekJadwal = Jadwal::where('id_member', $request->id_member)
                            ->where('id_kelas_ruang', $request->id_kelas_ruang)
                            ->where('id_kelas', $request->id_kelas)
                            ->where('hari', $request->hari)
                            ->first();

        if($cekJadwal){
          return redirect()->route('jadwal.class', ['id' => $request->id_kelas])->with('gagal', 'Students already have classes in this day')->withInput();
        }


        $newJadwal = new Jadwal;
        $newJadwal->id_member = $request->id_member;
        $newJadwal->id_kelas = $request->id_kelas;
        $newJadwal->id_kelas_ruang = $request->id_kelas_ruang;
        $newJadwal->hari = $request->hari;
        $newJadwal->jam_mulai = $request->jam_mulai;
        $newJadwal->jam_akhir = $request->jam_akhir;
        $newJadwal->flag_status = 1;
        $newJadwal->aktor = auth()->guard('admin')->id();
        $newJadwal->save();

        $log = new LogAkses;
        $log->actor = auth()->guard('admin')->id();
        $log->aksi = 'Adding New Member Schedule '.$request->id_member;
        $log->save();

        return redirect()->route('jadwal.index')->with('berhasil', 'Your data has been successfully saved.');

    }

    public function classMember()
    {

        $getKelas = Kelas::orderBy('id_program', 'asc')->get();
        $getMember = Member::get();
        $getKelasRuang = KelasRuang::orderBy('lantai_kelas', 'asc')->get();


        return view('backend.jadwal.classMember', compact('getKelas', 'getKelasRuang', 'getMember'));
    }

    public function classMemberStore(Request $request)
    {
        $message = [
          'id_member.required' => 'This field is required.',
          'id_kelas.required' => 'This field is required.',
          'id_kelas_ruang.required' => 'This field is required.',
          'hari.required' => 'This field is required.',
          'jam_akhir.required' => 'This field is required.',
          'jam_akhir.required' => 'This field is required.',
        ];

        $validator = Validator::make($request->all(), [
          'id_member' => 'required',
          'id_kelas_ruang' => 'required',
          'id_kelas' => 'required',
          'hari' => 'required',
          'jam_mulai' => 'required',
          'jam_akhir' => 'required',
        ], $message);

        if($validator->fails()){
          return redirect()->route('jadwal.classMember')->withErrors($validator)->withInput();
        }

        // Validasi Jam Member
        $cekJadwal = Jadwal::where('id_member', $request->id_member)
                            ->where('id_kelas_ruang', $request->id_kelas_ruang)
                            ->where('id_kelas', $request->id_kelas)
                            ->where('hari', $request->hari)
                            ->first();

        if($cekJadwal){
          return redirect()->route('jadwal.classMember')->with('gagal', 'Students already have classes in this day')->withInput();
        }


        $newJadwal = new Jadwal;
        $newJadwal->id_member = $request->id_member;
        $newJadwal->id_kelas = $request->id_kelas;
        $newJadwal->id_kelas_ruang = $request->id_kelas_ruang;
        $newJadwal->hari = $request->hari;
        $newJadwal->jam_mulai = $request->jam_mulai;
        $newJadwal->jam_akhir = $request->jam_akhir;
        $newJadwal->flag_status = 1;
        $newJadwal->aktor = auth()->guard('admin')->id();
        $newJadwal->save();

        $log = new LogAkses;
        $log->actor = auth()->guard('admin')->id();
        $log->aksi = 'Adding New Member Schedule '.$request->id_member;
        $log->save();

        return redirect()->route('jadwal.index')->with('berhasil', 'Your data has been successfully saved.');

    }




}
