<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = array('title','description','slug','status');

    public function attach_imgs() {
    	return $this->hasMany('App\Models\Gallery_pic','gallery_id','id');
    }
}
