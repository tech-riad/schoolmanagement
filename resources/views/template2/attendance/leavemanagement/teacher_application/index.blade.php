@extends($adminTemplate.'.admin.layouts.app')
@push('css')

@endpush
@section('content')
<div class="page-body">
    @include($adminTemplate.'.attendance.partials.attendancenav')
    <div class="content-wrapper">
        <div class="card new-table">
            <div class="card-header">
                <div class="card-title float-left">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5);margin-left:15px;">Teacher's Leave Application's</h4>
                        </div>
                    </div>
                </div>
                <div class="btn-wrapper">
                    {{-- <a href="{{route('teacherpanel.application.create')}}" class="btn btn-primary mr-2 float-right"><i
                            class="fa fa-plus"></i>Add New</a> --}}
                </div>

            </div>
            <div class="card-body">
                <table id="customTable" class="table table-striped table-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th> Date </th>
                            <th> Teachers/Staff Name </th>
                            <th> Designation </th>
                            <th> Application </th>
                            <th> Leave Date </th>
                            <th> Total Day </th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $key => $application)
                            <tr>
                                <td>{{date('d-M-y',strtotime($application->created_at))}}</td>
                            <td>{{$application->teacher_user->teacher->name}}</td>
                            <td>{{$application->teacher_user->teacher->designation->title}}</td>
                            <td>{{Str::words($application->application,5,'..')}}</td>
                            <td>
                                {{date('d-M-y',strtotime($application->to_date)).' to '.date('d-M-y',strtotime($application->from_date))}}
                            </td>
                            <td>{{$application->total_day}}</td>
                            <td>
                                @if ($application->status == 'pending')
                                    <span class="badge badge-sm badge-info">Pending</span>
                                @elseif($application->status == 'approve')
                                    <span class="badge badge-sm badge-primary">Approved</span>
                                @else
                                    <span class="badge badge-sm badge-danger">Rejected</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a class=" btn-sm btn-primary" onclick="view({{$application->id}})" href="javascript:void(0)">View</a>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button> --}}
  
  <!-- Modal -->
  <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewModalLabel">Teacher Application</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-0">
            <div class="card" id="table-card" style="box-shadow:none;">
                <div class="card-body">
                    {{-- <form action="{{route('attendance.teacherapplication.update')}}" method="post">
                        @csrf
                        <table id="customTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> Date </th>
                                    <th> Teachers/Staff Name </th>
                                    <th> Designation </th>
                                    <th> Application </th>
                                    <th> Leave Date </th>
                                    <th> Total Day </th>
                                    <th class='text-center'> Status </th>
                                </tr>
                            </thead>
                            <tbody id="t_body">
    
                            </tbody>
                        </table>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary">Approve</button>
                            <button type="submit" class="btn btn-secondary">Reject</button>
                        </div>
                    </form> --}}

                    <table id="customTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th> Date </th>
                                <th> Teachers/Staff Name </th>
                                <th> Designation </th>
                                <th> Application </th>
                                <th> Leave Date </th>
                                <th> Total Day </th>
                                <th class='text-center'> Status </th>
                            </tr>
                        </thead>
                        <tbody id="t_body">

                        </tbody>
                    </table>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script>
    $(document).ready(function () {
        $('#customTable').DataTable();
    });


    function view(id){
        $.ajax({
            url     : '/attendance/teacher-application/get/'+id,
            type    : 'GET',
            success : function(data){
                console.log(data);

                var status = '';
                if(data.application.status == 'pending'){
                    status = `<span class='badge badge-sm badge-danger'>Pending</span>` ;
                }else if(data.application.status == 'approve'){
                    status = `<span class='badge badge-sm badge-info'>Approved</span>`;
                }else{
                    status = `<span class='badge badge-sm badge-danger'>Rejected</span>`;
                }

                // date string in the original format
                var dateString = data.application.created_at;

                // create a moment object from the date string
                var momentObj = moment(dateString);

                // format the date using the desired format
                var formattedDate = momentObj.format('D MMMM, YYYY');
                

                var html = `<tr>
                                <td>${formattedDate}</td>
                                <td>${data.teacher.name}</td>
                                <td>${data.designation.title}</td>
                                <td>${data.application.to_date}</td>
                                <td>${data.application.from_date}</td>
                                <td>${data.application.total_day}</td>
                                <td class='text-center'>${status}</td>
                                <input type="hidden" value="${data.application.id}" name="application_id">
                            </tr>`;

                var btn = `<a class="btn btn-primary" href='/attendance/teacher-application/update/approve/${data.application.id}'>Approve</a>
                           <a class="btn btn-danger" href='/attendance/teacher-application/update/reject/${data.application.id}'>Reject</a>`;

                $("#t_body").html(html);
                $(".modal-footer").html(btn);
                $("#viewModal").modal('show');
            }
        });
    }


        $(".manageLeave").closest('li').addClass('custom_nav');
        $('.setting').closest('li').removeClass('custom_nav');
        $('.addtemplate').removeClass('custom_nav');
        $('.teacherapp').addClass('custom_nav');
        $('.report').closest('li').removeClass('custom_nav');
        $("#leave-item").removeClass('d-none');
        $("#setting-item").addClass('d-none');
        $("#report-item").addClass('d-none');
        $('.teacher_attend_nav').removeClass('custom_nav');
        
</script>
@endpush
