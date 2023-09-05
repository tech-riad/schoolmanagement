@extends($adminTemplate.'.admin.layouts.app')

@push('css')
    <style>
        .account-settings .user-profile .user-avatar {
            margin: 0 0 1rem 0;
        }

        .account-settings .user-profile .user-avatar img {
            width: 90px;
            height: 90px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            border-radius: 100px;
        }

        .account-settings .user-profile h5.user-name {
            margin: 0 0 0.5rem 0;
        }

        .account-settings .user-profile h6.user-email {
            margin: 0;
            font-size: 0.8rem;
            font-weight: 400;
            color: #9fa8b9;
        }

        .account-settings .about {
            margin: 2rem 0 0 0;
            text-align: center;
        }

        .account-settings .about h5 {
            margin: 0 0 15px 0;
            color: #007ae1;
        }

        .account-settings .about p {
            font-size: 0.825rem;
        }




        .img-select {
            text-align: center;
            padding: 7px 9px 0px 13px;
            border: thin solid black;
            background: #efefef;
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
    </style>
@endpush
@section('content')
    <div class="page-body">
        @include($adminTemplate.'.student.studentnav')

        <div class="card new-table">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="account-settings">
                                    <form id="image-upload" method="POST" enctype="multipart/form-data">
                                        <div class="user-profile">
                                            <div class="img d-flex flex-column align-items-center">
                                                <div class="user-avatar">
                                                    @if ($student->gender == 'Male')
                                                        <img class="rounded-circle img-fluid" width="150px" id="image-preview"
                                                        src="{{ @$student->photo ? Config::get('app.s3_url').$student->photo:  asset('male.png')}}">
                                                    @else
                                                        <img class="rounded-circle img-fluid" width="150px" id="image-preview"
                                                        src="{{ @$student->photo ? Config::get('app.s3_url').$student->photo:  asset('female.jpeg')}}">
                                                    @endif

                                                </div>
                                                <input type="hidden" name="id" value="{{ $student->id }}">
                                                <span class="text-danger" id="image-input-error"></span>
                                                <button class="btn btn-primary" type="submit" id="btn-save"
                                                    style="margin-bottom: 15px; margin-top:5px;display:none">Save</button>
                                            </div>
                                            <div class="img-select">
                                                <label for="inputTag">
                                                    Select Image
                                                    <input name="photo" id="inputTag" type="file" />
                                                </label>
                                            </div>
                                            <h5 class="user-name">{{ $student->name }}</h5>
                                            <h6 class="user-email">Class: {{ $student->class->name }}</h6>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <form action="{{ route('student.update', $student->id) }}" method="POST">
                            @csrf
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="mb-2 text-primary">Personal Details ({{ $student->uuid ?? $student->id_no }})
                                            </h6>
                                            <hr>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="fullName">Full Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $student->name }}" id="fullName"
                                                    placeholder="Enter full name">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="eMail">Email</label>
                                                <input type="email" class="form-control" id="eMail"
                                                    placeholder="Enter email ID" name="email"
                                                    value="{{ @$student->email }}">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="text" class="form-control" id="phone"
                                                    placeholder="Enter phone number" name="mobile_number"
                                                    value="{{ @$student->mobile_number }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="fullName">Religion</label><br>
                                                <select name="religion" class="form-select form-control">
                                                    @foreach ($religions as $r)
                                                        <option value="{{ $r->name }}"
                                                            @if (isset($student)) {{ $student->religion == $r->name ? 'selected' : '' }} @endif>
                                                            {{ $r->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="fullName">Gender</label><br>
                                                <select name="gender" class="form-select form-control">
                                                    @foreach ($genders as $g)
                                                        <option value="{{ $g->name }}"
                                                            @if (isset($student)) {{ $student->gender == $g->name ? 'selected' : '' }} @endif>
                                                            {{ $g->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="mothername">Date Of Birth</label>
                                                <input type="date" name="dob" class="form-control"
                                                    value="{{ $student->dob }}" id="mothername">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="phone">Blood Group</label>
                                                <select class="form-control" name="blood_group" id="">
                                                    @foreach ($blood_groups as $item)
                                                        <option value="{{ $item }}"
                                                            {{ @$student->blood_group === $item ? 'selected' : '' }}>
                                                            {{ $item }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="phone">Division</label>
                                                <select class="form-control" name="division_id" id="division_id">
                                                    <option value="" selected hidden>select one</option>
                                                    @foreach ($divisions as $division)
                                                        <option value="{{ $division->id }}" {{$division->id == $student->division_id ? 'selected' : ''}}>{{ $division->name }} : {{ $division->bn_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="phone">District</label>
                                                <select class="form-control" name="district_id" id="district_id">
                                                    @foreach ($districts as $district)
                                                        <option value="{{ $district->id }}" {{$district->id == $student->district_id ? 'selected' : ''}}>{{ $district->name }} : {{ $district->bn_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="phone">Upazila</label>
                                                <select class="form-control" name="upazila_id" id="upazila_id">
                                                    @foreach ($upazilas as $upazila)
                                                        <option value="{{ $upazila->id }}" {{$upazila->id == $student->upazila_id ? 'selected' : ''}}>{{ $upazila->name }} : {{ $upazila->bn_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="text-primary">Father Information</h6>
                                <hr>
                                <div class="form-row mt-2">
                                    <div class="col">
                                        <label for="father_name">Name</label>
                                        <input type="text" class="form-control" id="father_name"
                                            placeholder="Enter Father Name" name="father_name" value="{{ @$student->father_name }}">
                                    </div>
                                    <div class="col">
                                        <label for="father_nid">National Id</label>
                                        <input type="number" class="form-control" id="father_nid"
                                            placeholder="Enter Father National Id" name="father_nid" value="{{ @$student->father_nid_no }}">
                                    </div>
                                    <div class="col">
                                        <label for="father_passport">Passport</label>
                                        <input type="number" class="form-control" id="father_passport"
                                            placeholder="Enter Father Passport No" name="father_passport" value="{{ @$student->father_passport_no }}">
                                    </div>
                                </div>

                                <div class="form-row mt-2">
                                    <div class="col">
                                        <label for="father_nationality">Nationality</label>
                                        <input type="text" class="form-control" id="father_nationality"
                                            placeholder="Enter Father Nationality" name="father_nationality" value="{{ @$student->father_nationality }}">
                                    </div>
                                    <div class="col">
                                        <label for="phone">Religion</label>
                                        <input type="father_religion" class="form-control" id="father_religion"
                                            placeholder="Enter Father Religion" name="father_religion" value="{{ @$student->father_religion }}">
                                    </div>
                                    <div class="col">
                                        <label for="father_profession">Profession</label>
                                        <input type="text" class="form-control" id="father_profession"
                                            placeholder="Enter Father Profession" name="father_profession" value="{{ @$student->father_profession }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="text-primary">Mother Information</h6>
                                <hr>
                                <div class="form-row mt-2">
                                    <div class="col">
                                        <label for="mother_name">Name</label>
                                        <input type="text" class="form-control" id="mother_name"
                                            placeholder="Enter Mother Name" name="mother_name" value="{{ @$student->mother_name }}">
                                    </div>
                                    <div class="col">
                                        <label for="mother_nid">National Id</label>
                                        <input type="number" class="form-control" id="mother_nid"
                                            placeholder="Enter Mother National Id" name="mother_nid" value="{{ @$student->mother_nid_no }}">
                                    </div>
                                    <div class="col">
                                        <label for="mother_passport">Passport</label>
                                        <input type="number" class="form-control" id="mother_passport"
                                            placeholder="Enter Mother Passport No" name="mother_passport" value="{{ @$student->mother_passport_no }}">
                                    </div>
                                </div>

                                <div class="form-row mt-2">
                                    <div class="col">
                                        <label for="mother_nationality">Nationality</label>
                                        <input type="text" class="form-control" id="mother_nationality"
                                            placeholder="Enter mother Nationality" name="mother_nationality" value="{{ @$student->mother_nationality }}">
                                    </div>
                                    <div class="col">
                                        <label for="phone">Religion</label>
                                        <input type="mother_religion" class="form-control" id="mother_religion"
                                            placeholder="Enter mother Religion" name="mother_religion" value="{{ @$student->mother_religion }}">
                                    </div>
                                    <div class="col">
                                        <label for="mother_profession">Profession</label>
                                        <input type="text" class="form-control" id="mother_profession"
                                            placeholder="Enter mother Profession" name="mother_profession" value="{{ @$student->mother_profession }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="text-primary">Guardien Information</h6>
                                <hr>
                                <div class="form-row mt-2">
                                    <div class="col">
                                        <label for="guardien_name">Name</label>
                                        <input type="text" class="form-control" id="guardien_name"
                                            placeholder="Enter Guardien Name" name="guardien_name" value="{{ @$student->guardien_name }}">
                                    </div>
                                    <div class="col">
                                        <label for="guardien_nid">National Id</label>
                                        <input type="number" class="form-control" id="guardien_nid"
                                            placeholder="Enter Guardien National Id" name="guardien_nid" value="{{ @$student->guardien_nid_no }}">
                                    </div>
                                    <div class="col">
                                        <label for="guardien_passport">Passport</label>
                                        <input type="number" class="form-control" id="guardien_passport"
                                            placeholder="Enter Guardien Passport No" name="guardien_passport" value="{{ @$student->guardien_passport_no }}">
                                    </div>
                                </div>

                                <div class="form-row mt-2">
                                    <div class="col">
                                        <label for="guardien_nationality">Nationality</label>
                                        <input type="text" class="form-control" id="guardien_nationality"
                                            placeholder="Enter Guardien Nationality" name="guardien_nationality" value="{{ @$student->guardien_nationality }}">
                                    </div>
                                    <div class="col">
                                        <label for="phone">Religion</label>
                                        <input type="guardien_religion" class="form-control" id="guardien_religion"
                                            placeholder="Enter Guardien Religion" name="guardien_religion" value="{{ @$student->guardien_religion }}">
                                    </div>
                                    <div class="col">
                                        <label for="guardien_profession">Profession</label>
                                        <input type="text" class="form-control" id="guardien_profession"
                                            placeholder="Enter Guardien Profession" name="guardien_profession" value="{{ @$student->guardien_profession }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <input type="hidden" value="{{$student->id}}" name="student_id" id="student_id">
                            <div class="card-body">
                                <h6 class="text-primary">Change Password</h6>
                                <hr>
                                <div class="form-group">
                                    <label for="">New Password</label>
                                    <input type="text" name="password" id="password" class="form-control">
                                    <span class="text-danger" id="pass-error"></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="text" name="password_confirmation"  id="confirm-password" class="form-control">
                                    <span class="text-danger" id="cpass-error"></span>
                                    <span class="text-danger" id="match-error"></span>
                                </div>
                                <div class="form-group">
                                    <a href="" id="cng-password" class="btn btn-info">Change Password</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                </div>


                <div class="row gutters m-3 p-3">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-right">
                            <a type="button" href="{{ route('student.list') }}"
                                id="submit" name="submit"
                                class="btn btn-secondary">Cancel</a>
                            <button type="submit" id="submit" name="submit"
                                class="btn btn-primary">Update</button>
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
        $('input[type="checkbox"]').change(function() {
            var checked = $(this).is(':checked');
            var input = $(this).closest('tr').find('input[type="text"]');
            var select = $(this).closest('tr').find('select,input');
            input.prop('required', checked)
            select.prop('required', checked)
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#inputTag').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {

                $('#image-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
            $('#btn-save').css('display', 'block');
        });

        //upload image
        $('#image-upload').submit(function(e) {
            e.preventDefault();
            var url = "{{ route('student.update', $student->id) }}";
            let formData = new FormData(this);
            $('#image-input-error').text('');

            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: (data) => {
                    $("#btn-save").hide(1000);
                    if (data.status == '200') {
                            Toast.fire({
                                icon: 'success',
                                title: data['message']
                            });
                        }
                },
                error: function(data) {
                    $('#image-input-error').text(data.responseJSON.message);
                }
            });
        });
        //form submit


        $("#division_id").on('change',function(){
            $("#district_id").empty();
            var id = $(this).val();
            var url = '/get-district/'+id;
            $.ajax({
                url     : url,
                type    : 'GET',
                success : function(response){
                    $.each(response.districts,function(i,v){
                        var items = `<option value='${v.id}'>${v.name} : ${v.bn_name}</option>`;
                        $("#district_id").append(items);
                    });
                }
            });
        });


        $("#district_id").on('change',function(){
            $("#upazila_id").empty();
            var id = $(this).val();
            var url = '/get-upazila/'+id;
            $.ajax({
                url     : url,
                type    : 'GET',
                success : function(response){
                    $.each(response.upazilas,function(i,v){
                       var items = `<option value='${v.id}'>${v.name} : ${v.bn_name}</option>`;
                        $("#upazila_id").append(items);
                    });
                }
            });
        });

        //password change
        $('#cng-password').click(function(e){
            e.preventDefault();
            let password  = $('#password').val();
            let cpassword = $("input[name=password_confirmation]").val();

            let student_id = $('#student_id').val();

            if(password == ''){
                $('#pass-error').html('Password cannot be empty');
            }
            if(cpassword == ''){
                $('#cpass-error').html('Confirm Password cannot be empty');
            }

            if(password != cpassword){
                $('#pass-error').html('');
                $('#cpass-error').html('');
                $('#match-error').html('Password Not Matched');
            }
            else{
                $('#match-error').html('');
                $.post("{{route('student.change-password')}}",{student_id,password},
                function(data){
                    if (data.status == '200') {
                            Toast.fire({
                                icon: 'success',
                                title: 'Password Change Successfully'
                            });
                        }
                })

            }

        });
</script>
@endpush
