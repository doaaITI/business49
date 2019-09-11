@if (count($errors) > 0)
<div class="container">

<div class="alert alert-danger fade show" role="alert" id="danger-alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">
    <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
    </ul>
    </div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="la la-close"></i></span>
        </button>
    </div>
 </div>
</div>
@endif

@if(Session::has('flash_error'))


<div class="alert alert-danger fade show" role="alert" id="danger-alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">
    {{ Session::get('flash_error') }}
    </div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="la la-close"></i></span>
        </button>
    </div>
 </div>

@endif


@if(Session::has('flash_success'))

<div class="alert alert-success fade show" role="alert" id="success-alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">
    {{ Session::get('flash_success') }}
    </div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="la la-close"></i></span>
        </button>
    </div>
 </div>
@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
     $(document).ready (function(){

        setTimeout(function() {
                $('#danger-alert').fadeOut('fast');
            }, 8000); //  time in milliseconds


        setTimeout(function() {
                $('#success-alert').fadeOut('fast');
            }, 8000); //  time in milliseconds


   });


</script>
