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
        @include($adminTemplate.'.academic.academicnav')
        <div class="card new-table">
            <div class="card-header">
                <h6>Setting Edit</h6>
            </div>
            <div class="card-body">

                <form action="{{route('academic.setting.update',$setting->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label for="school_name" class="form-label">School Name <sup style="color: red;">English Only <sup>*</sup></sup></label>
                                <input id="school_name" name="school_name" type="text " class="form-control" value="{{$setting->school_name ?? @old('school_name')}}"
                                class="@error('school_name') is-invalid @enderror">

                                @error('school_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <label for="customFile">Institute Logo</label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="logoimage"
                                    onchange="document.getElementById('showlogoimage').src = window.URL.createObjectURL(this.files[0])"
                                    class="@error('image') is-invalid @enderror">
                                <label class="custom-file-label" for="logoimage">Choose Image</label>
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <img class="mt-2 d-none" id="showlogoimage" alt="image" width="100" height="100" />
                            @if(isset($setting->image))
                            <div class="old_image mt-2">
                                <label class="mb-0" for="">Old Image:</label><br>
                                <img class="mt-2" id="oldimage"
                                    src="{{Config::get('app.s3_url').$setting->image}}" alt="image"
                                    width="100" height="100" />
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label for="admit_content" class="form-label">Admit Content</label>
                                <textarea class="form-control" id="admit_content" name="admit_content"
                                    rows="10" class="@error('image') is-invalid @enderror">{{$setting->admit_content ?? @old('admit_content')}}</textarea>

                                @error('admit_content')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label for="qrcode" class="form-label">QR Code <sup style="color: red;">Text <sup>*</sup></sup></label>
                                <input id="qrcode" name="qrcode" type="text " class="form-control" value="{{$setting->qrcode ?? @old('qrcode')}}"
                                class="@error('qrcode') is-invalid @enderror">

                                @error('qrcode')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label for="id_card_content" class="form-label">Id Card Content</label>
                                <textarea class="form-control" id="id_card_content" name="id_card_content"
                                    rows="10" class="@error('id_card_content') is-invalid @enderror">{{$setting->id_card_content ?? @old('id_card_content')}}</textarea>

                                    @error('id_card_content')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label for="transfer_certificate_content" class="form-label">Transfer Certificate Content <small class="text-danger"> Use this short code carefully :name, :father_name, :mother_name , :division , :district , :upazila , :class</small></label>
                                <textarea class="form-control" id="transfer_certificate_content" name="transfer_certificate_content"
                                    rows="10" class="@error('transfer_certificate_content') is-invalid @enderror">{{$setting->transfer_certificate_content ?? @old('transfer_certificate_content')}}</textarea>

                                    @error('transfer_certificate_content')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label for="testimonial_content" class="form-label">Testimonial Content <small class="text-danger"> Use this short code carefully :name, :father_name, :mother_name , :division , :district , :upazila , :class</small></label>
                                <textarea class="form-control" id="testimonial_content" name="testimonial_content"
                                    rows="10" class="@error('testimonial_content') is-invalid @enderror">{{$setting->testimonial_content ?? @old('testimonial_content')}}</textarea>

                                    @error('testimonial_content')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label for="signText" class="form-label">Signature Text</label>
                                <input id="signText" name="signText" type="text " class="form-control" value="{{$setting->signText ?? @old('signText')}}"
                                class="@error('signText') is-invalid @enderror">

                                @error('signText')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <label for="customFile">Sign Image</label>
                            <div class="custom-file">
                                <input type="file" name="signImage" class="custom-file-input" id="signimage"
                                    onchange="document.getElementById('showsignImage').src = window.URL.createObjectURL(this.files[0])"
                                    class="@error('signImage') is-invalid @enderror">
                                <label class="custom-file-label" for="signimage">Choose SignImage</label>
                                @error('signImage')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <img class="mt-2 d-none" id="showsignImage" alt="signImage" style="height:100px; width:auto;" />
                            @if (isset($setting->signImage))
                            <div class="old_image mt-2">
                                <label class="mb-0" for="">Old SignImage:</label><br>
                                <img class="mt-2 mb-2" id="oldimage" src="{{Config::get('app.s3_url').$setting->signImage}}" alt="signImage" width="auto" height="100" />
                            </div>
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Update</button>
                </form>


            </div>
        </div>

    </div>
@endsection

@push('js')
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
<script>
   
    $("#signimage").change(function () {
        $("#showsignImage").removeClass('d-none');
    });


    $("#logoimage").change(function () {
        $("#showlogoimage").removeClass('d-none');
    });

    $('#academic_setting').addClass('active');
    $('#settings-nav').removeClass('d-none');

</script>
@endpush
