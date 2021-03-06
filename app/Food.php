<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
	public function category() {
	    return $this->belongsTo('App\Category');
	}

	public function thermal() {
	    return $this->belongsTo('App\Thermal');
	}
}
