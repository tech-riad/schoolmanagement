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
    <div class="main-panel">
        @include($adminTemplate.'.academic.academicnav')

        <div class="card new-table">
            <div class="card-body">
                {{-- <a href="#" class="btn btn-success float-right">Back</a> --}}
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
                        <div class="col-md-3">
                            <label for="">Select Subject</label>
                            <select class="form-control" name="subject_id" id="subject_id">
                                
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
                    
                    <a href="javascript:void(0)" id="pdf-dwn" class="btn btn-sm btn-primary float-right d-none"><i class="fa-solid fa-file-pdf mr-1"></i>Pdf-Generate</a>

                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Student Number Sheet</h4>
                            <p class="card-title" style="color:rgba(0, 0, 0, 0.5)"> Result Of : Academic Year- <span id="year"></span> , Class- <span id="class"></span> , Shift- <span id="shift"></span> , Category- <span id="category"></span> , Section- <span id="section"></span> , Group- <span id="group"></span></p>
                        </div>
                    </div>
                    
                    <form id="pdf-form" action="{{route('academic.number-sheet.download')}}" method="post">
                        @csrf
                        <span id="hidden_item"></span>

                        <div style="overflow-x:scroll;">
                            <table id="dtHorizontalExample" class="table">
                                <thead id="t_head">
                                    
                                </thead>

                                <tbody>

                                </tbody>
                            </table>
                            {{-- <button type="submit" class="btn btn-primary mt-3 mb-0">Submit</button> --}}
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

                var exam_id     = $('#exam_id').val();
                var session     = $("#session_id").val();
                var class_id    = $("#class_id").val();
                var section_id  = $("#section_id").val();
                var shift_id    = $("#shift_id").val();
                var category_id = $("#category_id").val();
                var group_id    = $("#group_id").val();
                var subject     = $("#subject_id").val();
                

                let hiddenItem = `
                                <input type="number" name="session" hidden value='${session}'>
                                <input type="number" name="class" hidden value='${class_id}'>
                                <input type="number" name="category" hidden value='${category_id}'>
                                <input type="number" name="section" hidden value='${section_id}'>
                                <input type="number" name="group" hidden value='${group_id}'>
                                <input type="number" name="exam" hidden value='${exam_id}'>
                                <input type="number" name="shift" hidden value='${shift_id}'>
                                <input type="hidden" name="subject_name" value='${subject}'>
                            `;

                $("#hidden_item").html(hiddenItem);

                if(subject){
                    let html = '';
                    html += `<tr>`;
                                html += `<tr>`;
                                html += `<th colspan='6' style='background-color:white !important;' class='text-center'><h3>${subject}</h3></th>`;
                                html += `</tr>`;
                    
                                html += `<tr>`;
                                    html += `<th width='12%' scope="col" class='text-center'>Roll</th>`;
                                    html += `<th width='12%' scope="col" class='text-center'>Name</th>`;
                                    html += `<th scope="col" class='text-center'>MCQ</th>`;
                                    html += `<th scope="col" class='text-center'>CQ</th>`;
                                    html += `<th scope="col" class='text-center'>Total</th>`;
                                    html += `<th scope="col" width='10%' class='text-center'></th>`;
                                html += `</tr>`;

                                $("#t_head").html(html);
                }

                var url = "{{ route('student.get-admited-students') }}";

                $('#preload').html(loader);
                if(section_id){

                  $.ajax({
                    type: 'GET',
                    url: url,
                    data: form.serialize(),
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        
                        if(data.students.length > 0){
                            $("#pdf-dwn").removeClass('d-none');
                        }
                        
                        let html = '';
                        $('#preload').html('');
                        $('#table-card').css('display','block');
                        $.each(data.students,function(i,v){
                            let html = '';
                            if(v){
                                html += `<tr>`;
                                html += `<td class='text-center'>${v.roll_no}</td>`;
                                html += `<td class='text-center'>${v.name}</td>`;
                                html += `<td></td>`;
                                html += `<td></td>`;
                                html += `<td></td>`;
                                html += `<td></td>`;
                                html +=`</tr>`;
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


            $("#checkAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
            });

            $("#pdf-dwn").click(function(){
                $("#pdf-form").submit();
            });
</script>
@endpush
