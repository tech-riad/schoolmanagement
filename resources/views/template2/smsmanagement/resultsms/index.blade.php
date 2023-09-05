@extends($adminTemplate.'.admin.layouts.app')
@section('content')

<div class="page-body" id="marks-id">
    @include($adminTemplate.'.smsmanagement.topmenu_sms_management')
    <div class="card new-table">
        <div class="card-header">
            <div class="card-title float-left">
                <h6 style="color: black">Result SMS</h6>
            </div>
            <div class="card-title float-right">
                <a href="" class="btn btn-primary mr-2" style="width: 175px;height: 27px;">Add New</a>
            </div>
        </div>
        <div class="card-body">
            
                <table id="customTable" class="table table-striped table-bordered table-responsive" >
                    <thead>
                        <tr>
                            
                            <th>Student ID</th>
                            <th>Class</th>
                            <th>Section</th>
                            <th>Group</th>
                            <th>Marks</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th class="text-center" style="width: 20px;">Action</th>
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
                            <td></td>
                            <td></td>
                            
                        </tr>
                        
                    </tbody>
                </table>
            
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
