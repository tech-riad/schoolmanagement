@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="page-body">
        @include($adminTemplate.'.student.studentnav')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-header">
                        <h6 class="float-left">Student Subject Assign List</h6>
                        <a href="{{route('student.subject-assign.create')}}" class="btn btn-primary float-right"><i class="fa fa-plus"></i>Reassign Subject</a>
                    </div>
                    <div class="card-body">

                        <form id="student-form" method="GET">

                            @include('custom-blade.search-student')

                            <div class="row py-2">
                                <div class="col-sm-6" style="display: flex">
                                    <br>
                                    <button type="submit" id="btn-submit" class="btn btn-primary"> <i
                                            class="fas fa-arrow-circle-down"></i>
                                        Proccess</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Roll</th>
                                    <th>Common Subjects</th>
                                    @foreach($subjectTypes as $type)
                                        <th>{{$type->name}} Subject</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody id="student-list">

                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('js')
    <script>
        $(document).ready(function() {

            $('#session_id').attr("required", "true");
            $('#section_id').attr("required", "true");

            var loader = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#fff;display:block;" width="31px" height="31px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                            <circle cx="50" cy="50" fill="none" stroke="#e15b64" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                                <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                            </circle>
                          </svg>`;
            $('#student-form').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var class_id = $("#class_id").val();

                var url = "{{ route('student.get-students-with-assign-subjects') }}";
                $('#preload').html(loader);

                $.ajax({
                    type: 'GET',
                    url: url,
                    data: form.serialize(),
                    contentType: false,
                    processData: false,
                    success:function (data){
                        console.log(data);
                        let html = '';

                        $.each(data,function (i,v){

                            let regSubjects = '';
                            $.each(v.regularSubjects,function (i,v){
                                regSubjects += `<li>${v.subject.sub_name}</li>`;
                            });

                            let otherSubjects = '';
                            $.each(v.otherSubjects,function (idx,val){
                                let subList = '';
                                $.each(val,function (index,value){
                                    subList += `<li>${value.class_subjects.subject.sub_name}</li>`;
                                });

                                otherSubjects += `<td>${subList}</td>`;
                            });

                            html += `<tr>
                                        <input type="hidden" name="student_id[]" value="${v.id}" >
                                        <td>${v.student_name}</td>
                                        <td>${v.roll_no}</td>
                                        <td>${regSubjects}</td>
                                        ${otherSubjects}
                                    </tr>`;
                        });

                        $('#student-list').html(html);
                    }
                });
            });
        });
    </script>
@endpush
