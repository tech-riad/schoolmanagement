@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="main-panel" id="marks-id">

        @include($adminTemplate.'.attendance.partials.attendancenav')
        <div>
            <div class="card new-table">
                <div class="card-header">
                    <div class="card-title float-left">
                        <h6 style="color: black">Student Attendance</h6>
                    </div>
                    <div class="btn-wrapper">
                        {{-- <a  href="{{route('attendance.student.report')}}" class="btn btn-info mr-2 float-right"> <i class="fa fa-list"></i> Report
                    </a> --}}
                    <a  href="{{route('attendance.student.create')}}" class="btn btn-primary mr-2 float-right"><i class="fa fa-plus"></i> Manual Attendance
                    </a> 
                    </div>
                   
                </div>
                <div class="card-body">
                    <table id="customTable" class="table table-striped table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align:center"> #SL </th>
                                <th style="text-align:center"> Date </th>
                                <th style="text-align:center"> ST ID </th>
                                <th style="text-align:center"> Student Name </th>
                                <th style="text-align:center"> Roll </th>
                                <th style="text-align:center"> In Time</th>
                                <th style="text-align:center"> Out Time</th>
                                <th style="text-align:center"> Status </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendance as $item)
                            <tr>
                                <td style="text-align:center">{{$loop->iteration}}</td>
                                <td style="text-align:center">{{$item->date}}</td>
                                <td style="text-align:center">{{@$item->source->id_no}}</td>
                                <td style="width:30%">{{@$item->source->name}}</td>
                                <td style="text-align:center">{{@$item->source->roll_no}}</td>
                                <td style="text-align:center">{{$item->in_time}}</td>
                                <td style="text-align:center">{{$item->out_time}}</td>
                                <td style="text-align:center">
                                    @if ($item->status == 'present')
                                        <div class="badge badge-success">Present</div>
                                    @elseif($item->status == 'absent')
                                        <div class="badge badge-danger">Absent</div>
                                    @else
                                        <div class="badge badge-info">Leave</div>
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
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#customTable').DataTable();
        });
    </script>
@endpush
