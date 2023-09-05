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
<div class="main-panel">
    @include($adminTemplate.'.webadmin.webadminnav')


    @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    <div class="card new-table">
        <div class="card">
        @if (isset($news))
        <div class="card-header">
            <h4>Update News</h4>
        </div>
        @else
        <div class="card-header">
            <h4>Create News</h4>
        </div>
        @endif
            <div class="card-body">
                <form action="{{ isset($news)? route('news.update',$news->id) : route('news.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @if(isset($news))
                    @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="title" class="form-label"> Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{$news->title ?? @old('title')}}">
                                @if($errors->has('status'))
                                <div class="error">{{ $errors->first('status') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="published_date" class="form-label">Published Date</label>
                                <input type="date" class="form-control" name="published_date" id="published_date"
                                    value="{{$news->published_date ?? @old('published_date')}}">
                                @if($errors->has('published_date'))
                                <div class="error">{{ $errors->first('published_date') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="customFile">Image</label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="customFile"
                                    onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                    class="@error('image') is-invalid @enderror">
                                <label class="custom-file-label" for="customFile">Choose Image</label>
                                @if($errors->has('image'))
                                <div class="error">{{ $errors->first('image') }}</div>
                                @endif
                            </div>
                            <img class="mt-2" id="image" alt="image" width="100" height="100" />
                            @if (isset($news))
                            <div class="old_image mt-2">
                                <label class="mb-0" for="">Old Image:</label><br>
                                <img class="mt-2" id="oldimage"
                                    src="{{isset($news)? asset('uploads/newsimages/'.$news->image):''}}" alt="image"
                                    width="100" height="100" />
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="editor" class="form-label">Description</label>
                                <textarea class="form-control" id="editor" name="description" rows="3"
                                    >{{$news->description ?? @old('description')}}</textarea>


                                @if($errors->has('description'))
                                <div class="error">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-check mb-4" style="margin-left: 14px;">
                            <input type="checkbox" class="form-check-input status" id="status" name="status" value="1"
                                @if(isset($news)){{($news->status == 1)?'checked':''}}@endif>
                            <label class="form-check-label" style="margin-left: 5px;margin-top:3px;padding-top: 5px;"
                                for="status">Status</label>
                            @if($errors->has('status'))
                            <div class="error">{{ $errors->first('status') }}</div>
                            @endif
                        </div>

                    </div>

                    @if(isset($news))
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
@push('js')
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);

        });

    $("#image").hide();
    $("#customFile").change(function () {
        $("#image").show();
    });

    
    $('.news').addClass('active');
    $(".home").addClass('active');

</script>
@endpush
