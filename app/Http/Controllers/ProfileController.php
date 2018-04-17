<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;
//use app\Project;
use DB;

class ProfileController extends Controller
{
    public function index($id) {
        $user = User::find($id);
        //$myProjects = Project::where('id_user', $id);
        //$teamProjects = DB::table('klak_projects')->where('id_user', $id);
            
        return view('profile/index', ['id'=>$id, 'user'=>$user]);
    }
}
