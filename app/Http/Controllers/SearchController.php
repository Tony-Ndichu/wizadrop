<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use DB;
use App\User;
use App\Userprofile;





class SearchController extends Controller

{

   public function index()

{

return view('search.search');

}



public function search(Request $request)

{

if($request->ajax())

{

$output='';		

$posts = User::with('userprofile')
		->where('Skillset','LIKE','%'.$request->search."%")
		->orwhere('name','LIKE','%'.$request->search."%")->get();

if($posts->count() > 0)

{

 return view('search.results',compact('posts'));
}

else {

return view('search.noresults'); 

}




   }



}


public function noresults(){

return view('search.noresults');
}

}