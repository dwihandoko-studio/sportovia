<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class DashboardController extends Controller
{


    public function index()
    {
        return view('backend.dashboard.index');
    }
}
