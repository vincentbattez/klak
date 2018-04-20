<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Team;
use App\Task;
use App\User;
use Auth;

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

            //USER'S TASKS OF THE PROJECT
            $todos     = Task::where('status', 0)->where('id_user', Auth::id())->where('id_project', $id)->orderBy('id','desc')->get();
            $doing     = Task::where('status', 1)->where('id_user', Auth::id())->where('id_project', $id)->orderBy('id','desc')->get();
            $done      = Task::where('status', 2)->where('id_user', Auth::id())->where('id_project', $id)->orderBy('id','desc')->get();

            //TASKS STATS OF THE PROJECT
            $teamTodos     = Task::where('status', 0)->where('id_project', $id)->count();
            $teamDoing     = Task::where('status', 1)->where('id_project', $id)->count();
            $teamDone      = Task::where('status', 2)->where('id_project', $id)->count();

            return view('project/index', [
                'id'        => $id, 
                'name'      => $name, 
                'img'       => $img,
                'teamName'  => $teamName,
                'teamSlug'  => $teamSlug,
                'allMember' => $allMember,
                'nbTodos'   => $todos->count(),
                'nbDoing'   => $doing->count(),
                'nbDone'    => $done->count(),
                'todos'     => $todos,
                'doing'     => $doing,
                'done'      => $done,
                'teamTodos' => $teamTodos,
                'teamDoing' => $teamDoing,
                'teamDone'  => $teamDone                           
            ]);
        }
        else{
            return redirect()->route('dashboard.index');
        }
    }
}
