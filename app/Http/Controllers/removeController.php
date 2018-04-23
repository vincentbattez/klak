<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeamUsers;
use App\Project;

class removeController extends Controller
{
    /*———————————————————————————————————*\
                    userteam
    \*———————————————————————————————————/*
            @type      [Delete]
            @method    POST
    
            @params    $request   Data des inputs
                
            @return    Supprime les taches assosié au user + supprime un user d'une team
            @redirect  Redirige vers la page précédente
    */
    public function userteam(Request $request){
        //GET FIELD
        $request->validate([
            'id_team' => 'required',
            'id_user' => 'required',
        ]);


        foreach(Project::byTeam($request->id_team)->get() as $projects) {
            foreach ($projects->tasks->where('id_user', $request->id_user) as $task) {
                $task->delete();
            }
        }

        //DELETE USER
        TeamUsers::where([
            ['id_team', $request->id_team],
            ['id_user', $request->id_user],
        ])->delete();

        //REDIRECT TO TEAM
        return redirect()->back();
    }
}
