@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="page-body">
        @include($adminTemplate.'.academic.academicnav')

        <div class="card new-table">
            <div class="card-body">
                <h6>Student Id Card</h6>
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
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Student Id Card List</h4>
                            <p class="card-title" style="color:rgba(0, 0, 0, 0.5)"> Result Of : Academic Year- <span id="year"></span> , Class- <span id="class"></span> , Shift- <span id="shift"></span> , Category- <span id="category"></span> , Section- <span id="section"></span> , Group- <span id="group"></span></p>
                        </div>
                    </div>
                    
                    <a href="javascript:void(0)" id="downloadBtn" class="btn btn-primary text-white float-right mr-1 mb-2 mt-2 d-none"><i class="fa-solid fa-cloud-arrow-down"></i>Front</a>
                    <a href="javascript:void(0)" id="downloadBtnBack" class="btn btn-primary text-white float-right mr-1 mb-2 mt-2 d-none"><i class="fa-solid fa-cloud-arrow-down"></i>Back</a>

                    <div class="">
                        <table id="customTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th> Name </th>
                                    <th> Roll No </th>
                                    <th> Class </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <form action="{{route('academic.id-card.alldownload')}}" id="download-form" hidden method="post">
                        @csrf

                        <div id="idcard-download-form" hidden>
                            {{-- data form ajax --}}

                        </div>
                    </form>

                    <form action="{{route('academic.id-card.back-download')}}" id="download-form-back" hidden method="post">
                        @csrf
                        <div id="idcard-backdownload-form" hidden>
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
                var section = $("#section_id").val();

                $('#preload').html(loader);

                var url = "{{ route('student.get-admited-students') }}";
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
                            $("#downloadBtnBack").removeClass('d-none');
                        }

                        let html = '';
                        $('#preload').html('');
                        $('#table-card').css('display','block');
                        $.each(data.students,function(i,v){

                            let viewBtn = `<a class="btn btn-info" href="/academic/id-card/view/${v.id}"><i class="fa fa-eye"></i></a>`;
                            let dwnBtn = `<a class="btn btn-primary" href="/academic/id-card/download-card/${v.id}"><i class="fa fa-arrow-down"></i></a>`;
                            console.log(v);

                            $value = `<input type="number" name="student_id[]" hidden value='${v.id}'>`;

                            $("#idcard-download-form").append($value);
                            $("#idcard-backdownload-form").append($value);


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


            $("#downloadBtn").click(function(){
                $("#download-form").submit();
            });

            $("#downloadBtnBack").click(function(){
                $("#download-form-back").submit();
            });
</script>
@endpush
