@extends($adminTemplate.'.admin.layouts.app')
@section('content')

<div class="page-body" id="marks-id">
    @include($adminTemplate.'.reportmanagement.menu_reportmanagement')
    <div class="card new-table">
        <div class="card-header">
            <div class="card-title float-left">
                <h6 style="color: black">Slip</h6>
            </div>
            <div class="card-title float-right">
                <a href="" class="btn btn-primary mr-2" style="width: 175px;height: 27px;">Create Slip</a>
            </div>
        </div>
        <div class="card-body">
            
                <table id="customTable" class="table table-striped table-bordered table-responsive" >
                    <thead>
                        <tr>
                            
                            <th style="text-align:center">Slip Tipe</th>
                            <th style="text-align:center">Title</th>
                            <th style="text-align:center">Description</th>
                            <th style="text-align:center">Date</th>
                            <th style="text-align:center">Status</th>
                            <th class="text-center" style="width: 20px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td></td>
                            <td style="width:20%"></td>
                            <td style="width:30%"></td>
                            <td></td>
                            <td></td>
                            <td  style="width:20%"></td>
                            
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
