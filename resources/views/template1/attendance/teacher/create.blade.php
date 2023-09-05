@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="main-panel">

        @include($adminTemplate.'.attendance.partials.attendancenav')
        <div>
            <div class="card new-table">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Teacher Attendance List</h4>
                            <p class="card-description"> Teachers attendance record list here, </p>
                        </div>
                        {{-- data-toggle="modal" data-target="#exampleModal" --}}
                        <a href="{{ route('attendance.teacher.index') }}" class="btn btn-primary mr-2"
                            style="width: 175px;height: 34px;">Attendance List
                            <i class="fa fa-list"></i>
                        </a>
                    </div>
                    <div class="content-wrapper text-primary">
                        <form id="teacher-form" method="POST">
                            <div class="form-row">

                                <div class="col-md-3">
                                    <label for="">Designation</label>
                                    <select class="form-control" id="desig_type">
                                        <option selected hidden value="all">Select Designation</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="staff">Staff</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="">Teachers</label>
                                    <select class="form-control" name="teacher_id" id="teacheANDstaff">
                                       
                                    </select>
                                </div>

                                    <div class="col-3">
                                        <label for="">Select Date</label>
                                        <input type="date" value="{{ date('Y-m-d') }}" name="inputdate"
                                            class="form-control" id="date" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="">In Time</label>
                                        <input type="time" value="" class="form-control" id="in_time" name="inTime" required>
                                    </div>
                                    <div class="col-3 mt-2">
                                        <label for="">Out Time</label>
                                        <input type="time" value="" class="form-control" id="out_time" name="outTime" required>
                                    </div>

                            </div>
                            
                            <div class="form-group" style="margin-top: 10px">
                                <button type="submit" class="btn btn-primary">Process <i
                                        class="fa fa-arrow-circle-down"></i></button>
                            </div>
                        </form>
                    </div>

                    <div class="row" id="table-card" style="display: none">
                        <div class="col-md-12">
                            <div class="card">
                                <form action="{{ route('attendance.teacher.store') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <table class="table table-hover" style="border: 1px solid grey">
                                            <thead>
                                                <th>
                                                    <div class="form-check py-0 my-0">
                                                        <input type="checkbox" class="form-check-input" checked
                                                            id="checkAll">
                                                        <label class="form-check-label" for="checkAll"></label>
                                                    </div>
                                                </th>
                                                <th>Id No</th>
                                                <th>Name</th>
                                                <th>In Time</th>
                                                <th>Out Time</th>
                                                <th class="text-center" width='20%'>Status</th>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                        <button class="btn btn-primary mt-2">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $("#desig_type").on('change',function(){
               var type = $(this).val();
               
               $.ajax({
                    url     : '/attendance/teacher/get-teachers-by-type/'+type,
                    type    : 'GET',
                    success : function(data){

                        $("#teacheANDstaff").empty();
                    
                        if(data.type == 'teacher'){
                            var items = `<option value="teachers">All</option>`;
                        }else{
                            var items = `<option value="staffs">All</option>`;
                        }
                        
                        $.each(data.teachers,function(i,v){
                            if(v){
                                items += `<option value='${v.id}'>${v.name}</option>`;
                            }else{
                                items = `<option hidden selected value=''>${'No Data Found'}</option>`;
                            }
                        });

                        $("#teacheANDstaff").append(items);
                    }
               });

            });




            $("#checkAll").click(function() {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

            $('#customTable').DataTable();

            $('#teacher-form').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var url = "{{ route('attendance.teacher.get-teachers') }}";

                $.ajax({
                    type: 'GET',
                    url: url,
                    data: form.serialize(),
                    contentType: false,
                    processData: false,
                    success: function(data) {

                        console.log(data);


                        $('#table-card').css('display', 'block');
                        let html = '';

                        if (data.teachers.length > 0) {
                            $.each(data.teachers, function(i, value){
                                html += `<tr>
                                            <input type="hidden" name="teacher_id[]" value="${value.id}" />
                                            <input type="hidden" name="date" value="${data.data.inputdate}" />
                                            <td scope="col">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input checkbox" value="${i}" name="check[]" id="exampleCheck1" checked>
                                                    <label class="form-check-label" for="exampleCheck1"></label>
                                                </div>
                                            </td>
                                            <td>${value.id_no}</td>
                                            <td>${value.name}</td>
                                            <td>
                                                <input type="time" value="${data.data.inTime}" class="form-control in_time_input" name="in_time[]" id="in_time_input" />
                                            </td>
                                            <td>
                                                <input type="time" value="${data.data.outTime}" class="form-control out_time_input" name="out_time[]" id="out_time_input" />
                                            </td>
                                            <td>
                                                <div class="switch-toggle switch-3 switch-candy">
                                                    <input name="attend_status${value.id}" type="radio" checked value="present"
                                                        id="present${value.id}">
                                                    <label for="present${value.id}">Present</label>
                                                    <input name="attend_status${value.id}" value="absent" type="radio"
                                                        id="absent${value.id}" >
                                                    <label for="absent${value.id}">Absent</label>
                                                    <input name="attend_status${value.id}" value="leave" type="radio"
                                                        id="leave${value.id}" >
                                                    <label for="absent${value.id}">Leave</label>
                                                </div>
                                            </td>
                                        </tr>`;

                            });
                        }
                        else{
                            html += `<tr>
                                        <td colspan="6"><p class="text-center text-danger">No Data Found!</p></td>
                                        </tr>
                                    `;
                        }

                        $('tbody').html(html);
                    }
                });
            });

            $(document).on('change', '.checkbox', function() {
                var checked = $(this).is(':checked');
                var input = $(this).closest('tr').find('input[type="time"]');

                var select = $(this).closest('tr').find('select,input');
                input.prop('required', checked)
                select.prop('required', checked)
            });


            // $("#in_time").change(function(){
            //     var inTime = $(this).val();
            //     $(document).change(function(){
            //         $(".in_time_input").val(inTime);
            //     });
            // });


            // $("#out_time").change(function(){
            //     var outTime = $(this).val();
            //     $(document).change(function(){
            //         $(".out_time_input").val(outTime);
            //     });
            // });
        });
    </script>
@endpush
