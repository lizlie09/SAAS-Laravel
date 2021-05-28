<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use DB;

class Chat extends Controller
{
    /**
    * @return View
    */
    public function index() : View {
        $name = auth()->user()->name;
        $team_name = auth()->user()->team;

        return view('team.index',[
            'name' => $name,
            'team_name' => $team_name,
            'tab'=> 'chats',
            'mode' => 'team.tabs.chats'
        ]);
    }
}