<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
protected $uploades_images_directory = '/images/';

protected $fillable = [
    'file'
];


//Accessor to add images url to photo name:
public function getFileAttribute($photo){
    return $this->uploades_images_directory . $photo;
}

}
