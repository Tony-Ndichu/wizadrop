<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
use App\Userprofile;
Use App\User;
use DB;
use App\Thelike;
use Auth;

class PortfolioController extends Controller
{
        public function portfolio(Request $request)

    {
        $accountowner = Auth::user()->id;


        $posts = Userprofile::with('user')
            ->where ('registryid', $accountowner)
            ->orderby('created_at','DESC')
            ->paginate(10);
        
         $num = Thelike::all();
    	

    	if ($request->ajax()) {

    		$view = view('datatwo',compact('posts', 'num'))->render();

            return response()->json(['html'=>$view]);

        }


    	return view('my_portfolio',compact('posts', 'num'));

    }



}
