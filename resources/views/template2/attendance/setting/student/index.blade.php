@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="page-body" id="marks-id">
        <div id="teacher-attendance">
            @include($adminTemplate.'.attendance.partials.attendancenav')
        <div>
            <div class="card new-table">
                <div class="card-header">
                    <div class="card-title float-left">
                        <h6 style="color: black">Student's Time</h6>
                    </div>
                    <div class="btn-wrapper">
                       {{-- <a  href="{{route('attendance.teacher.report')}}" class="btn btn-info mr-2 float-right"><i class="fa fa-list"></i> Report
                    </a> --}}
                    <a  href="{{route('attendance.studenttime.create')}}" class="btn btn-primary mr-2 float-right"><i class="fa fa-plus"></i> Add Time
                    </a> 
                    </div>
                    
                </div>
                <div class="card-body">
                    <table id="customTable" class="table table-striped table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th> #SL </th>
                                <th> Class Name </th>
                                <th> In Time </th>
                                <th> Out Time </th>
                                <th> Max Delay </th>
                                <th> Max Early </th>
                                <th class="text-center"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classes as $class)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$class->ins_class->name}}</td>
                                <td>{{date('h:i A', strtotime($class->in_time))}}</td>
                                <td>{{date('h:i A', strtotime($class->out_time))}}</td>
                                <td>{{$class->max_delay_time}}</td>
                                <td>{{$class->max_early_time}}</td>
                                <td class="text-center">
                                    {{-- <a href="{{route('attendance.classtime.edit',$class->id)}}" class="btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></a> --}}
                                    <a href="{{route('attendance.studenttime.destroy',$class->id)}}" class="btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
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
        
        $(".student_time").addClass('custom_nav');
        $('.setting').closest('li').addClass('custom_nav');
        $('#setting-item').removeClass('d-none');
        $('.student_attend_nav').removeClass('custom_nav');
    </script>
@endpush
