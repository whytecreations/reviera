@extends('frontend.layout.app')
@section('title','Riveria')

@section('content')


<section class="flwr p-150">
  <div class="leaf1"><img src="{{asset('images/leaf_big.png')}}" class="img-fluid"></div>
    <div class="flower2"  data-aos="fade-right"><img src="{{asset('images/flower2.png')}}" class="img-fluid"></div>
     <div class="flwrimg2"  data-aos="fade-left"><img src="{{asset('images/flower3.png')}}" class="img-fluid"></div>
  <div class="leaf4"><img src="{{asset('images/leaf_small.png')}}" class="img-fluid"></div>
  
  
	<div class="container">
		<div class="col-md-12 ">
			<h2 data-aos="fade-up">Flower <br> Arrangements</h2>
			<h4 data-aos="fade-up">Our master florist design Different Unique Fower Arrangement for every occasion.</h4>
			
		</div>
		
		<div class="col-md-12" data-aos="fade-up">
			<div class="pdct">
			  
			  
			  
			  <div class="col-md-12">
				
				<div class="row">
					<div class="col-md-3">
						<div id="sidebar" class="sidebar">
						 <h3 data-aos="fade-up">Flowers</h3>
						   <ul data-aos="fade-up">
							 @foreach ($flowerCategories  as $flowerCategory)
								<li><a href="{{url('flowers/'.$flowerCategory->slug)}}">{{$flowerCategory->name}}</a></li>
							 @endforeach
						   </ul>
						</div>
					</div>
					<div class="col-md-9">
						<div class="contents">
						@if($flowers->isNotEmpty())
						@foreach ($flowers->chunk(2) as $flowerPair)
							<ul class="clearfix">

							@foreach ($flowerPair as $flower)
									<li data-aos="fade-up">
									<figure><a href="#"  data-toggle="modal" data-target="#modal{{$flower->id}}">
										<div class="pdct-img">
										<img src="{{asset($flower->getMedia('images')->first()!=null?$flower->getMedia('images')->first()->getUrl():'images/logo.png')}}">
										<div class="quick">Quick View</div></div>
										<figcaption><h5>{{$flower->title}}</h5>
										@if($flower->small_price>0)
										<h4>QAR {{$flower->small_price}}</h4>
										@else
										<h4>QAR {{$flower->big_price}}</h4>
										@endif

										<p>{{$flower->description}}</p></figcaption>
									</a></figure>
									</li>
							@endforeach
					    </ul>
						@endforeach
						@endif
				  </div>
					</div>
				</div>
				
					
				</div>
			  
			  
				
			</div>
		</div>
		
	</div>
</section>



@foreach ($flowers as $flower)
<div class="modal fade" id="modal{{$flower->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-lg" role="document">
    <div class="modal-content">
      <form onSubmit="addToCart(event,this)">
			{{csrf_field()}}
			<input type="hidden" name="flower" value="{{$flower->title}}" />
			<input type="hidden" name="flowerId" value="{{$flower->id}}" />
			<input type="hidden" name="small_price" value="{{$flower->small_price}}" />
			<input type="hidden" name="big_price" value="{{$flower->big_price}}" />
			<input type="hidden" name="image" value="{{asset($flower->getMedia('images')->first()->getUrl())}}" />
				<div class="row">
				      	<div class="col-md-6 no-padding">
				      	   <div class="pdct-slider">
				      		<div class="owl-demo owl-carousel owl-theme">
										@foreach($flower->getMedia('images') as $media)
				              <div class="item"><img src="{{ asset($media->getUrl()) }}"></div>
								 		@endforeach
					        </div>
					       </div> 
				      	</div>
				      	<div class="col-md-6 no-padding">
				      	  <div class="pd_rgt">
				      	  	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				      	  	<h4>{{$flower->title}}
								@if(auth()->guard('customer')->check())
								<a href="javascript:void(0);" style="color:tomato" onclick="addFlowerToWishList('{{$flower->id}}')" class="pull-right"><i class="fa fa-shopping-bag"></i></a>
								@endif
								</h4>
				      	  	<p>{{$flower->description}}</p>
				      	  	<h5>Select Size</h5>
				      	  	<div class="slct-size">
				      	  		<ul>
												@if($flower->big_price >0)
				      	  			<li class="clearfix">
										<div class="radio"><input id="radio-1" name="size" value="big" type="radio" checked><label for="radio-1" class="radio-label">Big Size</label></div>
										<span>{{$flower->big_price}} QAR</span>
				                    </li>
										@endif
										@if($flower->small_price >0)
				                    <li class="clearfix">
										<div class="radio"><input id="radio-2" name="size" value="small" type="radio"><label for="radio-2" class="radio-label">Small Size</label></div>
				                        <span>{{$flower->small_price}}  QAR</span>
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
				      	  	<textarea class="form-control" name="note" placeholder="Add a Note"></textarea>
				      	  	<button class="btn-ac" type="submit">Add to Cart</button>
				      	  </div>
				      	</div>
				      </div>
				            
			</form>
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
  url: '{{route("addflowertocart")}}',
  data: $(form).serialize(),
  success: function(){
	  $('.modal').modal('hide');
	  location.reload()},
	error:function(){console.log('err')},
});
}

function addFlowerToWishList(flowerId){
	$.ajax({
  type: "POST",
  url: '{{route("addflowertowishlist")}}',
  data: "flowerId="+flowerId,
  success: function(){
	  $('.modal').modal('hide');
	},
	error:function(){console.log('err')},
});
}
</script>
@endsection