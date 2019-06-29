@extends('frontend_ar.layout.app')
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
						<li data-aos="fade-up"><i class="fa fa-map-marker"></i>
							<h5>Our Address</h5>
							<p>Al Sadd - main street، Doha, Qatar</p>
						</li>
						<li data-aos="fade-up"><i class="fa fa-phone"></i>
							<h5>Phone Number</h5>
							<p><a href="tel:+974 44366365">+974 44366365</a></p>
						</li>
						<li data-aos="fade-up"><i class="fa fa-envelope-o"></i>
							<h5>Email Address</h5>
							<p><a href="mailto:rivieraqatar@qatar.net.qa">rivieraqatar@qatar.net.qa</a></p>
						</li>
					</ul>
				</div>

				<div class="row">
					<div class="col-md-6" data-aos="fade-up">
						<h5>Drop us a line</h5>
						<form id="ContactForm">
							<div class="form-group clearfix">
								<div class="row">
									<div class="col-md-12"><input name="name" type="text" placeholder="Name"
											class="form-control"></div>
								</div>
							</div>
							<div class="form-group clearfix">
								<div class="row">
									<div class="col-md-6"><input name="email" type="email" placeholder="Email"
											class="form-control"></div>
									<div class="col-md-6"><input name="phone" type="number" placeholder="Phone"
											class="form-control"></div>
								</div>
							</div>
							<div class="form-group clearfix">
								<div class="row">
									<div class="col-md-12"><textarea name="message" class="form-control"
											placeholder="Message"></textarea></div>
								</div>
							</div>

							<div id="mailStatus" class="alert" role="alert"></div>

							<div class="form-group clearfix">
								<div class="row">
									<div class="col-md-12"><button id="SendBtn"
											class="btn-sub"><span>Send</span></button></div>
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-6" data-aos="fade-up">
						<div class="gmap"><iframe
								src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12135.28808654162!2d51.49351371571948!3d25.275875283373335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e45dac473ad5f6b%3A0x9c7430ee4b0ac97b!2sRiviera!5e0!3m2!1sen!2sus!4v1558512754415!5m2!1sen!2sus"
								width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
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
          $('#mailStatus').addClass(status).html(message).show().alert();
          window.setTimeout(function() {
				$("#mailStatus").fadeTo(500, 0).slideUp(500);
			}, 4000);
      };

	  $('#ContactForm').submit(function(event) {
	    event.preventDefault();
	    $('#SendBtn').html('Sending...</i>');
	    $('#SendBtn').prop('disabled', true);
	    var formData = {
	      'name'    : $('select[name=name]').val(),
	      'email'      : $('input[name=email]').val(),
	      'phone'      : $('input[name=phone]').val(),
	      'message'    : $('input[name=message]').val()
	    };
	    var message;
	    $.ajax({
	      type        : 'POST',
	      url         : '{{url('contact')}}',
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
	        document.getElementById("ContactForm").reset();
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