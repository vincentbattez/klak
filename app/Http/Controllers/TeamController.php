<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Project;
use App\User;

class TeamController extends Controller
{
    public function myTeams() {
        // ON RECUREPERE LES INFORMATION DE LA TEAM
        
        // $team = Team::where('slug', $slug)->first();
        $teams = User::myTeams();

        if($teams){
            return view('team/my-teams', [
                'teams'      => $teams,
            ]);
        } else {
            return redirect()->route('dashboard.index');
        }

     
    }

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
