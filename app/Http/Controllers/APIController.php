<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Branch;
use App\Delegate;
use App\Products;
use App\Employee;
use App\Job;
use App\Helpers\ImgHelper;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ActivityStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\BranchStoreRequest;
use App\Http\Requests\DelegateStoreRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;

use Validator;

class APIController extends Controller
{
public $delegate,$employee,$product ,$user;


    public function __construct(Delegate $delegate , Products $product,Branch $branch , Employee $employee ,Job $job ,User $user)
    {

        $this->delegate    = $delegate;
        $this->product     = $product;
        $this->branch      = $branch;
        $this->employee    = $employee;
        $this->job         = $job;
        $this->user        =$user;
    }
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
try{
         $request->validated();

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
    }
    return  $this->prepare_response(200,'Activity created successfully');
  }catch(Exception $e){
    return  $this->prepare_response(401,$e);
  }
}

public function storeBranch(BranchStoreRequest $request){
    try{
        $user = Auth::user();
        $request->validated();

        $input=$request->all();
        $input['user_id']=$user->id;
        $branch=Branch::create($input);
        $id=$branch->id;
        if (isset($request->branch_image)) {

                foreach ($request->branch_image as $key=>$file) {

                $file = FileHelper::upload_file($file);
                DB::table('branch_images')->insert([
                    ['image' =>$file, 'branch_id' => $id ,'created_at'=>Carbon::now()]
                ]);
            }
        }
        return  $this->prepare_response(200,'Branch created successfully');
    }catch(Exception $e) {
        return  $this->prepare_response(401,$e);
  }
}

 public function storeDelegate(DelegateStoreRequest $request){
     try{
    $user = Auth::user();
    $request->validated();
    $request->id=$user->id;
    $this->delegate->scopeStore($request);

   return  $this->prepare_response(200,'Delegate created successfully');
     }catch(Exception $e){
        return  $this->prepare_response(401,$e);
     }
 }

  public function storeProduct(StoreProductRequest $request){
    try{
        $user = Auth::user();
        $request->validated();
        $request->id=$user->id;
        $this->product->scopeStore($request);

        return  $this->prepare_response(200,'Product created successfully');
    }catch(Exception $e){
        return  $this->prepare_response(401,$e);
     }

     }

public function destroyBranch($id){
try{
     $this->branch->scopeDestroy($id);
     return  $this->prepare_response(200,'Branch deleted successfully');
    }catch(Exception $e){
        return  $this->prepare_response(401,$e);
     }
}

public function destroyDelegate($id){
    try{
         $this->delegate->scopeDestroy($id);
         return  $this->prepare_response(200,'Delegate deleted successfully');
        }catch(Exception $e){
            return  $this->prepare_response(401,$e);
         }
    }

public function destroyEmployee($id){
    try{
            $this->employee->scopeDestroy($id);
            return  $this->prepare_response(200,'Employee deleted successfully');
        }catch(Exception $e){
            return  $this->prepare_response(401,$e);
            }
    }

public function destroyProduct($id){
    try{
            $this->product->scopeDestroy($id);
            return  $this->prepare_response(200,'Product deleted successfully');
        }catch(Exception $e){
            return  $this->prepare_response(401,$e);
            }
    }

public function  jobIndex(){
    try{
      $jobs=$this->job->scopeIndex();
     return $this->prepare_response(200,$jobs);
    }catch(Exception $e){
    return  $this->prepare_response(401,$e);
    }
   }

public function updateProfile(UserUpdateRequest $request){
    try{
        $request->validated();
     $this->user->updateProfile($request);
     return $this->prepare_response(200,'updated sucessfully');

    }catch(Exception $e){
        return  $this->prepare_response(401,$e);
    }
}

public function changePassword(Request $request){
    try{
        $this->user->changePassword($request);
        return $this->prepare_response(200,'password changed sucessfully');

    }catch(Exception $e){
        return  $this->prepare_response(401,$e);
    }
}

public function updateProduct(ProductUpdateRequest $request , $id){
    try{
        $request->validated();
        $this->product->scopeUpdate($request ,$id);
        return $this->prepare_response(200,'product updated successfully');
    }catch(Exception $e){
        return  $this->prepare_response(401,$e);
    }
}

public function storeEmployee(EmployeeStoreRequest $request){
    try{
        $request->validated();
        $this->employee->scopeStore($request);
        return $this->prepare_response(200,'employee stored successfully');
    }catch(Exception $e){
        return  $this->prepare_response(401,$e);
    }
}

public function updateEmployee(EmployeeUpdateRequest $request , $id){
    try{
        $request->validated();
        $this->employee->scopeUpdate($request ,$id);
        return $this->prepare_response(200,'product updated successfully');
    }catch(Exception $e){
        return  $this->prepare_response(401,$e);
    }
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
