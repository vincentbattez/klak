<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests\ProjectRequest;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\UserTeamRequest;
use App\Http\Requests\TeamRequest;

use App\Project;
use App\Team;
use App\TeamUsers;
use App\User;
use App\Task;

use Image;

class createController extends Controller
{
    
    /*———————————————————————————————————*\
                    userteam
    \*———————————————————————————————————/*
            @type      [Create]
            @method    POST
    
            @params    $request   Data du formulaire submit

            @return    Ajoute un utilisateur une équipe
            @redirect  Retour à la page précédente
             
    */
    public function userteam(UserTeamRequest $request){
        // user exist
        $user = User::where('email', $request->email)->first();

        //SAVE IN BDD
        if($user){
            TeamUsers::create([
                'id_user' => $user->id,
                'id_team' => $request->id_team
            ]);
        }

        //REDIRECT TO TEAM
        return redirect()->back();
    }


    /*———————————————————————————————————*\
                    team
    \*———————————————————————————————————/*
            @type      [Create]
            @method    POST
    
            @params    $request   Data du formulaire submit
                
            @return    Ajoute une nouvelle équipe
            @redirect  Redirige vers la page de la nouvelle l'équipe
    */
    public function team(TeamRequest $request){
        //CREATE SLUG
        $slug = str_slug($request->name, '-');

        //SAVE IN BDD
        $newTeam = Team::create([
            'name' => $request->name,
            'slug' => $slug,
            'img' => '',
            'imgSmall' => '',
            'id_user' => $request->id_user,
        ]);

        //ADD AUTHOR IN THIS TEAM
        TeamUsers::create([
            'id_user' => $request->id_user,
            'id_team' => $newTeam->id
        ]);

        //UPLOAD IMAGE
        if(Input::hasFile('img')){
            createController::uploadImg($newTeam->id, 'team', new Team);
        }

        //REDIRECT
        return redirect("/team/".$slug);
    }


    /*———————————————————————————————————*\
                    project
    \*———————————————————————————————————/*
            @type      [Create]
            @method    POST
    
            @params    $request   Data du formulaire submit
                
            @return    Ajoute un nouveau projet à une équipe
            @redirect  Redirige vers la page du nouveau projet
    */
    public function project(ProjectRequest $request){
        //CREATE SLUG
        $slug = str_slug($request->name, '-');

        //SAVE IN BDD
        $newProject = Project::create([
            'name' => $request->name,
            'slug' => $slug,
            'img' => '',
            'imgSmall' => '',
            'id_user' => $request->id_user,
            'id_team' => $request->id_team,
            'deadline' => $request->deadline,
        ]);

        //UPLOAD IMAGE
        if(Input::hasFile('img')){
            createController::uploadImg($newProject->id, 'project', new Project);
        }

        //REDIRECT
        return redirect("/project/".$slug);
    }


    /*———————————————————————————————————*\
                    task
    \*———————————————————————————————————/*
            @type      [Create]
            @method    POST
    
            @params    $request   Data du formulaire submit
                
            @return    Ajoute une nouvelle tâche à un project
            @redirect  Retour à la page précédente
    */
    public function task(TaskRequest $request){
        //SAVE IN BDD
        $newProject = Task::create([
            'name'       => $request->name,
            'status'     => $request->status,
            'id_user'    => $request->id_user,
            'id_project' => $request->id_project,
        ]);

        //REDIRECT TO TEAM
        return redirect()->back();
    }
    

    /*———————————————————————————————————*\
                    addImage
    \*———————————————————————————————————/*
            @type      [Update]
            @method    POST
    
            @params    $request   Data du formulaire submit
                
            @return    Appel le controller pour upload une image
            @redirect  Retour à la page précédente
    */
    public function addImage(Request $request){
        //GET & VALIDATE FIELD
        $request->validate([
            'type' => 'required|string|min:3',
            'id' => 'required',
        ]);

        //UPLOAD IMAGE
        if(Input::hasFile('img')){
            if($request->type == 'project'){
                createController::uploadImg($request->id, $request->type, new Project);
            }
            else if($request->type == 'team'){
                createController::uploadImg($request->id, $request->type, new Team);
            }
        }

        //REDIRECT TO TEAM
        return redirect()->back();
    }
    

    /*———————————————————————————————————*\
                    uploadImg
    \*———————————————————————————————————/*
            @type      [Update]
            @method    POST

            @params    $id     (1)
            @params    $type   (team)
            @params    $model  (new Team)
             
            @return    Upload une image et l'ajoute dans la bonne table
    */
    //FONCTION TO ADD IMAGE ON WEBSITE AND BDD
    public function uploadImg($id, $type, $model){
        $file = Input::file('img');
        $urlImg = 'images/'.$type.'/'.$type.$id.'/';
        $nameImg = md5($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();

        //TAILLE L'ORIGINAL
        $file->move($urlImg, $nameImg);

        //TAILLE 1
        $img = Image::make($urlImg.$nameImg);
        $img->fit(1500, 350);
        $img->save($urlImg.'1500x350-'.$nameImg);

        //TAILLE 2
        $img = Image::make($urlImg.$nameImg);
        $img->fit(60, 60);
        $img->save($urlImg.'60x60-'.$nameImg);

        //ADD NAME FILE IN DB USER
        $model::where('id', $id)
        ->update([
            'img' => ''.$type.$id.'/1500x350-'.$nameImg ,
            'imgSmall' => ''.$type.$id.'/60x60-'.$nameImg
        ]);
    }
}
