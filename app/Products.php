<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ImgHelper;
use Illuminate\Support\Facades\Auth;
class Products extends Model
{

    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('name', 'image', 'description', 'original_price', 'tax', 'user_id');

    public function activity()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function scopeStore($request){

     $this->name=$request->name;
     $this->description=$request->description;
     $this->original_price=$request->original_price;
     $this->tax=$request->tax;
     $this->type=$request->type;
     $this->user_id=$request->id;

     if ($request->hasFile('image')) {
        $image = ImgHelper::upload_image($request->image);
    }
     $this->image=$image;
    $this->save();

    }
    public function scopeDestroy($id){
        $this->findOrFail($id)->delete();
     }

public function scopeUpdate($request ,$id){

       $product=$this->find($id);
       $product->name=$request->name;
       $product->description=$request->description;
       $product->original_price=$request->original_price;
       $product->tax=$request->tax;
       $product->type=$request->type;

       if ($request->hasFile('image')) {
        ImgHelper::delete_image($product->image);
          $image = ImgHelper::upload_image($request->image);
          $product->image=$image;
          $product->save();
      }



}

}
