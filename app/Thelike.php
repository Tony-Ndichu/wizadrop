<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thelike extends Model
{
    //


    protected $fillable = ['postid','userid'];

    public function user(){
    	return $this->belongsTo('App\User','userid');
    }
 
 public function thelike(){
 	return $this->belongsTo('App\Userprofile', 'postid', 'ID');
 }
 

  
}