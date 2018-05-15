<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class UpdateController extends Controller
{
  /*———————————————————————————————————*\
                  TITLE
  \*———————————————————————————————————/*
          @type      [Update]
          @method    POST
  
          @params    $idTask   ID de la tâche
          @params    $request  Data du formulaire submit
            
          @return    Met à jour le status (0:todo, 1:doing, 2:done, 3:archivé)
          @redirect  Redirige vers la page pécédente
  */
	public function changeStatusTask($idTask, Request $request) {
    /*—————————————— AUTRES ——————————————————*/
    if(!$request->exists('archive')){
      
      $idStatus = $request->idStatus;
  
      if ($idStatus < 2) {
        $idStatus++;
      }
    /*—————————————— ARCHIVE ——————————————————*/
    }else{
      $idStatus = 3;
    }

    Task::select('id','status')->whereId($idTask)->update([
      'status'=> $idStatus
    ]);

    return redirect()->back();
	}
}