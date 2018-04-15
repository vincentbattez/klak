<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;

class ProfileController extends Controller
{
    public function index($id) {
        $user = User::find($id);
        return view('profile/index', ['id'=>$id, 'user'=>$user]);
    }
}
