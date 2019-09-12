<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $table = 'employee';
    public $timestamps = true;
    protected $fillable = array('name', 'image', 'work_start_date', 'work_end_date', 'stay_end_date', 'mobile', 'email', 'job_id', 'user_id');

    public function activity()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function scopeDestroy($id){
        $this->findOrFail($id)->delete();
     }
}
