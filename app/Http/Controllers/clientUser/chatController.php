<?php

namespace App\Http\Controllers\clientUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\clientUser\Client;
use App\Models\clientUser\Manager;
use App\Models\clientUser\Chat;

use App\Message;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Events\PrivateMessageEvent;

class chatController extends Controller
{
    public function index()
    {
        $messages = file_get_contents(base_path('resources/lang/messages.json'));
        return view('clientUser.chat.main')->with('messages', json_decode($messages, true));
    }

    // public function index(Request $req){
    //     $managers = Manager::all();
    //     $client = Client::find($req->session()->get('id'));
    //     // $chat = Chat::where();
    //     // echo $managers[0]->full_name;
    //     return view('clientUser.chat.index', compact('managers', 'client'));
    // }

    public function getUser(Request $req){
        $manager = Manager::where('full_name','LIKE','%'.$req->userName.'%')->get()->first();
        return $manager;
    }

}
