@extends('layouts.main_master')

@section('content')
<!--header end here-->
<!--features strat here-->
<div class="features">
    <div class="container">
        <div class="row">

        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
@if (session('status'))
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
        </div>
    @endif


    <form  role="form" method="POST" action="{{ url('dashboard/sell_currency') }}">
        {{ csrf_field() }}

        <h2>Sell to us</h2>
            <hr class="colorgraph">
            <div class="row">
                     <div class="form-group">
                    <label class="control-label col-lg-5">Select Currency Type</label>
                        <div class="col-lg-7">
         {!! Form::select('currency_type',$currency_type, Input::old('currency_type'),['class' => ' btn btn-default btn-lg','placeholder' => 'Please select currency type',
         'required' => "true",'tabindex'=>"5",'id'=>"currency_type"]) !!}
                        </div><!-- /.col -->
                     </div><!-- /form-group -->  
        <div class="row"  style="padding-top: 20px;">
            <div class="col-xs-12 col-sm-4 col-md-4" >
                <div class="form-group">
                  <input type="hidden" name="pm_price" id="pm_price" value="{{ $pm_price}}">
                  <input type="hidden" name="bitcoin_price" id="bitcoin_price" value="{{ $bitcoin_price}}">
        <label for="price1">Price:</label><input type="text" name="price1" id="price1" class="form-control input-lg numericText" required="required" placeholder="price" tabindex="5"  readonly="true" >
                     <span class="text-danger"></span>
                 </div>
               
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">

                <div class="form-group" >
                    <label for="unit">Units (&#x24;)</label>
                    {!! Form::text('unit', Input::old('unit'),['class' => 'form-control input-lg numericText','required' => "true",'placeholder' => "unit",
        'tabindex'=>'6','maxlength'=>'11','id'=>"unit" ]) !!}
                   
                    <span class="text-danger"></span>
                    <span id="phone"></span>
                </div>
            </div>
             <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="form-group" >
                    <label for="total">Total  (&#8358;)</label>
                    {!! Form::number('total', Input::old('total'),['class' => 'form-control input-lg numericText','required' => "true",'placeholder' => "Total",
                    'readonly'=>"true",'data-required'=>"true",'id'=>"total"]) !!}
                   
                    <span class="text-danger"></span>
                    <span id="phone"></span>
                </div>
            </div>
        </div> 

                <div class="form-group">
                <label for="account_name">Bank Account Name:</label>
        {!! Form::text('account_name', Input::old('account_name'),['class' => 'form-control input-lg','required' => "true",'placeholder' => "Enter Account Name",
        'tabindex'=>'1']) !!}
                    <span class="text-danger"></span>
                  </div> 
                  <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6">     
                 <div class="form-group">
                    <label for="middle_name">Bank Account No:</label>
    {!! Form::text('account_no', Input::old('account_no'),['class' => 'form-control input-lg','placeholder' => "Enter Account No",'required' => "true",
        'tabindex'=>'2']) !!}
                    
                    <span class="text-danger"></span>
                </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6"> 
         <div class="form-group" style="margin-top: 30px;">
           {!! Form::select('bank_name',$banks, Input::old('bank_name'),['class' => ' btn btn-default btn-lg','placeholder' => 'Choose Your Bank',
         'required' => "true",'tabindex'=>"6"]) !!}
          </div>
          </div>
          </div>
       <div class="row">
       <div class="col-xs-12 col-sm-6 col-md-6">    
        <div class="form-group">
            <label for="email">Email Address:</label>
           {!! Form::email('email', Input::old('email'),['class' => 'form-control input-lg','required' => "true",'placeholder' => "Enter Email Address",
        'tabindex'=>'4']) !!}
                            <span class="text-danger"></span>
                            <span id="emailstatus"></span>

        </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6" >  
             <div class="form-group">
            <label for="phone_no">Phone No:</label>
            {!! Form::text('phone_no', Input::old('phone_no'),['class' => 'form-control input-lg','required' => "true",'placeholder' => "Enter PhoneNo",
        'tabindex'=>'3']) !!}
                            <span class="text-danger"></span>
                           
        </div>
             </div>
        </div>


            <hr class="colorgraph">
            <div class="row" style="margin-bottom: 40px;">
                <div class="col-xs-12 col-md-12" style="padding-left: 200px;padding-right: 200px;">
                <input type="submit" name="submit" value="Sell" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
              
            </div>
                       
                    </form>
              
            </div>
       
    </div>
    </div>
</div>

<!--about end here-->




@endsection
@section('script')
    <script type="text/javascript">
        $(function () {
      
      $('#wallet_panel').hide();
      $('#pm_panel').hide();
       $("#price1").val('0');

       $('#currency_type').change(function () {
       
       if($(this).val()=="Bitcoin")
       {
            $("#price1").val($("#bitcoin_price").val());
            $('#wallet_panel').show();
            $('#pm_panel').hide();
            changePrice();
       }
       else if($(this).val()=="Perfect Money")
       {
            $("#price1").val($("#pm_price").val());
            $('#wallet_panel').hide();
            $('#pm_panel').show();
            changePrice();
       }
      });

      $('#unit').keyup(function () {
       changePrice();
      });


     $('#price1').keyup(function () {
      changePrice();
      });


       function changePrice()
       {
          var price = parseFloat($("#price1").val()) || 0;
          var units = parseFloat($("#unit").val()) || 0;
          var total = price * units;
          var total = Math.ceil(total);
          $("#total").val(total);
       }

        });

        </script>
@stop
