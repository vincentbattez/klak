<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Input;
use Image;

class createController extends Controller
{

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
            'id_user' => $request->id_user,
            'id_team' => $request->id_team,
            'deadline' => $request->deadline,
        ]);
        

        //IMPORT IMAGE
        if(Input::hasFile('img')){
            $img = '';//
            $file = Input::file('img');

            $urlImg = 'images/project/project'.$newProject->id.'/';
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
            Project::where('id', $newProject->id)
            ->update(array('img' => 'project'.$newProject->id.'/1500x350-'.$nameImg , 'imgSmall' => 'project'.$newProject->id.'/60x60-'.$nameImg));
        }

        
        //REDIRECT
        return redirect("/project/".$slug);

    }
}
