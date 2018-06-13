@extends('layouts.main_master')

@section('content')

<div class="about">
    <div class="container">
        <div class="about-main">
            <div class="about-top">
 
            </div>
@if (session('warning'))
    <div class="alert alert-warning text-center">
        {{ session('warning') }}
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
                                <h2>Sign in to your account</h2>
                            </div>
                            <div class="form-body">
                <form method="POST" action="{{ route('login') }}" id="frmLogin" class="sky-form">   

                            {{ csrf_field() }}                                 
                                    <fieldset>                  
                                        <section>
                                            <div class="form-group">
                                                <label class="label">Email</label>
                                                <label class="input">
                                                    <i class="icon-append fa fa-user"></i>
       <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                                </label>
                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                            </div>     
                                        </section>
                                        <section>
                                            <div class="form-group">
                                                <label class="label">Password</label>
                                                <label class="input">
                                                    <i class="icon-append fa fa-lock"></i>
               <input id="password" type="password" class="form-control" name="password" required>
                                                </label>

                                            @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                            </div>     
                                        </section> 
                                        <section>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="checkbox">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><i></i>Keep me logged in</label>
                                                </div>
                                            </div>
                                        </section>

                                        <section>
                                            <button class="btn btn-base btn-icon btn-icon-right btn-sign-in pull-right" type="submit">
                                                <span>Login</span>
                                            </button>
                                        </section>
                                    </fieldset>  
                                </form>    
                            </div>
                            <div class="form-footer">
                                <p><a href="{{ route('register') }}">Register</a></p>
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
