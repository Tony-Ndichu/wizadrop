<?php
namespace App\Traits;
trait SearchTrait
{
    /**
     * Trait used to search through the book resourc
     */
    public function searchBooks($result)
    {
        $output = "<div class='row'>        
                    <div style='margin-top:10px;' class='green white-text center-align col s12 l10 offset-l1'>
                        <p>".count($result)." Results found</p>
                    </div>
                    </div>";
        if(count($result)){
            foreach ($result as $item) {
                $output.="<div class='row'>
                            <div class='col s12 l10 offset-l1'>
                                <div style='margin-top:20px;' class='row'>
                                    <a class='black-text' href='".route('books.show', ['name'=>strtolower(str_replace(' ', '_',(preg_replace('/[^\p{L}\p{N}\s]/u', '', $item->title)))),'id'=>htmlspecialchars($item->id, ENT_QUOTES)])."'><div class='col s4 l1'>
                                        <img style='height:60px;' class='responsive-img' src='".asset('uploads/'.htmlspecialchars($item->image_url, ENT_QUOTES))."' alt=''>
                                    </div>  
                                    <div style='margin-top:-10px;' class='col s8 l8'>
                                        <p>".htmlspecialchars($item->title, ENT_QUOTES)."<span style='margin-left:5px;' class='grey-text'>(".$item->category->category_name.")</span></p>
                                        <p style='margin-top:-10px; font-size:10pt;' class='grey-text'>".$item->author->name."</p>
                                    </div></a>
                                 </div> 
                                <div class='divider'></div>
                            </div>
                          </div>";
                }
        }else{
            $output.="<div class='row'>
                        <div class='col s12 l3 offset-l2'>
                            <img style='margin-top:50px;' class='responsive-img' src='".asset("img/cry.png")."' alt=''> 
                        </div>
                        <div style='margin-top:5%;' class='center-align col s12 l5'>                                
                            <p >Sorry, there are no results for your search. Worry not, you can order your desired book here.</p>
                            <a  href='/custom' class='waves-effect waves-light btn red darken-4'>Order custom book</a>
                        </div>
                    </div>";
        }
        return $output;
    }
}