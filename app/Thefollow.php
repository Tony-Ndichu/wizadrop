<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thefollow extends Model
{
    //


    protected $fillable = ['personid','userid'];

    public function user(){
    	return $this->belongsTo('App\User','userid');
    }
 
 public function user2(){
 	return $this->belongsTo('App\User', 'personid');
 }
 

  
}