@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="main-panel" id="marks-id">
       @include($adminTemplate.'.onlineadmission.topmenu_admission')

        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Subject</h4>
                                <p class="card-description">Subject List </p>
                            </div>
                            <a href="" class="btn btn-primary mr-2" style="width: 175px;height: 34px; display:flex;justify-content:center; align-items:center;">Add New Subject</a>
                        </div>
                        
                        <div class="content-wrapper text-primary">
                            <table id="customTable" class="table table-striped table-bordered table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width:25%">SL</th>
                                        <th style="width:35%">Class</th>
                                        <th style="width:35%">Subject</th>
                                        <th style="width:25%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width:25%"></td>
                                        <td style="width:25%"></td>
                                        <td style="width:25%"></td>
                                        <td style="width:25%"></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- AA --}}
                    
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
    

</script>
@endpush