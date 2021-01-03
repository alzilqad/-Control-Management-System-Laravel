<?php

namespace App\Http\Controllers\clientUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\clientUser\Company;


class companylistController extends Controller
{
    public function index()
    {
        $companies = DB::table('company')
            ->join('manager', 'company.manager_id', '=', 'manager.id')
            ->select('company.*', 'manager.full_name')
            ->get();
        return view('clientUser.companylist.index', compact('companies'));
    }

    public function lifecycle(Request $req, $id)
    {
        $company = DB::table('company')
            ->where('company.id', '=', $id)
            ->join('manager', 'company.manager_id', '=', 'manager.id')
            ->select('company.*', 'manager.*')
            ->get()
            ->first();

        if ($company != null) {
            return view('clientUser.companylist.lifecycle', compact('company'));
        } else {
            return back();
        }
    }
}
