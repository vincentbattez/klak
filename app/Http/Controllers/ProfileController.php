<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id) {
        return view('profile/index', ['id'=>$id]);
    }
}
