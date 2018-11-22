<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = array('title','description','slug','title_th','title_en','description_th','description_en');
}
