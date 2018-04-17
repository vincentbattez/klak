<?php 

namespace App\Http\Controllers;

//use \Input as Input;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use app\User;
use DB;


class UploadController extends Controller {

	public function userPicture($idUser){
		if(Input::hasFile('file')){

		//IMPORT FILE IN IMAGES/PROFILS/USER{{ID}}/MD5(NAMEFILE).EXT
			$file = Input::file('file');
			$nameImg = md5($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
			$file->move('images/profils/user'.$idUser.'/', $nameImg);

		//ADD NAME FILE IN DB USER
			User::where('id', $idUser)
			->update(array('img' => 'user'.$idUser.'/'.$nameImg));

		//RETURN ROUTE PROFILE
			return redirect()->route('profile.index', $idUser);
		}
		else{
			return redirect()->route('landingPage.index');
		}
  }
	
}