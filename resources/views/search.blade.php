<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use DB;




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

$output="";

$products=DB::table('users')->where('Skillset','LIKE','%'.$request->search."%")->get();

if($products)

{

foreach ($products as $key => $product) {

$output.='<tr>'.

'<td>'.$product->name.'</td>'.

'<td>'.$product->Skillset.'</td>'.

'</tr>';

}



return Response($output);



   }



   }



}
