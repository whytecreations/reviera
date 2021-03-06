@extends('layouts.app')

@section('content')
<h3 class="page-title">@lang('quickadmin.shippingzones.title')</h3>
{!! Form::open(['method' => 'POST', 'route' => ['admin.shippingzones.store'], 'files' => true,]) !!}

<div class="panel panel-default">
    <div class="panel-heading">
        @lang('quickadmin.qa_create')
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6 form-group">
                {!! Form::label('name', trans('quickadmin.shippingzones.fields.name').'*', ['class' =>
                'control-label']) !!}
                {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' =>
                '','autofocus'=>'']) !!}
                <p class="help-block"></p>
                @if($errors->has('name'))
                <p class="help-block">
                    {{ $errors->first('name') }}
                </p>
                @endif
            </div>

            <div class="col-sm-6 form-group">
                {!! Form::label('name_ar', trans('quickadmin.shippingzones.fields.name').' Arabic', ['class' =>
                'control-label',]) !!}
                {!! Form::text('name_ar', old('name_ar'), ['class' => 'form-control', 'placeholder' =>
                '', 'dir'=>'rtl']) !!}
                <p class="help-block"></p>
                @if($errors->has('name_ar'))
                <p class="help-block">
                    {{ $errors->first('name_ar') }}
                </p>
                @endif
            </div>
        </div>

    </div>
</div>

{!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
@stop