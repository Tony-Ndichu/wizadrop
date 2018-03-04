<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\User;
use App\Userprofile;
use App\Thelike;

class ViewsearchController extends Controller

{

	
       public function show(Request $request, $id)

    {


        $posts = Userprofile::with('user')
        	->where ('registryid', $id)
            ->orderby('created_at','DESC')
            ->paginate(10);
        
    	 $num = Thelike::all();

    	if ($request->ajax()) {

    		$view = view('dataview2',compact('posts','num'))->render();

            return response()->json(['html'=>$view]);

        }


    	return view('viewdata2',compact('posts','num'));

    }


}