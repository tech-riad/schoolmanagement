@extends($adminTemplate.'.admin.layouts.app')
@section('content')

<div class="main-panel">
    @include($adminTemplate.'.smsmanagement.topmenu_sms_management')
    <div class="card new-table">
        <div class="card-header">
            <div class="card-title float-left">
                <h6 style="color: black">Report</h6>
            </div>
            
        </div>
        <div class="card-body">
            
                <table id="customTable" class="table table-striped table-bordered " >
                    <thead>
                        <tr>
                            
                            <th>Sms ID</th>
                            <th >status</th>
                            <th >Date</th>
                            <th class="text-center" style="width: 20px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
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
