<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery_pic extends Model
{
    protected $fillable = array('gallery_id','file_path','file_name');

    public function getDir() {
    	return 'uploads/gallery';
    }

    public function getPath() {
    	return empty($this->file_path)?false:empty($this->getDir())?false:$this->getDir().'/'.$this->file_path;
    }
}
