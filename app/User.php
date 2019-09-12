<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Helpers\ImgHelper;
use Carbon\Carbon;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{

    use Notifiable;
    use HasApiTokens;



    protected $table = 'users';
    public $timestamps = true;
    protected $fillable = array('name', 'base_location', 'department', 'description', 'brand_image', 'email', 'mobile','password');




    public function ActivityImage()
    {
        return $this->hasMany('ActivityImage');
    }

    public function branches()
    {
        return $this->hasMany('Branch');
    }

    public function delegate()
    {
        return $this->hasMany('Delegate');
    }

    public function employee()
    {
        return $this->hasMany('Employee');
    }

    public function product()
    {
        return $this->hasMany('Product');
    }


    public function scopeIndex(){
    return $this->All();
    }

    public function scopeFind($id){
        return $this->findOrFail($id);
    }

    public function findBranches($id){
      return scopeFind($id)->branches ;
    }

    public function scopeStore(Request $request){

         $this->name=$request->name;
        $this->base_location =$request->base_location;

        $this->department=$request->department;
        $this->description =$request->description;


        $this->email =$request->email;
        $this->mobile=$request->mobile;

        if ($request->hasFile('brand_image')) {
            $brand_image = ImgHelper::upload_image($request->brand_image);
        }
      $this->brand_image=$brand_image;

      $this->save();
      $id=$this->id;

    if (isset($request->activity_image)) {

        foreach ($request->activity_image as $key=>$file) {

        $file = FileHelper::upload_file($file);
        DB::table('activity_image')->insert([
            ['image' =>$file, 'user_id' => $id ,'created_at'=>Carbon::now()]
        ]);

     }
    }
  }

    public function scopeDestroy($id){
    $this->scopeFind($id)->delete();
    }

    public function findImages($id){
    return  $this->scopeFind($id)->ActivityImage ;
    }



}
