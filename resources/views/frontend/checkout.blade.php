@extends('frontend.layout.app')
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

            <form id="AddressForm" action='{{route("place-order")}}' method="post">
              {{ csrf_field() }}
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
                        <input type="text" class="form-control" value="{{$shipping->address1}}" name="address1"
                          required>
                      </div>
                      <div class="col-md-6">
                        <label>Address 2</label>
                        <input type="text" class="form-control" value="{{$shipping->address2}}" name="address2"
                          required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-6">
                        <label>City </label>
                        <select required value="{{$shipping->city}}" name="city" class="form-control">
                          @foreach($shippingZones as $city)
                          <option value="{{$city->id}}">{{$city->name}}
                          </option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label>Country</label>
                        <select required id="country" name="country" class="form-control">
                          @foreach($countries as $country)
                          @if($country->name=='Qatar')
                          <option value="{{$country->name}}" selected>{{$country->name}}
                          </option>
                          @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Phone </label>
                        <input type="number" class="form-control" value="{{$shipping->phone}}" name="phone" required>
                      </div>
                      <div class="col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" value="{{$shipping->email}}" name="email" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <h4>Location</h4>
                  </div>
                  <div class="col-md-6">
                    <a class="btn btn-link " style="display:none" id="SelectedLocation"
                      href="https://maps.google.com/?q=25.280336,51.499729" target="blank" />Selected Location</a>
                  </div>
                  <div class="col-md-6">
                    <button class="btn btn-sm rounded text-danger" type="button" style="display:none"
                      onClick="clearSelectedLocation()" id="ClearSelectedLocation">clear</button>
                  </div>
                  <div id="SelectedMap"></div>
                  <div class="col-md-6">
                    <button id="MyLocation" type="button" class="btn-sub mb-4" onClick="getLocation()"><i
                        class="fa fa-dot-circle-o"></i>
                      My Location</button>
                  </div>
                  <div class="col-md-6">
                    <button type="button" data-toggle="modal" data-target="#mapModal" class="btn-sub mb-4"><i
                        class="fa fa-map-marker"></i> <small>Select On Map</small></button>
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
                        <input type="text" class="form-control" name="first_name" required>
                      </div>
                      <div class="col-md-6">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Address 1</label>
                        <input type="text" class="form-control" name="address1" required>
                      </div>
                      <div class="col-md-6">
                        <label>Address 2</label>
                        <input type="text" class="form-control" name="address2" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-6">
                        <label>City </label>
                        <select required id="city" name="city" class="form-control">
                          @foreach($shippingZones as $city)
                          <option value="{{$city->id}}">{{$city->name}}
                          </option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label>Country</label>
                        <select required id="country" name="country" class="form-control">
                          @foreach($countries as $country)
                          @if($country->name=='Qatar')
                          <option selected value="{{$country->name}}">{{$country->name}}
                          </option>
                          @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Phone </label>
                        <input type="number" class="form-control" name="phone" required>
                      </div>
                      <div class="col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <h4>Location</h4>
                  </div>
                  <div class="col-md-6">
                    <a class="btn btn-link " style="display:none" id="SelectedLocation"
                      href="https://maps.google.com/?q=25.280336,51.499729" target="blank" />Selected Location</a>
                  </div>
                  <div class="col-md-6">
                    <button class="btn btn-sm rounded text-danger" type="button" style="display:none"
                      onClick="clearSelectedLocation()" id="ClearSelectedLocation">clear</button>
                  </div>
                  <div id="SelectedMap"></div>
                  <div class="col-md-6">
                    <button id="MyLocation" type="button" class="btn-sub mb-4" onClick="getLocation()"><i
                        class="fa fa-dot-circle-o"></i>
                      My Location</button>
                  </div>
                  <div class="col-md-6">
                    <button type="button" data-toggle="modal" data-target="#mapModal" class="btn-sub mb-4"><i
                        class="fa fa-map-marker"></i> <small>Select On Map</small></button>
                  </div>
                </div>
                {{-- <button type="button" data-toggle="modal" data-target="#mapModal" class="btn-sub mb-4"><i
                    class="fa fa-map-marker"></i> Select Location</button> --}}
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
                        <select name="billing_city" class="form-control">
                          @foreach($shippingZones as $city)
                          <option value="{{$city->id}}">{{$city->name}}
                          </option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label>Country</label>
                        <select required id="billing_country" name="billing_country" class="form-control">
                          @foreach($countries as $country)
                          @if($country->name=='Qatar')
                          <option value="{{$country->name}}" selected>{{$country->name}}
                          </option>
                          @endif
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
                <h4 class="accord__head">Shipping Method</h4>
                <div class="accord__body clearfix">
                  <div class="slct-size">
                    <ul>
                      @foreach ($shippingMethods as $shippingMethod)

                      <li class="clearfix">
                        <div class="radio">
                          <input id="method-{{$shippingMethod->id}}" name="shipping_method_id"
                            value="{{$shippingMethod->id}}" type="radio">
                          <label for="method-{{$shippingMethod->id}}"
                            class="radio-label">{{$shippingMethod->name}}<br />
                            <small>{{$shippingMethod->description}}</small>
                          </label>
                        </div>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </article>

              <article class="accord accord-single">
                <h4 class="accord__head">Delivery Time</h4>
                <div class="accord__body clearfix">
                  <div class="slct-size">
                    <div class="row">
                      <div class="col-md-6"><label>Delivery Date</label><input type="text" name="delivery_date"
                          placeholder="MM/DD/YYYY" class="form-control"></div>

                      <div class="col-md-6"><label>Delivery Time</label><input type="text" name="delivery_time"
                          placeholder="From - To" class="form-control"></div>
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
                          <input id="radio-1" name="payment_method" value="Cash On Delivery" type="radio">
                          <label for="radio-1" class="radio-label">Cash On Delivery</label>
                        </div>
                      </li>
                      <li class="clearfix">
                        <div class="radio">
                          <input id="radio-2" name="payment_method" value="Card" type="radio" checked="">
                          <label for="radio-2" class="radio-label">Debit/Credit Card</label>
                        </div>
                      </li>
                    </ul>
                  </div>

                  <input id="latitude" type="hidden" name="latitude" value="">
                  <input id="longitude" type="hidden" name="longitude" value="">
                  <input id="inCircle" type="hidden" name="inAllowedCircle" value="false">
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
                <li class="clearfix"><span class="text-left">Shipping Charge</span><span
                    class="text-right shipping-updatable">{{Cart::getCondition('shipping charge')?Cart::getCondition('shipping charge')->getValue():0}}
                    QAR</span></li>
                <li class="clearfix"><span class="text-left">Total</span><span
                    class="text-right total-updatable">{{Cart::getTotal()}} QAR</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal" id="mapModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Select Delivery Location</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="map"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Done</button>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
  #map {
    height: 80vh;
    width: 100%;
  }

  #SelectedMap {
    height: 0;
    width: 100%;
  }
</style>

@endsection

@section('scripts')
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDxxgJUmtzK_fXH-MmRuCqEAtUu_lEVoA&callback=initMap"
  type="text/javascript"></script>

<script>
  var map, infoWindow,markers=[];
      function initMap() {
        var latitude = 25.280336
        var longitude = 51.499729
        map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: latitude, lng: longitude},
              zoom: 14
            });

    var clickableMap = google.maps.event.addListener(map, "click", function (event) {
    var latitude = event.latLng.lat();
    var longitude = event.latLng.lng();
    setSelectedLocation( latitude , longitude );
    markers.forEach(mark => {
      remove_circle(mark)
    });
    
    radius = new google.maps.Circle({map: map,
        radius: 10,
        center: event.latLng,
        fillColor: '#777',
        fillOpacity: 0.1,
        strokeColor: '#AA0000',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        draggable: true,    // Dragable
        editable: true      // Resizable
    });
    markers.push(radius)

    // var geocoder= new google.maps.Geocoder()
    var latlng = {lat: latitude, lng: longitude};
    // geocoder.geocode({'location': latlng }, function(results, status){
    //   let inAllowedCircle = JSON.stringify(results).toLowerCase().includes ('al sadd')
    //   if(inAllowedCircle){
    //     $('#inAllowedCircle').val(true)
    //   }else{
    //     $('#inAllowedCircle').val(false)
    //   }
    // });

    // Center of map
    map.panTo(new google.maps.LatLng(latitude,longitude));

});
        infoWindow = new google.maps.InfoWindow;
      }
      function remove_circle(circle) {
    // remove event listers
    google.maps.event.clearListeners(circle, 'click_handler_name');
    google.maps.event.clearListeners(circle, 'drag_handler_name');
    circle.setRadius(0);
    // if polygon:
    // polygon_shape.setPath([]); 
    circle.setMap(null);
}
function getLocation(){
         if (navigator.geolocation) {
          $('#MyLocation').prop('disabled', true).html('Fetching...')
          navigator.geolocation.getCurrentPosition(function(position) {

            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
          
            var lat =pos.lat
            var lng =pos.lng
            $('#latitude').val(lat)
            $('#longitude').val(lng)
            $('#SelectedLocation').attr('href',"https://maps.google.com/?q="+lat+","+lng).show()
            $('#ClearSelectedLocation').show()
            $('#MyLocation').prop('disabled', false).html('<i class="fa fa-dot-circle-o"></i> My Location')
            setSelectedLocation(lat,lng)
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
            $('#MyLocation').prop('disabled', false).html('<i class="fa fa-dot-circle-o"></i> My Location')
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
          $('#MyLocation').prop('disabled', false).html('<i class="fa fa-dot-circle-o"></i> My Location')
        }
      }

      function setSelectedLocation(lat,lng){
        clearSelectedLocation()
        $('#latitude').val(lat)
            $('#longitude').val(lng)
            $('#SelectedLocation').attr('href',"https://maps.google.com/?q="+lat+","+lng).slideDown()
            $('#ClearSelectedLocation').show()
            $('#MyLocation').prop('disabled', false).html('<i class="fa fa-dot-circle-o"></i> My Location')
            // $('#SelectedMap').css('height','200px')
            // var currentMap = new google.maps.Map(document.getElementById('SelectedMap'), {
            //   center: {lat:lat , lng: lng},
            //   zoom: 13
            // });
            // currentMap.setCenter(pos);
      }

      function clearSelectedLocation(){
            $('#latitude').val("")
            $('#longitude').val("")
            $('#SelectedLocation').slideUp()
            $('#ClearSelectedLocation').hide()
            // $('#SelectedMap').css('height','0')
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
</script>


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

  $('select[name=city]').change(function (event) {
    let shippingMethod =  $('input[name=shipping_method_id]:checked').val()
    let shippingZone = $('select[name=city]').val()
    if(shippingMethod && shippingZone){
      getShippingCost(shippingMethod,shippingZone)
    }
  })

  $('input[name=shipping_method_id]').change(function (event) {
    let shippingMethod =  $('input[name=shipping_method_id]:checked').val()
    let shippingZone = $('select[name=city]').val()
    if(shippingMethod && shippingZone){
      getShippingCost(shippingMethod,shippingZone)
    }
  })

  function getShippingCost(method, zone) {
        $.get(`shippingcost/${method}/${zone}`,function (response) {
          if(response){
            $('.subtotal-updatable').text(response.subTotal+" QAR")
            $('.shipping-updatable').text(response.shippingCharge+" QAR")
            $('.total-updatable').text(response.total+" QAR")
          }
        })
      }

  (function(){
    let shippingMethod =  $('input[name=shipping_method_id]:checked').val()
    let shippingZone = $('select[name=city]').val()
    if(!shippingMethod){
      $('input[name=shipping_method_id]').first().attr('checked', true)
      shippingMethod =  $('input[name=shipping_method_id]:checked').val()
    }
    if(shippingMethod && shippingZone){
      getShippingCost(shippingMethod,shippingZone)
    }
    
  })()

</script>
@endsection