<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public $user;

        public function __construct(User $user )
        {
            $this->middleware('auth:admin');
            $this->user=$user;

        }

           /**
     * Display a listing of the Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{

           $users= $this->user->scopeIndex();

            return view('admin.users.index',compact('users'));
        }
        catch(Exception $e){
            return redirect()->route('admin.users.all')->with('flash_error','Something went wrong,, please try again later');
        }
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{

            return view('admin.users.create');
        }
        catch(Exception $e){
            return redirect()->route('admin.users.all')->with('flash_error','Something went worng , please try again later');
        }
    }

    public function store(UserRequest $request){
        try{

                $request->validated();
            $this->user->scopeStore($request);
            return redirect()->route('admin.user.all')->with('flash_success','User inserted successfully');



            }catch(Exception $e){
            return redirect()->route('admin.user.all')->with('flash_error','something went wrong ,please try again later');
        }
    }
}
