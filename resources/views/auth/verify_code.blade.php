@extends('layouts.main_master')

@section('content')

<div class="about">
    <div class="container">
        <div class="about-main">
            <div class="about-top">
 <div class="alert alert-info text-center" style="margin-top: 20px">
  <strong>Attention!</strong> If you did not receive  your verification code on your email,  please call the admin on (+234) 909-190-9346 or 0803-801-4771. Thanks.
</div>
            </div>
         @if (count($errors) > 0)
    <div class="alert alert-danger"  style="margin-top: 20px">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach ($errors->all() as $error)
                <li><p class="text-center">{{ $error }}</p></li>
            @endforeach
        </ul>
    </div>
@endif 
<div class="container">

        <section class="slice bg-white">
        <div class="wp-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                        <div class="wp-block default user-form"> 
                            <div class="form-header text-center">
                                <h2>Enter your verification code</h2>
                            </div>
                            <div class="form-body">
                <form method="POST" action="{{ url('verify-code') }}" id="frmLogin" class="sky-form">   

                            {{ csrf_field() }}                                 
                                    <fieldset>                  
                                        <section>
                                            <div class="form-group">
                                                <label class="label">Code</label>
                                                <label class="input">
                                                    <i class="icon-append fa fa-user"></i>
       <input id="verify_code" type="text" class="form-control" name="verify_code" value="{{ old('verify_code') }}" required autofocus>
                                                </label>

                                            </div>     
                                        </section>

                                        <section>
                                            <button class="btn btn-base btn-icon btn-icon-right btn-sign-in pull-right" type="submit">
                                                <span>Verify</span>
                                            </button>
                                        </section>
                                    </fieldset>  
                                </form>    
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>

</div>
</div>
</div>

@endsection
