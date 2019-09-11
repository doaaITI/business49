<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Activity extends Authenticatable
{

    use Notifiable;

    protected $guard='admin';

    protected $table = 'activities';
    public $timestamps = true;
    protected $fillable = array('name', 'base_location', 'department', 'description', 'brand_image', 'email', 'mobile');

    public function ActivityImage()
    {
        return $this->hasMany('ActivityImage');
    }

    public function branches()
    {
        return $this->hasMany('Activity');
    }

    public function delegate_id()
    {
        return $this->hasMany('Delegate');
    }

}
