<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ImgHelper;
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

}
