<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Team;

class ProjectController extends Controller
{
    public function index($slug) {

        // ON RECUREPERE LES INFORMATION DU PROJET
        $projectSelect = Project::where('slug', $slug)->get();

        if(count($projectSelect) != 0){
            foreach($projectSelect as $p){
                $id = $p->id;
                $id_team = $p->id_team;
                $name = $p->name;
                $img = $p->img;
            }        
    
            $teamSelect = Team::where('id', $id_team)->get();
    
            foreach($teamSelect as $t){
                $teamName = $t->name;
                $teamSlug = $t->slug;
            }
    
            return view('project/index', [
                'id'=>$id, 
                'name'=>$name, 
                'img'=>$img,
                'teamName' => $teamName,
                'teamSlug' => $teamSlug,
            ]);
        }
        else{
            return redirect()->route('dashboard.index');
        }
    }
}
