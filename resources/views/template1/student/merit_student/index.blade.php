@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <style>
        tr { height: 40px;padding-top: 0px;padding-bottom: 0px; }
    </style>
@endpush
@section('content')
<div class="main-panel" id="marks-id">
    <div  id="message-id">
         @include($adminTemplate.'.webadmin.webadminnav')

    <div>
        <div class="card new-table">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Merit Student List</h4>
                        </div>
                        <a href="{{ route('meritstudent.create') }}" class="btn btn-primary p-1 pt-1 mb-2" style="width: 175px;height: 34px; display: flex; align-items: center;justify-content: center;margin-bottom:15px">Add Merit Students</a>
                    </div>

                    <div class="">
                        <table id="customTable" class="table table-striped table-bordered table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Roll</th>
                                    <th>Class</th>
                                    <th>Position</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($meritStudents as $key => $s)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$s->student->name}}</td>
                                        <td>{{$s->student->roll_no}}</td>
                                        <td>{{$s->student->class->name}}</td>
                                        <td>{{$s->position}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
    $(document).ready(function () {
        $('#customTable').DataTable();
    });
    $(".deleteBtn").click(function () {
        $(".deleteForm").submit();
    });

    $(".home").addClass('active');
    $('.meritstudent').addClass('active');
</script>
@endpush
