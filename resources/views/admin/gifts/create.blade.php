@extends('layouts.app')

@section('content')
<h3 class="page-title">@lang('quickadmin.gifts.title')</h3>
{!! Form::open(['method' => 'POST', 'route' => ['admin.gifts.store'], 'files' => true,]) !!}

<div class="panel panel-default">
    <div class="panel-heading">
        @lang('quickadmin.qa_create')
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6 form-group">
                {!! Form::label('title', trans('quickadmin.gifts.fields.title').'*', ['class' => 'control-label']) !!}
                {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' =>
                '']) !!}
                <p class="help-block"></p>
                @if($errors->has('title'))
                <p class="help-block">
                    {{ $errors->first('title') }}
                </p>
                @endif
            </div>

            <div class="col-sm-6 form-group">
                {!! Form::label('title_ar', trans('quickadmin.gifts.fields.title').' Arabic*', ['class' =>
                'control-label']) !!}
                {!! Form::text('title_ar', old('title_ar'), ['class' => 'form-control', 'placeholder' => '', ]) !!}
                <p class="help-block"></p>
                @if($errors->has('title_ar'))
                <p class="help-block">
                    {{ $errors->first('title_ar') }}
                </p>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 form-group">
                {!! Form::label('description', trans('quickadmin.gifts.fields.description').'*', ['class' =>
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
                {!! Form::label('description_ar', trans('quickadmin.gifts.fields.description').' Arabic*', ['class' =>
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
            <div class="col-xs-12 form-group">
                {!! Form::label('images', trans('quickadmin.gifts.fields.images').'', ['class' =>
                'control-label','accept'=>"image/*"]) !!}
                {!! Form::file('images[]', [
                'multiple',
                'class' => 'form-control file-upload',
                'data-url' => route('admin.media.upload'),
                'data-bucket' => 'images',
                'data-filekey' => 'images',
                ]) !!}
                <p class="help-block"></p>
                <div class="photo-block">
                    <div class="progress-bar form-group">&nbsp;</div>
                    <div class="files-list"></div>
                </div>
                @if($errors->has('images'))
                <p class="help-block">
                    {{ $errors->first('images') }}
                </p>
                @endif
            </div>
        </div>

    </div>
</div>

{!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
@stop

@section('javascript')
@parent
{{-- <script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
    <script>
        $('.editor').each(function () {
                  CKEDITOR.replace($(this).attr('id'),{
                       uiColor: '#CCEAEE'
                    extraAllowedContent: 'section article header nav aside[lang,foo]', extraAllowedContent: 'section article header nav aside[lang,foo]', filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                     filebrowserImageUploadUrl: '{{url('/laravel-filemanager/upload?type=Images&_token=').csrf_token()}}',
filebrowserBrowseUrl: '{{url('/laravel-filemanager?type=public')}}',
filebrowserUploadUrl: '{{url('/laravel-filemanager/upload?type=public&_token=').csrf_token()}}'
}
);
});
</script> --}}

<script src="{{ asset('quickadmin/plugins/fileUpload/js/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('quickadmin/plugins/fileUpload/js/jquery.fileupload.js') }}"></script>
<script>
    $(function () {
            $('.file-upload').each(function () {
                var $this = $(this);
                var $parent = $(this).parent();
                $(this).fileupload({
                    dataType: 'json',
                    formData: {
                        model_name: 'Gift',
                        bucket: $this.data('bucket'),
                        file_key: $this.data('filekey'),
                        _token: '{{ csrf_token() }}'
                    },
                    add: function (e, data) {
                        data.submit();
                    },
                    done: function (e, data) {
                        $.each(data.result.files, function (index, file) {
                            var $line = $($('<p/>', {class: "form-group"}).html(file.name + ' (' + file.size + ' bytes)').appendTo($parent.find('.files-list')));
                            $line.append('<a href="#" class="btn btn-xs btn-danger remove-file">Remove</a>');
                            $line.append('<input type="hidden" name="' + $this.data('bucket') + '_id[]" value="' + file.id + '"/>');
                            if ($parent.find('.' + $this.data('bucket') + '-ids').val() != '') {
                                $parent.find('.' + $this.data('bucket') + '-ids').val($parent.find('.' + $this.data('bucket') + '-ids').val() + ',');
                            }
                            $parent.find('.' + $this.data('bucket') + '-ids').val($parent.find('.' + $this.data('bucket') + '-ids').val() + file.id);
                        });
                        $parent.find('.progress-bar').hide().css(
                            'width',
                            '0%'
                        );
                    }
                }).on('fileuploadprogressall', function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $parent.find('.progress-bar').show().css(
                        'width',
                        progress + '%'
                    );
                });
            });
            $(document).on('click', '.remove-file', function () {
                var $parent = $(this).parent();
                $parent.remove();
                return false;
            });
        });
</script>
@stop