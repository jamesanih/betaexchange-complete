@extends('layouts.admin_master')

@section('content')
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
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $new_orders }}</div>
                                    <div>New Orders!</div>
                                </div>
                            </div>
                        </div>
                        <a href="/administrator/new-orders">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $total_customers }}</div>
                                    <div>Total Customers!</div>
                                </div>
                            </div>
                        </div>
                        <a href="administrator/customer">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $buy_orders }}</div>
                                    <div>Buy Orders!</div>
                                </div>
                            </div>
                        </div>
                        <a href="administrator/bitcoin">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $sell_orders }}</div>
                                    <div>Sell Orders!</div>
                                </div>
                            </div>
                        </div>
                        <a href="administrator/sell">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
                  <form  role="form" method="post" action="{{ url('/administrator') }}" >
                  {{ csrf_field() }}  
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
            <label for="bitcoin" >Bitcoins:</label>
            <input type="text" name="bitcoin" id="bitcoin" class="form-control input-lg numericText" value="{{ $price->bitcoin }}"  tabindex="9"  required="required"
            > 
         </div>
         </div>
         <div class="col-md-6">
         <div class="form-group">
          <label for="perfect_money" >Perfect Money:</label>
          <input type="text" name="perfect_money" id="perfect_money" class="form-control input-lg  numericText"  maxlength="10" value="{{ $price->perfect_money }}"  tabindex="10"  required="required">
  
         </div>
         </div>
         </div>


          
       


                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> 
                            <div class="pull-right">
                                <div class="btn-group">
                                   
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                      
                                
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                <input type="submit" name="submit" value="Update Rates" class="btn btn-primary btn-block btn-lg" tabindex="9"></div>
                <div class="col-md-4"></div>
                
            </div>
                                    <!-- /.table-responsive -->
                               

                                <!-- /.col-lg-8 (nested) -->
             
                            <!-- /.row -->
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
                            <label for="bitcoin_sell" >Bitcoins:</label>
                            <input type="text" name="bitcoin_sell" id="bitcoin_sell" class="form-control input-lg numericText" value="{{ $price->bitcoin_sell }}"  tabindex="9"  required="required"> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="perfect_money_sell" >Perfect Money:</label>
                            <input type="text" name="perfect_money_sell" id="perfect_money_sell" class="form-control input-lg  numericText"  maxlength="10" value="{{ $price->perfect_money_sell }}"  tabindex="10"  required="required">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>

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
                        <a href="{{ url('/administrator/change-password') }}" class="btn btn-primary btn-block btn-lg">Change Password</a>
                    </div>
                    <div class="col-md-4"></div>
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


@endsection
@section('script')
    <script type="text/javascript">


        </script>
@stop