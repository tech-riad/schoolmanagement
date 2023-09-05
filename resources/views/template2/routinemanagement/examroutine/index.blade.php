@extends($adminTemplate.'.admin.layouts.app')

@push('css')
    <style>
        tr { height: 40px;padding-top: 0px;padding-bottom: 0px; }
    </style>
@endpush

@section('content')
    <div class="page-body" id="exam-routine">
        @include($adminTemplate.'.routinemanagement.routineNav')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Exam Routine</h4>
                            </div>
                            <a href="{{ route('examroutine.create') }}" class="btn btn-primary mb-2 p-2" style="width: 175px;">Add New Routine</a>
                        </div>


                            <table id="customTable" class="table table-striped table-bordered table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Session</th>
                                        <th>Class</th>
                                        <th>Semister</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Start Time</th>
                                        <th width='15px' class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($routines as $r)
                                        <tr>
                                            <td>{{$r->session->title}}</td>
                                            <td>{{$r->class->name}}</td>
                                            <td>{{$r->exam->name}}</td>
                                            @php
                                                $startdate = $r->start_date;
                                                $startdate = date('d/m/Y', strtotime($startdate));
                                            @endphp
                                            <td>{{$startdate}}</td>
                                            @php
                                                $enddate = $r->end_date;
                                                $enddate = date('d/m/Y', strtotime($enddate));
                                            @endphp
                                            <td>{{$enddate}}</td>
                                            @php
                                            foreach ($r->subjects as $key => $s) {
                                                 $start_time = date('h:i a', strtotime($s->start_time));
                                            }
                                            @endphp
                                            <td>{{@$start_time}}</td>
                                            <td>
                                                <a class="btn btn-info p-1 pr-0" href="{{route('examroutine.show',$r->id)}}"><i style="margin-left: 0.3125rem;" class="fa-sharp fa-solid fa-eye"></i></a>
                                                <a class="btn btn-primary p-1 pr-0" href="{{route('examroutine.edit',$r->id)}}"><i style="margin-left: 0.3125rem;" class="fa-solid fa-pen-to-square"></i></a>
                                                <a class="btn btn-danger p-1 pr-0 deleteBtn" href="javascript:void(0)"><i style="margin-left: 0.3125rem;" class="fa-solid fa-trash"></i></a>
                                                <form class="deleteForm" action="{{route('examroutine.destroy',$r->id)}}" hidden method="post">
                                                    @csrf
                                                </form>
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

    $(".deleteBtn").click(function(){
        $(".deleteForm").submit();
    });
</script>
@endpush
