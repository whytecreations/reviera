@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<h3 class="page-title">@lang('quickadmin.flowercategories.title')</h3>
@can('flower_category_create')
<p>
    <a href="{{ route('admin.flowercategories.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>

</p>
@endcan

@can('flower_category_delete')
<p>
    <ul class="list-inline">
        <li><a href="{{ route('admin.flowercategories.index') }}"
                style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li>
        |
        <li><a href="{{ route('admin.flowercategories.index') }}?show_deleted=1"
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
            class="table table-bordered table-striped {{ count($flowerCategories) > 0 ? 'datatable' : '' }} @can('flower_category_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
            <thead>
                <tr>
                    @can('flower_category_delete')
                    @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox"
                            id="select-all" /></th>@endif
                    @endcan

                    <th>@lang('quickadmin.flowercategories.fields.name')</th>
                    @if( request('show_deleted') == 1 )
                    <th>&nbsp;</th>
                    @else
                    <th>&nbsp;</th>
                    @endif
                </tr>
            </thead>

            <tbody>
                @if (count($flowerCategories) > 0)
                @foreach ($flowerCategories as $flowerCategory)
                <tr data-entry-id="{{ $flowerCategory->id }}">
                    @can('flower_category_delete')
                    @if ( request('show_deleted') != 1 )<td></td>@endif
                    @endcan
                    <td field-key='name'>{{ $flowerCategory->name }}<br />{{ $flowerCategory->name_ar }}</td>
                    @if( request('show_deleted') == 1 )
                    <td>
                        @can('flower_category_delete')
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'POST',
                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                        'route' => ['admin.flowercategories.restore', $flowerCategory->id])) !!}
                        {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                        {!! Form::close() !!}
                        @endcan
                        {{-- @can('flower_category_delete')
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'DELETE',
                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                        'route' => ['admin.flowercategories.perma_del', $flowerCategory->id])) !!}
                        {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                        {!! Form::close() !!}
                        @endcan --}}
                    </td>
                    @else
                    <td>
                        @can('flower_category_view')
                        <a href="{{ route('admin.flowercategories.show',[$flowerCategory->id]) }}"
                            class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                        @endcan
                        @can('flower_category_edit')
                        <a href="{{ route('admin.flowercategories.edit',[$flowerCategory->id]) }}"
                            class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                        @endcan
                        @can('flower_category_delete')
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'DELETE',
                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                        'route' => ['admin.flowercategories.destroy', $flowerCategory->id])) !!}
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
    @can('flower_category_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.flowercategories.mass_destroy') }}'; @endif
        @endcan

</script>
@endsection