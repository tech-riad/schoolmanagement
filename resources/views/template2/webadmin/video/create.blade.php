@extends($adminTemplate.'.admin.layouts.app')

@push('css')
<style>
    .ck-editor__editable[role="textbox"] {
        /* editing area */
        min-height: 200px;
    }

    input.status {
        width: 20px;
        height: 20px;
        padding-right: 10px;
    }

</style>
@endpush

@section('content')
<div class="page-body">
    @include($adminTemplate.'.webadmin.webadminnav')
    @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif

    <div class="card new-table">
        <div class="card">
        @if (isset($video))
        <div class="card-header">
            <h4>Update Video</h4>
        </div>
        @else
        <div class="card-header">
            <h4>Add Video</h4>
        </div>
        @endif
            <div class="card-body">
                <form action="{{ isset($video)? route('video.update',$video->id) : route('video.store') }}"
                    method="post" enctype="multipart/form-data">

                    @csrf
                    @if(isset($video))
                    @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="title" class="form-label"> Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{$video->title ?? @old('title')}}">
                                @if($errors->has('title'))
                                <div class="error">{{ $errors->first('title') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="customFile">Thumbnail</label>
                            <div class="custom-file">
                                <input type="file" name="thumbnail" class="custom-file-input" id="customFile"
                                    onchange="document.getElementById('thumbnail').src = window.URL.createObjectURL(this.files[0])"
                                    class="@error('thumbnail') is-invalid @enderror">
                                <label class="custom-file-label" for="customFile">Choose Thumbnail</label>
                                @if($errors->has('thumbnail'))
                                <div class="error">{{ $errors->first('thumbnail') }}</div>
                                @endif
                            </div>
                            <img class="mt-2" id="thumbnail" alt="thumbnail" width="100" height="100" />
                            @if (isset($video))
                            <div class="old_image mt-2">
                                <label class="mb-0" for="">Old Thumbnail:</label><br>
                                <img class="mt-2" id="oldimage"
                                    src="{{isset($video)? asset('uploads/videothumbnail/'.$video->thumbnail):''}}"
                                    alt="thumbnail" width="100" height="100" />
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" name="date" id="date"
                                    value="{{$video->date ?? @old('date')}}">
                                @if($errors->has('date'))
                                <div class="error">{{ $errors->first('date') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="code" class="form-label"> Code</label>
                                <input type="text" class="form-control" name="code" id="code"
                                    value="{{$video->code ?? @old('code')}}">
                                @if($errors->has('code'))
                                <div class="error">{{ $errors->first('code') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="type" class="form-label">type</label>
                                <select name="type" class="form-control" id="type">
                                    <option value="youtube"  @selected(@old('type')?? @$video->type == 'youtube')>Youtube</option>
                                    <option value="vimeo"  @selected(@old('type')?? @$video->type == 'vimeo')>Vimeo</option>
                                </select>
                               
                                @if($errors->has('type'))
                                <div class="error">{{ $errors->first('type') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label for="editor" class="form-label">Description</label>
                                <textarea class="form-control" id="editor" name="description"
                                    rows="3">{{$video->description ?? @old('description')}}</textarea>
                                @if($errors->has('description'))
                                <div class="error">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-check mb-4" style="margin-left: 14px;">
                                <input type="checkbox" class="form-check-input status" id="status" name="status"
                                    value="1" @if(isset($video)){{($video->status == 1)?'checked':''}}@endif>
                                <label class="form-check-label"
                                    style="margin-left: 5px;margin-top:3px;padding-top: 5px;"
                                    for="status">Status</label>
                                @if($errors->has('status'))
                                <div class="error">{{ $errors->first('status') }}</div>
                                @endif

                            </div>
                        </div>
                    </div>
                    @if(isset($video))
                    <button type="submit" class="btn btn-primary">Update</button>
                    @else
                    <button type="submit" class="btn btn-primary">Submit</button>
                    @endif
                </form>
            </div>
        </div>
    </div>


</div>
</div>

@endsection

@section('javascript')
<script>
    $('input[type="checkbox"]').change(function () {
        var checked = $(this).is(':checked');
        var input = $(this).closest('tr').find('input[type="text"]');
        var select = $(this).closest('tr').find('select,input');
        input.prop('required', checked)
        select.prop('required', checked)
    })

</script>
@stop

@push('js')
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);

        });

    $("#thumbnail").hide();
    $("#customFile").change(function () {
        $("#thumbnail").show();
    });

    $('.videos').addClass('active');
    $(".home").addClass('active');

</script>

@endpush
