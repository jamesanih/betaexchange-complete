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
    

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet"  media="all">   
    <link href="{{ asset('css/yamm.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/jquery.bootstrap-touchspin.css') }}" rel="stylesheet"  media="all">
      <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet"  media="all">
   <link href="{{ asset('css/dataTables.responsive.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/creative-brands.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/global-style.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/sky-forms.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/endless.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/layerslider.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" media="all">
   <link href="{{ URL::to('favicon.png')}}" rel="icon" type="image/png">
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
    
    <div id="page-wrapper">
    
  <!-- ==========================
      HEADER - START
    =========================== -->
    <div class="top-header hidden-xs">
      <div class="container">
          <div class="pull-left">
            <div class="header-item"><b><i class="fa fa-whatsapp" aria-hidden="true"></i><b>+234 809 519 3030</b></div>
                <div class="header-item"><i class="fa fa-envelope"></i>info@betaexchangeng.com</div>
                <div class="header-item"><i class="fa fa-phone"></i> (+234) 809-519-3030 , 08038014771</div>
            </div>
            <div class="pull-right">
              <ul class="brands brands-inline brands-tn brands-circle main">
                  <li><a href="https://twitter.com/betaexchangeng"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://www.facebook.com/betaexchangeng-1775811569350999/"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    
  <header class="navbar yamm navbar-default navbar-static-top" >
      <div class="container">
            <div class="navbar-header" >
                <a href="{{ url('/') }}" class="navbar-brand">
                <img src="{{ URL::to('images/logo.png')}}" style="margin-top:10px;width: 80%;">
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></button>
            </div>
            <div class="navbar-collapse collapse navbar-right" >
              <ul class="nav navbar-nav navbar-main-menu">
                                @if (Auth::check())
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
                      @else
                        <li><a class="active" href="{{ url('/') }}" data-hover="Home">Home</a></li>
                        <li><a href="{{ url('about') }}" data-hover="About">About</a></li>
                        
                        <li><a href="{{ url('how-to-sell') }}" data-hover="How to Sell">Sell E-Currency</a></li>
                        <li><a href="{{ url('buy') }}" data-hover="How to Buy">Buy E-Currency</a></li>
                        <li><a href="{{ url('blog') }}" data-hover="Blog">Blog</a></li>
                        <li><a href="{{ url('contact') }}" data-hover="Contact">Contact</a></li> 
                        <li><a href="{{ url('/login') }}" data-hover="login">Signin</a></li>
                         <li><a href="{{ url('/register') }}" data-hover="register">Register</a></li>
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
                        <li><b>info@betaexchangeng.com</b></li>
                        <li>15/17 akowonjo road,</li>
                        <li>Egbeda, Lagos</li>
                        <li><b>+234 809 519 3030, +234 803 801 4771</b></li>
                    </ul>
                </div>
                
                <div class="col-md-4 hidden-xs hidden-sm">
                  <h3><i class="fa fa-envelope"></i>Social Media</h3>
                    <p class="contact-text"></p>
                    
                          <div class="form-group nospace">
                   <ul class="brands brands-inline brands-sm brands-transition brands-circle" >
                      <li style="margin-left: -150px;"><a href="#" class="brands-facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="brands-twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="brands-google-plus"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="brands-linkedin"><i class="fa fa-linkedin"></i></a></li>

                    </ul>
                            </div>
            
                </div>
            </div>
            <div class="footer-bottom">
                <div class="footer-copyright">
                    <p>© Betaexchangeng 2018 All right reserved</p>
                </div>
                <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
                                        <li>
                        <a href="/">Home</a>
                    </li>
                    
                    <li>
                        <a href="{{ url('/about') }}">About us</a>
                    </li>
                    
                     <li>
                        <a href="{{ url('/contact') }}" >Contact </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- ==========================
      FOOTER - END 
    =========================== -->
   
    </div>


    <!-- Scripts -->
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
    <script src="{{ asset('js/parsley.min.js') }}"></script>
    <script src="{{ asset('js/endless_wizard.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    @section('script')
          
    @show
 
</body>
</html>
