<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delegate extends Model
{

    protected $table = 'delegates';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'phone', 'delegate_serial','user_id');

    public function Activity()
    {
        return $this->belongsTo('User');
    }

    public function scopeStore($request){
      $this->name=$request->name;
      $this->email=$request->email;
      $this->phone=$request->phone;
      $this->user_id=$request->id;

      $this->delegate_serial=$request->delegate_serial;

    }

    public function scopeDestroy($id){
        $this->findOrFail($id)->delete();
     }

}
