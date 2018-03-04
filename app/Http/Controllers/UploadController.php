<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Auth;


class UploadController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */



    /**

     * Create a new controller instance.

     *

     * @return void

     */
      public function imagesUploadPost()

{

if(isset($_POST['imagebase64'])){

    function compress_image($source_url, $destination_url, $quality) {
                $info = getimagesize($source_url);

                    $image = imagecreatefrompng($source_url);
            imagejpeg($image, $destination_url, $quality);
            return $destination_url;
}

    $data = $_POST['imagebase64'];
    

 list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);
    $data = base64_decode($data);
    $image_name = time().'.png';

    $url="profilepics/".$image_name;
    
     $filename = compress_image($_POST['imagebase64'], $url, 40);

     $theuser = Auth::user()->id;

     $saved = User::where('id', $theuser)
                ->update(['Profileimage'=> $image_name]);

     return redirect()->action('PostController@skills');
 }


}


}