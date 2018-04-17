<?php 

namespace App\Http\Controllers;

//use \Input as Input;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use app\User;
use DB;


// include composer autoload
//require 'vendor/autoload.php';
// import the Intervention Image Manager Class
use Image;

class UploadController extends Controller {

	public function userPicture($idUser){
		if(Input::hasFile('file')){

		//IMPORT FILE IN IMAGES/PROFILS/USER{{ID}}/MD5(NAMEFILE).EXT
			$file = Input::file('file');

			//VARIABLES IMAGES
			$urlImg = 'images/profils/user'.$idUser.'/';
			$nameImg = md5($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();

			//TAILLE L'ORIGINAL
			$file->move($urlImg, $nameImg);
			
			//TAILLE 1
			$img = Image::make($urlImg.$nameImg);
			$img->fit(300, 300);
			$img->save($urlImg.'300x300-'.$nameImg);
			
			//TAILLE 2
			$img = Image::make($urlImg.$nameImg);
			$img->fit(50, 50);
			$img->save($urlImg.'50x50-'.$nameImg);

			
		//ADD NAME FILE IN DB USER
			User::where('id', $idUser)
			->update(array('img' => 'user'.$idUser.'/300x300-'.$nameImg , 'imgSmall' => 'user'.$idUser.'/50x50-'.$nameImg));

		//RETURN ROUTE PROFILE
			return redirect()->route('profile.index', $idUser);
		}
		else{
			return redirect()->route('landingPage.index');
		}
  }
	
}