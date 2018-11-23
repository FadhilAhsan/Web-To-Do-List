<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function titles(){
    	return $this->belongTo('App\Title');
    }
}
