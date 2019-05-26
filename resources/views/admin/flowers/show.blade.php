@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.friends-of-dbs.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.friends-of-dbs.fields.banner')</th>
                            <td field-key='banner'>@if($friends_of_db->banner)<a href="{{ asset(env('UPLOAD_PATH').'/' . $friends_of_db->banner) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $friends_of_db->banner) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.friends-of-dbs.fields.text')</th>
                            <td field-key='text'>{{ $friends_of_db->text }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.friends-of-dbs.fields.description')</th>
                            <td field-key='description'>{!! $friends_of_db->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.friends-of-dbs.fields.images')</th>
                            <td field-key='images'> @foreach($friends_of_db->getMedia('images') as $media)
                                <p class="form-group">
                                    <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->name }} ({{ $media->size }} KB)</a>
                                </p>
                            @endforeach</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.friends-of-dbs.fields.text-ar')</th>
                            <td field-key='text_ar'>{{ $friends_of_db->text_ar }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.friends-of-dbs.fields.description-ar')</th>
                            <td field-key='description_ar'>{!! $friends_of_db->description_ar !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.friends_of_dbs.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop

@section('javascript')
    @parent
    <script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
    <script>
        $('.editor').each(function () {
                  CKEDITOR.replace($(this).attr('id'),{
                    extraAllowedContent: 'section article header nav aside[lang,foo]', extraAllowedContent: 'section article header nav aside[lang,foo]', filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            });
        });
    </script>

@stop
