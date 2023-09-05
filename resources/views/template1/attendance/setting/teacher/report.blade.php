@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="main-panel">

        @include($adminTemplate.'.attendance.partials.attendancenav')
        <div>
            <div class="card new-table">

                <div class="card-header">
                    <div class="card-title float-left">
                        <h6 style="color: black">Teacher Attendance List</h6>
                    </div>
                    <a  href="{{route('attendance.student.index')}}" class="btn btn-primary float-right mr-2" style="width: 175px;height: 34px;">Attend. List <i class="fa fa-list"></i>
                    </a>
                </div>
                <div class="card-body">
                    <div class="content-wrapper text-primary" >
                        <h6>Select Date Range</h6>
                        <hr>
                        <form action="" id="teacher-atten-form" method="GET">
                            <div class="form-row">
                                <div class="col">
                                    <label for="">From Date</label>
                                    <input type="date" value="{{date('Y-m-d')}}" class="form-control" name="from_date" id="">
                                </div>
                                <div class="col">
                                    <label for="">To Date</label>
                                    <input type="date" value="{{date('Y-m-d')}}" class="form-control" name="to_date" id="">
                                </div>
                                <div class="col">
                                    <label for="">Select Designation</label>
                                    <select name="designation_id" class="form-control" id="designation_id">
                                        <option value="">Select Designation</option>
                                        @foreach ($designations as $item)
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="">Select Teacher</label>
                                    <select name="teacher_id" class="form-control" id="teacher_id">
                                        <option value="">Select Teacher</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Process</button>
                            </div>
                        </form>
                    </div>

                    <div class="card d-none" style="border: 1px solid #efefef;" id="table-card">
                        <div class="card-body">
                            <table id="customTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Id No</th>
                                        <th>In Time</th>
                                        <th>Out Time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
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


            $('#designation_id').change(function(){
                let designation_id = $(this).val();
                var url = "{{ route('attendance.teacher.get-teacher-by-designation') }}";

                $.ajax({
                    type: 'GET',
                    url : url,
                    data:{
                        designation_id
                    },
                    success:function(data){
                        let html = '<option value="">Select Teacher</option>';
                        $.each(data,function(i,v){
                            html += `<option value="${v.id}">${v.name}</option>`
                        });
                        $('#teacher_id').html(html);
                    }
                })

            });

            $('#teacher-atten-form').submit(function(e) {
                e.preventDefault();
                var form= $(this);
                var url = "{{ route('attendance.teacher.get-teacher-attendance') }}";

                $.ajax({
                    type: 'GET',
                    url: url,
                    data: form.serialize(),
                    contentType: false,
                    processData: false,
                    success:function(data){
                        $('#table-card').removeClass('d-none');
                        let html='';
                        if(data.length > 0){
                            $.each(data,function(i,v){
                                let late = v.in_time > '10:00';

                                let lateHtml='';
                                let statusHtml='';
                                if(late){
                                    lateHtml = '<div class="badge badge-danger">Late</div>';
                                }

                                if(v.status == 'present'){
                                    statusHtml = '<div class="badge badge-success">Present</div>';
                                }
                                else{
                                    statusHtml = '<div class="badge badge-danger">Absent</div>';
                                }
                                console.log(late);


                                html += `<tr>
                                            <td>${v.date}</td>
                                            <td>${v.source.name}</td>
                                            <td>${v.source.id_no}</td>
                                            <td>${v.in_time}</td>
                                            <td>${v.out_time}</td>
                                            <td>${statusHtml} ${lateHtml}</td>
                                        </tr>`;
                            });
                        }
                        else{
                            html = `
                                    <tr >
                                        <td colspan="4"><p class="text-center text-danger">No Data Found!</p></td>
                                    </tr>
                                    `;
                        }

                        $('tbody').html(html);
                        $('#customTable').DataTable();
                    }
                });
            });


           
            $(".teacher_attend").closest('li').addClass('custom_nav');
            $('.setting').closest('li').removeClass('custom_nav');
            $('.manageLeave').closest('li').removeClass('custom_nav');
            $("#report-item").removeClass('d-none');
            $('.report').closest('li').addClass('custom_nav');
            $("#leave-item").addClass('d-none');
            $("#setting-item").addClass('d-none');
            $(".teacher_attend_nav").removeClass('custom_nav');

        });
    </script>
@endpush
