@extends('frontend_ar.layout.app')
@section('title','Riveria')

@section('content')



<section class="cclt whyte_bg">
	<div class="container">
		<div class="col-md-12">
			<h2 data-aos="fade-up">My Account</h2>
			<h4 data-aos="fade-up">Riviera offers a Variety of Rich Chocolates that cater to an exquisite taste</h4>
		</div>

		<div class="acct" data-aos="fade-up">



			<div class="col-md-12">
				<dl class="responsive-tabs clearfix">
					<dt>Account DETAILS </dt>
					<dd>
						<div class="col-md-12 clearfix animated fadeIn">
							<div class="row">
								<div class="col-md-12">
									<form method="POST" action="{{ route('customer.changedetails') }}">
										{{csrf_field()}}
										<div class="form-group clearfix">
											<div class="row">
												<div class="col-md-6"><label>First Name</label><input type="text"
														name="first_name" value="{{$customer->first_name}}"
														class="form-control"></div>
												<div class="col-md-6"><label>Last Name</label><input type="text"
														name="last_name" value="{{$customer->last_name}}"
														class="form-control"></div>
											</div>
										</div>
										<div class="form-group clearfix">
											<div class="row">
												<div class="col-md-6"><label>Email</label><input type="email"
														name="email" value="{{$customer->email}}" class="form-control">
												</div>
												<div class="col-md-6"><label>Date of Birth</label><input type="text"
														name="dob" value="{{$customer->dob}}" placeholder="MM/DD/YYYY"
														class="form-control"></div>
											</div>
										</div>
										<div class="form-group clearfix">
											<div class="row">
												<div class="col-md-12"><button type="submit" class="btn-sub"><span>Save
															Changes</span></button></div>
											</div>
										</div>
									</form>
									<h5>Change Password</h5>
									<form method="POST" action="{{ route('customer.changepassword') }}">
										{{csrf_field()}}
										<div class="form-group clearfix">
											<div class="row">
												<div class="col-md-6"><label>Current Password</label><input
														type="password" name="current_password" class="form-control">
												</div>
												<div class="col-md-6"><label>New Password</label><input type="password"
														name="new_password" class="form-control"></div>
											</div>
										</div>
										<div class="form-group clearfix">
											<div class="row">
												<div class="col-md-12"><label>Confirm Password</label><input
														type="password" name="confirm_password" class="form-control">
												</div>
											</div>
										</div>
										<div class="form-group clearfix">
											<div class="row">
												<div class="col-md-12"><button class="btn-sub"><span>Save
															Changes</span></button></div>
											</div>
										</div>
									</form>

									{{-- <div class="form-group clearfix">
										<div class="row">
											<div class="col-md-12"><button onclick="$('#signout').submit();"
													class="btn-sub"><span>Logout</span></button></div>
										</div>
									</div> --}}
								</div>
							</div>
						</div>
					</dd>

					<dt>My Wishlist</dt>
					<dd>
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
															<img
																src="{{asset($wishlist->product->getMedia('images')->first()!=null?$wishlist->product->getMedia('images')->first()->getUrl():'images/logo.png')}}">
														</div>
														<div class="crt-txt">
															<h5>{{$wishlist->product->title}}</h5>
														</div>
													</td>
													<td width="15%">QAR
														{{$wishlist->product->small_price?$wishlist->product->small_price : $wishlist->product->big_price}}
													</td>
													<td width="15%">
														<a href="javascript:void(0);" style="color:#925d5c"
															onclick="wishlistToCart({{$wishlist->id}})"
															class="pull-right"><i class="fa fa-shopping-bag"></i></a>
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
					<dd>
						<div class="col-md-12 clearfix animated fadeIn">
							<div class="row">
								<div class="col-md-12">
									{{-- <div class="ana"><a href="#">Add a New Address</a></div> --}}
									@if($addresses!=null)
									@foreach ($addresses as $address)
									<div class="ab">
										<h4>{{$address->first_name}} {{$address->last_name}} </h4>
										<p> {{$address->address1}}<br> {{$address->address2}}, {{$address->city}} -
											{{$address->country}}</p>
										<p>Mobile: {{$address->phone}}</p>
										<p>Email: {{$address->email}}</p>
										{{-- <div class="re">
											<ul>
												<li><a href="#"> <i class="fa fa-close"></i> Remove</a></li>
												<li><a href="#"> <i class="fa fa-edit"></i> Edit</a></li>
											</ul>
										</div> --}}
									</div>
									@endforeach
									@endif
								</div>
							</div>
						</div>
					</dd>

					<dt>My Orders</dt>
					<dd>
						<div class="col-md-12 clearfix animated fadeIn">
							<div class="row">
								@foreach ($myorders as $order)
								<div class="col-md-12">
									<div class="ab">
										<div class="pi">
											<ul>
												<li>
													<p><span>Order Reference Number</span>
														{{$order->created_at->format('Ymd').$order->id}}</p>
												</li>
												<li>
													<p><span>Payment Method</span>{{$order->payment_method}}</p>
												</li>


												<li class="order-item">
													<p><span>Items</span>
														<div class="table-responsive" data-aos="fade-up">
															<table class="table table-bordered">

																<tbody>
																	@foreach ($order->orderDetails as $detail)
																	<tr>
																		<td width="55%" align="left">
																			<div class="crt-img">
																				<img
																					src="{{asset($detail->product->getMedia('images')->first()!=null?$detail->product->getMedia('images')->first()->getUrl():'images/logo.png')}}">
																			</div>
																			<div class="crt-txt">
																				<h5>{{$detail->product->title}}</h5>
																			</div>
																		</td>
																		<td width="15%">QAR
																			{{$detail->product->small_price ?$detail->product->small_price : $detail->product->big_price}}
																		</td>
																	</tr>
																	@endforeach
																</tbody>
															</table>
														</div>
													</p>
												</li>
												<li> </li>

												<li>
													<p><span>Shipping
															Address</span>{!! $order->shipping_address->readable() !!}
													</p>
												</li>
												<li>
													<p><span>Billing Address</span>{!!
														$order->shipping_address->readable() !!}
													</p>
												</li>
												<li>
													<p><span>Total Amount</span>QAR {{ $order->amount}}</p>
												</li>
												<li>
													<p><span>Status</span>{{$order->status}}</p>
												</li>
											</ul>
										</div>
										{{-- <div class="re">
											<ul>
												<li><a href="#"> <i class="fa fa-close"></i> Remove</a></li>
												<li><a href="#"> <i class="fa fa-edit"></i> Edit</a></li>
											</ul>
										</div> --}}

									</div>
								</div>
								@endforeach
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