<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchProduct extends Model 
{

    protected $table = 'branch_products';
    public $timestamps = true;
    protected $fillable = array('branch_id', 'product_id');

    public function Branch()
    {
        return $this->belongsTo('Branch', 'branch_id');
    }

    public function Product()
    {
        return $this->hasMany('Activity', 'product_id');
    }

}