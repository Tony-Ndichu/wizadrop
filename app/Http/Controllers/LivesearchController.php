<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Live;


class livesearchController extends Controller
{
    public function liveSearch(Request $request)
    { 
        $search = $request->id;

        if (is_null($search))
        {
           return view('demos.livesearch');		   
        }
        else
        {
            $posts = Posts::where('name','LIKE',"%{$search}%")
                           ->get();

            return view('demos.livesearchajax')->withPosts($posts);
        }
    }
}