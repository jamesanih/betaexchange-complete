@extends('layouts.main_master')

@section('content')
    <section id="slider-wrapper" class="layer-slider-wrapper  col-md-12" >
    <div id="layerslider" style="width:100%;height:500px;" >        
        <div class="ls-slide" data-ls="transition2d:1;timeshift:-1000;">
            <!-- slide background -->
            <img src="images/bg1.jpg" class="ls-bg" alt="Slide background"/>
            
            <!-- Right Image -->
            <img src="images/bg1.jpg" class="ls-l" style="top:58%; left:70%;" data-ls="offsetxin:0;offsetyin:250;durationin:950;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;" alt="Image layer">
            
            <!-- Left Text -->
            <h3 class="ls-l title title-sm strong" style="width:500px; top:25%; left:80px;" data-ls="offsetxin:0;offsetyin:250;durationin:1000;delayin:500;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;">Let your imagination run wild with Betaexchangeng</h3>
            <h3 class="ls-l subtitle strong-400" style="top:40%; left:80px;" data-ls="offsetxin:0;offsetyin:250;durationin:1000;delayin:1500;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;">Your E-Currency solution</h3>
            <p class="ls-l text-standard" style="width:500px; top:55%; left:80px;" data-ls="offsetxin:0;offsetyin:250;durationin:1000;delayin:2500;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;">
         
            </p>
            
        </div>
        
        <div class="ls-slide" data-ls="transition2d:1;timeshift:-1000;">
            <!-- slide background -->
            <img src="images/bg5.jpg" class="ls-bg" alt="Slide background"/>
            
            <!-- Right Image -->
            <img src="images/bg5.jpg" class="ls-l" style="top:48%; left:70%;" data-ls="offsetxin:0;offsetyin:250;durationin:950;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;" alt="Image layer">
            
            <!-- Left Text -->
            <h3 class="ls-l title" style="width:500px; top:15%; left:80px;" data-ls="offsetxin:0;offsetyin:250;durationin:1000;delayin:500;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;">Betaexchangeng</h3>

           
        </div>
    </div>
</section>

          
    <!-- ==========================
        INTRODUCTION - START 
    =========================== -->
    <section class="content" id="section-introduction">


    </section>
    <!-- ==========================
        INTRODUCTION - END 
    =========================== -->
    
    <!-- ==========================
        PRICING - START 
    =========================== -->
    <div class="cell-xs-12 cell-sm-5 cell-lg-4" style="display:inline; float:center;">
                <div class="product product-n  tab-content"  >
                   <table id="table-cell" class="table" >
                          <tbody><tr style="height:40px">
         <td colspan="3"><div align="center"><h4 class="listt">Price List for today</h4></div></td>
       </tr>
       
       <tr style="height:40px"  >
         <td><b><u>E-currency</u></b></td>
         <td><b><u>BUY</u></b></td>
         <td><b><u>SELL</u></b></td>
       </tr>
       
        <tr style="height:40px">
           <td><img src="{{ URL::to('images/perfectmoney.png')}}" alt="Perfect Money"  style="width: 92px;" border="0" title="Perfect Money"></td>
	
    <td><h3><b><small>&#8358;  {{ $price->perfect_money }}</small></b></h3></td>
    <td><h3><b><small>&#8358; {{ $price->perfect_money_sell }}</small></b></h3></td>
	  
  </tr>  <tr style="height:40px">
<td><img src="{{ URL::to('images/bitcoin1.png')}}" alt="Bitcoin" style="width: 87px;" border="0" title="Bitcoin"></td>

    <td><h3><b><small>&#8358;  {{ $price->bitcoin }}</small></b></h3></td>
    <td><h3><b><small>&#8358; {{ $price->bitcoin_sell }}</small></b></h3></td>
  </tr>      

                          </tbody></table>
                    <!--<div class="group-md offset-top-25"><a href="#" class="btn btn-sm btn-curious-blue-variant-1 min-width-160">More</a></div>-->
                </div>
              </div>
    <!-- ==========================
        PRICING - END 
    =========================== -->

    <!-- ==========================
        RECENT BLOG POSTS - START 
    =========================== -->
    <section class="content" id="section-blog-posts">
        <div class="container">
         
            <div class="row">
                <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2"></div>
                     <div class="col-sm-4">
                    <div class="recent-blog-post" >
                    <img src="{{ URL::to('images/pm.jpg')}}" alt="" class="img-responsive">
                    </div>
                   </div>
                     <div class="col-sm-4">
                    <div class="recent-blog-post" >
                     <img src="{{ URL::to('images/bitcoin.jpg')}}" alt="" class="img-responsive">
                    </div>
                   </div>
                   <div class="col-md-2"></div>
                </div>  
           
                </div>

            </div>
            
            <div class="text-center"><a href="blog2.html" class="btn btn-inverse btn-lg"><i class="fa fa-arrow-circle-down"></i>See more Posts</a></div>
        </div>
    </section>
    <!-- ==========================
        RECENT BLOG POSTS - END 
    =========================== -->
    <!-- ==========================
        FEATURES - START 
    =========================== -->
    <section class="content bg-color-2" id="section-features">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="feature">
                        <i class="fa fa-mobile"></i>
                        <h3>Trusted and Reliable</h3>
                        <p>We are verified by Perfect Money with high trust score as a Trusted and Reliable Exchange Company. No hidden charges whatsoever, CHECK OUR RATES for Perfect Money, Bitcoin, WebMoney, EgoPay, Solid Trust Pay and more.</p>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="feature">
                        <i class="fa fa-trophy"></i>
                        <h3>Best Instant Funding</h3>
                        <p>You can be sure of Speed and Security using our E-Currency Services. Our 24/7 Uptime is 99.9%.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="feature">
                        <i class="fa fa-gear"></i>
                        <h3>Live Customer Support</h3>
                        <p>We have smart and dedicated Customer Support, ready to fund your accounts anywhere, anytime.</p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- ==========================
        FEATURES - END 
    =========================== -->
    
    <!-- ==========================
        SEPARATOR - START 
    =========================== -->
    <section class="content content-separator">
        <div class="container">
          
        </div>
    </section>
    <!-- ==========================
        SEPARATOR - END 
    =========================== -->


<!--leaves end here-->
@endsection
@section('script')
<!-- Sripts for individual pages, depending on what plug-ins are used -->
<script src="{{ asset('js/greensock.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/layerslider.transitions.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/layerslider.kreaturamedia.jquery.js') }}" type="text/javascript"></script>
<!-- Initializing the slider -->
<script>
    jQuery("#layerslider").layerSlider({
        pauseOnHover: true,
        autoPlayVideos: false,
        skinsPath: '/skins/',
        responsive: false,
        responsiveUnder: 1280,
        layersContainer: 1280,
        skin: 'borderlessdark3d',
        hoverPrevNext: true,
    });
</script>

@stop