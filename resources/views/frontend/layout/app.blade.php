<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Riveria Master Flourist and Chocolatier</title>

<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="all" href="css/webslidemenu.css" />
<link rel="stylesheet" href="css/aos.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
<link rel="stylesheet" type="text/css" href="css/stylesheet.css">

<script src="js/jquery-2.1.0.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>


</head>

<body>
	
<header>
	<div class="wsmenucontainer clearfix">
    <div id="overlapblackbg"></div>
    <div class="wsmobileheader clearfix"> <a id="wsnavtoggle" class="animated-arrow"><span></span></a> <a href="{{url('/')}}" class="smallogo"><img src="images/logo.png" /></a>  </div>
    <div class="header">
      <div class="wsmain">
        <div class="smllogo"><a href="{{url('/')}}"><img src="images/logo.png" alt=""/></a></div>
        <div class="head-rgt">
        	<ul>
        		<li><a href="#0" class="cd-btn"><img src="images/cart.svg"><span>0</span></a></li>
        		<li><a href="{{url('account')}}"><img src="images/user.svg"></a></li>
        	</ul>
        </div>
        <nav class="wsmenu clearfix">
          <ul class="mobile-sub wsmenu-list">
            <li><a href="{{url('about')}}">About Us</a></li>
            <li><a href="{{url('flowers')}}">FLOWERS</a></li>
            <li><a href="{{url('chocolates')}}">CHOCOLATES</a></li>
            <li><a href="{{url('gift-wrapping')}}">GIFT WRAPPING</a></li>
          </ul>
        </nav>
        
      </div>
    </div>
    
  </div>
</header>

@yield('content')


<footer>
<div class="ftr-tp clearfix">
	<div class="container">
		<div class="col-md-12">
				<ul>
					<li data-aos="fade-up"><img src="images/phn.svg"> <span>Give us a call</span> <br><a href="tel:+974 44366365">+974 44366365</a></li>
					<li data-aos="fade-up" data-aos-delay="200"><img src="images/email.svg"> <span>E-Mail</span> <br><a href="mailto:rivieraqatar@qatar.net.qa">rivieraqatar@qatar.net.qa</a></li>
					<li data-aos="fade-up" data-aos-delay="400"><img src="images/shp.svg"> <span>Opening Hours</span> <br>9AM - 9.30PM </li>
					<li class="flw" data-aos="fade-up" data-aos-delay="600"><img src="images/share.svg"> <span>Follow On</span> <br><a href="https://www.instagram.com/rivieraqatar/" target="_blank"><i class="fa fa-instagram"></i></a><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
				</ul>
	        </div>
		</div>
	</div>
	<div class="ftr-btm">
		<div class="container">
			<div class="col-md-12">
				<ul>
					<li><a href="{{url('contact')}}">Contact Us</a></li>
					<li><a href="#">Order History</a></li>
					<li><a href="#">Terms & Policies</a></li>
					<li><a href="#">FAQ</a></li>
					<li><a href="#">Privacy Policy</a></li>
				</ul>
				<p>Copyright© 2019 RIVERIA All Rights Reserved. <br> <span>Powered by <a href="https://www.whytecreations.com/" target="_blank" rel="dofollow" title="Website Design and Developed by Whytecreations">whytecreations</a></span></p>
			</div>
		</div>
	</div>
</footer>

<div class="dot">

  <svg viewBox="0 0 150 150" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
   
<path d="M75,100 C88.8071187,100 100,88.8071187 100,75 C100,61.1928813 88.8071187,50 75,50 C61.1928813,50 50,61.1928813 50,75 C50,88.8071187 61.1928813,100 75,100 Z"></path>

</svg>
  

</div>

@section('scripts')

<script type="text/javascript" src="js/webslidemenu.js"></script>
<script src="js/jquery.easeScroll.js" type="text/javascript"></script>
<script src="js/aos.js" type="text/javascript"></script>
<script src="js/instafeed.min.js" type="text/javascript"></script>
<script src="js/main.js" ></script>

@show

</body>
</html>
