@extends('frontend.layout.app')
@section('title','Riveria')

@section('content')

<section class="gft p-150">
   
	<div class="container">
		<div class="col-md-12">
			<h2 data-aos="fade-up">Cart</h2>
			<h4 data-aos="fade-up">Riviera hand picks its Unique Wrapping Papers and Accessories from all parts of the world.</h4>
		</div>
		
		<div class="crt">
			<div class="col-md-12">
				<div class="table-responsive" data-aos="fade-up">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th align="left">Product</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td width="55%" align="left">
											<div class="wd"><a href="#"><i class="fa fa-heart-o"></i></a><a href="#"><i class="fa fa-trash-o"></i></a></div>
											<div class="crt-img"><img src="images/gift3.jpg"></div>
											<div class="crt-txt"><h5>Candy Box Wrapping</h5></div>
										</td>
										<td width="15%">QAR 100</td>
										<td width="15%"><input type="text" placeholder="1"></td>
										<td width="15%">QAR 100</td>
									</tr>
									<tr>
										<td width="55%" align="left">
											<div class="wd"><a href="#"><i class="fa fa-heart-o"></i></a><a href="#"><i class="fa fa-trash-o"></i></a></div>
											<div class="crt-img"><img src="images/chocolate4.jpg"></div>
											<div class="crt-txt"><h5>Candy Box Wrapping</h5></div>
										</td>
										<td width="15%">QAR 100</td>
										<td width="15%"><input type="text" placeholder="1"></td>
										<td width="15%">QAR 100</td>
									</tr>
									<tr>
										<td width="55%" align="left">
											<div class="wd"><a href="#"><i class="fa fa-heart-o"></i></a><a href="#"><i class="fa fa-trash-o"></i></a></div>
											<div class="crt-img"><img src="images/flower5.jpg"></div>
											<div class="crt-txt"><h5>Candy Box Wrapping</h5></div>
										</td>
										<td width="15%">QAR 100</td>
										<td width="15%"><input type="text" placeholder="1"></td>
										<td width="15%">QAR 100</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="crt-ttl">
							<h5 data-aos="fade-up">Cart total</h5>
							<ul data-aos="fade-up">
								<li class="clearfix"><span class="text-left">Subtotal</span><span class="text-right">300 QAR</span></li>
								<li class="clearfix"><span class="text-left">Total</span><span class="text-right">300 QAR</span></li>
								<li class="clearfix"><span class="text-left">&nbsp;</span><span class="text-right"><a href="#">Proceed to Checkout</a></span></li>
							</ul>
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

@endsection
