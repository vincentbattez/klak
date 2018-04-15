<?php 

namespace App\Http\Controllers;

//use \Input as Input;
use Illuminate\Support\Facades\Input;

class UploadController extends Controller {

	public function upload($idUser){

		if(Input::hasFile('file')){

			echo 'Uploaded';
            $file = Input::file('file');
			$file->move('images/profils/user'.$idUser.'/', $file->getClientOriginalName());
			echo '';
		}

	}
}