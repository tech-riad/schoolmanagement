@extends($adminTemplate.'.admin.layouts.app')
@section('content')

<div class="main-panel">
    @include($adminTemplate.'.homework.topmenu_homework')
    <div class="card new-table">
        <div class="card-header">
            <div class="card-title float-left">
                <h6 style="color: black">Notice List</h6>
            </div>
            <div class="card-title float-right">
                <a href="" class="btn btn-primary mr-2" style="width: 175px;height: 35px; display:flex; justify-content:center;align-items:center;">Add New Notice</a>
            </div>
        </div>
        <div class="card-body">
            
                <table id="customTable" class="table table-striped table-bordered " >
                    <thead>
                        <tr>
                            
                            <th style="width: 40px;">Title</th>
                            <th style="width: 800px;">Description</th>
                            <th style="width: 40px;">Date</th>
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
