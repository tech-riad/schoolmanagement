@extends($adminTemplate.'.admin.layouts.app')
@push('css')

@endpush
@section('content')
<div class="main-panel">
    @include($adminTemplate.'.attendance.partials.attendancenav')
    <div class="content-wrapper">
        <div class="card new-table">
            <div class="card-header">
                <div class="card-title float-left">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5);margin-left:15px;">Student's Leave Application's</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="customTable" class="table table-striped table-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th> Date </th>
                            <th> Students ID </th>
                            <th> Students Name </th>
                            <th> Roll </th>
                            <th> Class/Section/Group</th>
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
                            <td>{{$application->student_user->student->id_no}}</td>
                            <td>{{$application->student_user->student->name}}</td>
                            <td>{{$application->student_user->student->roll_no}}</td>
                            <td>{{$application->student_user->student->ins_class->name}} - {{$application->student_user->student->section->name}} - {{$application->student_user->student->group->name}}</td>
                            <td>{{Str::words($application->application,5,'..')}}</td>
                            <td>
                                {{date('d-M-y',strtotime($application->to_date)).' to '.date('d-M-y',strtotime($application->from_date))}}
                            </td>
                            <td>{{$application->total_day}}</td>
                            <td>
                                @if ($application->status == 'approve')
                                    <span class="badge badge-sm badge-primary">Approved</span>
                                @elseif($application->status == 'pending')
                                    <span class="badge badge-sm badge-info">Pending</span>
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
          <h5 class="modal-title" id="viewModalLabel">Student Application</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-0">
            <div class="card" id="table-card" style="box-shadow:none;">
                <div class="card-body">
                    <table id="customTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th> Date </th>
                                <th> Students ID </th>
                                <th> Students Name </th>
                                <th> Roll </th>
                                <th> Class/Section/Group</th>
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
        $('#customTable').DataTable({
            "scrollX": true
        });
    });


    function view(id){
        $.ajax({
            url     : '/attendance/student-application/get/'+id,
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
                                <td>${data.student.id_no}</td>
                                <td>${data.student.name}</td>
                                <td>${data.student.roll_no}</td>
                                <td>${data.student.ins_class.name} - ${data.student.section.name} - ${data.student.group.name}</td>
                                <td>${data.application.application}</td>
                                <td>${data.application.to_date} to ${data.application.from_date}</td>
                                <td>${data.application.total_day}</td>
                                <td class='text-center'>${status}</td>
                                <input type="hidden" value="${data.application.id}" name="application_id">
                            </tr>`;

                var btn = `<a class="btn btn-primary" href='/attendance/student-application/update/approve/${data.application.id}'>Approve</a>
                           <a class="btn btn-danger" href='/attendance/student-application/update/reject/${data.application.id}'>Reject</a>`;

                $("#t_body").html(html);
                $(".modal-footer").html(btn);
                $("#viewModal").modal('show');
            }
        });
    }


        $(".manageLeave").closest('li').addClass('custom_nav');
        $('.setting').closest('li').removeClass('custom_nav');
        $('.addtemplate').removeClass('custom_nav');
        $('.studentapp').addClass('custom_nav');
        $('.report').closest('li').removeClass('custom_nav');
        $("#leave-item").removeClass('d-none');
        $("#setting-item").addClass('d-none');
        $("#report-item").addClass('d-none');
        $('.student_attend_nav').removeClass('custom_nav');
        
</script>
@endpush
