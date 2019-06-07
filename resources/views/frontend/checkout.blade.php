@extends('frontend.layout.app')
@section('title','Riveria')

@section('content')

<section class="cclt whyte_bg chck">
  <div class="container">
    <div class="col-md-12">
      <h2 data-aos="fade-up">Checkout</h2>
      <h4 data-aos="fade-up">Riviera offers a  Variety of Rich Chocolates that cater to an exquisite taste</h4>
    </div>
    <div class="acct">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-7" data-aos="fade-up">
            <article class="accord accord-single is-open">
              <h4 class="accord__head">Account DETAILS </h4>
              <div class="accord__body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="ckas">
                      <h5>Checkout as:</h5>
                      <div class="slct-size">
                        <ul>
                          <li class="clearfix">
                            <div class="radio">
                              <input id="radio-1" name="radio" type="radio" checked="">
                              <label for="radio-1" class="radio-label">Guest</label>
                            </div>
                          </li>
                          <li class="clearfix">
                            <div class="radio">
                              <input id="radio-2" name="radio" type="radio">
                              <label for="radio-2" class="radio-label">Register</label>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <form>
                      <div class="form-group clearfix">
                        <div class="row">
                          <div class="col-md-12">
                            <input type="text" value="" class="form-control" placeholder="Username">
                          </div>
                        </div>
                      </div>
                      <div class="form-group clearfix">
                        <div class="row">
                          <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="password">
                          </div>
                        </div>
                      </div>
                      <div class="form-group clearfix">
                        <div class="row">
                          <div class="col-md-12">
                            <button class="btn-sub"><span>Login</span></button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </article>
            <article class="accord accord-single">
              <h4 class="accord__head">Billing Information </h4>
              <div class="accord__body">
                <form>
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-6">
                        <label>First Name</label>
                        <input type="text" value="Libin" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <label>Last Name</label>
                        <input type="text" value="KR" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Address 1</label>
                        <input type="text" value="Doha" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <label>Address 2</label>
                        <input type="text" value="Qatar" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-6">
                        <label>City </label>
                        <input type="text" value="Doha" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <label>Country</label>
                        <input type="text" value="Qatar" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Phone </label>
                        <input type="text" value="756320023" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <label>Email</label>
                        <input type="text" value="libinkr@whytecreations.in" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-12">
                        <label class="label--checkbox">
                          <input type="checkbox" class="checkbox" >
                          Shipping in Different Address</label>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </article>
            <article class="accord accord-single">
              <h4 class="accord__head">Payment</h4>
              <div class="accord__body clearfix">
                <div class="slct-size">
                  <ul>
                    <li class="clearfix">
                      <div class="radio">
                        <input id="radio-1" name="radio" type="radio" checked="">
                        <label for="radio-1" class="radio-label">Cash On Delivery</label>
                      </div>
                    </li>
                    <li class="clearfix">
                      <div class="radio">
                        <input id="radio-2" name="radio" type="radio">
                        <label for="radio-2" class="radio-label">Debit/Credit Card</label>
                      </div>
                    </li>
                  </ul>
                </div>
                <form>
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-6">
                        <label>First Name</label>
                        <input type="text" value="Libin" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <label>Last Name</label>
                        <input type="text" value="KR" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Phone </label>
                        <input type="text" value="756320023" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <label>Email</label>
                        <input type="text" value="libinkr@whytecreations.in" class="form-control">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </article>
          </div>
          <div class="col-md-5 pl-35" data-aos="fade-up">
            <div class="crt-chck clearfix">
              <ul class="filt">
                <li class="clearfix">
                  <div class="crt-chck-img"><img src="images/chocolate4.jpg"></div>
                  <div class="crt-chck-center">
                    <h4>Laketown Chocolates</h4>
                    <h5>23 <span>QAR</span></h5>
                  </div>
                  <div class="crt-chck-rgt">
                    <div class="qty">
                      <div class="input-group quantity"> <span class="input-group-btn">
                        <button type="button" class="btn-minus btn-number" disabled="disabled" data-type="minus" data-field="quant[1]"> <span class="fa fa-minus"></span> </button>
                        </span>
                        <input type="text" name="quant[1]" class="input-number number" value="1" min="1" max="30">
                        <span class="input-group-btn">
                        <button type="button" class="btn-plus btn-number" data-type="plus" data-field="quant[1]"> <span class="fa fa-plus"></span> </button>
                        </span> </div>
                    </div>
                    <a href="#">Remove</a> </div>
                </li>
                <li class="clearfix">
                  <div class="crt-chck-img"><img src="images/chocolate4.jpg"></div>
                  <div class="crt-chck-center">
                    <h4>Laketown Chocolates</h4>
                    <h5>23 <span>QAR</span></h5>
                  </div>
                  <div class="crt-chck-rgt">
                    <div class="qty">
                      <div class="input-group quantity"> <span class="input-group-btn">
                        <button type="button" class="btn-minus btn-number" disabled="disabled" data-type="minus" data-field="quant[1]"> <span class="fa fa-minus"></span> </button>
                        </span>
                        <input type="text" name="quant[1]" class="input-number number" value="1" min="1" max="30">
                        <span class="input-group-btn">
                        <button type="button" class="btn-plus btn-number" data-type="plus" data-field="quant[1]"> <span class="fa fa-plus"></span> </button>
                        </span> </div>
                    </div>
                    <a href="#">Remove</a> </div>
                </li>
              </ul>
            </div>
            <div class="crt-ttl">
              <ul data-aos="fade-up" class="aos-init aos-animate">
                <li class="clearfix"><span class="text-left">Subtotal</span><span class="text-right">300 QAR</span></li>
                <li class="clearfix"><span class="text-left">Total</span><span class="text-right">300 QAR</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
