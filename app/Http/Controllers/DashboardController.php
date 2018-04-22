<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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
            $allProject = Project::myProject()->get();

            return view('dashboard/index', [
                'projects' => $allProject,
                'todos'    => Task::myTasks()->todo()->count,
                'doing'    => Task::myTasks()->doing()->count,
                'done'     => Task::myTasks()->done()->count,
            ]);
        } else {
            // not logged
            return redirect()->route('login');
        }
    }
}