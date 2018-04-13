<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Project extends Controller
{
    public function index($id) {
        return view('project/index', ['id'=>$id]);
    }
}
