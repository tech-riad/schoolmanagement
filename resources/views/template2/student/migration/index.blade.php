@extends($adminTemplate.'.admin.layouts.app')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endpush
@section('content')
    <div class="page-body">

        @include($adminTemplate.'.student.studentnav')


        <div class="card new-table mb-3">
            <h5 class="p-4">Student Migration</h5>
            <hr>
            <div class="row">
                <div class="col-md-3" id="migration">
                    <div class="card">
                        <div class="card-body">
                            <h6>Migration From</h6>
                            <hr>
                            <form action="" id="migration-from-form">
                            <div class="form-row">
                                <div class="col">
                                    <label for="">Select Session</label>
                                    <select name="academic_year_id" id="session_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($academic_years as $academic_year)
                                            <option value="{{ $academic_year->id }}">{{ $academic_year->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="">Class</label>
                                    <select name="class_id" id="class_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col">
                                    <label>Shift</label>
                                    <select name="shift_id" id="shift_id" class="form-control">
                                        <option value="">Select</option>

                                    </select>
                                </div>
                                <div class="col">
                                    <label>Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col">
                                    <label>Section</label>
                                    <select name="section_id" id="section_id" class="form-control ">
                                        <option value="">Select</option>

                                    </select>
                                </div>
                                <div class="col">
                                    <label>Group</label>
                                    <select name="group_id" id="group_id" class="form-control">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary float-right">Process <i class="fa fa-arrow-right"></i></button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" id="migration">
                <form action="{{route('student.migration.store')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h6>Student List</h6>
                            <hr>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <div class="form-check py-0 my-0">
                                                <input type="checkbox" class="form-check-input" checked id="checkAll">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th>Name</th>
                                        <th>Id No</th>
                                        <th>Roll No</th>
                                        <th>Class</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-3" id="migration">

                    <div class="card">
                        <div class="card-body">
                            <h6>Migration To</h6>
                            <hr>
                            <div class="form-row">
                                <div class="col">
                                    <label for="">Select Session</label>
                                    <select name="academic_year_id2" id="session_id2" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($academic_years as $academic_year)
                                            <option value="{{ $academic_year->id }}">{{ $academic_year->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="">Class</label>
                                    <select name="class_id2" id="class_id2" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col">
                                    <label>Shift</label>
                                    <select name="shift_id2" id="shift_id2" class="form-control">
                                        <option value="">Select</option>

                                    </select>
                                </div>
                                <div class="col">
                                    <label>Category</label>
                                    <select name="category_id2" id="category_id2" class="form-control">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col">
                                    <label>Section</label>
                                    <select name="section_id2" id="section_id2" class="form-control ">
                                        <option value="">Select</option>

                                    </select>
                                </div>
                                <div class="col">
                                    <label>Group</label>
                                    <select name="group_id2" id="group_id2" class="form-control">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary float-right"> <i class="fa fa-save"></i> Submit</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#customTable').DataTable();

            $("#checkAll").click(function() {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

            var loader = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#fff;display:block;" width="31px" height="31px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                      <circle cx="50" cy="50" fill="none" stroke="#e15b64" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                      </circle>
                    </svg>`;

            //Get Shift By Class
            $('#class_id').change(function() {
                var class_id = $(this).val();
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

            $('#class_id2').change(function() {
                var class_id = $(this).val();

                $.ajax({
                    url: '/student/getShiftbyClass/' + class_id,
                    type: 'GET',
                    success: function(data) {
                        data.map(function(val, index) {
                            console.log(val, index);
                            $("#shift_id2").append(
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

            $('#shift_id2').change(function() {
                var class_id = $('#class_id2').val();
                var shift_id = $(this).val();

                $.ajax({
                    url: '/student/getCatSecGro/' + class_id + '/' + shift_id,
                    type: 'GET',
                    success: function(data) {
                        data.category.map(function(val, index) {
                            $("#category_id2").append(
                                `<option value='${val.id}'>${val.name}</option>`);
                        })
                        data.section.map(function(val, index) {
                            $("#section_id2").append(
                                `<option value='${val.id}'>${val.name}</option>`);
                        })
                        data.group.map(function(val, index) {
                            $("#group_id2").append(
                                `<option value='${val.id}'>${val.name}</option>`);
                        })
                    }
                });
            });


            //Get Admission Students
            $('#migration-from-form').submit(function(e){
                e.preventDefault();
                var form = $(this);
                var url = "{{ route('student.get-admited-students') }}";

                $.ajax({
                    type: 'GET',
                    url: url,
                    data: form.serialize(),
                    contentType: false,
                    processData: false,
                    success:function(data){
                        $('#migration-from-form')[0].reset();
                        let html = '';
                        $.each(data.students,function(i,value){

                            html += `<tr>
                                        <input type="hidden" name="student_id[]" value="${value.id}" />
                                        <td scope="col">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input checkbox" value="${i}" name="check[]" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1"></label>
                                            </div>
                                        </td>
                                        <td>${value.name}</td>
                                        <td>${value.id_no}</td>
                                        <td>${value.roll_no}</td>
                                        <td>${value.ins_class.name}</td>
                                    </tr>`;
                        });

                        $('tbody').html(html);
                    }
                });
            });

        });
    </script>
@endpush
