<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = array(
        'name',
        'address',
        'tel',
        'fax',
        'email',
        'skype',
        'facebook',
        'twitter',
        'google_plus',
        'instagram',
        'pinterest',
        'line',
        'status',
        'name_th',
        'name_en',
        'address_th',
        'address_en',
        'map',
    );
}
