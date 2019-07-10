@extends('frontend.layout.app')
@section('title','Riveria')

@section('content')

<section class="cclt whyte_bg">
  <div class="container">
    <div class="col-md-12">
      <h2 data-aos="fade-up"></h2>
      <div class="alert alert-{{isset($data->type) ?$data->type:'primary'}}" role="alert">
        <h3 class="alert-heading">{{isset($data->title) ?$data->title: ''}}</h3>
        {{isset($data->message) ?$data->message: ''}}<br />
        {{isset($data->description) ?$data->description: ''}}
      </div>
    </div>

  </div>
</section>


@endsection