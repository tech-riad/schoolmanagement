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
    <div class="page-body">
        @include($adminTemplate.'.academic.academicnav')

        <div class="card new-table">
            <div class="card-body">
                <a href="#" class="btn btn-success float-right">Back</a>
                <h6>Student Number Sheet</h6>
                <hr>
                <form id="student-form" method="GET">
                    @include('custom-blade.search-student')
                    <div class="row py-2">
                        <div class="col-md-3">
                            <label for="">Select Exam</label>
                            <select class="form-control" name="exam_id" id="exam_id">
                                @foreach ($exams as $exam)
                                    <option value="{{$exam->id}}">{{$exam->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
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
            <div class="card new-table" id="table-card" style="display: block">
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
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Student List</h4>
                            <p class="card-title" style="color:rgba(0, 0, 0, 0.5)"> Result Of : Academic Year- <span id="year"></span> , Class- <span id="class"></span> , Shift- <span id="shift"></span> , Category- <span id="category"></span> , Section- <span id="section"></span> , Group- <span id="group"></span></p>
                        </div>
                    </div>

                    <form action="{{route('studentprofile.update')}}" method="post">
                        @csrf
                        <div style="overflow-x:scroll;">
                            <table id="dtHorizontalExample" class="table">
                                <thead id="t_head">
                                    {{-- @php
                                        $subjects = Helper::class_subjects(1);
                                    @endphp
                                    @foreach ($subjects as $s)
                                        <th>{{$s->sub_name}}</th>
                                    @endforeach --}}
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
                var exam_id = $('#exam_id').val();
                var session = $("#session_id").val();
                var class_id = $("#class_id").val();

                // $.ajax({
                //     type: 'GET',
                //     url: '/academic/number-sheet/subjectbyclassid/'+class_id,
                //     success: function(data){
                //         var html = `<th width='5%' scope="col">
                //                         <div class="form-check py-0 my-0">
                //                             <input type="checkbox" class="form-check-input" checked id="checkAll">
                //                             <label class="form-check-label" for="checkAll"></label>
                //                         </div>
                //                     </th>`;

                //         $.each(data.subjects,function(i,v){
                //             html += `
                //                 <tr>
                //                     <th>${v.sub_name}</th>
                //                 </tr>
                //             `;
                //         });

                //         $("#t_head").html(html);
                //         console.log(html);
                //     }
                // });


                $('#preload').html(loader);
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: form.serialize(),
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        // console.log(data);
                        let html = '';
                        $('#preload').html('');
                        $('#table-card').css('display','block');
                        $.each(data.students,function(i,v){

                            let viewBtn = `<a class="btn btn-info" target="_blank" href=""><i class="fa fa-eye"></i></a>`;
                            let dwnBtn = `<a class="btn btn-primary" href=""><i class="fa fa-arrow-down"></i></a>`;

                            // console.log(v);
                            let html = '';
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

                            $("tbody").append(html);

                        });

                    },
                    error: function(data) {
                        $('#image-input-error').text(data.responseJSON.message);
                    }
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


        
</script>
@endpush
