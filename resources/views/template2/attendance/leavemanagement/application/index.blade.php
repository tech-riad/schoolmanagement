@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="page-body" id="marks-id">
        <div id="teacher-attendance">
            @include($adminTemplate.'.attendance.partials.attendancenav')
        <div>
            <div class="card new-table">
                <div class="card-header">
                    <div class="card-title float-left">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5);margin-left:15px;">Leave Template List</h4>
                            </div>
                        </div>
                    </div>
                    <div class="btn-wrapper">
                    <a  href="{{route('attendance.leavetemplate.create')}}" class="btn btn-primary mr-2 float-right"><i class="fa fa-plus"></i> Add New
                    </a> 
                    </div>
                    
                </div>
                <div class="card-body">
                    <table id="customTable" class="table table-striped table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th> #SL </th>
                                <th> Title </th>
                                <th> Application </th>
                                <th width='10%' class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($templates as $template)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$template->title}}</td>
                                <td>{{$template->application}}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary " href="{{route('attendance.leavetemplate.edit',$template->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a class="btn btn-sm btn-danger " href="{{route('attendance.leavetemplate.destroy',$template->id)}}"><i class="fa-solid fa-trash"></i></a>
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


        $(".manageLeave").closest('li').addClass('custom_nav');
        $('.setting').closest('li').removeClass('custom_nav');
        $('.addtemplate').addClass('custom_nav');
        $('.report').closest('li').removeClass('custom_nav');
        $("#leave-item").removeClass('d-none');
        $("#setting-item").addClass('d-none');
        $("#report-item").addClass('d-none');
    </script>
@endpush
