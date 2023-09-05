@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="page-body">

        @include($adminTemplate.'.student.studentnav')

        <div class="card new-table mb-3">
            <div class="card">
                <div class="card-body">
                    <h6>Confirm Student Admission</h6>
                    <hr>
                    <div>
                        @include('custom-blade.search-student')
                        <div class="row py-2">

                            <div class="col-sm-6" style="display: flex">
                                <br>
                                <a href="" class="btn btn-primary" id="process"> <i
                                        class="fas fa-arrow-circle-down"></i> Proccess</a>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
        &nbsp;
        &nbsp;
        <div id="preload">

        </div>
        <form action="{{ route('student.store') }}" method="post">
            @csrf
            <div id="data-card" style="display: none">
                <div class="card new-table">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Student List</h4>
                                    <p class="card-title" style="color:rgba(0, 0, 0, 0.5)"> Result Of : Academic Year- <span id="year"></span> , Class- <span id="class"></span> , Shift- <span id="shift"></span> , Category- <span id="category"></span> , Section- <span id="section"></span> , Group- <span id="group"></span></p>
                                </div>
                            </div>

                            <div class="content-wrapper text-primary" id="student-table">
                                {{-- //get from ajax --}}
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {

            $(document).on('change', '.checkbox', function() {
                var checked = $(this).is(':checked');
                var input = $(this).closest('tr').find('input[type="time"]');

                var select = $(this).closest('tr').find('select,input');
                input.prop('required', checked)
                select.prop('required', checked)
            });

            var loader = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#fff;display:block;" width="31px" height="31px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                      <circle cx="50" cy="50" fill="none" stroke="#e15b64" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                      </circle>
                    </svg>`;

            //Get Shift By Class
            $('#class_id').change(function() {
                var class_id = $(this).val();
                console.log(class_id, 'class_id')
                $.ajax({
                    url: '/student/getShiftbyClass/' + class_id,
                    type: 'GET',
                    success: function(data) {
                        data.map(function(val, index) {
                            console.log(val, index);
                            $("#shift_id").append(
                                `<option value='${val.id}'>${val.name}</option>`);
                        })
                    }
                });
            });


            //Get Category, Section & Group
            $('#shift_id').change(function() {
                var class_id = $('#class_id').val();
                var shift_id = $(this).val();

                $.ajax({
                    url: '/student/getCatSecGro/' + class_id + '/' + shift_id,
                    type: 'GET',
                    success: function(data) {
                        data.category.map(function(val, index) {
                            $("#category_id").append(
                                `<option value='${val.id}'>${val.name}</option>`);
                        })
                        data.section.map(function(val, index) {
                            $("#section_id").append(
                                `<option value='${val.id}'>${val.name}</option>`);
                        })
                        data.group.map(function(val, index) {
                            $("#group_id").append(
                                `<option value='${val.id}'>${val.name}</option>`);
                        })
                    }
                });
            });


            //Get Admission Students
            $('#process').click(function(e) {

                e.preventDefault();

                const session_id = $('#session_id').val();
                const class_id = $('#class_id').val();
                const shift_id = $('#shift_id').val();
                const category_id = $('#category_id').val();
                const section_id = $('#section_id').val();
                const group_id = $('#group_id').val();

                var searchUrl = "{{route('search-result')}}";
                $.ajax({
                    type    : 'GET',
                    url     : searchUrl,
                    data    : {
                        academic_year_id: session_id,
                        class_id: class_id,
                        shift_id: shift_id,
                        section_id: section_id,
                        category_id: category_id,
                        group_id: group_id,
                    },

                    success     : function(data){
                       // console.log(data);
                        $("#year").html(data.academic_year.title);
                        $("#class").html(data.class.name);
                        $("#category").html(data.category.name);
                        $("#group").html(data.group.name);
                        $("#section").html(data.section.name);
                        $("#shift").html(data.shifts.name);
                    }
                });

                var url = "{{ route('student.get-students') }}";
                $('#preload').html(loader);

                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        session_id: session_id,
                        class_id: class_id,
                        shift_id: shift_id,
                        section_id: section_id,
                        category_id: category_id,
                        group_id: group_id,
                    },
                    success: function(data) {

                        var tbody = '';
                        var index = 1;
                        $('#preload').html('');
                        $('#data-card').css('display', 'block');
                        $.each(data, function(index, item) {
                            index++;

                            tbody += `<tr>
                                            <td scope="col">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" checked name="check[]" id="exampleCheck1" value="${index}">
                                                    <label class="form-check-label" for="exampleCheck1"></label>
                                                </div>
                                            </td>
                                            <input type="hidden" name="ids[]" value="${item.id}">
                                            <input type="hidden" name="session_id[]" value="${item.session_id}">
                                            <input type="hidden" name="class_id[]" value="${item.class_id}">
                                            <input type="hidden" name="shift_id[]" value="${item.shift_id}">
                                            <input type="hidden" name="section_id[]" value="${item.section_id}">
                                            <input type="hidden" name="category_id[]" value="${item.category_id}">
                                            <input type="hidden" name="group_id[]" value="${item.group_id}">
                                            <input type="hidden" name="roll_no[]" value="${item.roll_no}">
                                            <input type="hidden" name="name[]" value="${item.name}">
                                            <input type="hidden" name="gender[]" value="${item.gender}">
                                            <input type="hidden" name="religion[]" value="${item.religion}">
                                            <input type="hidden" name="father_name[]" value="${item.father_name}">
                                            <input type="hidden" name="mother_name[]" value="${item.mother_name}">
                                            <input type="hidden" name="mobile_number[]" value="${item.mobile_number}">
                                            <td>${item.name}</td>
                                            <td>${item.ins_class.name}</td>
                                            <td>${item.roll_no}</td>
                                            <td>${item.admission_date}</td>
                                            <td>
                                                <a class="" href="#" data-toggle="tooltip" data-placement="right" title="Update Teacher Record">
                                                    <i class="mdi mdi-pencil-box" style="font-size: 31px"></i>
                                                </a>
                                            </td>
                                      </tr>`;
                        });

                        var table = `<table id="customTable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <div class="form-check py-0 my-0">
                                                        <input type="checkbox" class="form-check-input checkbox"  checked id="checkAll">
                                                        <label class="form-check-label" for="checkAll"></label>
                                                    </div>
                                                </th>
                                                <th>Name</th>
                                                <th>Class</th>
                                                <th>Roll</th>
                                                <th>Admission Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ${tbody}
                                        </tbody>
                                    </table>`;
                        $('#student-table').html(table);

                    },
                    error: function() {

                    }
                });

            });
        });
    </script>
@endpush
