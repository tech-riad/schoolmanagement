@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div  class="main-panel" id="marks-id">
        @include($adminTemplate.'.onlineexam.onlineexam_topmenu')

        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="mb-3">
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Result</h4>
                                <p class="card-description">Result List </p>
                            </div>
                            <a href="" class="btn btn-primary mr-2" style="width: 175px;height: 34px;">Add New Result</a>
                        </div>
                        
                        <div class="content-wrapper text-primary">
                            <table id="customTable" class="table table-striped table-bordered table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Student ID</th>
                                        <th>Class</th>
                                        <th>Subject</th>
                                        <th>Marks</th>
                                        <th>Action</th>
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