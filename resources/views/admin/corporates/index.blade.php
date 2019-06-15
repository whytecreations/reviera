@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.corporates.title')</h3>

    @can('corporate_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.corporates.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.corporates.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($corporates) > 0 ? 'datatable' : '' }} @can('corporate_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('corporate_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.corporates.fields.company_name')</th>
                        <th>@lang('quickadmin.corporates.fields.corporate_type')</th>
                        <th>@lang('quickadmin.corporates.fields.nature_of_business')</th>
                        <th>@lang('quickadmin.corporates.fields.number_of_employees')</th>
                        <th>@lang('quickadmin.corporates.fields.person_in_charge')</th>
                        <th>@lang('quickadmin.corporates.fields.position')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($corporates) > 0)
                        @foreach ($corporates as $corporate)
                            <tr data-entry-id="{{ $corporate->id }}">
                                @can('corporate_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan
                                <td field-key='company_name'>{{ $corporate->company_name }}</td>
                                <td field-key='corporate_type'>{{ $corporate->corporate_type }}</td>
                                <td field-key='nature_of_business'>{{ $corporate->nature_of_business }}</td>
                                <td field-key='number_of_employees'>{{ $corporate->number_of_employees }}</td>
                                <td field-key='person_in_charges'>{{ $corporate->person_in_charge }}</td>
                                <td field-key='positions'>{{ $corporate->position }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('corporate_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.corporates.restore', $corporate->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('corporate_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.corporates.perma_del', $corporate->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('corporate_view')
                                    <a href="{{ route('admin.corporates.show',[$corporate->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('corporate_edit')
                                    <a href="{{ route('admin.corporates.edit',[$corporate->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('corporate_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.corporates.destroy', $corporate->id])) !!}
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
        @can('corporate_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.corporates.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection