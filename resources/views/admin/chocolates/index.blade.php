@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.chocolates.title')</h3>
    @can('chocolate_create')
    <p>
        <a href="{{ route('admin.chocolates.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('chocolate_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.chocolates.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.chocolates.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($chocolates) > 0 ? 'datatable' : '' }} @can('chocolate_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('chocolate_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.chocolates.fields.category')</th>
                        <th>@lang('quickadmin.chocolates.fields.title')</th>
                        <th>@lang('quickadmin.chocolates.fields.full_price')</th>
                        <th>@lang('quickadmin.chocolates.fields.half_price')</th>
                        <th>@lang('quickadmin.chocolates.fields.quarter_price')</th>
                        <th>@lang('quickadmin.chocolates.fields.description')</th>
                        <th>@lang('quickadmin.chocolates.fields.images')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($chocolates) > 0)
                        @foreach ($chocolates as $chocolate)
                            <tr data-entry-id="{{ $chocolate->id }}">
                                @can('chocolate_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan
                                
                                <td field-key='category'>{{ $chocolate->category->name }}</td>
                                <td field-key='title'>{{ $chocolate->title }}</td>
                                <td field-key='full_price'>{{ $chocolate->full_price }}</td>
                                <td field-key='half_price'>{{ $chocolate->half_price }}</td>
                                <td field-key='quarter_price'>{{ $chocolate->quarter_price }}</td>
                                <td field-key='description'>{!! $chocolate->description !!}</td>
                                <td width="300" field-key='images'> @foreach($chocolate->getMedia('images') as $media)
                               <img width="50" src="{{ asset($media->getUrl()) }}"> 
                            @endforeach</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('chocolate_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.chocolates.restore', $chocolate->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('chocolate_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.chocolates.perma_del', $chocolate->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('chocolate_view')
                                    <a href="{{ route('admin.chocolates.show',[$chocolate->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('chocolate_edit')
                                    <a href="{{ route('admin.chocolates.edit',[$chocolate->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('chocolate_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.chocolates.destroy', $chocolate->id])) !!}
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

@section('javascript') 
    <script>
        @can('chocolate_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.chocolates.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection