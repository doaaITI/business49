@extends('admin.layout.base')
@section('title', 'settings ')

<div class="m-grid__item m-grid__item--fluid m-wrapper">

	<div class="m-content">
<form class="kt-form kt-form--label-right" method="POST" action="{{url('setting/save')}}">
    @csrf
	<div class="kt-portlet__body">

        <div class="form-group">
            <label>Website Name</label>
            <input type="text"   name="website_title" class="form-control"   value="{{ Setting::get('website_title')}}">
            <span class="form-text text-muted"> </span>
        </div>

        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-10">
                        <button type="submit" class="btn btn-success">Submit</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
</div>
@section('content')
@endsection
