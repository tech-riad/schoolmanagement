@extends($adminTemplate.'.admin.layouts.app')

@push('css')
    <style>
        tr { height: 40px;padding-top: 0px;padding-bottom: 0px; }
    </style>
@endpush

@section('content')
    <div class="main-panel">
        @include($adminTemplate.'.routinemanagement.routineNav')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Time Setting</h4>
                            </div>
                            <a href="{{route('routine.time-setting.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add New</a>

                        </div>


                            <table id="customTable" class="table table-striped table-bordered" style="width:100%">
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


                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>




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
