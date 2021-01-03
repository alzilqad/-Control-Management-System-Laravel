<?php

namespace App\Http\Controllers\clientUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\clientUser\AffiliatedCompany;

class companyController extends Controller
{
    public function index(Request $req)
    {
        $companies = DB::table('affiliated_companies')->where('client_username', '=', $req->session()->get('username'))
                        ->join('company', 'affiliated_companies.company_id', '=', 'company.id')
                        ->join('manager', 'company.manager_id', '=', 'manager.id')
                        ->select('*')
                        ->get();
        return view('clientUser.company.index', compact('companies'));
    }

    public function lifecycle(Request $req, $id)
    {
        // $affiliated_company = AffiliatedCompany::where('affiliated_company_id', '=', $id)
        //                 ->where('client_username', '=', $req->session()->get('username'))
        //                 ->get()
        //                 ->first();

        $companies = DB::select('select ac.*, m.*, c.*, client.client_id, client.username 
            from affiliated_companies ac, company c, manager m, client 
            where ac.client_username = :username and ac.affiliated_company_id = :id and ac.company_id = c.id and c.manager_id = m.id and ac.client_username=client.username',
            ['username' => $req->session()->get('username'), 'id' => $id]);

        if($companies!=null){
            $company = $companies[0];
            return view('clientUser.company.lifecycle', compact('company'));
        }
        else{
            return back();
        }
    }

}
