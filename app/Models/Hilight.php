<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hilight extends Model
{
    protected $fillable = array('title','url','slug','image','status');
}
