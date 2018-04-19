<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeamUsers;

class removeController extends Controller
{
    //
    public function userteam(Request $request){
        //GET FIELD
        $request->validate([
            'id_team' => 'required',
            'id_user' => 'required',
        ]);

        //DELETE USER
        TeamUsers::where([
            ['id_team', '=', $request->id_team],
            ['id_user', '=', $request->id_user],
        ])->delete();

        //REDIRECT TO TEAM
        return redirect()->back();
    }
}
