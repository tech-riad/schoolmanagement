@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
            }

            th, td {
            text-align: left;
            padding: 8px;
            }
    </style>
@endpush
@section('content')
    <div class="page-body" id="marks-id">
        @include($adminTemplate.'.student.studentnav')

        <div class="card new-table">
            <div class="card-body">
                <h6>Student Update Profile</h6>

                <hr>
                <form id="student-form" method="GET">
                    @include('custom-blade.search-student')
                    <div class="row py-2">
                        <div class="col-md-4" style="display: flex">
                            <br>
                            <button type="submit" id="btn-submit" class="btn btn-primary"> <i class="fas fa-arrow-circle-down"></i>
                                Proccess</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="preload" style="margin-top: 10px">

        </div>

        <div>
            <div class="card new-table" id="table-card" style="display: none">
                @if ($errors->any())
                    <div class="text-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="mb-3">
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Student List</h4>
                            <p class="card-title" style="color:rgba(0, 0, 0, 0.5)"> Result Of : Academic Year- <span id="year"></span> , Class- <span id="class"></span> , Shift- <span id="shift"></span> , Category- <span id="category"></span> , Section- <span id="section"></span> , Group- <span id="group"></span></p>
                        </div>
                    </div>

                    <form action="{{route('studentprofile.update')}}" method="post">
                        @csrf
                        <div style="width:100%" id="student-info-id">
                            <table id="dtHorizontalExample" class="table table-responsive" style="display: block">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <div class="form-check py-0 my-0">
                                                <input type="checkbox" class="form-check-input" checked id="checkAll">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th> Image </th>
                                        <th> Name </th>
                                        <th> Roll No </th>
                                        <th> Father's Name </th>
                                        <th> Mother's Name </th>
                                        <th> Mobile </th>
                                        <th> Email </th>
                                        <th> Religion </th>
                                        <th> Gender </th>
                                        <th> DOB </th>
                                        <th> B/G </th>
                                        <th> Shift </th>
                                        <th> Category </th>
                                        <th> Section </th>
                                        <th> Group </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary mt-3 mb-0">Submit</button>
                        </div>
                    </form>
                </div>
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


           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var loader = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#fff;display:block;" width="31px" height="31px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                    <circle cx="50" cy="50" fill="none" stroke="#e15b64" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                                        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                                    </circle>
                                    </svg>`;

            var indexArray = [];

            $('#student-form').submit(function(e){
                e.preventDefault();
                var form= $(this);
                $('tbody').html('');

                var url = "{{ route('student.get-admited-students') }}";
                var exam_id = $('#exam_id').val();
                var session = $("#session_id").val();
                var class_id = $("#class_id").val();
                var section = $("#section_id").val();

                $('#preload').html(loader);
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: form.serialize(),
                    contentType: false,
                    processData: false,
                    success: (data) => {

                        console.log(data);

                        let html = '';
                        $('#preload').html('');
                        if(section){
                        $('#table-card').css('display','block');

                        var array = [];
                        $.each(data.classItems,function(i,v){
                            array.push(v);
                        });


                        $.each(data.students,function(i,v){

                            console.log(v);

                           // console.log(i+1);
                            var name            = v.name;
                            var roll_no         = v.roll_no;
                            var father_name     = v.father_name;
                            var mother_name     = v.mother_name;
                            var mobile_number   = v.mobile_number;
                            var email           = v.email;
                            var religion        = v.religion;
                            var gender          = v.gender;
                            var blood_group     = v.blood_group;
                            indexArray.push(i);

                            if(name == null){
                                name  = '';
                            }
                            if(roll_no == null){
                                roll_no  = '';
                            }
                            if(father_name == null){
                                father_name  = '';
                            }
                            if(mother_name == null){
                                mother_name  = '';
                            }
                            if(email == null){
                                email  = '';
                            }
                            if(religion == null){
                                religion  = 'select once';
                            }
                            if(gender == null){
                                gender  = 'select once';
                            }
                            if(blood_group == null){
                                blood_group  = 'select once';
                            }


                            if(v){
                                let html;
                                html += '<tr>'
                                html += '<td><div class="form-check"><input type="checkbox" class="form-check-input"  checked name="check[]" id="exampleCheck1" value="'+v.id+'"><label class="form-check-label" for="exampleCheck1"></label></div></td>'

                                html += `<td style="display:flex;width:130px">
                                        <form id="image-upload-${v.id}" method="POST" enctype="multipart/form-data">
                                        <div class="img-select">
                                            <label for="inputTag-${v.id}">
                                                <span class="btn btn-primary btn-sm"><i class="fa fa-arrow-up"></i></span>
                                                <input class="d-none inputTag" name="photo" data-id="${v.id}" id="inputTag-${v.id}" type="file" />
                                            </label>

                                            <img class="rounded-circle img-fluid" src="{{Config::get('app.s3_url')}}${v.photo == null? 'male.png':v.photo}" id="image-preview-${v.id}">
                                            <button type="submit" data-id="${v.id}" id="img-save-btn-${v.id}" class="btn btn-success btn-sm img-save-btn d-none"><i class="fa fa-save"></i></button>
                                        </div>
                                        </form>
                                        </td>`
                                        
                                html += '<td><input type="text" class="form-control" name="name['+v.id+']" id="name" value="'+name+'"></td>'

                                html += '<td><input type="text" class="form-control" name="roll_no['+v.id+']" id="roll_no" value="'+roll_no+'"></td>'

                                html += '<td ><input type="text" class="form-control" name="father_name['+v.id+']" id="father_name" value="'+father_name+'"></td>'

                                html += '<td><input type="text" class="form-control" name="mother_name['+v.id+']" id="mother_name" value="'+mother_name+'"></td>'

                                html += '<td><input type="text" class="form-control" name="mobile_number['+v.id+']" id="mobile_number" value="'+mobile_number+'" ></td>'

                                html += `<input type="hidden" value="${v.id}" class="form-control" id="student-id" >`

                                
                                html += '<td><input type="text" class="form-control" name="email['+v.id+']" id="email" value="'+email+'" ></td>'

                                html += '<td> <select name="religion['+v.id+']" id="religion" class="form-control" >'
                                html += '<option value="'+religion+'" hidden selected >'+religion+'</option>'
                                @foreach ($religions as $religion)
                                    html += '<option value="{{ $religion->name }}">{{ $religion->name }}</option>'
                                @endforeach
                                html += '</select>'
                                html += '</td>'

                                html += '<td> <select name="gender['+v.id+']" id="gender" class="form-control" >'
                                html += '<option value="'+gender+'" hidden selected >'+gender+'</option>'
                                @foreach ($genders as $gender)
                                    html += '<option value="{{ $gender->id }}">{{ $gender->name }}</option>'
                                @endforeach
                                html += '</select>'
                                html += '</td>'

                                html += '<td><input type="date" class="form-control" name="dob['+v.id+']" id="email" value="'+v.dob+'" ></td>'
                                html += '<td> <select name="blood_group['+v.id+']" id="blood_group" class="form-control" >'
                                    html += `<option value="${blood_group}" hidden selected >${blood_group}</option>`
                                    html += '<option value="A+">A+</option>'
                                    html += '<option value="A-">A-</option>'
                                    html += '<option value="B+">B+</option>'
                                    html += '<option value="B-">B-</option>'
                                    html += '<option value="O+">O+</option>'
                                    html += '<option value="O-">O-</option>'
                                    html += '<option value="AB+">AB+</option>'
                                    html += '<option value="AB-">AB-</option>'
                                html += '</select>'
                                html += '</td>'



                                html += '<td> <select name="shift_id['+v.id+']" id="shift" class="form-control shift-"'+i+'" >'
                                html += `<option value="${v.shift.id}" hidden selected >${v.shift.name != 'N/A' ? v.shift.name : 'select once'}</option>`
                                $.each(array[0],function(i,v){
                                    html += `<option ${v.name == 'N/A' ? 'hidden' : ''} value="${v.id}">${v.name}</option>`
                                });
                                html += '</select>'
                                html += '</td>'

                                html += '<td> <select name="category_id['+v.id+']" id="stucategory" class="form-control stucategory" >'
                                    if(v.category){
                                        html += `<option value="${v.category.id}" hidden selected >${v.category.name != 'N/A' ? v.category.name : 'select once'}</option>`
                                    }
                                
                                html += '</select>'
                                html += '</td>'

                                html += '<td> <select name="section_id['+v.id+']" id="stusection" class="form-control stusection">'
                                    if(v.section){
                                        html += `<option value="${v.section.id}" hidden selected >${v.section.name != 'N/A' ? v.section.name : 'select once'}</option>`
                                    }
                                html += '</select>'
                                html += '</td>'

                                html += '<td> <select name="group_id['+v.id+']" id="stugroup" class="form-control stugroup">'
                                if(v.group){
                                    html += `<option value="${v.group.id}" hidden selected >${v.group.name != 'N/A' ? v.group.name : 'select once'}</option>`
                                }
                                html += '</select>'
                                html += '</td>'

                                html += '</tr>'

                                $('tbody').append(html);

                            }

                        });
                        }
                    },
                    error: function(data) {
                        $('#image-input-error').text(data.responseJSON.message);
                    }
                });

                //image preview
                $(document).on('change','.inputTag',function() {
                    let reader = new FileReader();
                    let student_id = $(this).data('id');

                    reader.onload = (e) => {
                        $(`#image-preview-${student_id}`).removeClass('d-none');
                        $(`#image-preview-${student_id}`).attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                    // $('#btn-save').css('display', 'block');
                    $(`#img-save-btn-${student_id}`).removeClass('d-none');
                });

                // image save with ajax
                $(document).on('click','.img-save-btn',function(e){
                    e.preventDefault();
                    // var values = $('#image-upload input').serialize();
                    let student_id = $(this).data('id');
                    var formData = new FormData($(`#image-upload-${student_id}`)[0]);
                    let url = "/student/image-update/"+student_id;

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: (data) => {
                            $(`#img-save-btn-${student_id}`).hide(1000);
                            console.log(data);
                            Toast.fire({
                                icon: 'success',
                                title: data['message']
                            });

                        },
                        error: function(data) {
                            $('#image-input-error').text(data.responseJSON.message);
                        }
                    });

                });


                var searchUrl = "{{route('search-result')}}";
                $.ajax({
                    type    : 'GET',
                    url     : searchUrl,
                    data    : form.serialize(),
                    contentType: false,
                    processData: false,
                    success     : function(data){
                        $("#year").html(data.academic_year.title);
                        $("#class").html(data.class.name);
                        $("#category").html(data.category.name);
                        $("#group").html(data.group.name);
                        $("#section").html(data.section.name);
                        $("#shift").html(data.shifts.name);
                    }
                });
             });

            $("#checkAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
            });


            var index = '';

            for (let i = 0; i < indexArray.length; i++){
                index   = indexArray[i];
            }

            $(document).on('change','.shift-'+index+'',function(){
                var id = $(this).val();

                var stucategory = $(this).closest('tr').find('.stucategory');
                var stusection = $(this).closest('tr').find('.stusection');
                var stugroup = $(this).closest('tr').find('.stugroup');

                $.ajax({
                    url     : '/student/getitembyshiftid/'+id,
                    type    : 'GET',
                    success : function(data){

                        stucategory.empty();
                        stusection.empty();
                        stugroup.empty();

                        if(data.categories){
                            $.each(data.categories,function(i,v){
                                stucategory.append(`<option ${v.name == 'N/A' ? 'hidden' : ''} value='${v.id}'>${v.name != 'N/A' ? v.name : 'No category added'}</option>`);
                            });
                        }

                        if(data.sections){
                            $.each(data.sections,function(i,v){
                                stusection.append(`<option ${v.name == 'N/A' ? 'hidden' : ''} value='${v.id}'>${v.name != 'N/A' ? v.name : 'No section added'}</option>`);
                            });
                        }

                        if(data.groups){
                            $.each(data.groups,function(i,v){
                                stugroup.append(`<option ${v.name == 'N/A' ? 'hidden' : ''} value='${v.id}'>${v.name != 'N/A' ? v.name : 'No group added'}</option>`);
                            });
                        }
                    }
                });
            });
</script>
@endpush
