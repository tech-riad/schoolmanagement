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

    @if($errors->any())
    {{ implode('', $errors->all('<div>:Careful Please</div>')) }}
    @endif

    @include($adminTemplate.'.webadmin.webadminnav')
    <div class="card new-table">
        @if (isset($banner))
        <div class="card-header">
            <h4>Update Banner</h4>
        </div>
        @else
        <div class="card-header">
            <h4>Add Banner</h4>
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ isset($banner)? route('banner.update',$banner->id) : route('banner.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @if(isset($banner))
                    @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="imagetitle" class="form-label">Image Title</label>
                                <input type="text" class="form-control" name="imagetitle" id="imagetitle"
                                    value="{{$banner->imagetitle ?? @old('imagetitle')}}">
                                @if($errors->has('imagetitle'))
                                <div class="error">{{ $errors->first('imagetitle') }}</div>
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
                            @if (isset($banner))
                            <div class="old_image mt-2">
                                <label class="mb-0" for="">Old Image:</label><br>
                                <img class="mt-2" id="oldimage"
                                    src="{{isset($banner)? Config::get('app.s3_url').$banner->image:''}}"
                                    alt="image" width="100" height="100" />
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="sl_no" class="form-label">Serial Number</label>
                                <input type="number" name="sl_no" class="form-control"
                                    value="{{$banner->sl_no ?? @old('sl_no')}}">
                                @if($errors->has('sl_no'))
                                <div class="error">{{ $errors->first('sl_no') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="editor" class="form-label">Description</label>
                                <textarea class="form-control" id="editor" name="description"
                                    rows="3">{{$banner->description ?? @old('description')}}</textarea>
                                @if($errors->has('description'))
                                <div class="error">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-check mb-4" style="margin-left: 14px;">
                            <input type="checkbox" class="form-check-input status" id="status" name="status" value="1"
                                @if(isset($banner)){{($banner->status == 1)?'checked':''}}@endif>
                            <label class="form-check-label" style="margin-left: 5px;margin-top:3px;padding-top: 5px;"
                                for="status">Status</label>
                            @if($errors->has('status'))
                            <div class="error">{{ $errors->first('status') }}</div>
                            @endif
                        </div>
                    </div>

                    @if(isset($banner))
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


    $('.banner').addClass('active');
    $(".home").addClass('active');

</script>
@endpush
