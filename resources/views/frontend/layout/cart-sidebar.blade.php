<div class="cd-panel from-right">
  <div class="cd-panel-header">
    <div class="crt-sec"><img src="images/cart.svg">
      <div class="cnt cartQty">{{Cart::getTotalQuantity()}}</div>
    </div>
    <h1>My Bags</h1>
    <a href="#0" class="cd-panel-close">Close</a>
  </div>
  <div class="cd-panel-container">
    <div class="cd-panel-content">
      <div class="crt-chck clearfix">
        <ul class="filt" id="SidebarCartItems">
          {{-- <li class="clearfix" id="{{$item->id}}">
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
                <input type="text" name="quantity-{{$item->id}}" id="quantity-{{$item->id}}" class="input-number number"
                  value="{{$item->quantity}}" min="1" max="30" onChange="updateQuantity('{{$item->id}}')">
                <span class="input-group-btn">
                  <button type="button" class="btn-plus btn-number" data-type="plus"
                    data-field="quantity-{{$item->id}}">
                    <span class="fa fa-plus"></span>
                  </button>
                </span>
              </div>
            </div><a href="javascript:void(0)" onClick="removeFromCart('{{$item->id}}')">Remove</a>
          </div>
          </li> --}}
        </ul>
      </div>
      <h3 id="subTotalParent">SUBTOTAL <span class="subtotal-updatable" id="subtotal"></span></h3>
      <a id="CheckoutLink" href="{{url('checkout')}}" class="cht">Checkout</a>
      <h3 id="CartEmpty">Cart Empty</span></h3>
    </div>
  </div>
</div>

<script>
  (function() {
  loadCart();
})();

  function removeFromCart(cartId){
	$.ajax({
  type: "POST",
  url: '{{route("removefromcart")}}',
  data: 'cartId='+cartId,
  success: function(data){
    $('#subtotal').text(data+" QAR")
    $('.subtotal-updatable').text(data+" QAR")
    $('.total-updatable').text(data+" QAR")
    $("#"+cartId).remove();
    loadCart( )
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
    $('.subtotal-updatable').text(data+" QAR")
    $('.total-updatable').text(data+" QAR")
    },
	error:function(){console.log('errr')},
});
}

function loadCart() {
  $.ajax({
  type: "GET",
  url: '{{route("getcart")}}',
  success: function(response){
    $('#SidebarCartItems').html('')
    let quantity =0;
    if(response.contents && !Array.isArray(response.contents)){
      let data = response.contents
      Object.values(data).forEach(element => {
        quantity+=Number(element.quantity)
        let item = sidebarSingleItem(element);
        $('#SidebarCartItems').append(item);
      });
      $('#subtotal').text(response.subTotal+" QAR")
      $('#CheckoutLink').show();
      $('#subTotalParent').show();
      $('#CartEmpty').hide();
    }else{
      $('#CartEmpty').show();
      $('#subtotal').text(response.subTotal+" QAR")
      $('#CheckoutLink').hide();
      $('#subTotalParent').hide();
    }
    $(".cartQty").html(quantity)
	  },
	error:function(){console.log('err')},
});
}

function sidebarSingleItem(data) {
	return `<li class="clearfix" id="`+data.id+`">
                <div class="crt-chck-img"><img src="`+data.attributes.image+`"></div>
                <div class="crt-chck-center">
                  <h4>`+data.name+`</h4>
                  <h5>`+data.price+` <span>QAR</span></h5>
                  <h5>`+data.attributes['size']+`</h5>
                  </div>
                  <div class="crt-chck-rgt">
                  <div class="qty">
                  <div class="input-group quantity">
                {{--    <span class="input-group-btn">
                        <button type="button" class="btn-minus btn-number" data-type="minus" data-field="quantity-`+data.id+`">
                        <span class="fa fa-minus"></span>
                        </button>
                    </span> --}}
                    <h6> <span>QTY: </span> `+data.quantity+`</h6>
                    {{-- <input type="text" name="quantity-`+data.id+`" id="quantity-`+data.id+`" class="input-number number" value="`+data.quantity+`" min="1" max="30" >
                    <span class="input-group-btn">
                        <button type="button" class="btn-plus btn-number" data-type="plus" data-field="quantity-`+data.id+`" onClick="quantityBtnClick">
                        <span class="fa fa-plus"></span>
                        </button>
                    </span> --}}
                </div>
                  </div><a href="javascript:void(0)" onClick="removeFromCart('`+data.id+`')">Remove</a>
                </div>
              </li>`
      }


      


</script>