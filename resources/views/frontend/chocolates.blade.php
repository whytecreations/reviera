@extends('frontend.layout.app')
@section('title','Riveria')

@section('content')


<section class="cclt">
<div class="choco1" data-aos="fade-down"><img src="{{asset('images/choco3.png')}}" class="img-fluid"></div>
<div class="choco2" data-aos="fade-right" data-aos-delay="300"><img src="{{asset('images/choco2.png')}}" class="img-fluid"></div>
<div class="choco3" data-aos="fade-down" data-aos-delay="500"><img src="{{asset('images/choco1.png')}}" class="img-fluid"></div>	

	<div class="container">
		<div class="col-md-12">
			<h2 data-aos="fade-up">Chocolate Seasonal <br> Baskets and Gifts</h2>
			<h4 data-aos="fade-up">Riviera offers a  Variety of Rich Chocolates that cater to an exquisite taste</h4>
			<div class="cclt-sec">
				<div class="row">
					<div class="col-md-12">
						<div class="cclt-img" data-aos="fade-up"><img src="{{asset('images/chocolate_tp.png')}}" class="img-fluid less-height"></div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-md-12" data-aos="fade-up">
			<div class="pdct">
								
				<div class="col-md-12">
	
				<div class="row">
					<div class="col-md-3">
						<div id="sidebar" class="sidebar">
						 <h3 data-aos="fade-up">Chocolate</h3>
						   <ul data-aos="fade-up">
						   		 @foreach ($chocolateCategories  as $chocolateCategory)
									<li><a href="{{url('chocolates/'.$chocolateCategory->slug)}}">{{$chocolateCategory->name}}</a></li>
							 @endforeach
						   </ul>
						</div>
					</div>
					<div class="col-md-9">
						<div class="contents">
							@foreach ($chocolates->chunk(2) as $chocolatePair)
					    <ul class="clearfix">
							@foreach ($chocolatePair as $chocolate)
					    	<li data-aos="fade-up">
								<figure><a href="#"  data-toggle="modal" data-target="#modal{{$chocolate->id}}">
									<div class="pdct-img">
									<img src="{{asset($chocolate->getMedia('images')->first()!=null?$chocolate->getMedia('images')->first()->getUrl():'images/logo.png')}}">
									<div class="quick">Quick View</div></div>
									<figcaption><h5>{{$chocolate->title}}</h5><h4>QAR {{$chocolate->full_price}}</h4><p>{{$chocolate->description}}</p></figcaption>
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


@foreach ($chocolates as $chocolate)
<div class="modal fade" id="modal{{$chocolate->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-lg" role="document">
    <div class="modal-content">
	<form onSubmit="addToCart(event,this)">
			{{csrf_field()}}
			<input type="hidden" name="chocolate" value="{{$chocolate->title}}" />
			<input type="hidden" name="chocolateId" value="{{$chocolate->id}}" />
			<input type="hidden" name="full_price" value="{{$chocolate->full_price}}" />
			<input type="hidden" name="half_price" value="{{$chocolate->half_price}}" />
			<input type="hidden" name="quarter_price" value="{{$chocolate->quarter_price}}" />
			<input type="hidden" name="image" value="{{asset($chocolate->getMedia('images')->first()->getUrl())}}" />
      <div class="row">
      	<div class="col-md-6 no-padding">
      	   <div class="pdct-slider">
      		<div class="owl-carousel owl-theme owl-demo">
              	@foreach($chocolate->getMedia('images') as $media)
              <div class="item"><img src="{{ asset($media->getUrl()) }}"></div>
				 		@endforeach
	        </div>
	       </div> 
      	</div>
      	<div class="col-md-6 no-padding">
      	  <div class="pd_rgt">
      	  	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      	  	      	  	<h4>{{$chocolate->title}}</h4>
      	  	<p>{{$chocolate->description}}</p>
      	  	<h5>Select Size</h5>
      	  	<div class="slct-size">
      	  		<ul>
							@if($chocolate->full_price >0)
      	  			<li class="clearfix">
						<div class="radio"><input id="radio-1" name="size" value="full" type="radio" checked><label for="radio-1" class="radio-label">1KG</label></div>
						<span>{{$chocolate->full_price}} QAR</span>
                    </li>
										@endif
										@if($chocolate->half_price >0)
                    <li class="clearfix">
						<div class="radio"><input id="radio-2" name="size" value="half" type="radio"><label for="radio-2" class="radio-label">1/2 KG</label></div>
                        <span>{{$chocolate->half_price}} QAR</span>
                    </li>
                    @endif
										@if($chocolate->quarter_price >0)
										<li class="clearfix">
						<div class="radio"><input id="radio-3" name="size" value="quarter" type="radio"><label for="radio-3" class="radio-label">1/4 KG</label></div>
                        <span>{{$chocolate->quarter_price}} QAR</span>
                    </li>
										@endif
      	  		</ul>
      	  	</div>
      	  	
      	  	<div class="price">
				<div class="input-group quantity">
					<span class="input-group-btn"><button type="button" class="btn-minus btn-number" disabled="disabled" data-type="minus" data-field="quantity"><span class="fa fa-minus"></span></button></span>
					<input type="number" name="quantity" class="input-number" value="1" min="1" max="30">
					<span class="input-group-btn"><button type="button" class="btn-plus btn-number" data-type="plus" data-field="quantity"><span class="fa fa-plus"></span></button></span>
				</div>
      	  	</div>
      	  	<h5>Add Special Instructions</h5>
      	  	<textarea class="form-control" placeholder="Add a Note"></textarea>
      	  	<button class="btn-ac">Add to Cart</button>
      	  </div>
      	</div>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection

@section('scripts')
<script src="{{asset('js/owl.carousel.js')}}" type="text/javascript"></script>
<script>
function addToCart(e,form){
	e.preventDefault()

	$.ajax({
  type: "POST",
  url: '{{route("addchocolatetocart")}}',
  data: $(form).serialize(),
  success: function(){console.log('suce');$('.modal').modal('hide');location.reload()},
	error:function(){console.log('errr')},
});
}
</script>
@endsection