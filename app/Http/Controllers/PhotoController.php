<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Userprofile;

use Auth;

class PhotoController extends Controller
{
	public function photosupload(Request $request)
	{
		request()->validate([
			'uploadFile'=> 'nullable',
			'caption' => 'nullable',
		]);

		$user = new Userprofile;



if(isset($_POST['uploadFile'])){

$name = ''; $type = ''; $size = ''; $error = '';
	function compress_image($source_url, $destination_url, $quality) {

		$info = getimagesize($source_url);

    		if ($info['mime'] == 'image/jpeg')
        			$image = imagecreatefromjpeg($source_url);
				
				elseif ($info['mime'] == 'image/jpg')
        			$image = imagecreatefromjpeg($source_url);

    		elseif ($info['mime'] == 'image/gif')
        			$image = imagecreatefromgif($source_url);

   		elseif ($info['mime'] == 'image/png')
        			$image = imagecreatefrompng($source_url);

    		imagejpeg($image, $destination_url, $quality);
		return $destination_url;
	}
	$imageName = time().'.'.request()->uploadFile->getClientOriginalExtension();

	$url="portfolios/".$imageName;

	$compressit = compress_image(request()->uploadFile, $url, 50);
      $user->Profilepic = $imageName;
  }


		
		$photographer = Auth::user()->id;
 
       $user->Skill = request('caption');
       $user->registryid = $photographer;
			
		$user->save();

		    return redirect('/portfolio');

		    
	}
}