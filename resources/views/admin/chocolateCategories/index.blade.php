@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<h3 class="page-title">@lang('quickadmin.chocolatecategories.title')</h3>
@can('chocolate_category_create')
<p>
    <a href="{{ route('admin.chocolatecategories.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>

</p>
@endcan

@can('chocolate_category_delete')
<p>
    <ul class="list-inline">
        <li><a href="{{ route('admin.chocolatecategories.index') }}"
                style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li>
        |
        <li><a href="{{ route('admin.chocolatecategories.index') }}?show_deleted=1"
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
            class="table table-bordered table-striped {{ count($chocolateCategories) > 0 ? 'datatable' : '' }} @can('chocolate_category_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
            <thead>
                <tr>
                    @can('chocolate_category_delete')
                    @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox"
                            id="select-all" /></th>@endif
                    @endcan

                    <th>@lang('quickadmin.chocolatecategories.fields.name')</th>
                    @if( request('show_deleted') == 1 )
                    <th>&nbsp;</th>
                    @else
                    <th>&nbsp;</th>
                    @endif
                </tr>
            </thead>

            <tbody>
                @if (count($chocolateCategories) > 0)
                @foreach ($chocolateCategories as $chocolateCategory)
                <tr data-entry-id="{{ $chocolateCategory->id }}">
                    @can('chocolate_category_delete')
                    @if ( request('show_deleted') != 1 )<td></td>@endif
                    @endcan
                    <td field-key='name'>{{ $chocolateCategory->name }}<br />
                        {{ $chocolateCategory->name_ar }}</td>
                    @if( request('show_deleted') == 1 )
                    <td>
                        @can('chocolate_category_delete')
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'POST',
                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                        'route' => ['admin.chocolatecategories.restore', $chocolateCategory->id])) !!}
                        {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                        {!! Form::close() !!}
                        @endcan
                        {{-- @can('chocolate_category_delete')
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'DELETE',
                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                        'route' => ['admin.chocolatecategories.perma_del', $chocolateCategory->id])) !!}
                        {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                        {!! Form::close() !!}
                        @endcan --}}
                    </td>
                    @else
                    <td>
                        @can('chocolate_category_view')
                        <a href="{{ route('admin.chocolatecategories.show',[$chocolateCategory->id]) }}"
                            class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                        @endcan
                        @can('chocolate_category_edit')
                        <a href="{{ route('admin.chocolatecategories.edit',[$chocolateCategory->id]) }}"
                            class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                        @endcan
                        @can('chocolate_category_delete')
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'DELETE',
                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                        'route' => ['admin.chocolatecategories.destroy', $chocolateCategory->id])) !!}
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
    @can('chocolate_category_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.chocolatecategories.mass_destroy') }}'; @endif
        @endcan

</script>
@endsection