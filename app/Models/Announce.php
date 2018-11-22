<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announce extends Model
{
    protected $fillable = array('title','description','slug','image','status','title_th','title_en','description_th','description_en');

    public function announce_type() {
    	return $this->hasOne('App\Models\Announce_type','id','announce_type_id');
    }
}
