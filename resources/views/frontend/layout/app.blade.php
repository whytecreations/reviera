<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />

	<title>Riveria Master Florist and Chocolatier</title>

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" media="all" href="{{asset('css/webslidemenu.css')}}" />
	<link rel="stylesheet" href="{{asset('css/aos.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('css/font-awesome.css')}}" type="text/css">
	<link rel="stylesheet" type="text/css" href="{{asset('css/stylesheet.css')}}">

	<script src="{{asset('js/jquery-2.1.0.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>


</head>

<body>

	<header>
		<div class="wsmenucontainer clearfix">
			<div id="overlapblackbg"></div>
			<div class="wsmobileheader clearfix"> <a id="wsnavtoggle" class="animated-arrow"><span></span></a> <a
					href="{{url('/')}}" class="smallogo"><img src="{{asset('images/logo.png')}}" /></a> </div>
			<div class="header">
				<div class="wsmain">
					<div class="smllogo"><a href="{{url('/')}}"><img src="{{asset('images/logo.png')}}" alt="" /></a>
					</div>
					<div class="head-rgt">
						<ul>
							<li><a href="#0" class="cd-btn"><img src="{{asset('images/cart.svg')}}"><span id="cartQty"
										class="cartQty">{{Cart::getTotalQuantity()}}</span></a></li>
							@if(auth()->guard('customer')->check())
							<li><a href="{{url('account')}}"><img src="{{asset('images/user.svg')}}"></a></li>
							@else
							<li><a href="{{url('login')}}"><img src="{{asset('images/user.svg')}}"></a></li>
							@endif
						</ul>
					</div>
					<nav class="wsmenu clearfix">
						<ul class="mobile-sub wsmenu-list">
							<li><a href="{{url('about')}}">About Us</a></li>
							<li><a href="{{url('flowers')}}">FLOWERS</a></li>
							<li><a href="{{url('chocolates')}}">CHOCOLATES</a></li>
							<li><a href="{{url('gift-wrapping')}}">GIFT WRAPPING</a></li>
							<li><a href="{{url('corporate-rate-tag')}}">Corporate Rate</a></li>
							<li><a href="{{url('contact')}}">Contact Us</a></li>
							<li><a href="{{url('ar')}}">العربية</a></li>
						</ul>
					</nav>

				</div>
			</div>

		</div>
	</header>

	@yield('content')
	@include('frontend.layout.cart-sidebar')

	<footer>
		<div class="ftr-tp clearfix">
			<div class="container-fluid">
				<div class="col-md-12">
					<ul>
						<li data-aos="fade-up"><img src="{{asset('images/phn.svg')}}"> <span>Give us a call /
								Whatsapp</span> <br><a href="tel:+974 33750041">+974 33750041</a></li>
						<li data-aos="fade-up"><img src="{{asset('images/lphn.svg')}}"> <span>Give us a call</span>
							<br><a href="tel:+974 44366365">+974 44366365</a></li>
						<li data-aos="fade-up" data-aos-delay="200"><img src="{{asset('images/email.svg')}}">
							<span>E-Mail</span> <br><a
								href="mailto:info@rivieraqatar.com">info@rivieraqatar.com</a></li>
						<li data-aos="fade-up" data-aos-delay="400"><img src="{{asset('images/shp.svg')}}">
							<span>Shop</span> <br><a href="https://goo.gl/maps/MGbCUhV6KWerwCFA7" target="_blank">Location</a></li>
						<li class="flw" data-aos="fade-up" data-aos-delay="600"><img
								src="{{asset('images/share.svg')}}"> <span>Follow On</span> <br><a
								href="https://www.instagram.com/rivieraqatar/" target="_blank"><i
									class="fa fa-instagram"></i></a><a href="https://www.facebook.com/rivieraqatar/" target="_blank"><i
									class="fa fa-facebook"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="ftr-btm">
			<div class="container">
				<div class="col-md-12">
					<ul>
						<li><a href="{{url('contact')}}">Contact Us</a></li>
						{{-- <li><a href="#">Order History</a></li> --}}
						<li><a href="#">Terms & Policies</a></li>
						<li><a href="#">FAQ</a></li>
						<li><a href="#">Privacy Policy</a></li>
					</ul>
					<p>Copyright© 2019 RIVIERA All Rights Reserved. <br> <span>Powered by <a
								href="https://www.whytecreations.com/" target="_blank" rel="dofollow"
								title="Website Design and Developed by Whytecreations">whytecreations</a></span></p>
				</div>
			</div>
		</div>
	</footer>

	<div class="dot">

		<svg viewBox="0 0 150 150" version="1.1" xmlns="http://www.w3.org/2000/svg"
			xmlns:xlink="http://www.w3.org/1999/xlink">

			<path
				d="M75,100 C88.8071187,100 100,88.8071187 100,75 C100,61.1928813 88.8071187,50 75,50 C61.1928813,50 50,61.1928813 50,75 C50,88.8071187 61.1928813,100 75,100 Z">
			</path>

		</svg>


	</div>


	<div class="Growler" id="Growler"
		style="position: fixed; padding: 10px; width: 400px; z-index: 50000; bottom: 0px; right: 0px;display:none;">
	</div>

	{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'signout']) !!}
	<button type="submit">Signout</button>
	{!! Form::close() !!}

	<script type="text/javascript" src="{{asset('js/webslidemenu.js')}}"></script>
	<script src="{{asset('js/jquery.easeScroll.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/aos.js')}}" type="text/javascript"></script>

	@yield('scripts')
	<script src="{{asset('js/main.js')}}"></script>
	<script type="text/javascript">
		$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
	</script>

</body>

</html>