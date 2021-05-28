<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use DB;


class TeamController extends Controller
{
    /**
    * @return View
    */
    public function index() : View {

        // $team = auth()->user()->team()->with('members')->first();

        $name = auth()->user()->name;
        $team_name = auth()->user()->team;

        $team_id = auth()->user()->team_id;
        $members = DB::select('select * from users where team_id='.$team_id);

        $arrayLength = count($members);
        $i = 0;
        while ($i < $arrayLength)
        {
            $model_role = DB::select('select * from model_has_roles where model_id='.$members[$i]->id);
            $role = DB::select('select * from roles where id='.$model_role[0]->role_id);

            if($role[0]->name == "team_lead"){
                $members[$i]->role = "Team Lead";
            }
            else if($role[0]->name == "user"){
                $members[$i]->role = "Member";
            }
            $i++;
        }
        
        return view('team.index', [
            'name' => $name,
            'team_name' => $team_name,
            'tab' => 'team',
            'mode' => 'team.tabs.team',
            'members' => $members,
            // 'team' => $team
        ]);
    }

    // public function index() : View {

    //     $team = auth()->user()->team()->with('members')->first();

    //     $name = auth()->user()->name;
    //     $team_name = auth()->user()->team;
        
    //     return view('team.index', [
    //         'name' => $name,
    //         'team_name' => $team_name,
    //         'team' => $team
    //     ]);
    // }
}