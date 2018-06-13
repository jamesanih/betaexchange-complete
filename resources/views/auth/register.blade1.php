@extends('layouts.main_master')

@section('content')
            <form method="POST" action="{{ route('register') }}" id="frmRegister" class="sky-form">         {{ csrf_field() }}
    <section class="slice bg-white">
        <div class="wp-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3">                   
                        <div class="wp-block default user-form no-margin">
                            <div class="form-header text-center">
                                <h2>Register</h2>
                            </div>
                            <div class="form-body">

         @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif                              
        <fieldset class="no-padding">           
                    <section>
                            <div class="row">
                                <div class="col-xs-6">
                                                    <div class="form-group">
                                                        <label class="label">First name</label>
                                                        <label class="input">
                                                            <i class="icon-append fa fa-user"></i>
            {!! Form::text('first_name', Input::old('first_name'),['class' => 'form-control','required' => "true",
        'tabindex'=>'1']) !!}
                                                            <b class="tooltip tooltip-bottom-right">Needed to enter the first name</b>
                                                        </label>
                                                    </div>               
                                    </div>
                                    <div class="col-xs-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="label">Middle name</label>
                                                            <label class="input">
                                                                <i class="icon-append fa fa-envelope-o"></i>
         {!! Form::text('middle_name', Input::old('middle_name'),['class' => 'form-control','required' => "true",
        'tabindex'=>'2']) !!}
                                                                <b class="tooltip tooltip-bottom-right">Needed to enter the middle name</b>
                                                            </label>
                                                        </div>  
                                                    </div>               
                                    </div>
                                    </div>   
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label">Last name</label>
                                                        <label class="input">
                                                            <i class="icon-append fa fa-lock"></i>
             {!! Form::text('last_name', Input::old('last_name'),['class' => 'form-control','required' => "true",
        'tabindex'=>'3']) !!}
                                                            <b class="tooltip tooltip-bottom-right">Needed to enter the last name</b>
                                                        </label>
                                                    </div>               
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label">Email</label>
                                                        <label class="input">
                                                            <i class="icon-append fa fa-lock"></i>
        {!! Form::email('email', Input::old('email'),['class' => 'form-control','required' => "true",
        'tabindex'=>'4']) !!}
                                                            <b class="tooltip tooltip-bottom-right">Needed to the email</b>
                                                        </label>
                                                    </div>               
                                                </div>
                                            </div>   
                                        </section>
                                        <hr>
                                        <section>
                                            <div class="row">
                                                <section class="col-xs-6">
                                                    <label class="label">New password</label>
                                                    <label class="input">
                                                        <i class="icon-append fa fa-user"></i>
     <input type="password" name="password" id="password" class="form-control" required="required"  tabindex="5">
                                                    </label>
                                                </section>
                                                <section class="col-xs-6">
                                                    <label class="label">Confirm password</label>
                                                    <label class="input">
                                                        <i class="icon-append fa fa-user"></i>
     <input type="password" name="confirm_password" id="confirm_password" class="form-control" required="required"  tabindex="5">
                                                    </label>
                                                </section>
                                            </div> 
                                            <div class="row">
                                                <section class="col-xs-6">
                                                    <label class="label">Phone No</label>
                                                    <label class="input">
                                                        <i class="icon-append fa fa-phone"></i>
                     {!! Form::text('phone_no', Input::old('phone_no'),['class' => 'form-control numericText','required' => "true",'placeholder' => "Should not exceed 11 digit*",
        'tabindex'=>'6','maxlength'=>'11']) !!}
                                                    </label>
                                                </section>
                                                <section class="col-xs-6">

                                                </section>
                                            </div>
                                        </section>
                                    </fieldset>  

                                    <fieldset>

                                        


                                    </fieldset>
                             
                           
                            <div class="form-footer">
                                <p>Already have an account? <a href="{{ url('login') }}">Click here to sign in.</a></p>
                            </div>
                       </div>
                  </div>
              </div>
                       
                           
<div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3">                   
                        
                        
                                 <div class="form-header text-center">
                                <h2>Your Bank Details</h2>
                            </div>
                                    <fieldset>
                                                <div class="row">
                                                <section class="col-xs-6">
                                                    <label class="label">Bank</label>
                                                    <label class="select">
                                                        <i class="icon-append fa fa-building"></i>
                     {!! Form::select('bank_name',$banks, Input::old('bank_name'),['placeholder' => 'Choose Your Bank',
         'required' => "true",'tabindex'=>"6"]) !!}
                                                    </label>
                                                </section>
                                                <section class="col-xs-6">

                                                </section>
                                            </div>
                                         <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label">Account First Name</label>
                                                        <label class="input">
                                                            <i class="icon-append fa fa-lock"></i>
            <input type="text" name="account_first_name" id="account_first_name" class="form-control" value="{{ old('account_first_name') }}"  tabindex="7"  required="required"
            > 
                                                            <b class="tooltip tooltip-bottom-right">Needed to enter the website</b>
                                                        </label>
                                                    </div>               
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label">Account Middle Name</label>
                                                        <label class="input">
                                                            <i class="icon-append fa fa-lock"></i>
             <input type="text" name="account_middle_name" id="account_middle_name" class="form-control" value="{{ old('account_middle_name') }}"   tabindex="8"  required="required"
            > 
                                                            <b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
                                                        </label>
                                                    </div>               
                                                </div>
                                            </div>   
                                           <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label">Account Last Name</label>
                                                        <label class="input">
                                                            <i class="icon-append fa fa-lock"></i>
            <input type="text" name="account_last_name" id="account_last_name" class="form-control" value="{{ old('account_last_name') }}"  tabindex="9"  required="required"
            > 
                                                            <b class="tooltip tooltip-bottom-right">Needed to enter the website</b>
                                                        </label>
                                                    </div>               
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label">Account Number</label>
                                                        <label class="input">
                                                            <i class="icon-append fa fa-lock"></i>
             <input type="tell" name="account_no" id="account_no" class="form-control"  maxlength="10" value="{{ old('account_no') }}" placeholder="ten digit acct no only" tabindex="10"  required="required">
                                                            <b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
                                                        </label>
                                                    </div>               
                                                </div>
                                            </div> 

                                        <section>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label class="checkbox">
                        <input type="checkbox" name="subscription" id="subscription" required="required">
                    <i></i> I accept the terms and conditions of this website.
                                                    </label>
                                                </div>
                                                <div class="col-md-4">
                                                    <button class="btn btn-base btn-icon btn-icon-right btn-sign-in pull-right" type="submit">
                                                        <span>Register now</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </section>
                                    </fieldset>
                                  
                            </div>
                            <div class="form-footer">
                             
                            </div>
                        </div>
                         
                    </div>
                </div>
            </div>
        </div>
    </section>
</form> 
@endsection
