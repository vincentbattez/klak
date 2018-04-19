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
            
            //THE PROJECT
            $id        = $projectSelect->id;
            $id_team   = $projectSelect->id_team;
            $name      = $projectSelect->name;
            $img       = $projectSelect->img;

            //THE TEAM 
            $teamName  = Team::find($id_team)->name;
            $teamSlug  = Team::find($id_team)->slug;
            $teamId    = Team::find($id_team)->id;

            //ALL MEMBER IN TEAM
            $allMember = Team::find($id_team)->users;
    
            return view('project/index', [
                'id'        => $id, 
                'name'      => $name, 
                'img'       => $img,
                'teamName'  => $teamName,
                'teamSlug'  => $teamSlug,
                'allMember' => $allMember,
            ]);
        }
        else{
            return redirect()->route('dashboard.index');
        }
    }
}
