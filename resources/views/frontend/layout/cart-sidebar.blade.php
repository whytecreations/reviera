<div class="cd-panel from-right">
		<div class="cd-panel-header">
			<div class="crt-sec"><img src="images/cart.svg"><div class="cnt">{{Cart::getContent()->count()}}</div></div><h1>My Bags</h1>
			<a href="#0" class="cd-panel-close">Close</a>
		</div>
		<div class="cd-panel-container">
			<div class="cd-panel-content">
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
                        <button type="button" class="btn-minus btn-number" data-type="minus" data-field="quantity-{{$item->id}}">
                        <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    <input type="text" name="quantity-{{$item->id}}" id="quantity-{{$item->id}}" class="input-number number" value="{{$item->quantity}}" min="1" max="30" onChange="updateQuantity('{{$item->id}}')">
                    <span class="input-group-btn">
                        <button type="button" class="btn-plus btn-number" data-type="plus" data-field="quantity-{{$item->id}}">
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
          @if(Cart::getContent()->count()>0)
                <h3>SUBTOTAL  <span id="subtotal">{{Cart::getSubTotal()}} QAR</span></h3>
                <a href="{{url('checkout')}}" class="cht">Checkout</a>
                @else
                <h3>Cart Empty</span></h3>
                @endif
			</div> 
		</div> 
	</div>

  <script>
function removeFromCart(cartId){
	$.ajax({
  type: "POST",
  url: '{{route("removefromcart")}}',
  data: 'cartId='+cartId,
  success: function(data){
    $('#subtotal').text(data+" QAR")
  $("#"+cartId).remove();
  },
	error:function(){console.log('errr')},
});
}

function updateQuantity(cartId){
  let quantity = $('#quantity-'+cartId).val()
	$.ajax({
  type: "POST",
  url: '{{route("updatequantity")}}',
  data: 'cartId='+cartId+'&quantity='+quantity,
  success: function(data){
    $('#subtotal').text(data+" QAR")
    console.log('success');
    },
	error:function(){console.log('errr')},
});
}
</script>