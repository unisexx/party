<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = array('slug','image','status','title_th','title_en','youtube');
}
