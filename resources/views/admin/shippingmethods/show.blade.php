@extends('layouts.app')

@section('content')
<h3 class="page-title">@lang('quickadmin.shippingmethods.title')</h3>

<div class="panel panel-default">
    <div class="panel-heading">
        @lang('quickadmin.qa_view')
    </div>

    <div class="panel-body table-responsive">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>@lang('quickadmin.shippingmethods.fields.name')</th>
                        <td field-key='title'>{{ $shippingMethod->name }}</td>
                    </tr>
                    <tr>
                        <th>@lang('quickadmin.shippingmethods.fields.name') Arabic</th>
                        <td field-key='title'>{{ $shippingMethod->name_ar }}</td>
                    </tr>
                    <tr>
                        <th>@lang('quickadmin.shippingmethods.fields.description')</th>
                        <td field-key='title'>{{ $shippingMethod->description }}</td>
                    </tr>
                    <tr>
                        <th>@lang('quickadmin.shippingmethods.fields.description') Arabic</th>
                        <td field-key='title'>{{ $shippingMethod->description_ar }}</td>
                    </tr>
                    @foreach ($shippingMethod->zones as $zone)
                    <tr>
                        <th>{{$zone->name}}</th>
                        <td field-key='title'>{{ $zone->pivot->shipping_charge }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <p>&nbsp;</p>

        <a href="{{ route('admin.shippingmethods.index') }}"
            class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
    </div>
</div>
@stop