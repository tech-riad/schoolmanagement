@extends($adminTemplate.'.admin.layouts.app')
@section('content')

<div class="page-body" id="marks-id">
    @include($adminTemplate.'.reportmanagement.menu_reportmanagement')
    <div class="card new-table">
        <div class="card-header">
            <div class="card-title float-left">
                <h6 style="color: black">Attandance List</h6>
            </div>
            <div class="card-title float-right">
                
            </div>
        </div>
        <div class="card-body">
            
                <table id="customTable" class="table table-striped table-bordered table-responsive" >
                    <thead>
                        <tr>
                            <th style="text-align:center">Name</th>
                            <th style="text-align:center">ID</th>
                            <th style="text-align:center">Session</th>
                            <th style="text-align:center">Section</th>
                            <th style="text-align:center">Status</th>
                            <th style="text-align:center">Date</th>
                            <th class="text-center" style="width: 20px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td style="width:30%"></td>
                            <td style="width:10%"></td>
                            <td style="width:10%"></td>
                            <td style="width:10%"></td>
                            <td style="width:10%"></td>
                            <td style="width:10%"></td>
                            <td style="width:10%"></td>
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
