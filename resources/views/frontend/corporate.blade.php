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
					  <form id="CorporateForm">
					      <div class="form-group">
					          <div class="row">
					              <div class="col-md-12"><label>Application Form For</label><select name="corporate_type" class="form-control"><option>Corporate</option><option>Government </option><option>Others</option></select></div>
					          </div>
					      </div>
					      <div class="form-group">
					          <div class="row">
					              <div class="col-md-12"><label>Company Name</label><input name="company_name" required  type="text" class="form-control"></div>
					          </div>
					      </div>
					      <div class="form-group">
					          <div class="row">
					              <div class="col-md-12"><label>Company Address</label>
                                    <div class="custom-control custom-radio">
                                        <input id="headOffice" name="address_type"  type="radio" class="custom-control-input" value="Head Office">
                                        <label class="custom-control-label" for="headOffice">Head office</label>
                                    </div> 
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="regionalOffice" name="address_type" value="Regional Office">
                                        <label class="custom-control-label" for="regionalOffice">Regional office</label>
                                    </div> 
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="Others" name="address_type" value="Others">
                                        <label class="custom-control-label" for="Others">Others</label>
                                    </div> 
					              <textarea name="address" class="form-control"></textarea></div>
					          </div>
					      </div>
					      <div class="form-group">
					          <div class="row">
					              <div class="col-md-6"><label>Number of Employees within the Firm</label><input name="number_of_employees" type="number" class="form-control"></div>
					              <div class="col-md-6"><label>Nature of business</label><input name="nature_of_business" type="text" class="form-control"></div>
					          </div>
					      </div>
					      <div class="form-group">
					          <div class="row">
					              <div class="col-md-6"><label>Name of person in charge of the corporate Section</label><input name="person_in_charge" type="text" class="form-control"></div>
					              <div class="col-md-6"><label>Position</label><input name="position" type="text" class="form-control"></div>
					          </div>
					      </div>
					      <div class="form-group">
					          <div class="row">
					              <div class="col-md-6"><label>Email</label><input name="email" type="email" required class="form-control"></div>
					              <div class="col-md-6"><label>Mobile</label><input name="mobile" type="number" class="form-control"></div>
					          </div>
					      </div>
					      <div class="form-group">
					          <div class="row">
					              <div class="col-md-6"><label>Tel</label><input name="tel" type="number" class="form-control"></div>
					              <div class="col-md-6"><label>Fax</label><input name="fax" type="number" class="form-control"></div>
					          </div>
					      </div>
						  <div id="mailStatus" class="alert" role="alert"></div>
					      <div class="form-group">
					          <div class="row">
					              <div class="col-md-12"><button type="submit" id="SendBtn" class="btn-sub"><span>Submit</span></button></div>
					          </div>
					      </div>
					  </form>
					</div>
				

				</div>
				
			</div>
		</div>
		
		
		
	</div>
</section>



@endsection



@section('scripts')
    @parent

    <script type="text/javascript">
	var popup = function(message,status){
          $('#mailStatus').addClass(status).html(message).alert();
          $("#mailStatus").delay(4000).slideUp(200, function() {
			$(this).alert('close');
		});
      };

	  $('#CorporateForm').submit(function(event) {
	    event.preventDefault();
	    $('#SendBtn').html('Sending...</i>');
	    $('#SendBtn').prop('disabled', true);
	    var formData = {
			'corporate_type': $('select[name=corporate_type]').val(),
			'company_name': $('input[name=company_name]').val(),
			'address_type': $('input[name=address_type]').val(),
			'address': $('textarea[name=address]').val(),
			'number_of_employees': $('input[name=number_of_employees]').val(),
			'nature_of_business': $('input[name=nature_of_business]').val(),
			'person_in_charge': $('input[name=person_in_charge]').val(),
			'position': $('input[name=position]').val(),
			'email': $('input[name=email]').val(),
			'mobile': $('input[name=mobile]').val(),
			'tel': $('input[name=tel]').val(),
			'fax': $('input[name=fax]').val(),
	    };
	    var message;
	    $.ajax({
	      type        : 'POST',
	      url         : '{{url('corporate')}}',
	      data        : formData, 
	      dataType    : 'json', // what type of data do we expect back from the server
	      encode          : true,
	      success: function(data){
	        if(data.status=="success"){
	          message= "Thank you! We will contact you soon.";
              popup(message,'alert-success');
	        }
	        else{
	          message= "Sorry! Couldnot send mail.";
              popup(message,'alert-danger');
	        }
	      },
	      error: function(e){
	        message = "Failed! Couldnot send mail.";
            popup(message,'alert-danger');
	      },
	      complete: function(){
	        $('#SendBtn').prop('disabled', false);
	        $('#SendBtn').html('SEND');
	        document.getElementById("CorporateForm").reset();
	      }
	    })
	});

</script>


<script type="text/javascript">
	$.ajaxSetup({
	headers: {
		'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
		}
	});
</script>
@endsection

