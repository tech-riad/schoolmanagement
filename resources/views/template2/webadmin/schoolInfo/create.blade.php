@extends($adminTemplate.'.admin.layouts.app')

@section('content')
<div class="page-body" id="school-info-id">
    @include($adminTemplate.'.webadmin.webadminnav')
    @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    <div class="card new-table">
        <div class="card">
            <div class="card-header">
                <h4>School Infos</h4>
            </div>
            <div class="card-body">
                <form action="{{route('info.update',$info->id)}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{$info->name ?? ''??@old('name')}}">
                                @if($errors->has('name'))
                            <div class="error">{{ $errors->first('name') }}</div>
                            @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="eiin" class="form-label">EIIN</label>
                                <input type="number" class="form-control" name="eiin_no" id="eiin"
                                    value="{{$info->eiin_no??@old('eiin_no')}}" required>
                                    @if($errors->has('eiin_no'))
                            <div class="error">{{ $errors->first('eiin_no') }}</div>
                            @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="founded_at" class="form-label">Founded at</label>
                                <input type="number" class="form-control" name="founded_at" id="founded_at"
                                    value="{{$info->founded_at??@old('founded_at')}}">
                                    @if($errors->has('founded_at'))
                            <div class="error">{{ $errors->first('founded_at') }}</div>
                            @endif
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="founded_at" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" id="address"
                                    value="{{$info->address ?? @old('address')}}">
                                    @if($errors->has('address'))
                            <div class="error">{{ $errors->first('address') }}</div>
                            @endif
                            </div>
                        </div>

                        <div class="col-sm-6 mt-2">
                            <label for="customFile">School Photo</label>
                            <div class="custom-file">
                                <input type="file" name="school_photo" class="custom-file-input" id="customFile"
                                    onchange="document.getElementById('school_photo').src = window.URL.createObjectURL(this.files[0])"
                                    class="@error('school_photo') is-invalid @enderror">
                                <label class="custom-file-label" for="customFile">Choose Logo</label>
                                @if($errors->has('school_photo'))
                            <div class="error">{{ $errors->first('school_photo') }}</div>
                            @endif
                            </div>
                            <img class="mt-2" id="school_photo" src="{{$info->logo === 'default.png' ? Helper::default_image() : asset('uploads/schoolInfo/'.$info->school_photo)}}"
                                alt="logo" width="100" height="100"/>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <label for="customFile">Favicon</label>
                            <div class="custom-file">
                                <input type="file" name="favicon" class="custom-file-input" id="customFile"
                                    onchange="document.getElementById('favicon').src = window.URL.createObjectURL(this.files[0])"
                                    class="@error('favicon') is-invalid @enderror">
                                <label class="custom-file-label" for="customFile">Choose Logo</label>
                                @if($errors->has('favicon'))
                            <div class="error">{{ $errors->first('favicon') }}</div>
                            @endif
                            </div>
                            <img class="mt-2" id="favicon" src="{{$info->logo === 'default.png' ? Helper::default_image() : asset('uploads/schoolInfo/'.$info->favicon)}}"
                                alt="favicon" width="100" height="100"/>
                        </div>
                        <div class="col-sm-6">
                            <label for="customFile">Logo</label>
                            <div class="custom-file">
                                <input type="file" name="logo" class="custom-file-input" id="customFile"
                                    onchange="document.getElementById('logo').src = window.URL.createObjectURL(this.files[0])"
                                    class="@error('logo') is-invalid @enderror">
                                <label class="custom-file-label" for="customFile">Choose Logo</label>
                                @if($errors->has('logo'))
                            <div class="error">{{ $errors->first('logo') }}</div>
                            @endif
                            </div>
                            <img class="mt-2" id="logo" src="{{$info->logo === 'default.png' ? Helper::default_image() : asset('uploads/schoolInfo/'.$info->logo)}}"
                                alt="logo" width="100" height="100"/>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <div class="mb-3">
                                <label for="about" class="form-label">About</label>
                                <textarea class="form-control" name="about" rows="8">{{$info->about??@old('about')}}</textarea>
                                @if($errors->has('about'))
                            <div class="error">{{ $errors->first('about') }}</div>
                            @endif
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <div class="mb-3">
                                <label for="googlemap" class="form-label">googlemap</label>
                                <textarea class="form-control" name="googlemap" rows="8">{{$info->googlemap??@old('googlemap')}}</textarea>
                                @if($errors->has('googlemap'))
                            <div class="error">{{ $errors->first('googlemap') }}</div>
                            @endif
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
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
    $('.general_info').addClass('active');
    $(".home").addClass('active');

</script>

@endpush
