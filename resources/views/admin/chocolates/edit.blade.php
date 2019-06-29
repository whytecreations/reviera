@extends('layouts.app')

@section('content')
<h3 class="page-title">@lang('quickadmin.chocolates.title')</h3>

{!! Form::model($chocolate, ['method' => 'PUT', 'route' => ['admin.chocolates.update', $chocolate->id], 'files' =>
true,]) !!}

<div class="panel panel-default">
    <div class="panel-heading">
        @lang('quickadmin.qa_edit')
    </div>

    <div class="panel-body">

        <div class="row">
            <div class="col-xs-12 form-group">
                <label>Department</label>
                <select name="category_id" class="select2 form-control" id="category_id" required="">
                    @foreach ($chocolateCategories as $category)
                    @if($category->id == $chocolate->categoryId)
                    <option value="{{$category->id}}" selected="">{{$category->name}}<span dir='rtl'
                            lang='ar'>{{$category->name_ar}}</span></option>
                    @else
                    <option value="{{$category->id}}">{{$category->name}}<span dir='rtl'
                            lang='ar'>{{$category->name_ar}}</span></option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6 form-group">
                {!! Form::label('title', trans('quickadmin.chocolates.fields.title').'*', ['class' => 'control-label'])
                !!}
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
                {!! Form::label('title_ar', trans('quickadmin.chocolates.fields.title').'*', ['class' =>
                'control-label'])
                !!}
                {!! Form::text('title_ar', old('title_ar'), ['class' => 'form-control', 'placeholder' => '','dir'=>'rtl'
                ]) !!}
                <p class="help-block"></p>
                @if($errors->has('title_ar'))
                <p class="help-block">
                    {{ $errors->first('title_ar') }}
                </p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('full_price', trans('quickadmin.chocolates.fields.full_price'), ['class' =>
                'control-label']) !!}
                <div class="helper small">{{trans('quickadmin.chocolates.fields.price_note')}}</div>
                {!! Form::number('full_price', old('full_price'), ['class' => 'form-control', 'placeholder' => '',
                'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('full_price'))
                <p class="help-block">
                    {{ $errors->first('full_price') }}
                </p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('half_price', trans('quickadmin.chocolates.fields.half_price'), ['class' =>
                'control-label']) !!}
                <div class="helper small">{{trans('quickadmin.chocolates.fields.price_note')}}</div>
                {!! Form::number('half_price', old('half_price'), ['class' => 'form-control', 'placeholder' => '',
                'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('half_price'))
                <p class="help-block">
                    {{ $errors->first('half_price') }}
                </p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('quarter_price', trans('quickadmin.chocolates.fields.quarter_price'), ['class' =>
                'control-label']) !!}
                <div class="helper small">{{trans('quickadmin.chocolates.fields.price_note')}}</div>
                {!! Form::number('quarter_price', old('quarter_price'), ['class' => 'form-control', 'placeholder' => '',
                'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('quarter_price'))
                <p class="help-block">
                    {{ $errors->first('quarter_price') }}
                </p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 form-group">
                {!! Form::label('description', trans('quickadmin.chocolates.fields.description').'*', ['class' =>
                'control-label']) !!}
                {!! Form::textarea('description', old('description'), ['class' => 'form-control editor', 'placeholder'
                => '','rows'=> 2, 'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('description'))
                <p class="help-block">
                    {{ $errors->first('description') }}
                </p>
                @endif
            </div>
            <div class="col-sm-6 form-group">
                {!! Form::label('description_ar', trans('quickadmin.chocolates.fields.description').'*', ['class' =>
                'control-label']) !!}
                {!! Form::textarea('description_ar', old('description_ar'), ['class' => 'form-control editor',
                'placeholder'
                => '','rows'=> 2, 'dir'=>'rtl']) !!}
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
                {!! Form::label('images', trans('quickadmin.chocolates.fields.images').'', ['class' =>
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
                    <div class="files-list">
                        @foreach($chocolate->getMedia('images') as $media)
                        <p class="form-group">
                            <img height="50" src="{{ asset($media->getUrl()) }}"> <a href="{{ $media->getUrl() }}"
                                target="_blank">{{ $media->name }} ({{ $media->size }} KB)</a>
                            <a href="#" class="btn btn-xs btn-danger remove-file">Remove</a>
                            <input type="hidden" name="images_id[]" value="{{ $media->id }}">
                        </p>
                        @endforeach
                    </div>
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

{!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
@stop

@section('javascript')
@parent

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
                        model_name: 'Chocolate',
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