@extends($adminTemplate.'.admin.layouts.app')
@push('css')
<style>
    .ck-editor__editable[role="textbox"] {
        /* editing area */
        min-height: 200px;
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
            @if (isset($page))
            <div class="card-header">
                <h4>Update Page</h4>
            </div>
            @else
            <div class="card-header">
                <h4>Add Page</h4>
            </div>
            @endif
            <div class="card-body">
                <form action="{{ isset($page)? route('page.update',$page->id) : route('page.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @if(isset($page))
                    @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{$page->title ?? @old('title')}}">
                                @if($errors->has('title'))
                                <div class="error">{{ $errors->first('title') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="customFile">Image</label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="image_input"
                                        onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                        class="@error('image') is-invalid @enderror">
                                    <label class="custom-file-label" for="image_input">Choose Logo</label>
                                    @if($errors->has('image'))
                                    <div class="error">{{ $errors->first('image') }}</div>
                                    @endif
                                </div>
                                <img class="mt-2" id="image" alt="image" width="100" height="100" />
                                @if(isset($page))
                                <h4 class="mt-2">Old Image :</h4>
                                <img class="" id="old_image" src="{{asset('uploads/pageimages/'.$page->image)}}"
                                    alt="image" width="100" height="100" />
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="editor" rows="8" name="content"
                                    rows="3">{{$page->content ?? @old('content')}}</textarea>

                            </div>
                        </div>
                    </div>






                    @if(isset($page))
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
    $("#image_input").change(function () {
        $("#image").show();
    });

    $('#setting-tab').addClass('active');
    $(".pages").addClass('active');

</script>

@endpush
