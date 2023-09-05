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
        @if (isset($getintouch))
        <div class="card-header">
            <h4>Update Get In Touch</h4>
        </div>
        @else
        <div class="card-header">
            <h4>Add Link</h4>
        </div>
        @endif
            <div class="card-body">
                <form
                    action="{{ isset($getintouch)? route('getintouch.update',$getintouch->id) : route('getintouch.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @if(isset($getintouch))
                    @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                    value="{{$getintouch->phone ?? @old('phone')}}">
                                    @if($errors->has('phone'))
                            <div class="error">{{ $errors->first('phone') }}</div>
                            @endif
                            </div>


                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{$getintouch->email ?? @old('email')}}" required>
                                    @if($errors->has('email'))
                            <div class="error">{{ $errors->first('email') }}</div>
                            @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" id="address"
                                    value="{{$getintouch->address ?? @old('address')}}" required>
                                    @if($errors->has('address'))
                            <div class="error">{{ $errors->first('address') }}</div>
                            @endif
                            </div>
                        </div>
                    </div>

                    @if(isset($getintouch))
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
   
    

    $('.getintouch').addClass('active');
    $(".home").addClass('active');

</script>

@endpush