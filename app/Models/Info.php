<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = array('title','description','slug','image');

    public function info_type() {
    	return $this->hasOne('App\Models\Info_type','id','info_type_id');
    }
}
