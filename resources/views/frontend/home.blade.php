@extends('frontend.layout.app')
@section('title','Riveria')

@section('content')


<section class="cclt">
<!--<div class="choco1" data-aos="fade-down"><img src="images/choco3.png" class="img-fluid"></div>-->
<div class="choco2" data-aos="fade-right" data-aos-delay="300"><img src="images/choco2.png" class="img-fluid"></div>
<div class="choco3" data-aos="fade-down" data-aos-delay="500"><img src="images/choco1.png" class="img-fluid"></div>	
<div class="choco5" data-aos="fade-up" ><img src="images/papper.png" class="img-fluid"></div>		

	<div class="container">
		<div class="col-md-12">
			<h2 data-aos="fade-up">Chocolate or Flower?</h2>
			
			<div class="cclt-sec">
				<div class="row">
					<div class="col-md-12">
						<div class="cclt-img" data-aos="fade-up"><img src="images/choco.png"></div>
						<!--<h5 data-aos="fade-up">Lorem Ipsum</h5>-->
						<div class="abox" data-aos="fade-up">
            <a href="{{route('chocolates')}}"><span><img src="images/gift_box.svg"> View Chocolates </span></a>
            <a href="{{route('flowers')}}"><span><img src="images/gift_box.svg"> View Flowers </span></a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<section class="flwr">
 <div class="flwrimg1"  data-aos="fade-down"><img src="images/flower1.png" class="img-fluid"></div>
  <div class="leaf1"><img src="images/leaf_big.png" class="img-fluid"></div>
    <div class="cutting-player"  data-aos="fade-down"  data-aos-delay="300"><img src="images/cutting_player.png" class="img-fluid"></div>
    <div class="cutting"  data-aos="fade-down"  data-aos-delay="300"><img src="images/cutting.png" class="img-fluid"></div>
    <div class="flower2"  data-aos="fade-right"><img src="images/flower2.png" class="img-fluid"></div>
     <div class="flwrimg2"  data-aos="fade-left"><img src="images/flower3.png" class="img-fluid"></div>
  
  
	<div class="container">
		<div class="col-md-12 ">
			<h2 data-aos="fade-up">Flower <br> Arrangements</h2>
			<div class="flwr-sec">
				<div class="row">
					<div class="col-md-6" data-aos="fade-up"><img src="images/flower.png" class="img-fluid"></div>
					<div class="col-md-6">
					  <div class="flwr-txt">
						<p data-aos="fade-up">For your customized flower arrangements please contact us or whatsApp us 00974 33750041</p>
					  </div>
					  
					  
					  <div class="abox" data-aos="fade-up"><a href="{{route('flowers')}}"><span><img src="images/gift_box.svg"> View Flowers</span></a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>








<section class="gft">
   <div class="scissor" data-aos="fade-down"><img src="images/scissor.png" class="img-fluid"></div>
   <div class="tag" data-aos="fade-down"><img src="images/tag.png" class="img-fluid"></div>
   <div class="gft5"><img src="images/gft5.png" class="img-fluid"></div>
   <div class="box1" data-aos="fade-right"><img src="images/box1.png" class="img-fluid"></div>
   <div class="box3" data-aos="fade-left"><img src="images/box3.png" class="img-fluid"></div>
   
	<div class="container">
		<div class="col-md-12">
			<h2 data-aos="fade-up">gift <br> wrappings</h2>
			<div class="gft-sec">
				<div class="row">
					<div class="col-md-5"><div class="wrap-lft" data-aos="fade-up"><img src="images/wraper-dwn.png" class="img-fluid"></div></div>
					<div class="col-md-7">
						<div class="gft-txt">
						<h5 data-aos="fade-up">Lorem Ipsum</h5>
						<p data-aos="fade-up">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
						<p data-aos="fade-up">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
					  </div>
					  
					  <div class="abox" data-aos="fade-up"><a href="{{route('gift-wrapping')}}"><span><img src="images/gift_box.svg"> View Wrap Styles</span></a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="insta clearfix">
   <h3>Instafeed</h3>
	<div id="instafeed"></div>
</section>


@endsection


@section('scripts')
<script src="js/instafeed.min.js" type="text/javascript"></script>
@endsection