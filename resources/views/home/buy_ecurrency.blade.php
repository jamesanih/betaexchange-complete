@extends('layouts.main_master')

@section('content')

    <!--header end here-->
    <!-- Navigation -->

    <div class="about" style="padding-top: 20px;">
        <div class="container">
            <div class="about-main">
                <div class="about-top">
                    <h1 class="text-center">Bitcoin</h1>
                </div>
                <div class="about-bottom" style="margin-top: 30px;">
                    <div class="panel panel-default">

                        <form class="form-horizontal" id="formWizard2" method="post" action="https://www.betaexchangeng.com/buynow"  novalidate>
                            <input type="hidden" name="_token" id="_token" value="GIRRCeWQtfBgT69MoprzfcTGrr3GsC26GvwxU9NM">
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
                                        <input type="hidden" name="secret" value="">
                                        <input type="hidden" name="unit_price"  id="unit_price"  value="">
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Units</label>
                                            <div class="col-lg-4">
                                                <input class="form-control input-lg numericText" required="true" type="text" placeholder="Enter the no of units" data-required="true" name="units" id="units" data-maxlength="5" maxlength="5">

                                        </div><!-- /form-group -->
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">Total</label>
                                            <div class="col-lg-4">
                                                <input class="form-control input-lg numericText" required="true" type="text" readonly="true" placeholder="Total" data-required="true" name="total_units" id="total_units">
                                            </div><!-- /.col -->
                                        </div><!-- /form-group -->

                                            <div class="form-group">
                                                <label class="control-label col-lg-2">E-currency</label>
                                                <div class="col-md-8">
                                                    <select class=" btn btn-default btn-lg pull-right" required="true" tabindex="5" id="currency_type" name="currency_type"><option selected="selected" value="">Please select currency type</option><option value="Bitcoin">Bitcoin</option><option value="Perfect Money">Perfect Money</option></select>
                                                </div><!-- /.col -->
                                            </div>

                                    </div>
                                        
                                    <div class="tab-pane fade" id="wizardContent2">
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">Wallet Id</label>
                                            <div class="col-lg-6">
                                                <input class="form-control input-lg" required="true" type="text"  placeholder="Enter your Wallet Id" data-required="true" name="wallet" id="wallet">
                                            </div><!-- /.col -->
                                        </div><!-- /form-group -->
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">Confirm Wallet Id</label>
                                            <div class="col-lg-6">
                                                <input class="form-control input-lg" required="true" type="text"  placeholder="Confirm Wallet Id" data-required="true" name="confirm_wallet" id="confirm_wallet" data-equalto="#wallet">

                                            </div>

                                        </div><!-- /form-group -->
                                    </div>
                                    <div class="tab-pane fade padding-md" id="wizardContent3">
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">Payment Method</label>
                                            <div class="col-lg-6">
                                                <select class=" btn btn-default btn-lg" placeholder="Please select payment method" required="true" tabindex="5" name="payment_method" id="payment_method"><option selected="selected" value="">Please select payment method</option><option value="Internet Bank Transfer">Internet Bank Transfer</option><option value="Bank Deposit">Bank Deposit</option><option value="Short Code">Short Code</option></select>

                                            </div><!-- /.col -->
                                        </div><!-- /form-group -->

                                    </div>
                                    <div class="tab-pane fade padding-md  text-center" id="wizardContent4">
                                        <p style="margin-bottom: 20px; color:black; font-weight: bold">Bank Payment Details</p>
                                        <p style="margin-bottom: 20px; color:green; font-weight: bold">Please Pay into <br/>Account Name : Lingerie Lounge ,
                                            <br/> Bank Name: Guaranty Trust Bank.<br/> Account No: 0230035358</p>


                                        <div class="form-group">
                                            <div class="col-lg-2">
                                                <button type="submit" class="btn btn-blue" id="registerBtn" name="Purchase">Purchase</button>
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

@endsection