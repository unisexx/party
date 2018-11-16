<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announce extends Model
{
    protected $fillable = array('title','description','slug','image');

    public function announce_type() {
    	return $this->hasOne('App\Models\Announce_type','id','announce_type_id');
    }
}
