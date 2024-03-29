<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityImage extends Model
{

    protected $table = 'activity_image';
    public $timestamps = true;
    protected $fillable = array('image', 'activity_id');

    public function Activity()
    {
        return $this->belongsTo('Activity', 'activity_id');
    }

    public function scopeFind($id){
     return   $this->findOrFail($id);
    }

    public function scopeDestroy($id){
        $this->findOrfail($id)->delete();
    }
}
