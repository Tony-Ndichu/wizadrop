<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Chat extends Model
{
	protected $fillable = ['text'];

protected $appends = ['time'];

public function getTimeAttribute(){
	return $this->created_at->diffForHumans();
}

	 public function userd(){
      return $this->belongsTo('App\User', 'sentto', 'id');
    }

 public function usere(){
      return $this->belongsTo('App\User', 'sentfrom', 'id');
    }


}