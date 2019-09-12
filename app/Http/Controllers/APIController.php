<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Helpers\ImgHelper;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ActivityStoreRequest;
use Validator;

class APIController extends Controller
{

    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;

            return  $this->prepare_response(200,$success);
        }
        else{
            return $this->prepare_response(401,'UnAuthorized');
        }
    }

    public function register(ActivityStoreRequest $request)
      {
        $validator =  $request->validated();

        //  if ( $validator) {

        //  return $this->prepare_response(401,$validator->errors());
        //   }

         $input = $request->all();
         if ($request->hasFile('brand_image')) {
            $brand_image = ImgHelper::upload_image($request->brand_image);
        }

        $input['brand_image'] =$brand_image;
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
         $id=$user->id;
        if (isset($request->activity_image)) {

            foreach ($request->activity_image as $key=>$file) {

            $file = FileHelper::upload_file($file);
            DB::table('activity_image')->insert([
                ['image' =>$file, 'user_id' => $id ,'created_at'=>Carbon::now()]
            ]);

        }

        return  $this->prepare_response(200,'Activity created successfully');

    }



            public function details()
            {
                $user = Auth::user();
                return $this->prepare_response(200,$user);
            }


        private function prepare_response($status,$message){
            $array=array(
            'status'=>$status,
            'message'=>$message
            );

            $array= json_encode($array);
           return stripslashes($array);
    }
}
