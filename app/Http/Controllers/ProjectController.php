<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Project;
use App\Task;
use App\User;

class ProjectController extends Controller
{
    public function myProjects() {
        if(Auth::check()) {
            // logged
            $allProject = User::myProjects();
            return view('project/my-projects', [
                'projects' => $allProject,
            ]);
        } else {
            // not logged
            return redirect()->route('login');
        }
    }

    public function index($slug) {

        // ON RECUREPERE LES INFORMATION DU PROJET
        $project = Project::where('slug', $slug)->first();

        if($project){

            $projectTasks = (object) [
                'todo'  => Task::projectTasks($project->id)->todo(),
                'doing' => Task::projectTasks($project->id)->doing(),
                'done'  => Task::projectTasks($project->id)->done(),
            ];

            $myTasks = (object) [
                'todo'  => Task::projectTasks($project->id)->myTasks()->todo(),
                'doing' => Task::projectTasks($project->id)->myTasks()->doing(),
                'done'  => Task::projectTasks($project->id)->myTasks()->done(),
            ];

            return view('project/index', [
                'project'      => $project,
                'projectTasks' => $projectTasks,
                'myTasks'      => $myTasks,
            ]);
        }
        else{
            return redirect()->route('dashboard/index');
        }
    }


    public function allTask($slug) {

        // ON RECUREPERE LES INFORMATION DU PROJET
        $project = Project::where('slug', $slug)->first();

        if($project) {

            $projectTasks = (object) [
                'todo'  => Task::projectTasks($project->id)->todo(),
                'doing' => Task::projectTasks($project->id)->doing(),
                'done'  => Task::projectTasks($project->id)->done(),
            ];

            return view('project/tasks', [
                'project' => $project,
                'projectTasks' => $projectTasks,
            ]);
        }
        else{
            return redirect()->route('dashboard/index');
        }
    }

}
