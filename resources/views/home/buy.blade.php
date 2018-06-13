@extends('layouts.main_master')

@section('content')

    <!--header end here-->
    <!-- Navigation -->

    <div class="about" style="padding-top: 20px;" data-ng-app="myApp">
        <div class="container">
            <div class="about-main">
                <div class="about-top">
                    <h1 class="text-center"></h1>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="about-bottom" style="margin-top: 30px;" data-ng-controller="niceController" novalidate>
                    <div class="panel panel-default">
                        
                       <form class="form-horizontal" id="form_id" method="POST" action="{{route('buy_ecurrency')}}">

                           <!-- <input type="hidden" name="_token" id="_token" value="GIRRCeWQtfBgT69MoprzfcTGrr3GsC26GvwxU9NM"> -->
                           {{csrf_field()}}
                            <div class="panel-heading">
                                Purchase Wizard     <span style="color: red;padding-left: 40px;">(Please no ATMs transfer, No third-partys payment, all payments must be done via your bank account)</span>
                            </div>
                                     
                                      <input type="hidden" name="unit_price"  id="unit_price"  value="{{ $price->bitcoin }}">
                                      <input type="hidden" name="unit_price2"  id="unit_price2"  value="{{ $price->perfect_money }}">

                                      <!-- tab0 -->
                               <div class="form-tab" style="margin-top: 10px;">
                                  <div class="form-group" align="center">
                                    <label class="col-sm-2">Select E-currency</label>
                                    <div class="col-sm-4">
                                      <select class="btn btn-default btn-lg" required="true" tabindex="5" id="currency_type" name="currency_type">
                                        <option selected="selected" value="">Please select currency type</option>
                                        <option value="Bitcoin">Bitcoin</option>
                                        <option value="Perfect Money">Perfect Money</option>
                                        </select>
                                    </div>
                                  </div>


                                  <div class="form-group">
                                    <label class="control-label col-sm-2">Units (&#x24;)</label>
                                    <div class="col-sm-6">
                                       <input type="text" class="form-control" placeholder="Enter the no of units" name="units" id="units" data-maxlength="8" maxlength="8" data-ng-model="units" value="{{old('units')}}"> 
                                    </div>
                                   
                                  </div>

                                  <div class="form-group">
                                    <label class="control-label col-sm-2">Total (&#8358;)</label>
                                    <div class="col-sm-6">
                                      <input type="text" class="form-control" readonly="true" placeholder="Total" data-required="true" name="total_units" id="total_units" value="{{old('total_units')}}">

                                    </div>
                                  </div>
                                            
                                                                                
                                      
                                   
                               </div>


                               <!-- tab 1 -->
                               <div class="form-tab">
                                   
                                    
                                      <div id="payment_header" align="center"></div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-2" id="payment_type"></label>
                                        <div class="col-sm-6">
                                          <input type="text" name="wallet" id="wallet" class="form-control" data-ng-model="wallet" maxlength="35" data-max-maxLength="35"required value="{{old('wallet')}}"> 
                                        </div>
                                        <i class="fas fa-check" id="ok"></i>
                                          <span class="text-danger" id="msg_error"></span>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-sm-2" id="confirm_payment_type"></label>
                                        <div class="col-sm-6">
                                          <input type="text" name="confirm_wallet" class="form-control" id="confirm_wallet" data-equalto="#wallet" maxlength="35"  data-max-maxLength="35" required data-ng-model="pm" value="{{old('confirm_wallet')}}">
                                        </div>
                                         <i class="fas fa-check" id="wallet_ok"></i>
                                          <span class="text-danger" id="wallet_msg" ></span>
                                      </div>

                                  
                                   
                               </div>

                               <!-- tab 2 -->

                                <div class="form-tab">

                                  <div class="form-group"  align="center">
                                        <label class="control-label col-lg-10"></label>
                                        <select class=" btn btn-default btn-lg" placeholder="Please select payment method" required="true" tabindex="5" name="payment_method" id="payment_method" data-ng-model="payment">
                                          <option selected="selected" value="">Please select payment method</option>
                                          <option value="1">Internet Bank Transfer</option>
                                          <option value="2">Bank Deposit</option>
                                          <option value="3">Short Code</option>
                                        </select>
                                      </div>
                                       
                               </div>

                               <!-- tab3 -->
                               <div class="form-tab">
                                      <p><h4 align="center">Personal Details</h4></p>
                                        
                                        <div class="form-group">
                                          <label class="control-label col-sm-2">First Name</label>
                                          <div class="col-sm-6">
                                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="eg:Mark"  required value="{{old('first_name')}}">
                                          </div>
                                        </div>

                                        <div class="form-group">                                          
                                          <label class="control-label col-sm-2">Middle Name</label>
                                          <div class="col-sm-6">
                                             <input type="text" name="middle_name" class="form-control" id="mname" placeholder="eg:Mark" required value="{{old('middle_name')}}">
                                          </div>
                                         
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2">Last Name</label>
                                          <div class="col-sm-6">
                                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="eg:Mark" required value="{{old('last_name')}}">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2">Phone Number</label>
                                          <div class="col-sm-6">
                                            <input type="number" name="phone_no" id="phone_no" placeholder="eg:00000" class="form-control" maxlength="11" value="{{old('phone_no')}}">
                                          </div>
                                          <span class="text-danger" id="number_msg" ></span>
                                        </div>
                                     
                               </div>


                               <!-- tab4 -->
                               <div class="form-tab">
                                      <h4 align="center">User Details</h4>
                                  <div class="form-group">
                                    <label class="control-label col-sm-2">Email</label>
                                    <div class="col-sm-6">
                                      <input type="email" name="email" id="email" id="email" placeholder="eg:name@gmail.com" class="form-control" required >
                                    </div>
                                  </div>


                                  
                                    <div class="form-group">
                                      <label class="control-label col-sm-2">Password</label>
                                      <div class="col-sm-6">
                                        <input type="password" name="password" id="password" placeholder="eg:*****" class="form-control">
                                      </div>
                                      <i class="fas fa-check" id="password_msgok"></i>
                                      <span class="text-danger" id="password_msg"></span>
                                    </div>
                                


                                 
                                    <div class="form-group">
                                      <label class="control-label col-sm-2">Confirm Password</label>
                                      <div class="col-sm-6">
                                        <input type="password" name="confirm_pass" id="confirm_pass" class="form-control" placeholder="eg:*****">
                                      </div>
                                       <i class="fas fa-check" id="password_ok"></i>
                                           <span class="text-danger" id="password_msg3"></span>
                                      </div>
                                  

                               </div>


                               <!-- tab5 -->
                               <div class="form-tab">
                                 <h5 align="center">Bank Account Details</h5>

                                   <div class="form-group">
                                     <label class="control-label col-sm-2">Account First Name</label>
                                     <div class="col-sm-6">
                                       <input type="text" name="first_name2" id="first_name2" class="form-control" placeholder="eg:john" value="{{old('first_name2')}}">
                                     </div>
                                      <i class="fas fa-check" id="ok_msg"></i>
                                       <span class="text-danger" id="ferror_msg"></span>
                                   </div>

                                   <div class="form-group">
                                     <label class="control-label col-sm-2">Account Middle Name</label>
                                     <div class="col-sm-6">
                                       <input type="text" name="m_name2" id="m_name2" class="form-control" placeholder="eg:mark" value="{{old('m_name2')}}">
                                     </div>
                                     <i class="fas fa-check" id="ok_msg2"></i>
                                     <span class="text-danger" id="ferror_msg2"></span>
                                   </div>


                                   <div class="form-group">
                                     <label class="control-label col-sm-2">Account Last Name</label>
                                     <div class="col-sm-6">
                                       <input type="text" name="last_name2" id="last_name2" class="form-control" placeholder="eg:Eze" value="{{old('last_name2')}}">
                                     </div>
                                     <i class="fas fa-check" id="ok_msg3"></i>
                                     <span class="text-danger" id="ferror_msg3"></span>
                                   </div>


                                   <div class="form-group">
                                     <label class="control-label col-sm-2">Account Number</label>
                                     <div class="col-sm-6">
                                       <input type="number" name="ac_number" id="ac_number" class="form-control" placeholder="eg:00000" maxlength="10" value="{{old('ac_number')}}">
                                     </div>
                                     <span class="text-danger" id="ac_msg" ></span>
                                   </div>

                                   <div class="form-group">
                                     <label class="control-label col-sm-2">Bank Name</label>
                                     <div class="col-sm-6">
                                      <select class=" btn btn-default btn-lg" required="true" tabindex="6" name="bank_name"><option selected="selected" value="">Choose Your Bank</option><option value="Access Bank">Access Bank</option><option value="Citibank">Citibank</option><option value="Diamond Bank">Diamond Bank</option><option value="Ecobank Nigeria">Ecobank Nigeria</option><option value="Fidelity Bank Nigeria">Fidelity Bank Nigeria</option><option value="First Bank of Nigeria">First Bank of Nigeria</option><option value="First City Monument Bank">First City Monument Bank</option><option value="Guaranty Trust Bank">Guaranty Trust Bank</option><option value="Heritage Bank plc">Heritage Bank plc</option><option value="Keystone Bank Limited">Keystone Bank Limited</option><option value="Skye Bank">Skye Bank</option><option value="IBTC Bank">IBTC Bank</option><option value="Standard Chartered Bank">Standard Chartered Bank</option><option value="Sterling Bank">Sterling Bank</option><option value="Union Bank of Nigeria">Union Bank of Nigeria</option><option value="Wema Bank">Wema Bank</option><option value="Unity Bank plc">Unity Bank plc</option><option value="United Bank for Africa">United Bank for Africa</option><option value="Zenith Bank">Zenith Bank</option></select>
                                     </div>
                                   </div>
                                           
                                                                 
                               </div>


                            
                               

                              
                               <!--tab6  -->
                               <div class="form-tab">
                               <div align="center">
                                            <div class="form-group">
                                              <label>
                                             <div id="units">Units</div>
                                           </label>
                                           <span><h4 id="unit"></h4></span>
                                            </div>
                                           

                                           <div  class="form-group">
                                             <label>
                                               <div>Total</div>
                                             </label>
                                          <span ><h4 id="final_units"></h4></span>
                                           </div>
                                            

                                            <div class="form-group">
                                              <label>
                                              <div id="e_currency"></div>
                                              </label>
                                              <span><h4 id="PM_ac">@{{wallet}}</h4></span>
                                            </div>
                                            


                                            <div class="form-group" id="pm_ac">
                                              <label>
                                              <div id="confirm_payment_type">Perfect Money AC Name</div>
                                              </label>
                                            <span><h4 id="PM"></h4></span>
                                            </div>  


                                             <div class="form-group" >
                                              <label>
                                              <div>Payment Method</div>
                                              </label>
                                            <span><h4 id="payment"></h4></span>
                                            </div>                                         
                                    </div>
                               </div>

                                <div class="panel-body clearfix">
                                    <div class="pull-left">
                                        <button class="btn btn-success btn-sm" id="prevBtn" type="button" onclick="nextPrev(-1)">Previous</button>
                                        <button class="btn btn-sm btn-success" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                    </div>

                                    <div class="pull-right" style="width:30%">

                                    </div>
                                </div>


                            
                       </form>
                    </div><!-- /panel -->
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('script')
<script src="{{ asset('js/formWizard.js') }}"></script>
<script>
  var price = $('#unit_price').val();
  var price2 = $('#unit_price2').val();
 
 $("#total_units").val("0");
 $('#pm_ac').hide();
 $('#ferror_msg').hide();
 $('#ok_msg').hide();
 $('#ferror_msg2').hide();
 $('#ok_msg2').hide();
 $('#ferror_msg3').hide();
 $('#ok_msg3').hide();
 $('#password_ok').hide();
 $('#password_msg').hide();
 $('#password_msg3').hide();
 $('#password_msgok').hide();
 $('#wallet_ok').hide();
 $('#wallet_msg').hide();
 $('#ok').hide();
 $('#msg_error').hide();
   
  //  var units = $("#units").val();
  // var total = $("#total_units").val();

  // $("#units").val(units); 

    $('#currency_type').change(function () {
       
       if($(this).val()=="Bitcoin")
       {
        
        //$('#wallet').attr('pattern', '.{3,}');
        $("#payment_header").html("<h4>Bitcoin</h4>");
        $("#payment_type").html("Wallet ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp ");
        $("#confirm_payment_type").html("Confirm Wallet ID");
        $('#wallet').val();
         $("#e_currency").html("Wallet ID ");

        $('#units').keyup(function () {
       changePrice();
       
      });
        //changePrice();    
       }
       else if($(this).val()=="Perfect Money")
       {
        $('#pm_ac').show();
        $('#wallet').attr('id', 'pm');
         $('#confirm_wallet').attr('id', 'confirm_pm');
        $('#pm').val("U");
        //$('#wallet').attr('pattern', '.{3,}');
        $("#payment_header").html("<h4>Perfect Money</h4>");
        $("#payment_type").html("Perfect Money Account No");
        $("#confirm_payment_type").html("Perfect Money Account Name");
         $("#e_currency").html("Perfect Money AC No");
         $('#e_currency_ name').html("Perfect Money name");
        $('#units').keyup(function () {
       changePrice();
        checkInputvalue();
        
      });
        //changePrice();  
       
       }
      });


    

    
     

    



    function changePrice()
       {
      var price= parseFloat($("#unit_price").val()) || 0;
      var units=parseFloat($("#units").val()) || 0;
      var total=price * units;
      var total = Math.ceil(total);
      $("#total_units").val(total);
      $("#tu").val(total);
       
       }


       function checkInputvalue() 
       {
        $('#wallet').attr('id', 'pm')
        $('#pm').bind('input propertychange', function(){
          var data = $('#pm').val();
          var number = data.substring(1, );

          if(data.charAt(0) === "U"){
              //check if string after the U is a number
              if(isNaN(number)){
                var timer;
                $('#pm').val(data);
                clearTimeout(timer);
                timer = setTimeout(function(){$('#pm').val(data.slice(0,-1))}, 200);
              }
          } else {
            // set a timer
            //set value of inputID-wallet to data
            //clearTimeout after every 2millisecond
            var timer;
            $('#wallet').val(data);
            clearTimeout(timer);
            timer = setTimeout(function(){$('#pm').val("U")}, 200);

          }
        });
       }



    



     




   




    </script>


@stop


