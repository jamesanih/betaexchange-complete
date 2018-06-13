@extends('layouts.main_master')

@section('content')


<div class="about" style="padding-top: 20px;">
    <div class="container">
        <div class="about-main">
            <div class="about-top">
                <h1 class="text-center">Perfect Money</h1>
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
                    <form class="form-horizontal" id="formWizard2" method="post" action="{{ url('dashboard/save_perfect_money') }}"  novalidate>
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
                    {!! Form::text('total_units', Input::old('total_units'),['class' => 'form-control input-lg numericText','required' => "true",'placeholder' => "Total",
                    'readonly'=>"true",'data-required'=>"true",'id'=>"total_units"]) !!}
                                        </div><!-- /.col -->
                                    </div><!-- /form-group -->
                                  
                                </div>

                          <div class="tab-pane fade" id="wizardContent2">

                              <div class="form-group">
                                  <label class="control-label col-lg-3">Perfect Money Account No</label>
                                  <div class="col-lg-6">

                                      {!! Form::text('account_no', Input::old('account_no'),['class' => 'form-control input-lg','required' => "true",'placeholder' => "Enter your p.m account no",
                                           'data-required'=>"true", 'pattern'=>".{8,}", 'maxLength'=>"10",'id'=>"account_no"]) !!}
                                  </div>
                              </div><!-- /form-group -->

                              <div class="form-group">
                                  <label class="control-label col-lg-3">Perfect Money Account Name</label>
                                  <div class="col-lg-6">
                                      {!! Form::text('pm_account_name', Input::old('pm_account_name'),['class' => 'form-control input-lg','required' => "true",'placeholder' => "Enter your p.m account name",
                                       'data-required'=>"true",'id'=>"pm_account_name"]) !!}
                                  </div><!-- /.col -->
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
                                <div class="tab-pane fade padding-md text-center" id="wizardContent4" >

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
                                            <span style="font-weight: bolder; color: #4d4d4d">Perfect Money Account No: </span>
                                            <span id="perfect_money_account_no"></span>
                                            <br>

                                            <span style="font-weight: bolder; color: #4d4d4d">Perfect Money Account Name: </span>
                                            <span id="perfect_money_account_name"></span>
                                        </div>
                                        <br>

                                        <div>
                                            <h6>Step 3</h6>
                                            <span style="font-weight: bolder; color: #4d4d4d">Payment Method: </span>
                                            <span id="payment_method_field"></span>
                                        </div>
                                        <br>

                                    </div>

                                    <div class="row"> 
                                        <div class="col-md-6">
                                              <div class="form-group">
                                                  <div class="col-lg-2">
                                                      <button type="submit" class="btn btn-primary" id="registerBtn" name="registerBtn">Purchase</button>
                                                  </div>
                                             </div>
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
                            Perfect Money Purchase History
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="perfect">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Units (&#x24;)</th>
                                        <th>Total (&#8358;)</th>
                                        <th>Account Name</th>
                                        <th>Account No</th>
                                        <th>Method</th>
                                        <th>Date</th>
                                        <th>Reference No</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($perfects))
                             @foreach ($perfects as $perfect)
                    <tr>
                         <td>
                          {!! $perfect->id !!}
                        </td>
                        <td>
                          {!! $perfect->unit !!}
                        </td>

                        <td>
                          {!! $perfect->total !!}
                        </td>
                        <td>
                          {!! $perfect->account_name !!}
                        </td>
                         <td>
                          {!! $perfect->account_no !!}
                        </td>
                         <td>
                          @if ($perfect->method==1)
                             {!! "Internet Bank Transfer"  !!}
                         @endif
                        @if ($perfect->method==2)
                             {!! "Bank Deposit"  !!}
                         @endif
                          @if ($perfect->method==3)
                             {!! "Short Code"  !!}
                         @endif
                        </td>
                          <td>
                          {!! $perfect->created_at !!}
                        </td>
                         <td>
                          {!! $perfect->ref_no !!}
                        </td>
                         <td>
                          @if ($perfect->status==0)
                             {!! "Processing.."  !!}
                         @endif
                        @if ($perfect->status==1)
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
@section('script')

@stop