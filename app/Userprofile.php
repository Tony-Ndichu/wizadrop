<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userprofile extends Model
{
    //
    

    protected $fillable = ['Profilepic','Skill','registryid'];
 

    public function user(){
      return $this->belongsTo('App\User', 'registryid');
    }
    
    public function Thelike(){
    	return $this->hasOne('App\Thelike', 'postid', 'ID');
    } 

    

}
