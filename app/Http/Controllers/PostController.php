<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


use App\Post;
use App\User;
use App\Userprofile;
use App\Thelike;
use Auth;
use App\Thefollow;
use DB;


class PostController extends Controller
{
        public function skills(Request $request)
  

    {
    	$posters = Userprofile::with('user')
    		->orderby('created_at','DESC')
    		->paginate(10);

    	 $num = Thelike::all();

    	if ($request->ajax()) {

    		$view = view('data',compact('posters','num'))->render();

            return response()->json(['html'=>$view]);

        }
      
    	return view('skills',compact('posters','num'));

    }

public function myPosts()
    {
        return view('my-posts', compact ('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::latest()->paginate(5);
 if ($request->ajax()) {

    		$view = view('data',compact('posts'))->render();

            return response()->json(['html'=>$view]);

        }


    	return view('my-posts',compact('posts'));

    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit()
    {
       
        return view('edit');
    }

     public function update(Request $request, $id)
    {
    	
         $user = User::find($id);
       $user->name = request('name');
		$user->skillset = request('skill');
		$user->contact = request('contact');
		$user->Bio = request('bio');

	
		$user->save();
       
        return redirect('/portfolio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
  public function like(Request $request)

    {

        $theid = request('postid');
        $theliker = Auth::user()->id;

$thelike = Thelike::where('postid', $theid)
                    ->where ('userid', $theliker)
                    ->get();


if ($thelike->count() > 0){

$theid = request('postid');
        $theliker = Auth::user()->id;

            $thelike = Thelike::where('postid', $theid)
                    ->where ('userid', $theliker)
                    ->delete();        
                 }
 else {
 $like = new Thelike;
 $like->postid = request('postid');
 $like->userid = Auth::user()->id;
 $like->save();
}


}


  public function follow(Request $request)

    {

        $theid = request('postid');
        $theliker = Auth::user()->id;

$thelike = Thefollow::where('personid', $theid)
                    ->where ('userid', $theliker)
                    ->get();


if ($thelike->count() > 0){

            $thelike = Thefollow::where('personid', $theid)
                    ->where ('userid', $theliker)
                    ->delete();        
                 }
 else {

 $like = new Thefollow;
 $like->personid = request('postid');
 $like->userid = Auth::user()->id;
 $like->save();

}



}




public function count(Request $request){


        $theid = request('postid');
  

    return Thelike::where('postid', $theid)
                ->count();

                


}

public function countfollow(Request $request){


        $theid = request('postid');
  

    return Thefollow::where('personid', $theid)
                ->count();

                


}



    public function pictures()
    {
       
        return view('pictures');
    }



}