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
        <div class="card">
        @if (isset($notice))
        <div class="card-header">
            <h4>Update Notice</h4>
        </div>
        @else
        <div class="card-header">
            <h4>Add Notice</h4>
        </div>
        @endif
            <div class="card-body">
                <form action="{{ isset($notice)? route('notice.update',$notice->id) : route('notice.store') }}"
                    method="POST">
                    @csrf
                    @if(isset($notice))
                    @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="title" class="form-label"> Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{$notice->title ?? @old('title')}}" required>
                                    @if($errors->has('title'))
                            <div class="error">{{ $errors->first('title') }}</div>
                            @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="editor" class="form-label">Content</label>
                                <textarea class="form-control" id="editor" name="content"
                                    rows="10" >{{$notice->content ?? @old('content')}}</textarea>
                                    @if($errors->has('content'))
                            <div class="error">{{ $errors->first('content') }}</div>
                            @endif
                            </div>
                        </div>

                        <div class="form-check mb-4" style="margin-left: 14px;">
                            <input type="checkbox" class="form-check-input status" id="status" name="status" value="1" @if(isset($notice)){{($notice->status == 1)?'checked':''}}@endif>
                            <label class="form-check-label" style="margin-left: 1px;margin-top:3px;padding-top: 5px;" for="status">Status</label>
                            @if($errors->has('status'))
                            <div class="error">{{ $errors->first('status') }}</div>
                            @endif
                        
                        </div>
                    </div>

                    @if(isset($notice))
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
    $("#image_input").change(function () {
        $("#image").show();
    });


    $('.notice').addClass('active');
    $(".home").addClass('active');
</script>



@endpush
