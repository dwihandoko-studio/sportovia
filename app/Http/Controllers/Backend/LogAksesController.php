<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\LogAkses;
use App\Models\Admin;

class LogAksesController extends Controller
{

    public function index()
    {
        $log = LogAkses::select(['amd_admin.name as actor_name', 'aksi', 'amd_log_akses.created_at'])
                        ->join('amd_admin','amd_admin.id','=', 'amd_log_akses.actor')
                        ->orderBy('amd_log_akses.created_at', 'desc')
                        ->take(100)
                        ->get();

        return view('backend.logakses.index', compact('log'));
    }

}
