@extends('admin.layout.base')

@section('title', ' Add User')

@section('content')

<div class="container">

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
            Add New User
            </h3>
        </div>
    </div>

								<!--begin::Form-->
        <form class="kt-form"  action="{{url('admin/user/store')}}" method="POST">
          @csrf
        <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required placeholder="Enter Name">

        </div>

        <div class="form-group">
            <label>Email address</label>
            <input type="email" name="email" class="form-control" required aria-describedby="emailHelp" placeholder="Enter email">
           <span class="form-text text-muted">We'll never share your email with anyone else.</span>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password"  name="password"required class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password"  name="password_confirmation" required class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>


            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
        </form>

								<!--end::Form-->
							</div>

</div>
@endsection
