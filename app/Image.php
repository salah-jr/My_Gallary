<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = array('album_is', 'description','photo', 'title', 'size');
    public function album(){
        return $this->belongsTo('App\Album');
    }
}
