<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Trial;
use App\Models\Kelas;
use App\Models\NewsEvent;

use DB;
use Auth;

class FreeTrialController extends Controller
{

    public function index()
    {
        $getFree = Trial::where('type', 1)
                        ->orWhere('type', 1)
                        ->where('flag_status', 1)
                        ->get();

        return view('backend.freetrial.index', compact('getFree'));
    }

    
}
