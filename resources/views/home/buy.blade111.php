@extends('layouts.main_master')

@section('content')

    <!--header end here-->
    <!--features starts here-->
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
                                Purchase Wizard     <span style="color: red;padding-left: 40px;">(Please no ATMs transfer, No third-partys payment, all payments must be done via your bank account)</span>
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
                                        <input type="hidden" name="secret" value="{{ $secret}}">
                                        <input type="hidden" name="unit_price"  id="unit_price"  value="{{ $current_price }}">
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Units</label>
                                            <div class="col-lg-4">
                                                {!! Form::text('units', Input::old('units'),['class' => 'form-control input-lg numericText','required' => "true",'placeholder' => "Enter the no of units",
                                                'data-required'=>"true",'id'=>"units",'data-maxlength'=>"5",'maxlength'=>"5"]) !!}
                                            </div><!-- /.col -->
                                        </div><!-- /form-group -->
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">Total</label>
                                            <div class="col-lg-4">
                                                {!! Form::text('total_units', Input::old('total_units'),['class' => 'form-control input-lg numericText','required' => "true",'placeholder' => "Total",
                                                'readonly'=>"true",'data-required'=>"true",'id'=>"total_units"]) !!}
                                            </div><!-- /.col -->
                                        </div><!-- /form-group -->

                                    </div>
                                    <div class="tab-pane fade" id="wizardContent2">
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">Wallet Id</label>
                                            <div class="col-lg-6">
                                                {!! Form::text('wallet', Input::old('wallet'),['class' => 'form-control input-lg','required' => "true",'placeholder' => "Enter your Wallet Id",
                                                 'data-required'=>"true",'id'=>"wallet"]) !!}

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
                             'required' => "true",'tabindex'=>"5"]) !!}
                                            </div><!-- /.col -->
                                        </div><!-- /form-group -->

                                    </div>
                                    <div class="tab-pane fade padding-md  text-center" id="wizardContent4">
                                        <p style="margin-bottom: 20px; color:black; font-weight: bold">Bank Payment Details</p>
                                        <p style="margin-bottom: 20px; color:green; font-weight: bold">Please Pay into <br/>Account Name : Lingerie Lounge ,
                                            <br/> Bank Name: Guaranty Trust Bank.<br/> Account No: 0230035358</p>


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
                                <th>Units</th>
                                <th>Total</th>
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
    <!--features end here-->



@endsection
