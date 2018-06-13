@extends('layouts.main_master')

@section('content')

<!--header end here-->
<!--contact start here-->
<div class="contact">
    <div class="container">
        <div class="contact-main" >
            <div class="contact-top">
                <h2 class="text-center" style="margin-top: 30px;">Contact us</h2>
            </div>

            <div class="contact-bottom" >
                <div class=" col-xs-12 col-md-8 col-sm-4 contact-left ">

             
         <form  role="form" method="POST" action="#">
                        {{ csrf_field() }}

                    <div class="form-group">
            {!! Form::text('name', null,['class' => 'form-control','required'=>'required',
            'placeholder'=>'Full Name']) !!}
                    </div>
                    <div class="form-group">
            {!! Form::text('email', null,['class' => 'form-control','required'=>'required',
            'placeholder'=>'Email']) !!}
                    </div>
                   <div class="form-group">
            {!! Form::text('phone_no', null,['class' => 'form-control','required'=>'required',
            'placeholder'=>'Tel']) !!}
                    </div>
                    <div class="form-group">
            {!! Form::textarea('message', null,['class' => 'form-control','required'=>'required',
            'placeholder'=>'Message']) !!}
                    </div>
                   


<input type="submit" name="submit" value="Send"  style="margin-bottom: 100px;">
 
</form>

</div>

<div class="col-md-4 contact-right">
                    <h1>Address</h1>
                    <p>Solaron Plaza Suite B22,  </p>
                     <p>15/17 akowonjo road, </p>
                     <p>Egbeda, Lagos</p>
                      <p>+234-909-190-9346, +234-803-801-4771</p>
                    <p><a href="mailto:info@betaexchangeng.com">info@betaexchangeng.com</a></p>
                </div>
              
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

@endsection
