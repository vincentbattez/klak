<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Project;

class TeamController extends Controller
{
    public function index($slug) {
        // ON RECUREPERE LES INFORMATION DE LA TEAM
        $team = Team::where('slug', $slug)->first();
        
        if($team){            
            $projects = Project::byTeam($team->id)->get();

            return view('team/index', [
                'team'      => $team, 
                'projects'  => $projects,
            ]);
        }
        else{
            return redirect()->route('dashboard.index');
        }
    }
    
}
