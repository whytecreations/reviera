@extends('frontend_ar.layout.app')
@section('title','Riveria')

@section('content')


<section class="gft p-150 pb-100">
	<div class="gft5"><img src="{{asset('images/gft5.png')}}" class="img-fluid"></div>
	<div class="papper" data-aos="fade-left"><img src="{{asset('images/papper.png')}}" class="img-fluid"></div>
	<div class="gft5-2"><img src="{{asset('images/gft5.png')}}" class="img-fluid"></div>
	<div class="box1" data-aos="fade-right"><img src="{{asset('images/box1.png')}}" class="img-fluid"></div>
	<div class="box3" data-aos="fade-left"><img src="{{asset('images/box3.png')}}" class="img-fluid"></div>


	<div class="container">
		<div class="col-md-12">
			<h2 data-aos="fade-up">هدية مجانية
 <br> الأغلفة</h2>
			<h4 data-aos="fade-up">يد ريفييرا تختار أوراق التغليف الفريدة وملحقاتها من جميع أنحاء العالم
العالمية.</h4>
			<div class="gft-sec">
				<div class="row">
					<div class="col-md-12">
						<!--<div class="cclt-img" data-aos="fade-up"><img src="images/chocolate_tp.png" class="img-fluid less-height"></div>-->
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-12" data-aos="fade-up">
			<div class="pdct">

				<div class="col-md-12">

					<div class="row">

						<div class="col-md-12">
							<div class="contents">
								@foreach ($gifts->chunk(3) as $chunks)

								<ul class="clearfix">
									@foreach ($chunks as $gift)
									<li data-aos="fade-up">
										<figure><a href="#" data-toggle="modal" data-target="#modal-{{$gift->id}}">
												<div class="pdct-img">
													<img
														src="{{asset($gift->getMedia('images')->first()!=null?$gift->getMedia('images')->first()->getUrl():'images/logo.png')}}">
													<div class="quick">نظرة سريعة</div>
												</div>
												<figcaption>
													<h5>{{$gift->title_ar?:$gift->title}}</h5>
												</figcaption>
											</a></figure>
									</li>
									@endforeach
								</ul>
								@endforeach
							</div>
						</div>
					</div>


				</div>

			</div>
		</div>
	</div>
</section>


@foreach ($gifts as $gift)
<div class="modal fade" id="modal-{{$gift->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-md" role="document">
		<div class="modal-content">
			<div class="row">

				<div class="col-md-12 no-padding">
					<div class="pd_rgt">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">×</span></button>
						<h4>{{$gift->title_ar?:$gift->title}}</h4>
						<p>{{$gift->description_ar?:$gift->description}}</p>
						<form>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6"><input type="text" class="form-control" placeholder="Name">
									</div>
									<div class="col-md-6"><input type="text" class="form-control" placeholder="Phone">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6"><input type="text" class="form-control" placeholder="Email">
									</div>
									<div class="col-md-6"><select class="form-control">
											<option>اختيار التفاف النمط</option>
											<option>الأغطية النسيج</option>
											<option>صناديق وصناديق</option>
											<option>بطاقات</option>
											<option>الزينة</option>
											<option>طقم هدايا</option>
											<option>بت و بوبز</option>
										</select></div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-12"><textarea class="form-control"
											placeholder="Message"></textarea></div>
								</div>
							</div>
						</form>

						<div class="price">
							<div class="input-group quantity">
								<span class="input-group-btn"><button type="button" class="btn-minus btn-number"
										disabled="disabled" data-type="minus" data-field="quant[1]"><span
											class="fa fa-minus"></span></button></span>
								<input type="text" name="quant[1]" class="input-number" value="1" min="1" max="30">
								<span class="input-group-btn"><button type="button" class="btn-plus btn-number"
										data-type="plus" data-field="quant[1]"><span
											class="fa fa-plus"></span></button></span>
							</div>
							<h5>كمية</h5>
						</div>
						<button class="btn-ac">إرسال</button>
					</div>
				</div>
			</div>



		</div>
	</div>
</div>
@endforeach

@endsection