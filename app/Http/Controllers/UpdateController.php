<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class UpdateController extends Controller
{
	public function changeStatusTask($idTask, Request $request) {
    $idStatus = $request->idStatus;

    if ($idStatus < 2) {
      $idStatus++;
    }
    
    Task::select('id','status')->whereId($idTask)->update([
      'status'=> $idStatus
    ]);

    return redirect()->back();
	}
}