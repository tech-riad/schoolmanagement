@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="main-panel">
        @include($adminTemplate.'.academic.academicnav')

        <div class="card new-table">
            {{-- <a href="#" class="btn btn-primary pull-right" style="width: 90px">Back</a> --}}
            <div class="card-body">
                <h6>Student Transfer</h6>
                
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
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Student List</h4>
                            <p class="card-title" style="color:rgba(0, 0, 0, 0.5)"> Result Of : Academic Year- <span id="year"></span> , Class- <span id="class"></span> , Shift- <span id="shift"></span> , Category- <span id="category"></span> , Section- <span id="section"></span> , Group- <span id="group"></span></p>
                        </div>
                    </div>

                    <form action="{{route('academic.transfer-certificate.store')}}" method="post">
                        @csrf
                        <div class="">
                            <table id="customTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <div class="form-check py-0 my-0">
                                                <input type="checkbox" class="form-check-input" checked id="checkAll">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th>ID</th>
                                        <th> Name </th>
                                        <th> Roll No </th>
                                        <th> Class </th>
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
<script>
            var loader = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#fff;display:block;" width="31px" height="31px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                    <circle cx="50" cy="50" fill="none" stroke="#e15b64" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                                        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                                    </circle>
                                    </svg>`;

            $('#student-form').submit(function(e){
                e.preventDefault();
                var form= $(this);
                
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



                var url = "{{ route('student.get-admited-students') }}";
                var exam_id = $('#exam_id').val();
                var session = $("#session_id").val();
                var class_id = $("#class_id").val();
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
                        // console.log(data);
                        let html = '';
                        $('#preload').html('');
                        $('#table-card').css('display','block');
                        $.each(data.students,function(i,v){
                            if(v){
                                html += `<tr>
                                           
                                            <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" checked
                                                    name="check[]" value='${v.id}' id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1"></label>
                                            </div>
                                            <input type='hidden' name='student_id[]' value='${v.id}'>
                                            </td>
                                            <td>${v.id_no}</td>
                                            <td>${v.name}</td>
                                            <td>${v.roll_no}</td>
                                            <td>${v.ins_class.name}</td>
                                        </tr>
                                        `;
                                        
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
                
            });


            $('input[type="checkbox"]').change(function() {
            var checked = $(this).is(':checked');
            var input = $(this).closest('tr').find('input[type="text"]');
            var select = $(this).closest('tr').find('select,input');
            input.prop('required', checked)
            select.prop('required', checked)
            });

            $("#checkAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
            });
</script>
@endpush
