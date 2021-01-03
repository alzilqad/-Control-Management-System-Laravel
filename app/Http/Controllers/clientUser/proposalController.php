<?php

namespace App\Http\Controllers\clientUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class proposalController extends Controller
{
    public function index(Request $req)
    {
        $proposals = DB::table('proposal')
            ->join('client', 'proposal.client_id', '=', 'client.client_id')
            ->where('client.username', '=', $req->session()->get('username'))
            ->select('proposal.*', 'client.full_name', 'client.username')
            ->get();

        if ($proposals != null) {
            return view('clientUser.proposallist.index', compact('proposals'));
        } else {
            return back();
        }
    }

}
