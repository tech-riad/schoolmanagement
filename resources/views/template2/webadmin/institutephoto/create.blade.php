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
    {{ implode('', $errors->all('<div>:Careful Please</div>')) }}
    @endif

    <div class="card new-table">
        <div class="card">

        @if (isset($institutephoto))
        <div class="card-header">
            <h4>Update Photos</h4>
        </div>
        @else
        <div class="card-header">
            <h4>Add Photos</h4>
        </div>
        @endif
            <div class="card-body">
                <form
                    action="{{ isset($institutephoto)? route('institutephoto.update',$institutephoto->id) : route('institutephoto.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @if(isset($institutephoto))
                    @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{$institutephoto->title ?? @old('title')}}" required>
                                @if($errors->has('title'))
                                <div class="error">{{ $errors->first('title') }}</div>
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
                            @if (isset($institutephoto))
                            <div class="old_image mt-2">
                                <label class="mb-0" for="">Old Image:</label><br>
                                <img class="mt-2" id="oldimage"
                                    src="{{isset($institutephoto)? asset('uploads/institutephoto/'.$institutephoto->image):''}}" alt="image"
                                    width="100" height="100" />
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="sl_no" class="form-label">Serial Number</label>
                                <input type="number" name="sl_no" class="form-control"
                                    value="{{$institutephoto->sl_no ?? @old('sl_no')}}">
                                @if($errors->has('sl_no'))
                                <div class="error">{{ $errors->first('sl_no') }}</div>
                                @endif
                            </div>
                        </div>
                        
                    </div>


                    <div class="row">
                        
                    <div class="col-lg-12">
                    <div class="form-check mb-4" style="margin-left: 14px;">
                            <input type="checkbox" class="form-check-input status" id="status" name="status" value="1"
                                @if(isset($institutephoto)){{($institutephoto->status == 1)?'checked':''}}@endif>
                            <label class="form-check-label" style="margin-left: 5px;margin-top:3px;padding-top: 5px;"
                                for="status">Status</label>
                            @if($errors->has('status'))
                            <div class="error">{{ $errors->first('status') }}</div>
                            @endif
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
    

    $("#image").hide();
    $("#customFile").change(function () {
        $("#image").show();
    });


    $('.photos').addClass('active');
    $(".gallery").addClass('active');
    $('#gal').addClass('show').addClass('active')
    $("#home").removeClass('active')
    

</script>
@endpush
