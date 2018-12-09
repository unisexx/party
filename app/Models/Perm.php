<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perm extends Model
{
    protected $fillable = array('parent_id','name','pos');

    public function childs()
    {
        return $this->belongsTo('App\Models\Perm', 'id', 'parent_id');
    }

    public function parent()
    {
        return $this->hasOne('App\Models\Perm', 'id', 'parent_id');
    }

    public function permissions()
    {
        return $this->belongsTo('Spatie\Permission\Models\Permission', 'id', 'perm_id');
    }
}
