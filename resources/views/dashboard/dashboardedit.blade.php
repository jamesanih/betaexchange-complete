@extends('layouts.user_master')

@section('content')
<div class="container">
<!--header end here-->
<!--about start here-->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                    <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fab fa-btc fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div style="font-size: 15px;">Bitcoin Orders!</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('bitcoin_order')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="far fa-money-bill-alt fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div style="font-size: 15px;">Perfect Money Orders!</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('pm_order')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div style="font-size: 15px;">Messages</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('message')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fas fa-user-alt fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div style="font-size: 15px;">Profile</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('profile')}}">
                        <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
                  <form role="form" method="post" action="source/administrator">
                  <input type="hidden" name="_token" value="cWm40BjpK2PxOCnnHbrTgwFuToehpv0vGcfVk1GG">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Buying Rates

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">


         <div class="row">
         <div class="col-md-6">
         <div class="form-group ">
            <label for="bitcoin" style="font-size: 15px;">Bitcoins:</label>
            <input type="text" name="bitcoin" id="bitcoin" class="form-control input-lg numericText" value="{{ $price->bitcoin }}" disabled="" required="required">
         </div>
         </div>
         <div class="col-md-6">
         <div class="form-group">
          <label for="perfect_money" style="font-size: 15px;">Perfect Money:</label>
          <input type="text" name="perfect_money" id="perfect_money" class="form-control input-lg  numericText" value="{{ $price->perfect_money }}" disabled="" required="required">

         </div>
         </div>
         </div>






                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">


                            <div class="pull-right">
                                <div class="btn-group">

                                </div>
                            </div>

                        <!-- /.panel-heading -->
                        <div class="">



                  <div class="" style="center">
               <div class="col-md-4"></div>
                <div class="col-md-4"></div>

            </div>
                                    <!-- /.table-responsive -->


                                <!-- /.col-lg-8 (nested) -->

                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>

                    {{-- change password --}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-edit fa-fw"></i> 
                            <div class="pull-right">
                                <div class="btn-group"></div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <a href="{{ route('resetpassword') }}" class="btn btn-primary btn-block btn-lg">Change Password</a>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>

                    </div>

                    <div class="col-lg-6">

                                      <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Selling Rates

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">


         <div class="row">
         <div class="col-md-6">
         <div class="form-group ">
            <label for="bitcoin_sell" style="font-size: 15px;">Bitcoins:</label>
            <input type="text" name="bitcoin_sell" id="bitcoin_sell" class="form-control input-lg numericText" value="{{ $price->bitcoin_sell }}" disabled="" required="required">
         </div>
         </div>
         <div class="col-md-6">
         <div class="form-group">
          <label for="perfect_money_sell" style="font-size: 15px;">Perfect Money:</label>
          <input type="text" name="perfect_money_sell" id="perfect_money_sell" class="form-control input-lg  numericText" value="{{ $price->perfect_money_sell }}" disabled="" required="required">

         </div>
         </div>
         </div>






                        </div>
                        <!-- /.panel-body -->
                    </div>

                    <!-- /.panel .chat-panel -->


                </div>
                    </div>

 </form>
            <!-- /.row -->



            <!-- /.row -->
        </div>



</div>
 @endsection

@section('script')

@stop