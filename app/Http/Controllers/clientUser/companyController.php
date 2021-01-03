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

        $companies = DB::select(
            'select ac.*, m.*, c.*, client.client_id, client.username 
            from affiliated_companies ac, company c, manager m, client 
            where ac.client_username = :username and ac.affiliated_company_id = :id and ac.company_id = c.id and c.manager_id = m.id and ac.client_username=client.username',
            ['username' => $req->session()->get('username'), 'id' => $id]
        );

        if ($companies != null) {
            $company = $companies[0];
            $req->session()->put('company_id', $id);
            $req->session()->put('company_name', $company->company_name);
            $req->session()->put('company_contact', $company->contact_number);
            return view('clientUser.company.lifecycle', compact('company'));
        } else {
            return back();
        }
    }

    public function service(Request $req, $id)
    {
        $services = DB::table('service')
            ->where('service.company_id', '=', $id)
            ->select('*')
            ->get();

        if ($services != null) {
            $req->session()->put('company_id', $id);
            return view('clientUser.company.services', compact('services'));
        } else {
            return back();
        }
    }

    public function proposal(Request $req, $id)
    {
        $proposals = DB::table('proposal')
            ->where('proposal.client_id', '=', $req->session()->get('id'))
            ->where('proposal.company_id', '=', $id)
            ->join('client', 'proposal.client_id', '=', 'client.client_id')
            ->join('manager', 'proposal.manager_id', '=', 'manager.id')
            ->select('proposal.*', 'client.full_name', 'client.username')
            ->get();

        if ($proposals != null) {
            $req->session()->put('company_id', $id);
            return view('clientUser.company.proposals', compact('proposals'));
        } else {
            return back();
        }
    }

    public function note(Request $req, $id)
    {
        $notes = DB::table('note')
            ->join('manager', 'note.manager_id', '=', 'manager.id')
            ->join('client', 'note.client_id', '=', 'client.client_id')
            ->join('company', 'manager.company_name', '=', 'company.company_name')
            ->where('note.client_id', '=', $req->session()->get('id'))
            ->where('note.manager_id', '=', $id)
            ->select('note.*', 'client.*', 'manager.company_name')
            ->get();

        if ($notes != null) {
            $req->session()->put('company_id', $id);
            return view('clientUser.company.notes', compact('notes'));
        } else {
            return back();
        }
    }

    public function appointment(Request $req, $id)
    {
        $appointments = DB::table('appointment')
            ->join('manager', 'appointment.manager_id', '=', 'manager.id')
            ->join('client', 'appointment.clients_id', '=', 'client.client_id')
            ->join('company', 'manager.company_name', '=', 'company.company_name')
            ->where('appointment.clients_id', '=', $req->session()->get('id'))
            ->where('appointment.manager_id', '=', $id)
            ->select('appointment.*', 'client.*', 'manager.company_name')
            ->get();

        if ($appointments != null) {
            $req->session()->put('company_id', $id);
            return view('clientUser.company.appointments', compact('appointments'));
        } else {
            return back();
        }
    }
}
