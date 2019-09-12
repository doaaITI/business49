<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchImages extends Model
{

    protected $table = 'branch_images';
    public $timestamps = true;
    protected $fillable = array('image', 'branch_id');

    public function Branch()
    {
        return $this->belongsTo('Activity', 'branch_id');
    }


}
