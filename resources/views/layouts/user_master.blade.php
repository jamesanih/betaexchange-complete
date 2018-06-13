<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="bitcoin,perfect money,bitcoin in Nigeria,Bitcoin,
    Perfect Money,
    perfect money in Nigeria,exchange" />
    <meta name="description" content="Betaexchangeng is a leading Nigerian Bitcoin exchange where users can buy and sell bitcoin, perfect money and other e-currencies with Nigerian Naira at best rate."/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Betaexchangeng - Buy,sell bitcoin and perfect money in Nigeria</title>
    <!--Google Fonts-->
 <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

   
    
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet"  media="all">   
    <link href="{{ asset('css/yamm.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/jquery.bootstrap-touchspin.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/creative-brands.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/global-style.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/sky-forms.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" media="all">
   
   <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet"  media="all">
   <link href="{{ asset('css/dataTables.responsive.css') }}" rel="stylesheet"  media="all">
   
    <link href="{{ asset('css/summernote.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"  media="all">
   <link href="{{ URL::to('favicon.png')}}" rel="icon" type="image/png">
   <script src="{{ asset('source/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('source/jquery.dataTables.min.js') }}"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-102649194-1', 'auto');
  ga('send', 'pageview');

</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/59c232bd4854b82732ff10f8/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</head>
<body>
    <div id="page-wrapper" >
    
  <!-- ==========================
      HEADER - START
    =========================== -->
    <div class="top-header hidden-xs hidden-sm">
      <div class="container">
          <div class="pull-left">
              <div class="header-item"><i class="fa fa-envelope"></i>info@betaexchangeng.com</div>
                <div class="header-item"><i class="fa fa-phone"></i> (+234) 809-519-3030 , 08038014771</div>
            </div>
            <div class="pull-right">
              <ul class="brands brands-inline brands-tn brands-circle main">
                  <li><a href="https://twitter.com/betaexchangeng"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://www.facebook.com/BetaEx17/"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
<!--header-top end here-->
<!--header start here-->
    <!-- NAVBAR
        ================================================== -->

  <header class="navbar yamm navbar-default navbar-static-top" >
      <div class="container">
            <div class="navbar-header" >
               <a href="{{url('userdashboard')}}" class="navbar-brand">
                <img src="{{ URL::to('images/logo.png')}}" class="mylogo" style="width: 80%;">
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></button>
            </div>
            <div class="navbar-collapse collapse navbar-right" >
                <ul class="nav navbar-nav navbar-main-menu">
                    @if (Auth::check())
                        @if(Auth::user()->isAdmin == true)
                            <li><a href="{{ url('/administrator') }}" data-hover="Dashboard">Dashboard</a></li>
                            <li><a href="{{ url('/administrator/customer') }}" data-hover="Buy Bitcoin">Customers</a></li>
                            <li><a href="{{ url('/administrator/bitcoin') }}" data-hover="Sell Bitcoin">Bitcoin</a></li>
                            <li><a href="{{ url('/administrator/perfect-money') }}" data-hover="Buy Perfect Money">Perfect Money</a></li>
                            <li><a href="{{ url('/administrator/sell') }}" data-hover="Sell">Sell</a></li>
                            <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" data-hover="logout">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                </form>
                            </li>
                        @else
                            <li><a href="{{ url('userdashboard') }}" data-hover="Home"> My Dashboard</a></li>
                            <li><a href="{{ url('dashboard/buy-bitcoin') }}" data-hover="Buy Bitcoin">Buy Bitcoin</a></li>

                            <li><a href="{{ url('dashboard/buy-perfect-money') }}" data-hover="Buy Perfect Money">Buy Perfect Money</a></li>
                            <li><a href="{{ url('dashboard/sell_bitcoin') }}" data-hover="Sell E-Currency">Sell E-Currency</a></li>
                            <li><a href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();" data-hover="logout">Logout</a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                              </form>
                            </li>
                        @endif
                    @endif 
                </ul>
            </div>
        </div>
    </header>

  

@yield('content')



  <footer>
      <div class="container">
          <div class="row">
              <div class="col-md-4">
                  <h3><i class="fa fa-flag"></i>About</h3>

                   <p>Betaexchangeng is one the leading e-currency service providers in Lagos, Nigeria, specializing in the buying, selling and exchanging of e-currency in Nigeria.Driven by our vision and we have adopted several mission objectives to achieve this.</p>

                </div>

                <div class="col-md-4 hidden-xs hidden-sm">
                <h3><i class="fa fa-flag"></i>Address</h3>
                    <p class="contact-text">Betaexchangeng</p>
                    <ul class="list-unstyled contact-address">
                      <li>Solaron Plaza Suite B22,</li>
                        <li><a>info@betaexchangeng.com</a></li>
                        <li>15/17 akowonjo road,</li>
                        <li>Egbeda, Lagos</li>
                        <li>+234 809 519 3030, +234 803 801 4771</li>
                    </ul>
                </div>

                <div class="col-md-4 hidden-xs hidden-sm">
                  <h3><i class="fa fa-envelope"></i>Social Media</h3>
                    <p class="contact-text"></p>

                          <div class="form-group nospace">
                   <ul class="brands brands-inline brands-sm brands-transition brands-circle">
                      <li style="margin-left: -150px;"><a href="https://www.facebook.com/BetaEx17/" class="brands-facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com/betaexchangeng" class="brands-twitter"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="http://127.0.0.1:8000/administrator/customer#" class="brands-google-plus"><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href="http://127.0.0.1:8000/administrator/customer#" class="brands-linkedin"><i class="fab fa-linkedin"></i></a></li>

                    </ul>
                            </div>

                </div>
            </div>
            <div class="footer-bottom">
                <div class="footer-copyright">
                    <p>© Betaexchangeng 2017 All right reserved</p>
                </div>
                <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
                                        <li>
                        <a href="http://127.0.0.1:8000/">Home</a>
                    </li>

                    <li>
                        <a href="http://127.0.0.1:8000/about">About us</a>
                    </li>

                     <li>
                        <a href="http://127.0.0.1:8000/contact">Contact </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
<!--footer end here-->
</div>

<div id="gfwg8P6-1525698366040" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: auto !important; position: fixed !important; border: 0px !important; min-height: 0px !important; min-width: 0px !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: auto !important; height: auto !important; z-index: 2000000000 !important; cursor: auto !important; float: none !important; bottom: 0px !important; right: 0px !important; left: auto !important; display: block;">
  <iframe id="XLU5hfA-1525698366041" src="source/saved_resource.html" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: auto !important; right: auto !important; bottom: auto !important; left: auto !important; position: static !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 320px !important; height: 400px !important; z-index: 999999 !important; cursor: auto !important; float: none !important; display: none !important;">
</iframe>
<iframe id="xECY7Av-1525698366050" src="source/saved_resource(1).html" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; padding: 0px !important; transition-property: none !important; z-index: 1000001 !important; cursor: auto !important; float: none !important; height: 40px !important; min-height: 40px !important; max-height: 40px !important; width: 260px !important; min-width: 260px !important; max-width: 260px !important; transform: rotate(0deg) translateZ(0px) !important; transform-origin: 0px center 0px !important; margin: 0px !important; top: auto !important; bottom: 0px !important; right: 10px !important; left: auto !important; display: block !important;">
</iframe>
<iframe id="mblfV7A-1525698366050" src="source/saved_resource(2).html" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; display: none !important; z-index: 1000003 !important; cursor: auto !important; float: none !important; top: auto !important; bottom: 40px !important; right: 10px !important; left: auto !important; width: 260px !important; max-width: 260px !important; min-width: 260px !important; height: 37px !important; max-height: 37px !important; min-height: 37px !important;">
</iframe>
<iframe id="AZwAhAZ-1525698366051" src="source/saved_resource(3).html" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; padding: 0px !important; transition-property: none !important; cursor: auto !important; float: none !important; transform: rotate(0deg) translateZ(0px) !important; transform-origin: 0px center 0px !important; bottom: 44px !important; top: auto !important; right: 69px !important; left: auto !important; width: 142px !important; max-width: 142px !important; min-width: 142px !important; height: 86px !important; max-height: 86px !important; min-height: 86px !important; z-index: 1000002 !important; margin: 0px !important; display: none !important;">
</iframe>
<div id="U1fZGBb-1525698366039" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none rgb(255, 255, 255) !important; opacity: 0 !important; top: 1px !important; bottom: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: auto !important; height: 45px !important; display: block !important; z-index: 999997 !important; cursor: move !important; float: none !important; left: 0px !important; right: 96px !important;">
</div>
<div id="VIZwo1J-1525698366040" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: 96px !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 6px !important; height: 100% !important; display: block !important; z-index: 999998 !important; cursor: w-resize !important; float: none !important;">
</div>
<div id="IzhCANY-1525698366040" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: 0px !important; bottom: auto !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 6px !important; height: 100% !important; display: block !important; z-index: 999998 !important; cursor: e-resize !important; float: none !important;">
</div>
<div id="lkzEuvZ-1525698366040" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: 0px !important; bottom: auto !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 6px !important; display: block !important; z-index: 999998 !important; cursor: n-resize !important; float: none !important;">
</div>
<div id="zbCT2iE-1525698366040" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: auto !important; right: 0px !important; bottom: 0px !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 6px !important; display: block !important; z-index: 999998 !important; cursor: s-resize !important; float: none !important;">
</div>
<div id="kUkWn5m-1525698366041" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999998 !important; cursor: nw-resize !important; float: none !important;">
</div>
<div id="ciyRdZx-1525698366041" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: 0px !important; bottom: auto !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999998 !important; cursor: ne-resize !important; float: none !important;">
</div>
<div id="gYu1K4Y-1525698366041" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: auto !important; right: auto !important; bottom: 0px !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999998 !important; cursor: sw-resize !important; float: none !important;">
</div>
<div id="KT7aovW-1525698366041" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: auto !important; right: 0px !important; bottom: 0px !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999999 !important; cursor: se-resize !important; float: none !important;">
</div>
<div class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 100% !important; display: none !important; z-index: 1000001 !important; cursor: move !important; float: left !important;">
</div>
</div>
</div>
</div>
<iframe src="source/saved_resource(4).html" title="chat widget logging" style="display: none !important;">
</iframe>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/creative-brands.js') }}"></script>
    <script src="{{ asset('js/jquery.countTo.js') }}"></script>
    <script src="{{ asset('js/jquery.countdown.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('js/raphael.min.js') }}"></script>
    <script src="{{ asset('js/morris.min.js') }}"></script>
    <script src="{{ asset('js/summernote.min.js') }}"></script>
     
    <script src="{{ asset('js/angular.js') }}"></script>
    <script  src="{{asset('js/form.js')}}"></script>
    @section('script')
           
    @show
     <script>

   $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
</body>
</html>




