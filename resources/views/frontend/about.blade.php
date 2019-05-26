@extends('frontend.layout.app')
@section('title','Riveria')

@section('content')



<section class="cclt">
<!--<div class="choco1" data-aos="fade-down"><img src="images/choco3.png" class="img-fluid"></div>
<div class="choco2" data-aos="fade-right" data-aos-delay="300"><img src="images/choco2.png" class="img-fluid"></div>
<div class="choco3" data-aos="fade-down" data-aos-delay="500"><img src="images/choco1.png" class="img-fluid"></div>	-->

	<div class="container">
		<div class="col-md-12">
			<h2 data-aos="fade-up">About Riviera</h2>
			<h4 data-aos="fade-up">Riviera offers a  Variety of Rich Chocolates that cater to an exquisite taste</h4>
			<div class="cclt-sec">
				<div class="row">
					<div class="col-md-12">
						<div class="cclt-img" data-aos="fade-up"><img src="images/chocolate_tp.png" class="img-fluid less-height"></div>
					</div>
					<p data-aos="fade-up">20 years ago, owner of Riviera have passion for flowers, high end quality of pots, vases and exceptional flower arrangements and outstanding chocolate quality and arrangements.</p>

<p data-aos="fade-up">
We are family owned and operated. We are committed to offer only the finest floral & chocolate arrangements and gifts, backed by service that is friendly and prompt. Because all of our customers are important, our professional staff is dedicated to making your experience a pleasant one. That is why we always go the extra mile to make your floral gift perfect.</p>
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
              <div class="item"><img src="images/chocolate1.jpg"></div>
              <div class="item"><img src="images/chocolate2.jpg"></div>
              <div class="item"><img src="images/chocolate3.jpg"></div>
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
