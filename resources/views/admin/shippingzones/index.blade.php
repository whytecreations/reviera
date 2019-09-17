@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<h3 class="page-title">@lang('quickadmin.shippingzones.title')</h3>
@can('shipping_zone_create')
<p>
    <a href="{{ route('admin.shippingzones.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>

</p>
@endcan

@can('shipping_zone_delete')
<p>
    <ul class="list-inline">
        <li><a href="{{ route('admin.shippingzones.index') }}"
                style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li>
        |
        <li><a href="{{ route('admin.shippingzones.index') }}?show_deleted=1"
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
            class="table table-bordered table-striped {{ count($shippingZones) > 0 ? 'datatable' : '' }} @can('shipping_zone_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
            <thead>
                <tr>
                    @can('shipping_zone_delete')
                    @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox"
                            id="select-all" /></th>@endif
                    @endcan

                    <th>@lang('quickadmin.shippingzones.fields.name')</th>
                    @if( request('show_deleted') == 1 )
                    <th>&nbsp;</th>
                    @else
                    <th>&nbsp;</th>
                    @endif
                </tr>
            </thead>

            <tbody>
                @if (count($shippingZones) > 0)
                @foreach ($shippingZones as $shippingZone)
                <tr data-entry-id="{{ $shippingZone->id }}">
                    @can('shipping_zone_delete')
                    @if ( request('show_deleted') != 1 )<td></td>@endif
                    @endcan
                    <td field-key='name'>{{ $shippingZone->name }}<br />
                        {{ $shippingZone->name_ar }}</td>
                    @if( request('show_deleted') == 1 )
                    <td>
                        @can('shipping_zone_delete')
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'POST',
                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                        'route' => ['admin.shippingzones.restore', $shippingZone->id])) !!}
                        {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                        {!! Form::close() !!}
                        @endcan
                        {{-- @can('shipping_zone_delete')
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'DELETE',
                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                        'route' => ['admin.shippingzones.perma_del', $shippingZone->id])) !!}
                        {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                        {!! Form::close() !!}
                        @endcan --}}
                    </td>
                    @else
                    <td>
                        {{-- @can('shipping_zone_view')
                        <a href="{{ route('admin.shippingzones.show',[$shippingZone->id]) }}"
                        class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                        @endcan --}}
                        @can('shipping_zone_edit')
                        <a href="{{ route('admin.shippingzones.edit',[$shippingZone->id]) }}"
                            class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                        @endcan
                        @can('shipping_zone_delete')
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'DELETE',
                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                        'route' => ['admin.shippingzones.destroy', $shippingZone->id])) !!}
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