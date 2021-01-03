<?php

namespace App\Http\Controllers\clientUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class chatController extends Controller
{
    public function index()
    {
        return view('clientUser.chat.index');
    }

}
