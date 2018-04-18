<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Project;

class TeamController extends Controller
{
    public function index($slug) {

        // ON RECUREPERE LES INFORMATION DE LA TEAM
        $teamSelect = Team::where('slug', $slug)->first();
        
        if($teamSelect){            

            $id        = $teamSelect->id;
            $name      = $teamSelect->name;
            $img       = $teamSelect->img;
            $slug      = $teamSelect->slug;
            $allMember = Team::find($id)->users;
            $projects  = Project::all()->where('id_team', $id);

            return view('team/index', [
                'id'        => $id, 
                'name'      => $name, 
                'img'       => $img,
                'slug'      => $slug,
                'allMember' => $allMember,
                'projects'  => $projects,
            ]);
        }
        else{
            return redirect()->route('dashboard.index');
        }
    }
    
}
