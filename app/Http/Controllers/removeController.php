<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserTeamRequest;

use App\TeamUsers;
use App\Project;
use App\Team;
use App\User;

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
    public function userteam(UserTeamRequest $request){
        $isMe = false;

        // Supprime toutes les tâches associé au user supprimé
        foreach(Project::byTeam($request->id_team)->get() as $projects) {
            foreach ($projects->tasks->where('id_user', $request->id_user) as $task) {
                $task->delete();
            }
        }

        // Si je me supprime de l'équipe, redirect homepage
        if (User::me()->id == $request->id_user) {
            foreach(User::me()->teams as $teams) {
                if ($teams->id == $request->id_team) {
                    $isMe = true;
                    break;
                }
            }
        }
        //DELETE USER
        TeamUsers::where([
            ['id_team', $request->id_team],
            ['id_user', $request->id_user],
        ])->delete();

        // S'il n'y a plus de personne dans l'équipe, supprime l'équipe
        if (count(TeamUsers::where('id_team', $request->id_team)->get()) < 1) {
            Team::where('id', $request->id_team)->delete();
        }

        //REDIRECT TO TEAM
        if ($isMe) 
            return redirect()->route('dashboard.index');
        return redirect()->back();
    }
}
