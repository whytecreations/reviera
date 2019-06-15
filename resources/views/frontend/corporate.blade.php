@extends('frontend.layout.app')
@section('title','Riveria')

@section('content')



<section class="cclt">
<!--<div class="choco1" data-aos="fade-down"><img src="images/choco3.png" class="img-fluid"></div>
<div class="choco2" data-aos="fade-right" data-aos-delay="300"><img src="images/choco2.png" class="img-fluid"></div>
<div class="choco3" data-aos="fade-down" data-aos-delay="500"><img src="images/choco1.png" class="img-fluid"></div>	-->

	<div class="container">
		<div class="col-md-12">
			<h2 data-aos="fade-up">Corporate rate Tag</h2>
			<h4 data-aos="fade-up">Interested in becoming a preferred Corporate Client at Riviera please fill out form below! <br>

You must initially show a Business Card or other form of Authentication to show your employment within the company  <br> <span>This offer is subject to change at any time without notice.  </span></h4>
			<div class="cclt-sec">
				<div class="row">
					<div class="col-md-12 text-left">
					  <form>
					      <div class="form-group">
					          <div class="row">
					              <div class="col-md-12"><label>Application Form For</label><select class="form-control"><option>Corporate</option><option>Government </option><option>Others</option></select></div>
					          </div>
					      </div>
					      <div class="form-group">
					          <div class="row">
					              <div class="col-md-12"><label>Company Name</label><input type="text" class="form-control"></div>
					          </div>
					      </div>
					      <div class="form-group">
					          <div class="row">
					              <div class="col-md-12"><label>Company Address</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="customRadio" name="example1" value="customEx">
                                        <label class="custom-control-label" for="customRadio">Head office</label>
                                    </div> 
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="customRadio1" name="example1" value="customEx">
                                        <label class="custom-control-label" for="customRadio1">Regional office</label>
                                    </div> 
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="customRadio2" name="example1" value="customEx">
                                        <label class="custom-control-label" for="customRadio2">Others</label>
                                    </div> 
					              <textarea class="form-control"></textarea></div>
					          </div>
					      </div>
					      <div class="form-group">
					          <div class="row">
					              <div class="col-md-6"><label>Number of Employees within the Firm</label><input type="text" class="form-control"></div>
					              <div class="col-md-6"><label>Nature of business</label><input type="text" class="form-control"></div>
					          </div>
					      </div>
					      <div class="form-group">
					          <div class="row">
					              <div class="col-md-6"><label>Name of person in charge of the corporate Section</label><input type="text" class="form-control"></div>
					              <div class="col-md-6"><label>Position</label><input type="text" class="form-control"></div>
					          </div>
					      </div>
					      <div class="form-group">
					          <div class="row">
					              <div class="col-md-6"><label>Email</label><input type="text" class="form-control"></div>
					              <div class="col-md-6"><label>Mobile</label><input type="text" class="form-control"></div>
					          </div>
					      </div>
					      <div class="form-group">
					          <div class="row">
					              <div class="col-md-6"><label>Tel</label><input type="text" class="form-control"></div>
					              <div class="col-md-6"><label>Fax</label><input type="text" class="form-control"></div>
					          </div>
					      </div>
					      <div class="form-group">
					          <div class="row">
					              <div class="col-md-12"><button class="btn-sub"><span>Submit</span></button></div>
					          </div>
					      </div>
					  </form>
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



@endsection
