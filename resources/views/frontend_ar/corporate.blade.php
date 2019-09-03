@extends('frontend_ar.layout.app')
@section('title','Riveria')

@section('content')



<section class="cclt">
	<!--<div class="choco1" data-aos="fade-down"><img src="images/choco3.png" class="img-fluid"></div>
<div class="choco2" data-aos="fade-right" data-aos-delay="300"><img src="images/choco2.png" class="img-fluid"></div>
<div class="choco3" data-aos="fade-down" data-aos-delay="500"><img src="images/choco1.png" class="img-fluid"></div>	-->

	<div class="container">
		<div class="col-md-12">
			<h2 data-aos="fade-up">علامة سعر الشركة</h2>
			<h4 data-aos="fade-up">ترغب في أن تصبح عميلاً مفضلاً للشركة في Riviera ، يرجى ملء النموذج
أدناه! <br>

				يجب أن تظهر في البداية بطاقة أعمال أو أي شكل آخر من أشكال المصادقة لإظهار وظيفتك بداخله
الشركة <br> <spanهذا العرض قابل للتغيير في أي وقت دون سابق إنذار.. </span></h4>
			<div class="cclt-sec">
				<div class="row">
					<div class="col-md-12 text-left">
						<form id="CorporateForm">
							<div class="form-group">
								<div class="row">
									<div class="col-md-12"><label>نموذج طلب</label><select
											name="corporate_type" class="form-control">
											<option>الشركات</option>
											<option>الحكومي </option>
											<option>الآخرين</option>
										</select></div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-12"><label>اسم الشركة</label><input name="company_name"
											required type="text" class="form-control"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-12"><label>عنوان الشركة</label>
										<div class="custom-control custom-radio">
											<input id="headOffice" name="address_type" type="radio"
												class="custom-control-input" value="Head Office">
											<label class="custom-control-label" for="headOffice">مدير المكتب رئيس المكتب</label>
										</div>
										<div class="custom-control custom-radio">
											<input type="radio" class="custom-control-input" id="regionalOffice"
												name="address_type" value="Regional Office">
											<label class="custom-control-label" for="regionalOffice">إقليمي
مكتب. مقر. مركز</label>
										</div>
										<div class="custom-control custom-radio">
											<input type="radio" class="custom-control-input" id="Others"
												name="address_type" value="Others">
											<label class="custom-control-label" for="Others">الآخرين</label>
										</div>
										<textarea name="address" class="form-control"></textarea>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6"><label>عدد الموظفين داخل الشركة</label><input
											name="number_of_employees" type="number" class="form-control"></div>
									<div class="col-md-6"><label>طبيعة العمل</label><input
											name="nature_of_business" type="text" class="form-control"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6"><label>اسم الشخص المسؤول عن الشركة
الجزء</label><input name="person_in_charge" type="text"
											class="form-control"></div>
									<div class="col-md-6"><label>موضع</label><input name="position" type="text"
											class="form-control"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6"><label>البريد الإلكتروني</label><input name="email" type="email" required
											class="form-control"></div>
									<div class="col-md-6"><label>التليفون المحمول</label><input name="mobile" type="number"
											class="form-control"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6"><label>الهاتف</label><input name="tel" type="number"
											class="form-control"></div>
									<div class="col-md-6"><label>فاكس</label><input name="fax" type="number"
											class="form-control"></div>
								</div>
							</div>
							<div id="mailStatus">
								<div class="alert" role="alert"></div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-12"><button type="submit" id="SendBtn"
											class="btn-sub"><span>إرسال</span></button></div>
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
          $('#mailStatus div').addClass(status).css('opacity',1).html(message).show().alert();
          window.setTimeout(function() {
				$("#mailStatus div").fadeTo(500, 0).slideUp(500);
			}, 4000);
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
			  document.getElementById("CorporateForm").reset();
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