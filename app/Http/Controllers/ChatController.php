<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use App\User;
use Auth;
use DB;


class ChatController extends Controller
{
    //


    public function index()

    {
        return view('viewit');

    }

      public function show(Request $request, $id)

    {
        $person = User::where('id', $id)
        			->get();

        			$auther = Auth::user()->id;

        $readstatusupdate = Chat::where('sentfrom', $id)
        					->where('sentto', $auther )
        					->where ('readstatus', '0')
        					->update(['readstatus' => '1']);
     

        return view('message',compact('person'));

    }


    public function messagepost( Request $request){

    			$auther = Auth::user()->id;
    			$receiver = request('sentto');

        $readstatusupdate = Chat::where('sentfrom', $auther)
        					->where('sentto', $receiver )
        					->where ('readstatus', '1')
        					->update(['readstatus' => '0']);
 
        $messagepost = new Chat;
 		$messagepost->text = request('name');
 		$messagepost->sentto = request('sentto');
 		$messagepost->sentfrom = Auth::user()->id;
 		$messagepost->readstatus = "0";
		$messagepost->save();

}

public function messageread(Request $request){

	$messages = Chat::with('usere','userd')
				->where(function($q){

					$sender = Auth::user()->id;
					$receiver = request('sentto');

					$q->where('sentfrom', $sender)
						->where('sentto', $receiver);
				})

				->orWhere(function($q){

					$sender = Auth::user()->id;
					$receiver = request('sentto');

					$q->where('sentfrom' , $receiver)
						->where('sentto' , $sender);
				})

				->get();
			

			return response ([
				'messages'=> $messages
			]);	


		}

public function messagesenders( Request $request)
{

	$receiver = Auth::user()->id;

	$messagers =  Chat::select(DB::raw('max(messageid) as latest_message'), 'text','sentto','sentfrom', 'readstatus','created_at', 'updated_at')
				->with(['usere' => function($query)
				{
					$query->select('id', 'name','Profileimage');
				}])
				->groupBy('sentfrom')
				->where('sentto', $receiver)
				->orwhere('sentfrom', $receiver)
				->orderBy('latest_message','desc')
				
				
				->get();

				
				return view('messagepage',[
					'messagers' => $messagers]) -> withHeaders([
						'property_1'=>header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"),
						'property_2' =>header("Cache-Control: private, no-store, no-cache, post-check=0, pre-check=0, must-revalidate, max-age=0"),
						'property_3' =>header("Pragma: no-cache"),
						'property_4' => header("Last-Modified:".gmdate("D, d M Y H:i:s")."GMT"),
					]);



}

public function messageno( Request $request){

		$messageno =  Chat::with('usere')
				->where(function($q){

					$receiver = Auth::user()->id;

					$q->where('sentto', $receiver)
						->where ('readstatus', '0');
						

})
				->count();

				return response()->json(['response' => $messageno]);

}


}