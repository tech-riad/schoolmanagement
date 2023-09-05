@extends($adminTemplate.'.admin.layouts.app')
@section('content')

<div class="main-panel">
    @include($adminTemplate.'.homework.topmenu_homework')
    <div class="card new-table">
        <div class="card-header">
            <div class="card-title float-left">
                <h6 style="color: black">Homework List</h6>
            </div>
        </div>
        <div class="card-body">
            
                <table id="customTable" class="table table-striped table-bordered table-responsive" style="padding:15px">
                    <thead>
                        <tr>
                            <th style="width: 40px;">File</th>
                            <th style="width: 40px;">Title</th>
                            <th style="width: 800px;">Description</th>
                            <th style="width: 40px;">Published Date</th>
                            <th style="width: 40px;">Submit Date</th>
                            <th style="width: 40px;">Session</th>
                            <th style="width: 40px;">Section</th>
                            <th style="width: 40px;">Group</th>
                            <th style="width: 40px;">Class</th>
                            <th style="width: 40px;">Shift</th>
                            <th style="width: 40px;">Version</th>
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
