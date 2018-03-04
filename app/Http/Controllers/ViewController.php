<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\User;
use App\Userprofile;
use App\Thelike;
use App\Thefollow;

class ViewController extends Controller

{

	
       public function show(Request $request, $id)

    {


        $posts = Userprofile::with('user')
        	->where ('registryid', $id)
            ->orderby('created_at','DESC')
            ->paginate(10);
        
    	 $num = Thelike::all();

         $numfollow = Thefollow::all();



    	if ($request->ajax()) {

    		$view = view('dataview',compact('posts','num'))->render();

            return response()->json(['html'=>$view]);

        }


    	return view('viewdata',compact('posts','num','numfollow'));

    }

    public function likers($id)
    {
       

        $likeers = Thelike::with('user')
                    ->where('postid' , $id)
                    ->select('userid')
                    ->get();

                return view('likers', compact('likeers'));

    }

    public function followers($id)
    {
       

        $followeers = Thefollow::with('user')
                    ->where('personid' , $id)
                    ->select('userid')
                    ->get();

                return view('followers', compact('followeers'));

    }


}