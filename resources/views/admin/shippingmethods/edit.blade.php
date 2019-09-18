@extends('layouts.app')

@section('content')
<h3 class="page-title">@lang('quickadmin.shippingmethods.title')</h3>

{!! Form::model($shippingMethod, ['method' => 'PUT', 'route' => ['admin.shippingmethods.update', $shippingMethod->id],
'files' =>
true,]) !!}

<div class="panel panel-default">
    <div class="panel-heading">
        @lang('quickadmin.qa_edit')
    </div>

    <div class="panel-body">

        <div class="row">
            <div class="col-sm-6 form-group">
                {!! Form::label('name', trans('quickadmin.shippingmethods.fields.name').'*', ['class' =>
                'control-label'])
                !!}
                {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' =>
                '']) !!}
                <p class="help-block"></p>
                @if($errors->has('name'))
                <p class="help-block">
                    {{ $errors->first('name') }}
                </p>
                @endif
            </div>
            <div class="col-sm-6 form-group">
                {!! Form::label('name_ar', trans('quickadmin.shippingmethods.fields.name').' Arabic', ['class' =>
                'control-label'])
                !!}
                {!! Form::text('name_ar', old('name_ar'), ['class' => 'form-control', 'placeholder' => '','dir'=>'rtl'
                ]) !!}
                <p class="help-block"></p>
                @if($errors->has('name_ar'))
                <p class="help-block">
                    {{ $errors->first('name_ar') }}
                </p>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 form-group">
                {!! Form::label('description', trans('quickadmin.shippingmethods.fields.description'), ['class' =>
                'control-label']) !!}
                {!! Form::textarea('description', old('description'), ['class' => 'form-control editor', 'placeholder'
                => '','rows'=> 2]) !!}
                <p class="help-block"></p>
                @if($errors->has('description'))
                <p class="help-block">
                    {{ $errors->first('description') }}
                </p>
                @endif
            </div>
            <div class="col-sm-6 form-group">
                {!! Form::label('description_ar', trans('quickadmin.shippingmethods.fields.description').' Arabic', ['class'
                =>
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
            <div class="col-sm-6 form-group">
                <label>Shipping Zone</label>
            </div>

            <div class="col-sm-6 form-group">
                <label>Shipping Charge</label>
            </div>
        </div>

        @foreach ($zones as $zone)

        <div class="row">
            <div class="col-sm-6 form-group">
                <h4>{{$zone->name}}</h4>
            </div>
            <div class="col-sm-6 form-group">
                {!! Form::text('zones['.$zone->id.']',
                $shippingMethod->zones->find($zone->id)!==null?$shippingMethod->zones->find($zone->id)->pivot->shipping_charge:0,
                ['class' =>
                'form-control',
                'placeholder' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('zones['.$zone->id.']'))
                <p class="help-block">
                    {{ $errors->first('zones['.$zone->id.']') }}
                </p>
                @endif
            </div>
        </div>
        @endforeach


        <p>&nbsp;</p>

        <a href="{{ route('admin.shippingmethods.index') }}"
            class="btn btn-xs pull-right ">@lang('quickadmin.qa_back_to_list')</a>



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