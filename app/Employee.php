<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ImgHelper;
use Illuminate\Support\Facades\Auth;
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

     public function scopeStore($request){
        $this->name=$request->name;
        $this->work_start_date=$request->work_start_date;
        $this->work_end_date=$request->work_end_date;

        $this->mobile=$request->mobile;
        $this->email=$request->email;

        $this->job_id=$request->job_id;
        $this->user_id=Auth::user()->id;
        $this->stay_end_date=$request->stay_end_date;

        if ($request->hasFile('image')) {
           $image = ImgHelper::upload_image($request->image);
       }
        $this->image=$image;
       $this->save();

     }

public function scopeUpdate($request ,$id){
        $employee=$this->findOrFail($id);

        $employee->name=$request->name;
        $employee->work_start_date=$request->work_start_date;
        $employee->work_end_date=$request->work_end_date;

        $employee->mobile=$request->mobile;
        $employee->email=$request->email;

        $employee->job_id=$request->job_id;
        $employee->stay_end_date=$request->stay_end_date;
        $employee->user_id=Auth::user()->id;

        if ($request->hasFile('image')) {
            ImgHelper::delete_image($employee->image);
           $image = ImgHelper::upload_image($request->image);
           $employee->image=$image;
       }

       $employee->save();
}


}
