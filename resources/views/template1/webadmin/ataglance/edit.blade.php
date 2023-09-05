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
<div class="main-panel">
    @include($adminTemplate.'.webadmin.webadminnav')


    <div class="card new-table">
        <div class="card">
            <div class="card-body">
                <form action="{{route('ataglance.update', $ataglance->id)}}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="content" class="form-label">Update Glance</label>
                        <textarea class="form-control" id="editor" name="content"
                            rows="3">{{$ataglance->content}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
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


        $('.at_a_glance').addClass('active');
        $(".home").addClass('active');

</script>

@endpush
