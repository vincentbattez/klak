<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Team;
use App\TeamUsers;
use App\Project;
use App\Task;

class DashboardController extends Controller
{
    /*———————————————————————————————————*\
                    INDEX
    \*———————————————————————————————————/*
        @logged
            @type      [View]
            @method    GET
            
            @return    Affiche le dashboard
            @location  /resources/views/dashboard/index.blade.php

        @not logged
            @type      [View]
            @method    GET
            
            @return    Affiche la page login
            @location  /resources/views/auth/login.blade.php

            @redirect  Redirige vers la route nommé login
    */
    public function index() {
        if(Auth::check()) {
            // logged

            $allProject = Project::whereRaw("id_team in (SELECT klak_teams.id FROM klak_teams Join klak_teamUsers ON klak_teamUsers.id_team=klak_teams.id WHERE id_user=?)", [Auth::id()])->get();

            return view('dashboard/index', [
                'projects' => $allProject,
                'todos'    => Task::where('status', 0)->where('id_user', Auth::id())->count(),
                'doing'    => Task::where('status', 1)->where('id_user', Auth::id())->count(),
                'done'     => Task::where('status', 2)->where('id_user', Auth::id())->count(),
                
            ]);
        } else {
            // not logged
            return redirect()->route('login');
        }
    }
}