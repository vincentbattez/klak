<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LandingPageController extends Controller
{
    public function index() {
        // if(Auth::check()) {
        //     // logged
        //     return redirect(301)->route('/dashboard');
        // } else {
        //     // not logged
            return view('landingPage/index');
        // }
    }
}
