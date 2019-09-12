<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delegate extends Model
{

    protected $table = 'delegates';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'phone', 'delegate_serial');

    public function Activity()
    {
        return $this->belongsTo('User');
    }

}
