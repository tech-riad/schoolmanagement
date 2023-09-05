@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="page-body">

        @include($adminTemplate.'.attendance.partials.attendancenav')
        <div>
            <div class="card new-table">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Teacher Setup</h4>
                            <br>
                        </div>
                        
                    </div>
                    <div class="content-wrapper text-primary card">
                        <form id="teachersetup-form" method="POST">
                            <div class="form-row">

                                <div class="col-md-4">
                                    <label for="">Designation</label>
                                    <select class="form-control" id="desig_type">
                                        <option selected hidden value="all">Select Designation</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="staff">Staff</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="">Teachers</label>
                                    <select class="form-control" name="teacher_id" id="teacheANDstaff">
                                       
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <button type="submit" style="margin-top: 32px;margin-left: 10px;" class="btn btn-primary">Process <i class="fa fa-arrow-circle-down"></i></button>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="row" id="table-card" style="display: none">
                        <div class="col-md-12">
                            <div class="card">
                                <form action="{{ route('attendance.teachersetup.update') }}" method="POST">
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
                                                <th>Designation</th>
                                                <th>Mobile</th>
                                                <th>Finger ID</th>
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
                    url     : '/attendance/teacher-setup/get-teachers-by-type/'+type,
                    type    : 'GET',
                    success : (data) => {
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

            $('#teachersetup-form').submit(function(e) {
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
                                            <td scope="col">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input checkbox" value="${value.id}" name="check[]" id="exampleCheck1" checked>
                                                    <label class="form-check-label" for="exampleCheck1"></label>
                                                </div>
                                            </td>
                                            <td><input type="number" disabled class="form-control" name="id_no[${value.id}]" id="id_no" value="${value.id_no}"></td>
                                            <td><input type="text" disabled class="form-control" name="name[${value.id}]" id="name" value="${value.name}"></td>
                                            <td><input type="text" disabled class="form-control" name="designation[${value.id}]" id="designation" value="${value.designation.title}"></td>
                                            <td><input type="number" disabled class="form-control" name="mobile_number[${value.id}]" id="mobile_number" value="${value.mobile_number}"></td>
                                            <td><input type="number" class="form-control" name="finger_id[${value.id}]" id="finger_id" value="${value.finger_id}"></td>
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



        $(".teacher_setup").addClass('custom_nav');
        $('.setting').closest('li').addClass('custom_nav');
        $('#setting-item').removeClass('d-none');
        $('.teacher_attend_nav').removeClass('custom_nav');

        });
    </script>
@endpush
