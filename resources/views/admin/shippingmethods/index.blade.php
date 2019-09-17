@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<h3 class="page-title">@lang('quickadmin.shippingmethods.title')</h3>
@can('shipping_method_create')
<p>
    <a href="{{ route('admin.shippingmethods.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>

</p>
@endcan

@can('shipping_method_delete')
<p>
    <ul class="list-inline">
        <li><a href="{{ route('admin.shippingmethods.index') }}"
                style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li>
        |
        <li><a href="{{ route('admin.shippingmethods.index') }}?show_deleted=1"
                style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a>
        </li>
    </ul>
</p>
@endcan


<div class="panel panel-default">
    <div class="panel-heading">
        @lang('quickadmin.qa_list')
    </div>

    <div class="panel-body table-responsive">
        <table
            class="table table-bordered table-striped {{ count($shippingMethods) > 0 ? 'datatable' : '' }} @can('shipping_method_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
            <thead>
                <tr>
                    @can('shipping_method_delete')
                    @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox"
                            id="select-all" /></th>@endif
                    @endcan
                    <th>@lang('quickadmin.shippingmethods.fields.name')</th>
                    <th>@lang('quickadmin.shippingmethods.fields.description')</th>
                    {{-- <th>@lang('quickadmin.shippingmethods.fields.zones')</th> --}}
                    @if( request('show_deleted') == 1 )
                    <th>&nbsp;</th>
                    @else
                    <th>&nbsp;</th>
                    @endif
                </tr>
            </thead>

            <tbody>
                @if (count($shippingMethods) > 0)
                @foreach ($shippingMethods as $shippingMethod)
                <tr data-entry-id="{{ $shippingMethod->id }}">
                    @can('shipping_method_delete')
                    @if ( request('show_deleted') != 1 )<td></td>@endif
                    @endcan

                    {{-- <td field-key='category'>{{ $shippingMethod->zones->name }} </td> --}}
                    <td field-key='title'>{{ $shippingMethod->name }}<br />{{ $shippingMethod->name_ar }}</td>
                    <td field-key='description'>{!! $shippingMethod->description
                        !!}<br />{{ $shippingMethod->description_ar }}</td>
                    </td>
                    @if( request('show_deleted') == 1 )
                    <td>
                        @can('shipping_method_delete')
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'POST',
                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                        'route' => ['admin.shippingmethods.restore', $shippingMethod->id])) !!}
                        {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                        {!! Form::close() !!}
                        @endcan
                        {{-- @can('shipping_method_delete')
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'DELETE',
                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                        'route' => ['admin.shippingmethods.perma_del', $shippingMethod->id])) !!}
                        {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                        {!! Form::close() !!}
                        @endcan --}}
                    </td>
                    @else
                    <td>
                        @can('shipping_method_view')
                        <a href="{{ route('admin.shippingmethods.show',[$shippingMethod->id]) }}"
                            class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                        @endcan

                        @can('shipping_method_edit')
                        <a href="{{ route('admin.shippingmethods.edit',[$shippingMethod->id]) }}"
                            class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                        @endcan

                        @can('shipping_method_delete')
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'DELETE',
                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                        'route' => ['admin.shippingmethods.destroy', $shippingMethod->id])) !!}
                        {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                        {!! Form::close() !!}
                        @endcan
                    </td>
                    @endif
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="11">@lang('quickadmin.qa_no_entries_in_table')</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@stop