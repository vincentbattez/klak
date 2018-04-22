<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Task;

class ProjectController extends Controller
{
    public function index($slug) {

        // ON RECUREPERE LES INFORMATION DU PROJET
        $project = Project::where('slug', $slug)->first();

        if($project){
            $tasks = Task::projectTasks($project->id);

            $projectTasks = (object) [
                'todo'  => $tasks->todo(),
                'doing' => $tasks->doing(),
                'done'  => $tasks->done(),
            ];

            $myTasks = (object) [
                'todo'  => $tasks->myTasks()->todo(),
                'doing' => $tasks->myTasks()->doing(),
                'done'  => $tasks->myTasks()->done(),
            ];

            return view('project/index', [
                'project'      => $project,
                'projectTasks' => $projectTasks,
                'myTasks'      => $myTasks,
            ]);
        }
        else{
            return redirect()->route('dashboard.index');
        }
    }
}
