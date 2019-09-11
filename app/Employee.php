<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model 
{

    protected $table = 'employee';
    public $timestamps = true;
    protected $fillable = array('name', 'image', 'work_start_date', 'work_end_date', 'stay_end_date', 'mobile', 'email', 'job_id', 'branch_id');

    public function branch()
    {
        return $this->belongsTo('Branch', 'branch_id');
    }

}