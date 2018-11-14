<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable = array('title','description','slug','image','person_type_id');
}
