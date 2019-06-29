@extends('frontend_ar.layout.app')
@section('title','Riveria')

@section('content')

<section class="cclt whyte_bg chck">
  <div class="container">
    <div class="col-md-12">
      <h2 data-aos="fade-up">Checkout</h2>
      <h4 data-aos="fade-up">Riviera offers a Variety of Rich Chocolates that cater to an exquisite taste</h4>
    </div>
    <div class="acct">
      <div class="col-md-12">
        <div class="row">

          <div class="col-md-7" data-aos="fade-up">

            @if(!auth()->guard('customer')->check())
            <article class="accord accord-single is-open">
              <h4 class="accord__head">Account DETAILS </h4>
              <div class="accord__body">
                <div class="row">
                  <div class="col-md-4">
                    <h5>Checkout as: </h5>
                    <div class="ckas">
                      <div class="slct-size">
                        <ul>
                          <li class="clearfix">
                            <div class="radio">
                              <input id="GuestRadio" name="checkoutas" type="radio" value="guest" checked="">
                              <label for="GuestRadio" class="radio-label">Guest</label>
                            </div>
                          </li>
                          <li class="clearfix">
                            <div class="radio">
                              <input id="RegisterRadio" name="checkoutas" value="register" type="radio">
                              <label for="RegisterRadio" class="radio-label">Register</label>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-8">
                    <div id="LoginForm">

                      <form method="POST" action="{{ route('customer.login') }}" data-aos="fade-up">
                        {{csrf_field()}}
                        <input type="hidden" name="checkout" value="true">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                        @endif

                        <div class="form-group clearfix">
                          <div class="row">
                            <div class="col-md-12">
                              <input type="email" value="" class="form-control" placeholder="Email" name="email">
                            </div>
                          </div>
                        </div>
                        <div class="form-group clearfix">
                          <div class="row">
                            <div class="col-md-12">
                              <input type="password" class="form-control" placeholder="password" name="password">
                            </div>
                          </div>
                        </div>
                        {{-- <div class="form-group clearfix">
                                        <div class="row">
                                          <div class="col-md-12">
                                            <a href="#">Forgot Your Password</a>
                                          </div>
                                        </div>
                                      </div> --}}
                        <div class="form-group clearfix">
                          <div class="row">
                            <div class="col-md-12">
                              <button class="btn-sub"><span>Login</span></button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>

                    <div id="RegisterForm" style="display: none">
                      <form method="POST" action="{{ route('customer.register') }}" data-aos="fade-up">
                        {{csrf_field()}}
                        <input type="hidden" name="checkout" value="true">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                          <strong>@lang('quickadmin.qa_whoops')</strong>
                          @lang('quickadmin.qa_there_were_problems_with_input'):
                          <br><br>
                          <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                        @endif

                        <div class="form-group clearfix">
                          <div class="row">
                            <div class="col-md-12">
                              <input type="email" class="form-control" placeholder="Email Address" name="email">
                            </div>
                          </div>
                        </div>
                        <div class="form-group clearfix">
                          <div class="row">
                            <div class="col-md-12">
                              <input type="password" class="form-control" placeholder="password" name="password">
                            </div>
                          </div>
                        </div>
                        <div class="form-group clearfix">
                          <div class="row">
                            <div class="col-md-12">
                              <input type="password" class="form-control" placeholder="Confirm password"
                                name="password_confirmation">
                            </div>
                          </div>
                        </div>
                        <div class="form-group clearfix">
                          <div class="row">
                            <div class="col-md-12">
                              <input type="text" class="form-control" placeholder="First Name" name="first_name">
                            </div>
                          </div>
                        </div>
                        <div class="form-group clearfix">
                          <div class="row">
                            <div class="col-md-12">
                              <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                            </div>
                          </div>
                        </div>

                        <div class="form-group clearfix">
                          <div class="row">
                            <div class="col-md-12">
                              <button class="btn-sub"><span>Register</span></button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>


                  </div>

                </div>
              </div>
            </article>
            @endif

            <form id="AddressForm">
              @if(auth()->guard('customer')->check() && count((array)$shipping)!=0 )
              <article id="ShippingInfo" class="accord accord-single">
                <h4 class="accord__head">Shipping Information </h4>
                <div class="accord__body">
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-6">
                        <label>First Name</label>
                        <input type="text" class="form-control" value="{{$shipping->first_name}}" name="first_name">
                      </div>
                      <div class="col-md-6">
                        <label>Last Name</label>
                        <input type="text" class="form-control" value="{{$shipping->last_name}}" name="last_name">
                      </div>
                    </div>
                  </div>
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Address 1</label>
                        <input type="text" class="form-control" value="{{$shipping->address1}}" name="address1">
                      </div>
                      <div class="col-md-6">
                        <label>Address 2</label>
                        <input type="text" class="form-control" value="{{$shipping->address2}}" name="address2">
                      </div>
                    </div>
                  </div>
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-6">
                        <label>City </label>
                        <input type="text" class="form-control" value="{{$shipping->city}}" name="city">
                      </div>
                      <div class="col-md-6">
                        <label>Country</label>
                        <select required id="country" name="country" class="form-control">
                          @foreach($countries as $country)
                          <option value="{{$shipping->country}}" @if($country->name=='Qatar') selected
                            @endif>{{$country->name}}
                          </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Phone </label>
                        <input type="number" class="form-control" value="{{$shipping->phone}}" name="phone">
                      </div>
                      <div class="col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" value="{{$shipping->email}}" name="email">
                      </div>
                    </div>
                  </div>
                </div>
              </article>
              @else
              <article id="ShippingInfo" class="accord accord-single">
                <h4 class="accord__head">Shipping Information </h4>
                <div class="accord__body">
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-6">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="first_name">
                      </div>
                      <div class="col-md-6">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name">
                      </div>
                    </div>
                  </div>
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Address 1</label>
                        <input type="text" class="form-control" name="address1">
                      </div>
                      <div class="col-md-6">
                        <label>Address 2</label>
                        <input type="text" class="form-control" name="address2">
                      </div>
                    </div>
                  </div>
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-6">
                        <label>City </label>
                        <input type="text" class="form-control" name="city">
                      </div>
                      <div class="col-md-6">
                        <label>Country</label>
                        <select required id="country" name="country" class="form-control">
                          @foreach($countries as $country)
                          <option @if($country->name=='Qatar') selected
                            @endif>{{$country->name}}
                          </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Phone </label>
                        <input type="number" class="form-control" name="phone">
                      </div>
                      <div class="col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email">
                      </div>
                    </div>
                  </div>
                </div>
              </article>
              @endif

              <article class="accord accord-single">
                <h4 class="accord__head">Billing Information </h4>
                <div class="form-group clearfix">
                  <div class="row">
                    <div class="col-md-12">
                      <label class="label--checkbox">
                        <input id="SameAsShipping" type="checkbox" class="checkbox" checked="" name="sameAsShipping">
                        Same As Shipping Information</label>
                    </div>
                  </div>
                </div>
                <div id="BillingInfo" class="accord__body" style="display:none">
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-6">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="billing_first_name">
                      </div>
                      <div class="col-md-6">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="billing_last_name">
                      </div>
                    </div>
                  </div>
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Address 1</label>
                        <input type="text" class="form-control" name="billing_address1">
                      </div>
                      <div class="col-md-6">
                        <label>Address 2</label>
                        <input type="text" class="form-control" name="billing_address2">
                      </div>
                    </div>
                  </div>
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-6">
                        <label>City </label>
                        <input type="text" class="form-control" name="billing_city">
                      </div>
                      <div class="col-md-6">
                        <label>Country</label>
                        <select required id="billing_country" name="billing_country" class="form-control">
                          @foreach($countries as $country)
                          <option value="{{$country->name}}" @if($country->name=='Qatar') selected
                            @endif>{{$country->name}}
                          </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Phone </label>
                        <input type="number" class="form-control" name="billing_phone">
                      </div>
                      <div class="col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" name="billing_email">
                      </div>
                    </div>
                  </div>
                </div>
              </article>

              <article class="accord accord-single">
                <h4 class="accord__head">Payment</h4>
                <div class="accord__body clearfix">
                  <div class="slct-size">
                    <ul>
                      <li class="clearfix">
                        <div class="radio">
                          <input id="radio-1" name="payment_method" value="Cash On Delivery" type="radio" checked="">
                          <label for="radio-1" class="radio-label">Cash On Delivery</label>
                        </div>
                      </li>
                      <li class="clearfix">
                        <div class="radio">
                          <input id="radio-2" name="payment_method" value="Card" type="radio">
                          <label for="radio-2" class="radio-label">Debit/Credit Card</label>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <button class="btn-sub" type="submit"><span>Checkout</span></button>
                </div>
              </article>
            </form>
          </div>
          <div class="col-md-5 pl-35" data-aos="fade-up">
            <div class="crt-chck clearfix">
              <ul class="filt">

                @foreach (Cart::getContent() as $item)

                <li class="clearfix" id="{{$item->id}}">
                  <div class="crt-chck-img"><img src="{{asset($item->attributes['image'])}}"></div>
                  <div class="crt-chck-center">
                    <h4>{{$item->name}}</h4>
                    <h5>{{$item->price}} <span>QAR</span></h5>
                    <h5>{{strtoupper($item->attributes['size'])}}</h5>
                  </div>
                  <div class="crt-chck-rgt">
                    <div class="qty">
                      <div class="input-group quantity">
                        <span class="input-group-btn">
                          <button type="button" class="btn-minus btn-number" data-type="minus"
                            data-field="quantity-{{$item->id}}">
                            <span class="fa fa-minus"></span>
                          </button>
                        </span>
                        <input type="text" name="quantity-{{$item->id}}" id="quantity-{{$item->id}}"
                          class="input-number number" value="{{$item->quantity}}" min="1" max="30"
                          onChange="updateQuantity('{{$item->id}}')">
                        <span class="input-group-btn">
                          <button type="button" class="btn-plus btn-number" data-type="plus"
                            data-field="quantity-{{$item->id}}">
                            <span class="fa fa-plus"></span>
                          </button>
                        </span>
                      </div>
                    </div><a href="javascript:void(0)" onClick="removeFromCart('{{$item->id}}')">Remove</a>
                  </div>
                </li>
                @endforeach

              </ul>
            </div>
            <div class="crt-ttl">
              <ul data-aos="fade-up" class="aos-init aos-animate">
                <li class="clearfix"><span class="text-left">Subtotal</span><span
                    class="text-right subtotal-updatable">{{Cart::getSubTotal()}} QAR</span></li>
                <li class="clearfix"><span class="text-left">Total</span><span
                    class="text-right total-updatable">{{Cart::getTotal()}} QAR</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection


@section('scripts')

<script>
  $('input[name=checkoutas]').change(function (event) {
    if($('input[name=checkoutas]:checked').val() === 'guest'){
      $('#RegisterForm').hide()
      $('#LoginForm').show()
    }else{
      $('#RegisterForm').show()
      $('#LoginForm').hide()
    }
  })

  $('#SameAsShipping').change(function(event){
    if($('#SameAsShipping').is(":checked")){
      $('#BillingInfo').hide()
    }else{
      $('#BillingInfo').show()
    }
  })

  $('#AddressForm').submit(function (e) {
    e.preventDefault()

    let data =   $('#AddressForm').serializeArray()
    $.ajax({
      type: "POST",
      url: '{{route("place-order")}}',
      data: data,
      success: function(data){
        document.location.href="{{env('APP_URL','/')}}";
        },
      error:function(){console.log('errr')},
    });
  })

</script>
@endsection