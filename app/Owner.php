<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Owner extends Authenticatable
{

    use Notifiable;
    protected $table = 'owners';
    protected $guard='admin';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'phone_num', 'address', 'password');
    protected $hidden = array('password', 'remember_token');

    public function Realty()
    {
        return $this->hasMany('Realty');
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeIndex(){
        return $this->all();
    }

    public function scopeFindUser($owner_id)
    {
        return  $this->find($owner_id);

    }

    public function scopeDestroy($id){
        $this->scopeFindUser($id)->delete();
    }

}
