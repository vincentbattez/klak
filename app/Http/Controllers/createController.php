<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Team;
use Illuminate\Support\Facades\Input;
use Image;

class createController extends Controller
{

    //FUNCTION CREATED A NEW TEAM
    public function team(Request $request){
        //GET FIELD
        $request->validate([
            'name' => 'required|string|min:3',
            'id_user' => 'required',
        ]);

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

        //UPLOAD IMAGE
        if(Input::hasFile('img')){
            createController::uploadImg($newTeam->id, 'team', new Team);
        }

        //REDIRECT
        return redirect("/team/".$slug);
    }


    //FUNCTION CREATED A NEW PROJECT
    public function project(Request $request){
        //GET FIELD
        $request->validate([
            'name' => 'required|string|min:3',
            'id_user' => 'required',
            'id_team' => 'required'
        ]);
        
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


    //FONCTION TO ADD IMAGE ON WEBSITE AND BDD
    public function uploadImg($id, $type, $class){
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
        $class::where('id', $id)
        ->update(array('img' => ''.$type.$id.'/1500x350-'.$nameImg , 'imgSmall' => ''.$type.$id.'/60x60-'.$nameImg));
    }
}
