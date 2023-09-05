@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="page-body" id="marks-id">
        <div id="teacher-attendance">
            @include($adminTemplate.'.attendance.partials.attendancenav')
        <div>
            <div class="card new-table">
                <div class="card-header">
                    <div class="card-title float-left">
                        <h6 style="color: black">Teacher Attendance List</h6>
                    </div>
                    <div class="btn-wrapper">
                       {{-- <a  href="{{route('attendance.teacher.report')}}" class="btn btn-info mr-2 float-right"><i class="fa fa-list"></i> Report
                    </a> --}}
                    <a  href="{{route('attendance.teacher.create')}}" class="btn btn-primary mr-2 float-right"><i class="fa fa-plus"></i> Manual Attendance
                    </a> 
                    </div>
                    
                </div>
                <div class="card-body">
                    <table id="customTable" class="table table-striped table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th> #SL </th>
                                <th> Name </th>
                                <th> Date </th>
                                <th> Designation </th>
                                <th> In Time </th>
                                <th> Out Time </th>
                                <th> Status </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->source->name}}</td>
                                <td>{{$item->date}}</td>
                                <td>{{$item->source->designation->title}}</td>
                                <td>{{date('h:i A', strtotime($item->in_time))}}</td>
                                <td>{{date('h:i A', strtotime($item->out_time))}}</td>
                                <td>
                                    @if ($item->status == 'present')
                                        <div class="badge badge-success">Present</div>
                                    @elseif($item->status == 'leave')
                                        <div class="badge badge-warning">Leave</div>
                                    @else
                                        <div class="badge badge-danger">Absent</div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
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
            $('#customTable').DataTable();
        });
    </script>
@endpush
