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
    <div class="card new-table">
        <div class="card">
        @if (isset($message))
        <div class="card-header">
            <h4>Update Message</h4>
        </div>
        @else
        <div class="card-header">
            <h4>Add New Message</h4>
        </div>
        @endif
            <div class="card-body">
                <form action="{{ isset($message)? route('message.update',$message->id) : route('message.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @if(isset($message))
                    @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="messager_name" class="form-label"> Name</label>
                                <input type="text" class="form-control" name="name" id="messager_name"
                                    value="{{$message->messager_name ?? @old('name')}}">
                                    @if($errors->has('name'))
                                    <div class="error text-danger">{{ $errors->first('name') }}</div>
                                    @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="messager_designation" class="form-label"> Designation</label>
                                <input type="text" class="form-control" name="designation" id="messager_designation"
                                    value="{{$message->messager_designation ?? @old('designation')}}">
                                    @if($errors->has('designation'))
                                    <div class="error text-danger">{{ $errors->first('designation') }}</div>
                                    @endif
                            </div>
                        </div>
                        
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="title" class="form-label"> Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{$message->title ?? @old('title')}}">
                                    @if($errors->has('title'))
                                    <div class="error text-danger">{{ $errors->first('title') }}</div>
                                    @endif
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="customFile">Image</label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="customFile"
                                    onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                    class="@error('image') is-invalid @enderror">
                                <label class="custom-file-label" for="customFile">Choose Image</label>
                                @if($errors->has('image'))
                                <div class="error text-danger">{{ $errors->first('image') }}</div>
                            @endif
                            </div>
                                <img class="mt-2" id="image" alt="image" width="100" height="100"/>
                                @if (isset($message))
                                <div class="old_image mt-2">
                                    <label class="mb-0" for="">Old Image:</label><br>
                                    <img class="mt-2" id="oldimage" src="{{Config::get('app.s3_url').$message->image}}"
                                    alt="image" width="100" height="100"/>
                                </div>
                                @endif
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="btn-link" class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" id="btn-slug"
                                    value="{{$message->slug ?? @old('slug')}}">
                                    @if($errors->has('slug'))
                                    <div class="error text-danger">{{ $errors->first('slug') }}</div>
                                    @endif
                                </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="editor" class="form-label">Message</label>
                                <textarea class="form-control" id="editor" name="content"
                                    rows="3">{{$message->content ?? @old('content')}}</textarea>
                                    @if($errors->has('content'))
                                    <div class="error text-danger">{{ $errors->first('content') }}</div>
                                    @endif
                                </div>
                        </div>

                        <div class="form-check mb-4" style="margin-left: 14px;">
                            <input type="checkbox" class="form-check-input status" id="status" name="status" value="1" @if(isset($message)){{($message->status == 1)?'checked':''}}@endif>
                            <label class="form-check-label" style="margin-left: 5px;margin-top:3px;padding-top: 5px;" for="status">Status</label>
                            @if($errors->has('status'))
                            <div class="error text-danger">{{ $errors->first('status') }}</div>
                            @endif
                        </div>
                    </div>

                    @if(isset($message))
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

    $("#image").hide();
    $("#customFile").change(function () {
        $("#image").show();
    });

    $('.message').addClass('active');
    $(".home").addClass('active');
</script>

@endpush
