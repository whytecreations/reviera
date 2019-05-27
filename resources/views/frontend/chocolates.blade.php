@extends('frontend.layout.app')
@section('title','Riveria')

@section('content')


<section class="cclt">
<div class="choco1" data-aos="fade-down"><img src="images/choco3.png" class="img-fluid"></div>
<div class="choco2" data-aos="fade-right" data-aos-delay="300"><img src="images/choco2.png" class="img-fluid"></div>
<div class="choco3" data-aos="fade-down" data-aos-delay="500"><img src="images/choco1.png" class="img-fluid"></div>	

	<div class="container">
		<div class="col-md-12">
			<h2 data-aos="fade-up">Chocolate Seasonal <br> Baskets and Gifts</h2>
			<h4 data-aos="fade-up">Riviera offers a  Variety of Rich Chocolates that cater to an exquisite taste</h4>
			<div class="cclt-sec">
				<div class="row">
					<div class="col-md-12">
						<div class="cclt-img" data-aos="fade-up"><img src="images/chocolate_tp.png" class="img-fluid less-height"></div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-md-12" data-aos="fade-up">
			<div class="pdct">
			  <div class="row">
			  	<div class="col-md-12">
			  		
			  		<div class="srt">
						<div class="sel sel--black-panther">
							<select name="select-profession" id="select-profession">
								<option value="" disabled>Sort By</option>
								<option value="">Price Low to High</option>
								<option value="">Price High to Low</option>
								<option value="">Popularity</option>
								<option value="">Newest First</option>
							</select>
						</div>
			  		</div>
			  	</div>
			  </div>
								
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
						@if($chocolates->isNotEmpty())
							@foreach ($chocolates->chunk(2) as $chocolatePair)
					    <ul class="clearfix">
							@foreach ($chocolatePair as $chocolate)
					    	<li data-aos="fade-up">
								<figure><a href="#"  data-toggle="modal" data-target="#modal{{$chocolate->id}}">
									<div class="pdct-img">
									<img src="{{$flower->getMedia('images')->first()!=null?$flower->getMedia('images')->first()->getUrl():'images/logo.png'}}">
									<div class="quick">Quick View</div></div>
									<figcaption><h5>{{$chocolate->title}}</h5><h4>QAR {{$chocolate->price}}</h4><p>{{$chocolate->description}}</p></figcaption>
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


@foreach ($chocolates as $chocolate)
<div class="modal fade" id="modal{{$chocolate->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-lg" role="document">
    <div class="modal-content">
      <div class="row">
      	<div class="col-md-6 no-padding">
      	   <div class="pdct-slider">
      		<div id="owl-demo" class="owl-carousel owl-theme">
              	@foreach($chocolate->getMedia('images') as $media)
              <div class="item"><img src="{{ $media->getUrl() }}"></div>
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
      	  			<li class="clearfix">
						<div class="radio"><input id="radio-1" name="radio" type="radio" checked><label for="radio-1" class="radio-label">Big Size</label></div>
						<span>1000.00 QAR</span>
                    </li>
                    <li class="clearfix">
						<div class="radio"><input id="radio-2" name="radio" type="radio"><label for="radio-2" class="radio-label">Small Size</label></div>
                        <span>800.00 QAR</span>
                    </li>
                    
      	  		</ul>
      	  	</div>
      	  	
      	  	<div class="price">
				<div class="input-group quantity">
					<span class="input-group-btn"><button type="button" class=" btn-minus btn-number" disabled="disabled" data-type="minus" data-field="quant[1]"><span class="fa fa-minus"></span></button></span>
					<input type="text" name="quant[1]" class="input-number" value="1" min="1" max="30">
					<span class="input-group-btn"><button type="button" class=" btn-plus btn-number" data-type="plus" data-field="quant[1]"><span class="fa fa-plus"></span></button></span>
				</div>
     	  	  <h5>1000.00 <span>QAR</span></h5>
      	  	</div>
      	  	<h5>Add Special Instructions</h5>
      	  	<textarea class="form-control" placeholder="Add a Note"></textarea>
      	  	<button class="btn-ac">Add to Cart</button>
      	  </div>
      	</div>
      </div>
      @endforeach
      
      
    </div>
  </div>
</div>


<div class="cd-panel from-right">
		<div class="cd-panel-header">
			<div class="crt-sec"><img src="images/cart.svg"><div class="cnt">01</div></div><h1>My Bags</h1>
			<a href="#0" class="cd-panel-close">Close</a>
		</div>
		<div class="cd-panel-container">
			<div class="cd-panel-content">
				<div class="crt-chck clearfix">
            <ul class="filt">
              <li class="clearfix">
                <div class="crt-chck-img"><img src="images/chocolate4.jpg"></div>
                <div class="crt-chck-center">
                  <h4>Laketown Chocolates</h4>
                  <h5>23 <span>QAR</span></h5>
                  </div>
                  <div class="crt-chck-rgt">
                  <div class="qty">
    <div class="input-group quantity">
                    <span class="input-group-btn">
                        <button type="button" class="btn-minus btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                        <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    <input type="text" name="quant[1]" class="input-number number" value="1" min="1" max="30">
                    <span class="input-group-btn">
                        <button type="button" class="btn-plus btn-number" data-type="plus" data-field="quant[1]">
                        <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
                  </div><a href="#">Remove</a>
                </div>
              </li>
              
              <li class="clearfix">
                <div class="crt-chck-img"><img src="images/chocolate4.jpg"></div>
                <div class="crt-chck-center">
                  <h4>Laketown Chocolates</h4>
                  <h5>23 <span>QAR</span></h5>
                  </div>
                  <div class="crt-chck-rgt">
                  <div class="qty">
    <div class="input-group quantity">
                    <span class="input-group-btn">
                        <button type="button" class="btn-minus btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                        <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    <input type="text" name="quant[1]" class="input-number number" value="1" min="1" max="30">
                    <span class="input-group-btn">
                        <button type="button" class="btn-plus btn-number" data-type="plus" data-field="quant[1]">
                        <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
                  </div><a href="#">Remove</a>
                </div>
              </li>
              
            </ul>
          </div>
                <h3>SUBTOTAL  <span>260 Qar</span></h3>
                <a href="{{url('checkout')}}" class="cht">Checkout</a>
			</div> 
		</div> 
	</div>



@endsection
