<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model 
{

    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('name', 'image', 'description', 'original_price', 'tax', 'branch_id');

}