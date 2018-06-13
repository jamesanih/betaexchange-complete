@extends('layouts.main_master')

@section('content')
<div class="about">
    <div class="container">
          <section class="slice bg-white">
        <div class="wp-section">
            <div class="container">
                <div class="row">
                  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif 
    <div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3">                   
                        <div class="wp-block default user-form no-margin">
                            <div class="form-header text-center">
                                <h2>Your Next of kin Details</h2>
                            </div>
                            <div class="form-body">
                  <form method="post" action="{{ url('next-of-kin') }}"  id="frmRegister" class="sky-form">                {{ csrf_field() }}                       
                                    <fieldset class="no-padding">  
                      <input type="hidden" name="user_phone_no" value="{{ $user_phone_no}}">
   <input type="hidden" name="user_first_name" value="{{ $user_first_name}}">
   <input type="hidden" name="user_middle_name" value="{{ $user_middle_name}}">
   <input type="hidden" name="user_last_name" value="{{ $user_last_name}}">         
                                        <section>
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <div class="form-group">
                                                        <label class="label">First name</label>
                                                        <label class="input">
                                                            <i class="icon-append fa fa-user"></i>
           {!! Form::text('next_first_name', Input::old('next_first_name'),['class' => 'form-control','required' => "true",
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
               {!! Form::text('next_middle_name', Input::old('next_middle_name'),['class' => 'form-control',
        'tabindex'=>'2']) !!}
                                                                <b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
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
       {!! Form::text('next_last_name', Input::old('next_last_name'),['class' => 'form-control','required' => "true",
        'tabindex'=>'3']) !!}
                                                            <b class="tooltip tooltip-bottom-right">Needed to enter the last name</b>
                                                        </label>
                                                    </div>               
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label">Phone No</label>
                                                        <label class="input">
                                                            <i class="icon-append fa fa-lock"></i>
      <input type="tell" name="next_phone_no" value="{{ old('next_phone_no') }}" class="form-control numericText" maxlength="11" required="required" placeholder="Should not exceed 11 digit*" tabindex="4">
                                                            <b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
                                                        </label>
                                                    </div>               
                                                </div>
                                            </div>   
                                        </section>
                                        <hr>
                                        <section>
                                            <div class="row">
                                                <section class="col-xs-6">
                                                    <label class="label">Relationship</label>
                                                    <label class="select">
                                                     <i class="icon-append fa fa-building"></i>
         {!! Form::select('relationship',$relationships, Input::old('relationship'),['placeholder' => 'Please select relationship',
         'required' => "true"]) !!}
                                                    </label>
                                                </section>
                                                <section class="col-xs-6">

                                                </section>
                                            </div> 

                                        </section>
                                    </fieldset>  
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
                                                <div class="col-md-4">

                                                </div>
                                                <div class="col-md-4">
                                                    <button class="btn btn-alt btn-icon" type="submit">
                                                        <span>Submit</span>
                                                    </button>
                                                </div>
                                                <div class="col-md-4">

                                                </div>
                                            </div>
                                        </section>
                                    </fieldset>
                                </form>    
                            </div>
                            <div class="form-footer">
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
    <div class="clearfix"> </div>

 </div>




@endsection
