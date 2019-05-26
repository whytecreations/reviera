@extends('frontend.layout.app')
@section('title','Riveria')

@section('content')


<section class="flwr p-150 whyte_bg">
  
  
	<div class="container">
		<div class="col-md-12">
			<h2 data-aos="fade-up">Contact Us</h2>
			<h4 data-aos="fade-up">Our master florist design Different Unique Fower Arrangement for every occasion.</h4>
		</div>
		
		<div class="con">
			<div class="col-md-12">
			   
			    <div class="con-sec clearfix">
			    	<ul>
			    		<li data-aos="fade-up"><i class="fa fa-map-marker"></i><h5>Our Address</h5><p>Al Sadd - main street، Doha, Qatar</p></li>
			    		<li data-aos="fade-up"><i class="fa fa-phone"></i><h5>Phone Number</h5><p><a href="tel:+974 44366365">+974 44366365</a></p></li>
			    		<li data-aos="fade-up"><i class="fa fa-envelope-o"></i><h5>Email Address</h5><p><a href="mailto:rivieraqatar@qatar.net.qa">rivieraqatar@qatar.net.qa</a></p></li>
			    	</ul>
			    </div>
			    
				<div class="row">
					<div class="col-md-6" data-aos="fade-up">
						<h5>Drop us a line</h5>
						<form>
							<div class="form-group clearfix">
								<div class="row"><div class="col-md-12"><input type="text" placeholder="Name" class="form-control"></div></div>
							</div>
							<div class="form-group clearfix">
								<div class="row"><div class="col-md-6"><input type="text" placeholder="Email" class="form-control"></div><div class="col-md-6"><input type="text" placeholder="Phone" class="form-control"></div></div>
							</div>
							<div class="form-group clearfix">
								<div class="row"><div class="col-md-12"><textarea class="form-control" placeholder="Message"></textarea></div></div>
							</div>
							<div class="form-group clearfix">
								<div class="row"><div class="col-md-12"><button class="btn-sub"><span>Submit</span></button></div></div>
							</div>
						</form>
					</div>
					<div class="col-md-6" data-aos="fade-up">
						<div class="gmap"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12135.28808654162!2d51.49351371571948!3d25.275875283373335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e45dac473ad5f6b%3A0x9c7430ee4b0ac97b!2sRiviera!5e0!3m2!1sen!2sus!4v1558512754415!5m2!1sen!2sus" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe></div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</section>



<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-lg" role="document">
    <div class="modal-content">
      <div class="row">
      	<div class="col-md-6 no-padding">
      	   <div class="pdct-slider">
      		<div id="owl-demo" class="owl-carousel owl-theme">
              <div class="item"><img src="images/flower1.jpg"></div>
              <div class="item"><img src="images/flower2.jpg"></div>
              <div class="item"><img src="images/flower3.jpg"></div>
	        </div>
	       </div> 
      	</div>
      	<div class="col-md-6 no-padding">
      	  <div class="pd_rgt">
      	  	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      	  	<h4>Laketown Chocolates</h4>
      	  	<p>A traditional Chocolate to keep you energized whole day.</p>
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
					<span class="input-group-btn"><button type="button" class="btn btn-minus btn-number" disabled="disabled" data-type="minus" data-field="quant[1]"><span class="fa fa-minus"></span></button></span>
					<input type="text" name="quant[1]" class="input-number" value="1" min="1" max="30">
					<span class="input-group-btn"><button type="button" class="btn btn-plus btn-number" data-type="plus" data-field="quant[1]"><span class="fa fa-plus"></span></button></span>
				</div>
     	  	  <h5>1000.00 <span>QAR</span></h5>
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
