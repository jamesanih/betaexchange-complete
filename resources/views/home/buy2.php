@extends('layouts.main_master')

@section('content')

    <!--header end here-->
    <!-- Navigation -->

    <div class="about" style="padding-top: 20px;" data-ng-app="myApp">
        <div class="container" data-ng-controller="niceController">
            <div class="about-main">
                <div class="about-top">
                    <h1 class="text-center"></h1>
                </div>
                <div class="about-bottom" style="margin-top: 30px;">
                    <div class="panel panel-default">
                        
                        <form class="form-horizontal" id="formWizard2" method="post" action="#" name="myForm"  novalidate>
                            <input type="hidden" name="_token" id="_token" value="GIRRCeWQtfBgT69MoprzfcTGrr3GsC26GvwxU9NM">
                            <div class="panel-heading">
                                Purchase Wizard     <span style="color: red;padding-left: 40px;">(Please no ATMs transfer, No third-partys payment, all payments must be done via your bank account)</span>
                            </div>
                            <div class="panel-tab">
                                <ul class="wizard-steps wizard-demo" id="wizardDemo2">
                                    <li class="active">
                                        <a  data-toggle="tab">Step 1</a>
                                    </li>
                                    <li>
                                        <a  data-toggle="tab">Step 2</a>
                                    </li>
                                    <li>
                                        <a  data-toggle="tab">Step 3</a>
                                    </li>
                                    <li>
                                        <a  data-toggle="tab">Step 4</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" height="auto" id="wizardContent1">
                                      <div class="form-group"  align="center">
                                        <label class="control-label col-lg-10"></label>
                                        <select class="btn btn-default btn-lg" required="true" tabindex="5" id="currency_type" name="currency_type">
                                        <option selected="selected" value="">Please select currency type</option>
                                        <option value="Bitcoin">Bitcoin</option>
                                        <option value="Perfect Money">Perfect Money</option>
                                        </select>
                                      </div>
                                      <br><br>

                                      <input type="hidden" name="secret" value="">
                                      <input type="hidden" name="unit_price"  id="unit_price"  value="{{ $price->bitcoin }}">
                                      <input type="hidden" name="unit_price2"  id="unit_price2"  value="{{ $price->perfect_money }}">


                                      <div class="form-group" align="Left">
                                        <label class="control-label col-md-2">Units</label>
                                        <div class="col-lg-4">
                                                <input class="form-control input-lg numericText" required="true" type="text" placeholder="Enter the no of units" data-required="true" name="units" id="units" data-maxlength="8" maxlength="8" data-ng-model="units" oninput="this.className =''" required> 
                                              
                                                   
                                        </div>

                                        <span></span>

                                        <div class="form-group" align="Right">
                                             
                                        <div class="col-lg-4">
                                                <input class="form-control input-lg numericText" required="true" type="text" readonly="true" placeholder="Total" data-required="true" name="total_units" id="total_units" value="@{{units * unit_price}}" oninput="this.className =''" >

                                                
                                            </div><!-- /.col -->
                                        </div><!-- /form-group -->


                                        

                                      </div>

                                        </div>


                                      



                                    <!-- //tab2 -->

                                    <div class="tab-pane fade" id="wizardContent2">
                                        <div class="form-group">
                                            <label class="control-label col-lg-2" id="wallet_id" >Wallet Id</label>
                                            <div class="col-lg-6">
                                                <input class="form-control input-lg" required="true" type="text"  placeholder="Enter your Wallet Id" data-required="true" name="wallet" id="wallet" data-ng-model="wallet_id" oninput="this.className =''">
                                            </div><!-- /.col -->
                                        </div><!-- /form-group -->
                                        <div class="form-group">
                                            <label class="control-label col-lg-2" id="confirm_wallet_id">Confirm Wallet Id</label>
                                            <div class="col-lg-6">
                                                <input class="form-control input-lg" required="true" type="text"  placeholder="Confirm Wallet Id" data-required="true" name="confirm_wallet" id="confirm_wallet" data-equalto="#wallet" oninput="this.className =''">

                                            </div>

                                        </div><!-- /form-group -->
                                         

                                    </div>
                                    <!-- End tab2 -->


                                    <div class="tab-pane fade padding-md" id="wizardContent3">
                                       <div class="form-group" align="Left">
                                        
                                        <div class="col-md-4">
                                                <input class="form-control input-lg" required="true" type="text" placeholder="First Name" data-required="true" name="first_name" id="first_name" data-ng-model="first_name" oninput="this.className =''" required>
                                                
                                                

                                        </div>
                                        <span></span>

                                        <div class="form-group" align="Right">
                                             
                                        <div class="col-md-4">
                                                <input class="form-control input-lg" required="true" type="text"  placeholder="Last Name" data-required="true" name="Last Name" id="last_name" data-ng-model="last_name" oninput="this.className =''" required>
                                            </div><!-- /.col -->
                                        </div><!-- /form-group -->



                                        <div class="form-group" align="Left">
                                           
                                            <div class="col-md-4">
                                                <input class="form-control input-lg" required="true" type="email"  placeholder="Enter your  Email" data-required="true" name="email" id="email" data-ng-model="email" oninput="this.className =''">
                                            </div><!-- /.col -->
                                        </div><!-- /form-group -->
                                      </div>

                                      <!-- Pssword -->
                                      <div class="form-group" align="Left">
                                        
                                        <div class="col-lg-4">
                                                <input class="form-control input-lg numericText" required="true" type="password" placeholder="Password" data-required="true" name="password" id="password" data-maxlength="8" maxlength="8" da required oninput="this.className =''">
                                                
                                                

                                        </div>
                                        <span></span>

                                        <div class="form-group" align="Right">
                                             
                                        <div class="col-lg-4">
                                                <input class="form-control input-lg numericText" required="true" type="password"  placeholder="Confirm Password" data-required="true" name="conf_password" id="conf_password" oninput="this.className =''">
                                            </div><!-- /.col -->
                                        </div><!-- /form-group -->


                                        

                                      </div>
                                      



                                      

                                    </div>



                                      <div class="tab-pane fade padding-md  text-center" id="wizardContent4">

                                        <p style="margin-bottom: 20px; color:black; font-weight: bold">Bank Payment Details</p>
                                        <p style="margin-bottom: 20px; color:green; font-weight: bold">Please Pay into <br/>Account Name : Lingerie Lounge ,
                                          <br/> Bank Name: Guaranty Trust Bank.<br/> Account No: 0230035358</p>


                                      <div class="form-group">
                                       <h4> <b>Name</b>: <strong>@{{first_name}}  @{{last_name}}</strong></h4><br>
                                       <h4>Email: <strong>@{{email}}</strong></h4><br>
                                       <h4>Wallet ID: <strong>@{{wallet_id}}</strong></h4>
                                       <h4>Units: <strong>@{{units}}</strong></h4>
                                       <h4>Total : <strong> @{{units * unit_price}}</strong></h4>
                                      </div>
                                        
                                       

                                                {{--  <input type="button" class="btn btn-blue btm-sm" id="prevStep4" value="Previous">                                                                                   <input type="submit" class="btn btn-success btn-sm" id="registerBtn" name="Purchase" value="Purchase">  --}}
                                       
                                        

                                    </div>

                                     <div style="overflow:auto">
                                               
                                                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                                
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
<script>
    $('#nextStep2').click(function(){
        $('.wizard-demo > .active').next('li').find('a').trigger('click');
        console.log("OK");
    });

     $('#prevStep2').click(function(){
        $('.wizard-demo > .active').prev('li').find('a').trigger('click');
       
    });

     $('#nextStep3').click(function(){
        $('.wizard-demo > .active').next('li').find('a').trigger('click');
        
    });

      $('#prevStep3').click(function(){
        $('.wizard-demo > .active').prev('li').find('a').trigger('click');
        
    });

       

        $('#nextStep4').click(function(){
        $('.wizard-demo > .active').next('li').find('a').trigger('click');
        
    });

         $('#prevStep4').click(function(){
        $('.wizard-demo > .active').prev('li').find('a').trigger('click');
        
    });



 var price = $('#unit_price').val();
 var price2 = $('#unit_price2').val();
    
    </script>


@stop

