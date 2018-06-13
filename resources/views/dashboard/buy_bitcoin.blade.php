@extends('layouts.main_master')

@section('content')


<!-- Navigation -->
       
<div class="about" style="padding-top: 20px;">
    <div class="container">
        <div class="about-main">
            <div class="about-top">
                <h1 class="text-center">Bitcoin</h1>
            </div>
            <div class="about-bottom" style="margin-top: 30px;">
                <div class="panel panel-default">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif
                    <form class="form-horizontal" id="formWizard2" method="post" action="{{ url('dashboard/save-bitcoin') }}"  novalidate>
                    {{ csrf_field() }} 
                        <div class="panel-heading">
                            Purchase Wizard     <span style="color: red;padding-left: 40px;">(Please no ATM transfers, No third-party payments, all payments must be done via your bank account)</span>
                        </div>
                        <div class="panel-tab">
                            <ul class="wizard-steps wizard-demo" id="wizardDemo2"> 
                                <li class="active">
                                    <a href="#wizardContent1" data-toggle="tab">Step 1</a>
                                </li> 
                                <li>
                                    <a href="#wizardContent2" data-toggle="tab">Step 2</a>
                                </li> 
                                <li>
                                    <a href="#wizardContent3" data-toggle="tab">Step 3</a>
                                </li>
                                 <li>
                                    <a href="#wizardContent4" data-toggle="tab">Step 4</a>
                                </li>
                            </ul>
                        </div>
                            
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="wizardContent1">
                <input type="hidden" name="unit_price"  id="unit_price"  value="{{ $current_price }}">
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Units (&#x24;)</label>
                                        <div class="col-lg-4">
                 {!! Form::text('units', Input::old('units'),['class' => 'form-control input-lg numericText','required' => "true",'placeholder' => "Enter the no of units",
                 'data-required'=>"true",'id'=>"units",'data-maxlength'=>"5",'maxlength'=>"5"]) !!}
                                        </div><!-- /.col -->
                                    </div><!-- /form-group -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Total (&#8358;)</label>
                                        <div class="col-lg-4">
                    {!! Form::number('total_units', Input::old('total_units'),['class' => 'form-control input-lg numericText','required' => "true",'placeholder' => "Total",
                    'readonly'=>"true",'data-required'=>"true",'id'=>"total_units"]) !!}
                                        </div><!-- /.col -->
                                    </div><!-- /form-group -->
                                  
                                </div>
                                <div class="tab-pane fade" id="wizardContent2">
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Wallet Id</label>
                                        <div class="col-lg-6">
                {!! Form::text('wallet', Input::old('wallet'),['class' => 'form-control input-lg','required' => "true",'placeholder' => "Enter your Wallet Id",
                 'data-required'=>"true", 'pattern'=>".{26,}", 'maxLength'=>"35", 'id'=>"wallet"]) !!}
                                        </div><!-- /.col -->
                                    </div><!-- /form-group -->      
                                    <div class="form-group">
                            <label class="control-label col-lg-2">Confirm Wallet Id</label>
                            <div class="col-lg-6">

            {!! Form::text('confirm_wallet', Input::old('confirm_wallet'),['class' => 'form-control input-lg','required' => "true",'placeholder' => "Confirm Wallet Id",
                 'data-required'=>"true",'id'=>"confirm_wallet",'data-equalto'=>"#wallet"]) !!}
                            
                            </div>

                                    </div><!-- /form-group -->
                                </div>

                                <div class="tab-pane fade padding-md" id="wizardContent3">

                                   <div class="form-group">
                                        <label class="control-label col-lg-2">Payment Method</label>
                                        <div class="col-lg-6">
                                                {!! Form::select('payment_method',$payment_method, Input::old('payment_method'),['class' => ' btn btn-default btn-lg','placeholder' => 'Please select payment method',
                                                'required' => "true",'tabindex'=>"5", 'id'=>"payment_method"]) !!}
                                        </div><!-- /.col -->
                                    </div><!-- /form-group -->  
                                    <br>

                                    <div style="{{ $display_form }}" id="conditional_bank_form">
                                        <div style="margin-left: 160px" class="form-group">
                                            <h4>Bank Details</h4>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-2">First Name: </label>
                                            <div class="col-lg-4">
                                                    {!! Form::text('first_name', Input::old('first_name'),['class' => 'form-control','required' => "true",'placeholder' => "e.g. John",
                                                    'data-required'=>"true",'id'=>"first_name"]) !!}
                                            </div><!-- /.col -->
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-2">Middle Name: </label>
                                            <div class="col-lg-4">
                                                    {!! Form::text('middle_name', Input::old('middle_name'),['class' => 'form-control','required' => "true",'placeholder' => "e.g. Carlos",
                                                    'data-required'=>"true",'id'=>"middle_name"]) !!}
                                            </div><!-- /.col -->
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-2">Last Name: </label>
                                            <div class="col-lg-4">
                                                    {!! Form::text('last_name', Input::old('last_name'),['class' => 'form-control','required' => "true",'placeholder' => "e.g. Doe",
                                                    'data-required'=>"true",'id'=>"last_name"]) !!}
                                            </div><!-- /.col -->
                                        </div>
                                            
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Account Name: </label>
                                            <div class="col-lg-4">
                                                    {!! Form::text('account_name', Input::old('account_name'),['class' => 'form-control','required' => "true",'placeholder' => "e.g. John Doe",
                                                    'data-required'=>"true",'id'=>"account_name"]) !!}
                                            </div><!-- /.col -->
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2">Account Number: </label>
                                            <div class="col-lg-4">
                                                {!! Form::number('acct_no', Input::old('acct_no'),['class' => 'form-control','required' => "true",'placeholder' => "e.g. 513513584",'data-required'=>"true",'id'=>"acct_no"]) !!}
                                            </div><!-- /.col -->
                                        </div><!-- /form-group -->

                                        <div class="form-group">
                                            <label class="control-label col-md-2">Bank Name: </label>
                                            <div class="col-lg-4">
                                                    {!! Form::text('bank_name', Input::old('bank_name'),['class' => 'form-control','required' => "true",'placeholder' => "e.g. First Bank",
                                                    'data-required'=>"true",'id'=>"bank_name"]) !!}
                                            </div><!-- /.col -->
                                        </div>

                                    </div>

                                </div>  
                                    


                            <div class="tab-pane fade padding-md  text-center" id="wizardContent4">

                                <div>
                                    <h3>Confirm Details</h3>

                                    <div> 
                                        <h6>Step 1</h6>
                                        <span style="font-weight: bolder; color: #4d4d4d">Unit: </span>
                                        <span id="unit_field"></span>
                                    </div>

                                    <div>
                                        <span style="font-weight: bolder; color: #4d4d4d">Total: </span>
                                        <span id="total_unit_field"></span>
                                    </div>
                                    <br>

                                    <div>
                                        <h6>Step 2</h6>
                                        <span style="font-weight: bolder; color: #4d4d4d">Wallet ID: </span>
                                        <span id="wallet_id_field"></span>
                                    </div>
                                    <br>

                                    <div>
                                        <h6>Step 3</h6>
                                        <span style="font-weight: bolder; color: #4d4d4d">Payment Method: </span>
                                        <span id="payment_method_field"></span>
                                    </div>
                                    <br>

                                </div>

                                <div class="form-group">
                                    <div class="col-lg-2">
                                      <button type="submit" class="btn btn-blue" id="registerBtn" name="action:Register">Purchase</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer clearfix">
                            <div class="pull-left">
                                <button class="btn btn-success btn-sm disabled" id="prevStep2" disabled>Previous</button>
                                <button type="submit" class="btn btn-sm btn-success" id="nextStep2">Next</button>
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
<!--about end here-->
<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            Bitcoin Purchase History
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="bitcoin">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Units (&#x24;)</th>
                                        <th>Total (&#8358;)</th>
                                        <th>Wallet</th>
                                        <th>Method</th>
                                        <th>Date</th>
                                        <th>Reference No</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                    @if (count($bitcoins))
                         @foreach ($bitcoins as $bitcoin)
                            <tr>
                                 <td>
                                  {!! $bitcoin->id !!}
                                </td>
                                <td>
                                  {!! $bitcoin->unit !!}
                                </td>

                                <td>
                                  {!! $bitcoin->total !!}
                                </td>
                                <td>
                                  {!! $bitcoin->wallet_id !!}
                                </td>
                                 <td>
                                 @if ($bitcoin->method==1)
                                     {!! "Internet Bank Transfer"  !!}
                                 @endif
                                 @if ($bitcoin->method==2)
                                     {!! "Bank Deposit"  !!}
                                  @endif
                                  @if ($bitcoin->method==3)
                                     {!! "Short Code"  !!}
                                 @endif
                                </td>
                                  <td>
                                  {!! $bitcoin->created_at !!}
                                </td>
                                 <td>
                                  {!! $bitcoin->ref_no !!}
                                </td>
                                 <td>
                                  @if ($bitcoin->status==0)
                                     {!! "Processing.."  !!}
                                  @endif
                                  @if ($bitcoin->status==1)
                                     {!! "Completed"  !!}
                                  @endif
                                </td>
                            </tr>

                          @endforeach
                         
                     @endif

                                </tbody>
                            </table>
                         
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>




@endsection
