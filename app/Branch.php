<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{

    protected $table = 'branches';
    public $timestamps = true;
    protected $fillable = array('name', 'longitude', 'latitude', 'mobile','user_id');

    public function Activity()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function BranchImages()
    {
        return $this->hasMany('BranchImages');
    }

    public function scopeDestroy($id){
       $this->findOrFail($id)->delete();
    }


}
