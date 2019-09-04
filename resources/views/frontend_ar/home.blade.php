@extends('frontend_ar.layout.app')
@section('title','Riveria')

@section('content')


<section class="cclt">
	<!--<div class="choco1" data-aos="fade-down"><img src="images/choco3.png" class="img-fluid"></div>-->
	<div class="choco2" data-aos="fade-right" data-aos-delay="300"><img src="images/choco2.png" class="img-fluid"></div>
	<div class="choco3" data-aos="fade-down" data-aos-delay="500"><img src="images/choco1.png" class="img-fluid"></div>
	<div class="choco5" data-aos="fade-up"><img src="images/papper.png" class="img-fluid"></div>

	<div class="container">
		<div class="col-md-12">
			<h2 data-aos="fade-up"><a href="{{route('ar.chocolates')}}">الشوكولا</a> or <a
					href="{{route('ar.flowers')}}">
					الزهور</a></h2>

			<div class="cclt-sec">
				<div class="row">
					<div class="col-md-12">
						<div class="cclt-img" data-aos="fade-up"><img src="images/choco.png"></div>
						<!--<h5 data-aos="fade-up">Lorem Ipsum</h5>-->
						<div class="abox" data-aos="fade-up">
							<a href="{{route('ar.chocolates')}}"><span><img src="images/gift_box.svg"> عرض الشوكولاتة
								</span></a>
							<a href="{{route('ar.flowers')}}"><span><img src="images/gift_box.svg"> عرض الزهور
								</span></a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<section class="flwr">
	<div class="flwrimg1" data-aos="fade-down"><img src="images/flower1.png" class="img-fluid"></div>
	<div class="leaf1"><img src="images/leaf_big.png" class="img-fluid"></div>
	<div class="cutting-player" data-aos="fade-down" data-aos-delay="300"><img src="images/cutting_player.png"
			class="img-fluid"></div>
	<div class="cutting" data-aos="fade-down" data-aos-delay="300"><img src="images/cutting.png" class="img-fluid">
	</div>
	<div class="flower2" data-aos="fade-right"><img src="images/flower2.png" class="img-fluid"></div>
	<div class="flwrimg2" data-aos="fade-left"><img src="images/flower3.png" class="img-fluid"></div>


	<div class="container">
		<div class="col-md-12 ">
			<h2 data-aos="fade-up">الزهور <br> ترتيبات</h2>
			<div class="flwr-sec">
				<div class="row">
					<div class="col-md-6" data-aos="fade-up"><img src="images/flower.png" class="img-fluid"></div>
					<div class="col-md-6">
						<div class="flwr-txt">
							<p data-aos="fade-up"> من أجل تصميم خاصّ لترتيبات الزهور يُرجى التواصل معنا أو إرسال رسالة
								عبر الواتساب
								00974 33750041
							</p>
						</div>


						<div class="abox" data-aos="fade-up"><a href="{{route('ar.flowers')}}"><span><img
										src="images/gift_box.svg"> View Flowers</span></a></div>
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
			<h2 data-aos="fade-up">الهدايا <br> تغليفات</h2>
			<div class="gft-sec">
				<div class="row">
					<div class="col-md-5">
						<div class="wrap-lft" data-aos="fade-up"><img src="images/wraper-dwn.png" class="img-fluid">
						</div>
					</div>
					<div class="col-md-7">
						<div class="gft-txt">

							<p data-aos="fade-up">ادلي بأناقة مع خدمات تغليف الهدايا المبتكرة والجميلة في قطر. إذا كنت
								تريد أن تبهر عائلتك وأصدقائك المحبوبين ، في اللحظة التي يحصلون فيها على هديتك ، فإن ما
								تحتاج إليه هو القليل من الإلتفاف الإبداعي في تغليف الهدايا. معنا ، يمكنك تصميم شخصية
								التفاف الهدية الخاصة بك بهذه السهولة والسحر والتنسى. استفد من خدمات تغليف الهدايا لجميع
								المناسبات الخاصة بك واحتفالاتك.</p>

						</div>

						<div class="abox" data-aos="fade-up"><a href="{{route('ar.gift-wrapping')}}"><span><img
										src="images/gift_box.svg"> عرض أنماط التفاف</span></a></div>
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
<script src="{{asset('js/instafeed.min.js')}}" type="text/javascript"></script>
@endsection