@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="page-body">
        @include($adminTemplate.'.academic.academicnav')
        <div class="card new-table">
            <div class="card-body">
                <h6>Student Tag</h6>
                <hr>
                <form id="student-form" method="GET">
                    @include('custom-blade.search-student')
                    <div class="row py-2">
                        <div class="col-sm-6" style="display: flex">
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
                <div class="card-header">
                    <h6>Student Tag</h6>
                    <p class="card-title" style="color:rgba(0, 0, 0, 0.5)"> Result Of : Academic Year- <span id="year"></span> , Class- <span id="class"></span> , Shift- <span id="shift"></span> , Category- <span id="category"></span> , Section- <span id="section"></span> , Group- <span id="group"></span> , Exam- <span id="exam"></span></p>
                </div>
                <a href="javascript:void(0)" id="downloadBtn" class="btn btn-primary text-white float-right mr-4 mb-2 mt-2 d-none"><i class="fa-solid fa-file-pdf"></i>Pdf Generates</a>
                <div class="card-body">
                    <table id="customTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Roll No</th>
                                <th>Class</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <form action="{{route('academic.student-tag.alldownload')}}" id="download-form" hidden method="post">
                        @csrf

                        <div id="student-tag-download-form" hidden>
                            {{-- data form ajax --}}

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
            var loader = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#fff;display:block;" width="31px" height="31px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                    <circle cx="50" cy="50" fill="none" stroke="#e15b64" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                                        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                                    </circle>
                                    </svg>`;

            $('#student-form').submit(function(e){
                e.preventDefault();
                var form= $(this);
                var url = "{{ route('student.get-admited-students') }}";
                var section = $("#section_id").val();
                $('#preload').html(loader);

                if(section){
                 $.ajax({
                    type: 'GET',
                    url: url,
                    data: form.serialize(),
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if(data.students.length > 0){
                            $("#downloadBtn").removeClass('d-none');
                        }

                        let html = '';
                        $('#preload').html('');
                        $('#table-card').css('display','block');
                        $.each(data.students,function(i,v){


                            let viewBtn = `<a class="btn btn-info" target='__blank' href="/academic/student-tag/view/${v.id}"><i class="fa fa-eye"></i></a>`;
                            let dwnBtn = `<a class="btn btn-primary" href="/academic/student-tag/download-tag/${v.id}"><i class="fa fa-arrow-down"></i></a>`;
                            //console.log(v);

                            $value = `
                                    <input type="number" name="student_id[]" hidden value='${v.id}'>
                                    `;

                            $("#student-tag-download-form").append($value);

                            if(v){
                                html += `<tr>
                                            <td>
                                                ${v.id_no}
                                            </td>
                                            <td>${v.name}</td>
                                            <td>${v.roll_no}</td>
                                            <td>${v.ins_class.name}</td>
                                            <td>${viewBtn}  ${dwnBtn}</td>
                                        </tr>`;
                            }else{
                                html += `<tr>
                                            <td colspan="6" class="text-center">
                                                <h5 style="color:red">No Student Found!</h5>
                                            </td>

                                        </tr>`;
                            }

                        });

                        $('tbody').html(html);
                        $('#customTable').DataTable();
                    },
                    error: function(data) {
                        $('#image-input-error').text(data.responseJSON.message);
                    }
                });   
                }
                


                var url = "{{ route('student.get-admited-students') }}";
                var exam_id = $('#exam_id').val();

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
                        $("#exam").html(data.exam.name);
                        $("#group").html(data.group.name);
                        $("#section").html(data.section.name);
                        $("#shift").html(data.shifts.name);
                    }
                });
            });

            $("#downloadBtn").click(function(){
                $("#download-form").submit();
            });
</script>
@endpush
