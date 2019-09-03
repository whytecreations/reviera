@extends('frontend_ar.layout.app')
@section('title','Riveria')

@section('content')

<section class="cclt whyte_bg">
  <div class="container">
    <div class="col-md-12">
      <h2 data-aos="fade-up">تسجيل الدخول</h2>
      <h4 data-aos="fade-up">يقدم فندق Riviera مجموعة متنوعة من الشوكولاتة الغنية التي تناسب ذوقك الرائع</h4>
    </div>

    <div class="acct">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <form method="POST" action="{{ route('customer.login') }}" class="login" data-aos="fade-up">
              {{csrf_field()}}

              @if (count($errors) > 0)
              <div class="alert alert-danger">
                <strong>@lang('quickadmin.qa_whoops')</strong> @lang('quickadmin.qa_there_were_problems_with_input'):
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
                    <input type="email" value="" class="form-control" placeholder="البريد الإلكتروني" name="email">
                  </div>
                </div>
              </div>
              <div class="form-group clearfix">
                <div class="row">
                  <div class="col-md-12">
                    <input type="password" class="form-control" placeholder="كلمه السر" name="password">
                  </div>
                </div>
              </div>
              {{-- <div class="form-group clearfix">
                        <div class="row">
                          <div class="col-md-12">
                            <a href="#">نسيت رقمك السري</a>
                          </div>
                        </div>
                      </div> --}}
              <div class="form-group clearfix">
                <div class="row">
                  <div class="col-md-12">
                    <button class="btn-sub"><span>تسجيل الدخول</span></button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-6">
            <div class="lgn-rgt" data-aos="fade-up">
              <h4>أليس لديك حساب؟</h4>
              <button class="btn-sub"
                onclick="window.location.href='{{url('register')}}'"><span>تسجيل</span></button>
            </div>
          </div>
        </div>



      </div>
    </div>

  </div>
</section>


@endsection