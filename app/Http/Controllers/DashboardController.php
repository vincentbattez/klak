<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Team;
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
            return view('dashboard/index', [
                'projects' => Project::all()->where('id_user', Auth::id()),
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