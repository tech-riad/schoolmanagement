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
    <div class="main-panel" id="marks-id">
        @include($adminTemplate.'.attendance.partials.attendancenav')

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

                    <form action="{{route('attendance.studentsetup.update')}}" method="post">
                        @csrf
                        <div style="width:100%" id="student-info-id">
                            <table id="dtHorizontalExample" class="table table-responsive" style="width:100%;">
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
                                        <th> ID NO </th>
                                        <th> Roll No </th>
                                        <th> Mobile </th>
                                        <th> Finger ID </th>
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

                            indexArray.push(i);

                            var name            = v.name;
                            var roll_no         = v.roll_no;
                            var mobile_number   = v.mobile_number;
                            var finger_id       = v.finger_id;
                            var id_no           = v.id_no;

                            if(mobile_number == null){
                                mobile_number  = '';
                            }

                            if(name == null){
                                name  = '';
                            }

                            if(finger_id == null){
                                finger_id  = '';
                            }
                            if(roll_no == null){
                                roll_no  = '';
                            }
                            

                            if(id_no == null){
                                id_no  = '';
                            }
        


                            if(v){
                                let html;
                                html += '<tr>'
                                    html += '<td><div class="form-check"><input type="checkbox" class="form-check-input"  checked name="check[]" id="exampleCheck1" value="'+v.id+'"><label class="form-check-label" for="exampleCheck1"></label></div></td>'

                                    html += `<td style="width:80px">
                                                <div class="img-select text-center">
                                                    <img class="rounded-circle img-fluid" style='width:80px' src="{{Config::get('app.s3_url')}}${v.photo == null? 'male.png':v.photo}" id="image-preview-${v.id}">
                                                </div>
                                            </td>`
                                            
                                    html += '<td><input type="text" class="form-control" disabled name="name['+v.id+']" id="name" value="'+name+'"></td>'

                                    html += '<td><input type="text" class="form-control" disabled name="id_no['+v.id+']" id="id_no" value="'+id_no+'"></td>'

                                    html += '<td><input type="text" class="form-control" disabled name="roll_no['+v.id+']" id="roll_no" value="'+roll_no+'"></td>'

                                    html += '<td><input type="text" class="form-control" disabled name="mobile_number['+v.id+']" id="mobile_number" value="'+mobile_number+'" ></td>'

                                    html += `<input type="hidden" value="${v.id}" class="form-control" id="student-id" >`

                                    html += '<td><input type="number" class="form-control" name="finger_id['+v.id+']" id="finger_id" value="'+v.finger_id+'"></td>'

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



        $(".stu-setup").addClass('custom_nav');
        $('.setting').closest('li').addClass('custom_nav');
        $('#setting-item').removeClass('d-none');
        $('.student_attend_nav').removeClass('custom_nav');
</script>
@endpush
