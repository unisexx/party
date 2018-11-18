<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person_type extends Model
{
    protected $fillable = array('name');

    public function manager()
    {
        return $this->hasMany('App\Models\Manager', 'person_type_id', 'id');
    }
}
