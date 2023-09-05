@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="main-panel">

        @include($adminTemplate.'.attendance.partials.attendancenav')
        <div>
            <div class="card new-table">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Student Attendance Report</h4>
                            <p class="card-description"> Student attendance report, </p>
                        </div>
                        <a  href="{{route('attendance.student.index')}}" class="btn btn-primary mr-2" style="width: 175px;height: 34px;">Attend. List <i class="fa fa-list"></i>
                        </a>
                    </div>
                    <div class="content-wrapper text-primary" >
                        <h6>Select Date Range</h6>
                        <hr>
                        <form action="" id="student-atten-form" method="GET">
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
                                    <label for="">Select Student</label>
                                    <select name="student_id" class="form-control" id="">
                                        <option value="">Select Student</option>
                                        @foreach ($students as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
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

            $('#student-atten-form').submit(function(e) {
                e.preventDefault();
                var form= $(this);
                var url = "{{ route('attendance.student.get-student-attendance') }}";

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
                                html += `<tr>
                                            <td>${v.date}</td>
                                            <td>${v.source.name}</td>
                                            <td>${v.source.id_no}</td>
                                            <td>${v.status}</td>
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


            $(".student_attend").closest('li').addClass('custom_nav');
            $('.setting').closest('li').removeClass('custom_nav');
            $('.manageLeave').closest('li').removeClass('custom_nav');
            $("#report-item").removeClass('d-none');
            $('.report').closest('li').addClass('custom_nav');
            $("#leave-item").addClass('d-none');
            $("#setting-item").addClass('d-none');
            $(".student_attend_nav").removeClass('custom_nav');
        });
    </script>
@endpush
