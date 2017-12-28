<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\ConfigContent;

use DB;
use Auth;
use Validator;

class ConfigContentController extends Controller
{
	public function index(){
		$call = ConfigContent::get();
		return view('backend.config_content.index', compact('call'));
	}
	public function ubah($id){
		$call = ConfigContent::find($id);
		if(!$call){
			return view('backend.errors.404');
		}
		return $call;
	}
	public function simpan(request $request){

		$update = ConfigContent::find($request->id);
        $update->content = $request->edit_ads_judul;
        $update->update();

        return redirect()->route('ConfigContent.index')->with('berhasil', $update->descrip.' success to update');
	}
}
