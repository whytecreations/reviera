@extends('layouts.app')

@section('content')
<h3 class="page-title">@lang('quickadmin.shippingmethods.title')</h3>
{!! Form::open(['method' => 'POST', 'route' => ['admin.shippingmethods.store'], 'files' => true,]) !!}

<div class="panel panel-default">
    <div class="panel-heading">
        @lang('quickadmin.qa_create')
    </div>

    <div class="panel-body">

        <div class="row">
            <div class="col-sm-6 form-group">
                {!! Form::label('name', trans('quickadmin.shippingmethods.fields.name').'*', ['class' =>
                'control-label'])
                !!}
                {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' =>
                '']) !!}
                <p class="help-block"></p>
                @if($errors->has('name'))
                <p class="help-block">
                    {{ $errors->first('name') }}
                </p>
                @endif
            </div>

            <div class="col-sm-6 form-group">
                {!! Form::label('name_ar', trans('quickadmin.shippingmethods.fields.name').' Arabic', ['class' =>
                'control-label']) !!}
                {!! Form::text('name_ar', old('name_ar'), ['class' => 'form-control', 'placeholder' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('name_ar'))
                <p class="help-block">
                    {{ $errors->first('name_ar') }}
                </p>
                @endif
            </div>
        </div>



        <div class="row">
            <div class="col-sm-6 form-group">
                {!! Form::label('description', trans('quickadmin.shippingmethods.fields.description').'*', ['class' =>
                'control-label']) !!}
                {!! Form::textarea('description', old('description'), ['class' => 'form-control editor', 'placeholder'
                => '','rows'=>2, 'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('description'))
                <p class="help-block">
                    {{ $errors->first('description') }}
                </p>
                @endif
            </div>

            <div class="col-sm-6 form-group">
                {!! Form::label('description_ar', trans('quickadmin.shippingmethods.fields.description').' Arabic*',
                ['class'
                =>
                'control-label']) !!}
                {!! Form::textarea('description_ar', old('description_ar'), ['class' => 'form-control editor',
                'placeholder'
                => '','rows'=>2]) !!}
                <p class="help-block"></p>
                @if($errors->has('description_ar'))
                <p class="help-block">
                    {{ $errors->first('description_ar') }}
                </p>
                @endif
            </div>
        </div>



        <div class="row">
            <div class="col-sm-6 form-group">
                <label>Shipping Zone</label>
            </div>

            <div class="col-sm-6 form-group">
                <label>Shipping Charge</label>
            </div>
        </div>

        @foreach ($zones as $zone)

        <div class="row">
            <div class="col-sm-6 form-group">
                <h4>{{$zone->name}}</h4>
            </div>

            <div class="col-sm-6 form-group">
                {!! Form::text('zones['.$zone->id.']', 0, ['class' => 'form-control', 'placeholder' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('zones['.$zone->id.']'))
                <p class="help-block">
                    {{ $errors->first('zones['.$zone->id.']') }}
                </p>
                @endif
            </div>
        </div>
        @endforeach




    </div>
</div>

{!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
@stop