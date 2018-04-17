<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{
    public function index($slug) {

        // ON RECUREPERE LES INFORMATION DE LA TEAM
        $teamSelect = Team::where('slug', $slug)->get();
        
        if(count($teamSelect) != 0){
            foreach($teamSelect as $t){
                $id = $t->id;
                $name = $t->name;
                $img = $t->img;
                $slug = $t->slug;
            }        

            return view('team/index', [
                'id'=>$id, 
                'name'=>$name, 
                'img'=>$img,
                'slug' => $slug,
            ]);

        }
        else{
            return redirect()->route('dashboard.index');
        }
    }
    
}
