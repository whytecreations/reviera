@extends('frontend.layout.app')
@section('title','Riveria')

@section('content')



<section class="cclt whyte_bg">
	<div class="container">
		<div class="col-md-12">
			<h2 data-aos="fade-up">My Account</h2>
			<h4 data-aos="fade-up">Riviera offers a  Variety of Rich Chocolates that cater to an exquisite taste</h4>
		</div>
		
		<div class="acct" data-aos="fade-up">
			
			
			
			<div class="col-md-12">
			<dl class="responsive-tabs clearfix">
				<dt>Account DETAILS </dt>
				<dd >
					<div class="col-md-12 clearfix animated fadeIn">
						<div class="row">
							<div class="col-md-12">
								<form>
                   	<div class="form-group clearfix">
                   		<div class="row">
                   			<div class="col-md-6"><label>First Name</label><input type="text" class="form-control"></div>
                   			<div class="col-md-6"><label>Last Name</label><input type="text" class="form-control"></div>
                   		</div>
                   	</div>
                   	<div class="form-group clearfix">
                   		<div class="row">
                   			<div class="col-md-6"><label>Email</label><input type="text" class="form-control"></div>
                   			<div class="col-md-6"><label>Date of Birth</label><input type="text" placeholder="MM/DD/YYYY" class="form-control"></div>
                   		</div>
                   	</div>
                   	<div class="form-group clearfix">
                   		<div class="row">
                   			<div class="col-md-12"><button class="btn-sub"><span>Save Changes</span></button></div>
                   		</div>
                   	</div>
                   </form>
                   <h5>Change Password</h5>
                   <form>
                   	<div class="form-group clearfix">
                   		<div class="row">
                   			<div class="col-md-6"><label>Current Password</label><input type="password" class="form-control"></div>
                   			<div class="col-md-6"><label>New Password</label><input type="password" class="form-control"></div>
                   		</div>
                   	</div>
                   	<div class="form-group clearfix">
                   		<div class="row">
                   			<div class="col-md-12"><label>Confirm Password</label><input type="password" class="form-control"></div>
                   		</div>
                   	</div>
                   	<div class="form-group clearfix">
                   		<div class="row">
                   			<div class="col-md-12"><button class="btn-sub"><span>Save Changes</span></button></div>
                   		</div>
                   	</div>
                   </form>
							</div>
						</div> 
					</div>
				</dd>
				
				<dt>My Wishlist</dt>
				<dd >
					<div class="col-md-12 clearfix animated fadeIn">
						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive" data-aos="fade-up">
							<table class="table table-bordered">
								
								<tbody>
								@foreach ($wishlists as $wishlist)
									<tr>
										<td width="55%" align="left">
											<div class="crt-img">
											<img src="{{asset($wishlist->product->getMedia('images')->first()!=null?$wishlist->product->getMedia('images')->first()->getUrl():'images/logo.png')}}">
											</div>
											<div class="crt-txt"><h5>{{$wishlist->product->title}}</h5></div>
										</td>
										<td width="15%">QAR {{$wishlist->product->small_price ?$wishlist->product->small_price : $wishlist->product->full_price}}</td>
										<td width="15%">
										<a href="javascript:void(0);" style="color:#925d5c" onclick="wishlistToCart({{$wishlist->id}})" class="pull-right"><i class="fa fa-shopping-bag"></i></a>
										</td>
										<td width="15%"><i class="fa fa-trash-o"></i></td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
                   
							</div>
						</div> 
					</div>
				</dd>
				
				
				<dt>Address Book</dt>
				<dd >
					<div class="col-md-12 clearfix animated fadeIn">
						<div class="row">
							<div class="col-md-12">
								<div class="ana"><a href="#">Add a New Address</a></div>
					<div class="ab">
						<h4>Libin KR</h4>
						<p>P. O. Box: 19190, <br> Near VIP R/A, Doha - Qatar</p>
						<p>Mobile: +974 44416300</p>
						<div class="re">
							<ul>
								<li><a href="#"> <i class="fa fa-close"></i> Remove</a></li>
								<li><a href="#"> <i class="fa fa-edit"></i> Edit</a></li>
							</ul>
						</div>
					</div>
                   
							</div>
						</div> 
					</div>
				</dd>
				
				<dt>Payment Information</dt>
				<dd >
					<div class="col-md-12 clearfix animated fadeIn">
						<div class="row">
							<div class="col-md-12">
								<div class="ana"><a href="#">Add New Card</a></div>
					<div class="ab">
						<div class="pi">
							<ul>
								<li><p><span>Name on Card</span> Libin KR</p></li>
								<li><p><span>Card Number</span> 1452 1298 6574 1287</p></li>
								<li><p><span>Valid Through</span> 02/22</p></li>
								<li><p><span>CVV</span> 201</p></li>
							</ul>
						</div>
						<div class="re">
							<ul>
								<li><a href="#"> <i class="fa fa-close"></i> Remove</a></li>
								<li><a href="#"> <i class="fa fa-edit"></i> Edit</a></li>
							</ul>
						</div>

					</div>
                   
							</div>
						</div> 
					</div>
				</dd>


			</dl>

			</div>
			
			
		</div>
		
	</div>
</section>



@endsection


  <script>
function wishlistToCart(wishlistId){
	$.ajax({
  type: "POST",
  url: '{{route("wishlisttocart")}}',
  data: 'wishlistId='+wishlistId,
  success: function(data){
    location.reload()
    },
	error:function(){console.log('errr')},
});
}
</script>