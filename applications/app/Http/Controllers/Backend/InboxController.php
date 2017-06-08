<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Inbox;

use DB;

class InboxController extends Controller
{

    public function index()
    {
        $getInbox = Inbox::orderBy('created_at', 'desc')->get();

        $setRead = DB::table('amd_inbox')->where('has_read', 0)->update(['has_read' => 1]);

        return view('backend.inbox.index', compact('getInbox'));
    }
}
