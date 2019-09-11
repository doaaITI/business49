<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model 
{

    protected $table = 'branches';
    public $timestamps = true;
    protected $fillable = array('name', 'longitude', 'latitude', 'mobile');

    public function Activity()
    {
        return $this->belongsTo('Activity', 'activity_id');
    }

    public function BranchImages()
    {
        return $this->hasMany('Activity');
    }

    public function employee()
    {
        return $this->hasMany('Employee');
    }

}