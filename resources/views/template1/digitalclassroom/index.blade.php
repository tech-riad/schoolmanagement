@extends($adminTemplate.'.admin.layouts.app')
@section('content')

<div class="main-panel" id="marks-id">
    @include($adminTemplate.'.digitalclassroom.menu_classroom');
    <div class="card new-table">
        <div class="card-header">
            <div class="card-title float-left">
                <h6 style="color: black">Digital Class Room</h6>
            </div>
            <div class="card-title float-right">
                <a href="" class="btn btn-primary mr-2" style="width: 175px;height: 27px;">Create Class</a>
            </div>
        </div>
        <div class="card-body">
            
                <table id="customTable" class="table table-striped table-bordered table-responsive" >
                    <thead>
                        <tr>
                            <th >Class ID</th>
                            <th >Title</th>
                            <th >Description</th>
                            <th >Start Time</th>
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
