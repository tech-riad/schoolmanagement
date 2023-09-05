@extends($adminTemplate.'.admin.layouts.app')
@section('content')

<div class="main-panel" id="marks-id">
    @include($adminTemplate.'.reportmanagement.menu_reportmanagement')
    <div class="card new-table">
        <div class="card-header">
            <div class="card-title float-left">
                <h6 style="color: black">Teacher List</h6>
            </div>
            <div class="card-title float-right">
                <a href="" class="btn btn-primary mr-2" style="width: 175px;height: 27px;">Add New Teacher</a>
            </div>
        </div>
        <div class="card-body">
            
                <table id="customTable" class="table table-striped table-bordered table-responsive" >
                    <thead>
                        <tr>
                            <th  style="text-align:center">Name</th>
                            <th  style="text-align:center">ID</th>
                            <th  style="text-align:center">Designation</th>
                            <th  style="text-align:center">Date</th>
                            <th class="text-center" style="width: 20px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td style="width:30%"></td>
                            <td style="text-align:center"></td>
                            <td style="width:30%"></td>
                            <td style="width:20%; text-align:center"></td>
                            <td style="width:20%; text-align:center"></td>
                            
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
