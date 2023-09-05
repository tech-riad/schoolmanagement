@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <style>
        .img-select {
            text-align: center;
            padding: 7px 9px 0px 13px;
            border: thin solid black;
            background: #1366AB;
            margin-bottom: 15px;
            margin-top: 15px;
        }

        input {
            display: none;
        }

        label {
            cursor: pointer;
        }

        #imageName {
            color: green;
        }

        #exp-div {
            padding: 10px;
            border: 1px solid #DCE;
            margin-top: 8px;
        }

        .exp-hr {
            margin-top: 40px;
        }

        .qual-hr {
            margin-top: 40px;
        }
    </style>
@endpush
@section('content')
    <div class="main-panel" id="update-profile-id">
        @include($adminTemplate.'.teachers.teachernav')
        <div class="card new-table">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="image-upload" method="POST" enctype="multipart/form-data">
                                    <div class="card mb-4 h-100">
                                        <div class="card-body text-center">
                                            <div class="img d-flex flex-column align-items-center">
                                                <img class="rounded-circle img-fluid" width="120px" id="image-preview"
                                                    src="{{ isset($teacher->photo) ? Config::get('app.s3_url').$teacher->photo : Helper::default_image() }}">
                                                <input type="hidden" name="id" value="{{ @$teacher->id }}">
                                                <span class="text-danger" id="image-input-error"></span>
                                                <button class="btn btn-primary" type="submit" id="btn-save" style="margin-bottom: 15px; margin-top:5px;display:none">Save</button>
                                            </div>
                                            <div class="img-select btn btn-primary mt-2">
                                                <label for="inputTag">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    <input type="file" name="photo" id="inputTag" />
                                                </label>
                                            </div>
                                            <h5 class="my-3">{{ @$teacher->name }}</h5>
                                            <p class="text-muted mb-1">{{ @$teacher->designation->title }}</p>
                                            <p class="text-muted mb-4">{{ @$teacher->present_address }}</p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <form id="signature-upload" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card mb-4 h-100">
                                        <div class="card-body text-center mb-4">
                                            <div class="img d-flex flex-column align-items-center">
                                                <img class="img-fluid p-3" width="120px" id="signature-preview" src="{{ isset($teacher->signature_image) ? Config::get('app.s3_url').$teacher->signature_image : Helper::default_signature_image() }}">
                                                <input type="hidden" name="id" value="{{ @$teacher->id }}">
                                                <span class="text-danger" id="image-input-error"></span>
                                                <button class="btn btn-primary" type="submit" id="btn-save-signature" style="margin-bottom: 15px; margin-top:5px;display:none">Save</button>
                                            </div>
                                            <div class="img-select btn btn-primary">
                                                <label for="signatureInput">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    <input type="file" name="signature_image" id="signatureInput" />
                                                </label>
                                            </div><br>
                                            <span class="text-small text-danger">Only PNG Formate</span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <form action="{{ route('teacher.update', @$teacher->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $teacher->id }}">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <p class="mb-2"><b> Basic Information</b></p>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Full Name</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="name"
                                                        value="{{ @$teacher->name }}" id="">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Father Name</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="father_name"
                                                        value="{{ @$teacher->father_name }}" id="">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Mother Name</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="mother_name"
                                                        value="{{ @$teacher->mother_name }}" id="">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Gender</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select name="gender" class="form-control" id="">
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Email</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="email"
                                                        value="{{ @$teacher->email }}" id="">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Phone</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="mobile_number"
                                                        value="{{ @$teacher->mobile_number }}" id="">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">joining Date</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="date" name="joining_date"
                                                        value="{{ @$teacher->joining_date }}" id="">
                                                </div>
                                            </div>
                                             <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Designation</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="designation" id="">
                                                        @foreach ($designations as $designation)
                                                            <option value="{{ $designation->id }}"
                                                                {{ @$teacher->designation_id === $designation->id ? 'selected' : '' }}>
                                                                {{ $designation->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div id="marge" class="col-sm-3">
                                                    <p class="mb-0">National Id</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="nid"
                                                        value="{{ @$teacher->nid }}" id="">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Unique Id</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="number" name="uuid"
                                                        value="{{ @$teacher->uuid }}" id="">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Date Of Birth</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="date" name="date_of_birth"
                                                        value="{{ @$teacher->date_of_birth }}" id="">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Blood Group</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="blood_group" id="">
                                                        @foreach ($blood_groups as $item)
                                                            <option value="{{ $item }}"
                                                                {{ @$teacher->blood_group === $item ? 'selected' : '' }}>
                                                                {{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Present Address</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="present_address"
                                                        value="{{ @$teacher->present_address }}" id="">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Permanent Address</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="permanent_address"
                                                        value="{{ @$teacher->permanent_address }}" id="">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Nationality</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="nationality"
                                                        value="{{ @$teacher->nationality }}" id="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-2">
                            <div class="card-body" id="exp-body">
                                <div>
                                    <p class="mb-2 float-left"><b> Experience</b></p>
                                    <a href="" id="exp-add" class="btn btn-primary float-right mb-2"> <i
                                            class="fa fa-plus"></i></a>
                                </div>
                                <hr class="exp-hr">

                                <div class="exp-div">
                                    @forelse (@$teacher->experiences as $experience)
                                        <div class="card" style="box-shadow: none;border:1px solid rgb(209, 209, 209)" id="exp-card">
                                            <div class="card-header">
                                                <a href="" id="delete-exp"
                                                    class="btn btn-danger btn-sm float-right delete-exp">X</a>
                                            </div>
                                            <div class="card-body">
                                                <div id="exp-div" style='border:none'>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <label for="">Org. Name</label>
                                                            <input type="text" class="form-control" name="org_name[]"
                                                                value="{{ @$experience->org_name }}" required>
                                                        </div>
                                                        <div class="col">
                                                            <label for="">Address</label>
                                                            <input type="text" class="form-control" name="address[]"
                                                                value="{{ @$experience->address }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="">Org. Type</label>
                                                            <input type="text" class="form-control" name="org_type[]"
                                                                value="{{ @$experience->org_type }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mt-2">
                                                        <div class="col">
                                                            <label for="">Position</label>
                                                            <input type="text" class="form-control" name="position[]"
                                                                value="{{ @$experience->position }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="">Responsibilities</label>
                                                            <input type="text" class="form-control"
                                                                name="responsibilities[]"
                                                                value="{{ @$experience->responsibilities }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="">Duration</label>
                                                            <input type="text" class="form-control" name="duration[]"
                                                                value="{{ @$experience->duration }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="card" style="box-shadow: none;border:1px solid rgb(209, 209, 209)" id="exp-card">
                                            <div class="card-header">
                                                <a href="" id="delete-exp"class="btn btn-danger btn-sm float-right delete-exp">X</a>
                                            </div>
                                            <div class="card-body">
                                                <div id="exp-div" style='border:none'>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <label for="">Org. Name</label>
                                                            <input type="text" class="form-control" name="org_name[]"
                                                                value="{{ @$experience->org_name }}" required>
                                                        </div>
                                                        <div class="col">
                                                            <label for="">Address</label>
                                                            <input type="text" class="form-control" name="address[]"
                                                                value="{{ @$experience->address }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="">Org. Type</label>
                                                            <input type="text" class="form-control" name="org_type[]"
                                                                value="{{ @$experience->org_type }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mt-2">
                                                        <div class="col">
                                                            <label for="">Position</label>
                                                            <input type="text" class="form-control" name="position[]"
                                                                value="{{ @$experience->position }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="">Responsibilities</label>
                                                            <input type="text" class="form-control"
                                                                name="responsibilities[]"
                                                                value="{{ @$experience->responsibilities }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="">Duration</label>
                                                            <input type="text" class="form-control" name="duration[]"
                                                                value="{{ @$experience->duration }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforelse

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- Experience --}}

                {{-- Qualification --}}
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" id="qual-body">
                                <div>
                                    <p class="mb-2 float-left"><b> Qualification</b></p>
                                    <a href="" id="qual-add" class="btn btn-primary float-right mb-2"> <i
                                            class="fa fa-plus"></i></a>
                                </div>
                                <hr class="qual-hr">
                                @forelse (@$teacher->qualifications as $qual)
                                    <div class="card" id="qaual-card" style="box-shadow: none;border:1px solid rgb(209, 209, 209)">
                                        <div class="card-header">
                                            <a href="" id="delete-qual" class="btn btn-danger btn-sm float-right delete-qual">X</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="col">
                                                    <label for="">Exam Title</label>
                                                    <input class="form-control" type="text" name="exam_title[]"
                                                        value="{{ $qual->exam_title }}">
                                                </div>
                                                <div class="col">
                                                    <label for="">Year</label>
                                                    <input class="form-control" type="text" name="year[]"
                                                        value="{{ $qual->year }}">
                                                </div>
                                            </div>
                                            <div class="form-row mt-2">
                                                <div class="col">
                                                    <label for="">University</label>
                                                    <input class="form-control" type="text" name="university[]"
                                                        value="{{ $qual->university }}">
                                                </div>
                                                <div class="col">
                                                    <label for="">GPA</label>
                                                    <input class="form-control" type="text" name="gpa[]"
                                                        value="{{ $qual->gpa }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="card" id="qaual-card" style="box-shadow: none;border:1px solid rgb(209, 209, 209)">
                                        <div class="card-header">
                                            <a href="" id="delete-qual"
                                                class="btn btn-danger btn-sm float-right delete-qual">X</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="col">
                                                    <label for="">Exam Title</label>
                                                    <input class="form-control" type="text" name="exam_title[]">
                                                </div>
                                                <div class="col">
                                                    <label for="">Year</label>
                                                    <input class="form-control" type="text" name="year[]">
                                                </div>
                                            </div>
                                            <div class="form-row mt-2">
                                                <div class="col">
                                                    <label for="">University</label>
                                                    <input class="form-control" type="text" name="university[]">
                                                </div>
                                                <div class="col">
                                                    <label for="">GPA</label>
                                                    <input class="form-control" type="text" name="gpa[]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Qualification --}}

                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-2">

                            <div class="card-body">

                                <h6>Social Links</h6>
                                <hr>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="">Facebook Link</label>
                                        <input class="form-control" name="facebook_link"
                                            value="{{ $teacher->facebook_link }}" type="text">
                                    </div>
                                    <div class="col">
                                        <label for="">Youtube Link</label>
                                        <input class="form-control" name="youtube_link"
                                            value="{{ $teacher->youtube_link }}" type="text">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="">Instagram Link</label>
                                        <input class="form-control" name="instagram_link"
                                            value="{{ $teacher->instagram_link }}" type="text">
                                    </div>
                                    <div class="col">
                                        <label for="">Linkedin Link</label>
                                        <input class="form-control" name="linkedin_link"
                                            value="{{ $teacher->linkedin_link }}" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-arrow-alt-circle-up"></i> Update</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
    </script>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //jquery image view
            $('#inputTag').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {

                    $('#image-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
                $('#btn-save').css('display', 'block');
            });


            //jquery signature view
            $('#signatureInput').change(function() {
                let filereader = new FileReader();
                filereader.onload = (e) => {

                    $('#signature-preview').attr('src', e.target.result);
                }
                filereader.readAsDataURL(this.files[0]);
                $('#btn-save-signature').css('display', 'block');
            });



             //upload signature
             $('#signature-upload').submit(function(e) {
                e.preventDefault();
                var url = "{{ route('teacher.updateSignature', $teacher->id) }}";
                let formDatasignature = new FormData(this);
                $('#image-input-error').text('');
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formDatasignature,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#btn-save-signature").hide(1000);
                        if (data.status == '200') {
                            Toast.fire({
                                icon: 'success',
                                title: data['message']
                            });
                        }
                    },
                   
                });
            });



             //upload image
             $('#image-upload').submit(function(e) {
                e.preventDefault();
                var url = "{{ route('teacher.updatephoto', $teacher->id) }}";
                let formData = new FormData(this);
                $('#image-input-error').text('');
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        console.log(data);
                        $("#btn-save").hide(1000);
                        if (data.status == '200') {
                            Toast.fire({
                                icon: 'success',
                                title: data['message']
                            });
                        }
                    },
                   
                });
            });


            //form submit
            $("#save").click(function(e) {
                e.preventDefault();
                var id = $('#id').val();
                var url = "{{ route('teacher.update', $teacher->id) }}";

                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#teacher-form").serialize(),
                    success: function(data) {
                        if (data['message']) {
                            Toast.fire({
                                icon: 'success',
                                title: data['message']
                            });
                        }
                    },
                    error: function() {

                    }
                });
            });


            //add experience div
            $('#exp-add').click(function(e) {

                e.preventDefault();
                const exp_div = `    <div class="card mt-2" id="exp-card" style="box-shadow: none;border:1px solid rgb(209, 209, 209)">
                                        <div class="card-header">
                                            <a href="" id="delete-exp" class="btn btn-danger btn-sm float-right delete-exp">X</a>
                                        </div>
                                        <div class="card-body">
                                            <div id="exp-div" style='border:none'>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label for="">Org. Name</label>
                                                        <input type="text" class="form-control" name="org_name[]" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="">Address</label>
                                                        <input type="text" class="form-control" name="address[]">
                                                    </div>
                                                    <div class="col">
                                                        <label for="">Org. Type</label>
                                                        <input type="text" class="form-control" name="org_type[]" >
                                                    </div>
                                                </div>
                                                <div class="form-row mt-2" >
                                                    <div class="col">
                                                        <label for="">Position</label>
                                                        <input type="text" class="form-control" name="position[]" >
                                                    </div>
                                                    <div class="col">
                                                        <label for="">Responsibilities</label>
                                                        <input type="text" class="form-control" name="responsibilities[]" >
                                                    </div>
                                                    <div class="col">
                                                        <label for="">Duration</label>
                                                        <input type="text" class="form-control" name="duration[]" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;

                $('#exp-body').append(exp_div);

            });

            //delete exp div
            $(document).on('click', '.delete-exp', function(e) {

                console.log('delete exp');
                e.preventDefault();
                $this = $(this);

                $this.closest('#exp-card').remove();
            });

            //add Qualification Div
            $('#qual-add').click(function(e) {
                e.preventDefault();

                let qual_div = ` <div class="card mt-2" id="qaual-card" style="box-shadow: none;border:1px solid rgb(209, 209, 209)">
                                    <div class="card-header">
                                        <a href="" id="delete-qual" class="btn btn-danger btn-sm float-right delete-qual">X</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="">Exam Title</label>
                                                <input class="form-control" type="text" name="exam_title[]">
                                            </div>
                                            <div class="col">
                                                <label for="">Year</label>
                                                <input class="form-control" type="text" name="year[]">
                                            </div>
                                        </div>
                                        <div class="form-row mt-2">
                                            <div class="col">
                                                <label for="">University</label>
                                                <input class="form-control" type="text" name="university[]">
                                            </div>
                                            <div class="col">
                                                <label for="">GPA</label>
                                                <input class="form-control" type="text" name="gpa[]">
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                $('#qual-body').append(qual_div);
            });


            //delete qualifiaction div
            $(document).on('click', '#delete-qual', function(e) {

            console.log('delete-qual');
            e.preventDefault();
            $this = $(this);

            $this.closest('#qaual-card').remove();
            });


        });
    </script>
@endpush
