@extends('layouts.main_master')

@section('content')
<!--header end here-->
<!--about start here-->
<div class="services">
    <div class="container">
        <div class="services-man">
            <div class="services-top">
                <h1>We Buy e-Currency</h1>              
            </div>
            <div class="services-bottom wow slideInRight" data-wow-delay="0.2s">
                <div class="col-xs-12 col-md-4 services-grid">              
                    <div class="item item-type-move">
                        <a class="item-hover" href="{{ url('dashboard/buy-bitcoin') }}">                        
                            <div class="item-info">
                                <div class="headline">
                                    Buy Bitcoin 
                                    <div class="line"> </div>
                                </div>                      
                            </div>
                            <div class="mask"> </div>
                        
                        <div class="item-img">
                                <img src="images/coin.png" class="img-responsive" alt="Bitcoin">
                        </div>
                        </a>
                    </div>
                    <div class="clearfix"> </div>
                    <div class="ser-text">
                    </div>
                </div>
            
                <div class="col-xs-12 col-md-4 services-grid">
                    <div class="item item-type-move">
                        <a class="item-hover" href="{{ url('dashboard/buy-perfect-money') }}">                        
                            <div class="item-info">
                                <div class="headline">
                                    Perfect Money
                                    <div class="line"> </div>
                                </div>
                                                            
                            </div>
                            <div class="mask"> </div>
                       
                        <div class="item-img">
                                <img src="images/perf.png" class="img-responsive" alt="Perfect Money Secure">
                        </div>
                        </a>
                    </div>
                    <div class="clearfix"> </div>
                    <div class="ser-text">
                        
                        
                    </div>
                </div>          
              <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>
<!--about end here-->




@endsection
