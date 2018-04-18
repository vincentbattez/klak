<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Team;

class ProjectController extends Controller
{
    public function index($slug) {

        // ON RECUREPERE LES INFORMATION DU PROJET
        $projectSelect = Project::where('slug', $slug)->first();

        if($projectSelect){
            
            $id       = $projectSelect->id;
            $id_team  = $projectSelect->id_team;
            $name     = $projectSelect->name;
            $img      = $projectSelect->img;
            $teamName = Project::find($id_team)->team->name;
            $teamSlug = Project::find($id_team)->team->slug;
    
            return view('project/index', [
                'id'       => $id, 
                'name'     => $name, 
                'img'      => $img,
                'teamName' => $teamName,
                'teamSlug' => $teamSlug,
            ]);
        }
        else{
            return redirect()->route('dashboard.index');
        }
    }
}
