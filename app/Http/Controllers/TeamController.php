<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{
    public function index($slug) {

        // ON RECUREPERE LES INFORMATION DE LA TEAM
        $teamSelect = Team::where('slug', $slug)->first();
        
        if(count($teamSelect) != 0){            

            $id        = $teamSelect->id;
            $name      = $teamSelect->name;
            $img       = $teamSelect->img;
            $slug      = $teamSelect->slug;
            $allMember = Team::find($id)->users;

            return view('team/index', [
                'id'        => $id, 
                'name'      => $name, 
                'img'       => $img,
                'slug'      => $slug,
                'allMember' => $allMember,
            ]);
        }
        else{
            return redirect()->route('dashboard.index');
        }
    }
    
}
