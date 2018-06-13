@extends('layouts.main_master')

@section('stylesheet')
<style type="text/css">
   .form2 {
  display: none;
}

 
</style>
 
@stop
@section('content')

<!--header end here-->
<!--features starts here-->
<div class="features">
	<div class="container">
        <div class="row">

        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

           @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
<form  role="form" method="POST" action="{{route('sell_currency')}}" id="sell_ecurrency" novalidate>
  {{csrf_field()}}
                       <!--  <input type="hidden" name="_token" value="GIRRCeWQtfBgT69MoprzfcTGrr3GsC26GvwxU9NM"> -->
        <div class="form">
            <h2 class="text-center" style="margin-top:30px;">Sell to us</h2>
            <hr class="colorgraph">
            <div class="row">
                     <div class="form-group">
                    <label class="control-label col-md-4">Select Currency Type</label>
                        <div class="col-md-8 ">
         <select class=" btn btn-default btn-lg pull-right" required="true" tabindex="5" id="currency_type" name="currency_type"><option selected="selected" value="">Please select currency type</option><option value="Bitcoin">Bitcoin</option><option value="Perfect Money">Perfect Money</option></select>
                        </div><!-- /.col -->
                     </div><!-- /form-group -->
                     </div>  
        <div class="row"  style="padding-top: 40px;">
            <div class="col-xs-12 col-sm-4 col-md-4" >
                <div class="form-group">
                  <input type="hidden" name="pm_price" id="pm_price" value="340">
                  <input type="hidden" name="bitcoin_price" id="bitcoin_price" value="330">
        <label for="price1">Price:</label><input type="text" name="price1" id="price1" class="form-control input-lg numericText" required="required" placeholder="price" tabindex="5"  readonly="true" >
                     <span class="text-danger"></span>
                 </div>
               
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="form-group" >
                    <label for="unit">Units:</label>
                    <input class="form-control input-lg numericText" required="true" placeholder="unit" tabindex="6" maxlength="11" id="unit" name="unit" type="text" value="{{old('unit')}}">
                   
                    <span class="text-danger"></span>
                    <span id="phone"></span>
                </div>
            </div>
             <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="form-group" >
                    <label for="total">Total: =N=</label>
                    <input class="form-control input-lg numericText" required="true" placeholder="Total" tabindex="6" maxlength="11" readonly="true" id="total" name="total" type="text" value="{{old('total')}}">
                   
                    <span class="text-danger"></span>
                    <span id="phone"></span>
                </div>
            </div>
        </div>
                <div class="form-group" style="margin-top: 20px;">
                <label for="account_name">Bank Account Name:</label>
        <input class="form-control input-lg" id="account_name" required="true" placeholder="Enter Account Name" tabindex="1" name="account_name" type="text" value="{{old('account_name')}}">
                    <span class="text-danger"></span>
                  </div> 
                  <div class="row" style="margin-top: 20px;"> 
                  <div class="col-xs-12 col-sm-6 col-md-6">     
                 <div class="form-group">
                    <label for="middle_name">Bank Account No:</label>
    <input class="form-control input-lg" id="account_no" placeholder="Enter Account No" required="true" tabindex="2" name="account_no" type="number" value="{{old('account_no')}}">
                    
                    <span class="text-danger"></span>
                </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6"> 
         <div class="form-group" style="margin-top: 30px;">
           <select class=" btn btn-default btn-lg" required="true" tabindex="6" name="bank_name" id="bank_name"><option selected="selected" value="">Choose Your Bank</option><option value="Access Bank">Access Bank</option><option value="Citibank">Citibank</option><option value="Diamond Bank">Diamond Bank</option><option value="Ecobank Nigeria">Ecobank Nigeria</option><option value="Fidelity Bank Nigeria">Fidelity Bank Nigeria</option><option value="First Bank of Nigeria">First Bank of Nigeria</option><option value="First City Monument Bank">First City Monument Bank</option><option value="Guaranty Trust Bank">Guaranty Trust Bank</option><option value="Heritage Bank plc">Heritage Bank plc</option><option value="Keystone Bank Limited">Keystone Bank Limited</option><option value="Skye Bank">Skye Bank</option><option value="IBTC Bank">IBTC Bank</option><option value="Standard Chartered Bank">Standard Chartered Bank</option><option value="Sterling Bank">Sterling Bank</option><option value="Union Bank of Nigeria">Union Bank of Nigeria</option><option value="Wema Bank">Wema Bank</option><option value="Unity Bank plc">Unity Bank plc</option><option value="United Bank for Africa">United Bank for Africa</option><option value="Zenith Bank">Zenith Bank</option></select>
          </div>
          </div>
          </div>
       <div class="row" style="margin-top: 20px;">
       <div class="col-xs-12 col-sm-6 col-md-6">    
        <div class="form-group">
            <label for="email">Email Address:</label>
           <input class="form-control input-lg" id="email" required="true" placeholder="Enter Email Address" tabindex="4" name="email" type="email">
                            <span class="text-danger"></span>
                            <span id="emailstatus"></span>

        </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6" >  
             <div class="form-group">
            <label for="phone_no">Phone No:</label>
            <input class="form-control input-lg" required="true" id="phone_no" placeholder="Enter PhoneNo" tabindex="3" name="phone_no" type="number">
                            <span class="text-danger"></span>
                           
        </div>
             </div>
        </div>
            <!-- <div class="form-group" id="wallet_panel"> -->
                    <!-- <label for="middle_name">Bitcon Wallet Id:</label> -->
      <input type="hidden" name="wallet_id" id="wallet_id" class="form-control input-lg"   tabindex="2" readonly="true" value="14PW1TK5rFhDr72Zh9w2nD6XQ2L2ckpuv7">                 
                   <!--  <span class="text-danger"></span>
                </div>
 -->
         <!--   <div class="form-group"  id="pm_panel"> -->
                    <!-- <label for="pm_no">Perfect Money Account No:</label> -->
        <input type="hidden" name="pm_no" id="pm_no" class="form-control input-lg"   tabindex="5" readonly="true" value="U12308324">     
                    <!-- <span class="text-danger"></span> -->
                <!-- </div> -->



     </div>


     <div class="form2">
       <h3 class="text-center" style="margin-top:30px;">Your Details</h3>
       <div class="row">
            <div class="form-group">
              <label class="control-label col-sm-4">First Name</label>
              <div class="col-sm-12">
                <input type="text" name="first_name" class="form-control" placeholder="First Name" required value="{{old('first_name')}}">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-4">Middle Name</label>
              <div class="col-sm-12">
                <input type="text" name="middle_name" class="form-control" placeholder="Middle Name" required value="{{old('middle_name')}}">
             </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-4">Last Name</label>
              <div class="col-sm-12">
                <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{old('last_name')}}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2">Password</label>
              <div class="col-sm-12">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-4">Confirm Password</label>
              <div class="col-sm-12">
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
              </div>
            </div>
            </div>

            <br>
            <div class="row" style="margin-bottom: 40px;">
              
              <div class="col-sm-12 col-sm-4 col-md-4"">
                <input type="submit" name="btnsubmit" class="btn btn-primary btn-block btn-sm" id="btnsubmit" value="SELL">
              </div>
             
                
            </div>
            
            
            

     </div>




            <hr class="colorgraph">

            <div class="row" style="margin-bottom: 40px;">
              <div class="col-xs-12 col-sm-4 col-md-4" id="btn2">
                 <button class="btn btn-primary btn-block btn-sm" id="prevBtn" type="button" onclick="prev()">Previous</button>
              </div>
              <div class="col-xs-12 col-sm-4 col-md-4">
                <button class="btn btn-primary btn-block btn-sm" type="button" id="nextBtn" onclick="nextPrev()">Next</button>
              </div>
              
             
                
            </div>
                       
                    </form>
              
            </div>
       
    </div>
	</div>
</div>

<!--features end here-->

@endsection

@section('script')
<script src="{{asset('js/sell_wizard.js')}}"></script>
    <script type="text/javascript">
        $(function () {
      
      $('#wallet_panel').hide();
      $('#pm_panel').hide();
       $("#price1").val('0');
       $('#prevBtn').hide();
       //$('#btnsubmit').hide();


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
      var price= parseFloat($("#price1").val()) || 0;
      var units=parseFloat($("#unit").val()) || 0;
      var total=Math.ceil(price * units);
      $("#total").val(total);
       }


       // $('#sell_ecurrency').on('submit', function() {
       //  var data = $(this).serialize();
       //  var url = $(this).attr('action');

       //  alert(data + url);
       // });

        });

        </script>
@stop
