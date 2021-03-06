<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = array('title','description','slug','image','info_type_id','status','title_th','title_en','description_th','description_en');

    public function info_type() {
    	return $this->hasOne('App\Models\Info_type','id','info_type_id');
    }
}
