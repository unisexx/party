<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable = array('title','description','slug','image','person_type_id','status','title_th','title_en','description_th','description_en');

    public function person_type() {
    	return $this->hasOne('App\Models\Person_type','id','person_type_id');
    }
}
