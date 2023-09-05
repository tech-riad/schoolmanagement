@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="page-body" id="marks-id">
    @include($adminTemplate.'.accountsmanagement.topmenu_accountsmanagement')
    <div>
        <form action="{{route('fees-setup.store')}}" method="post">
            @csrf
            <div class="card new-table">
                    <div class="card-header">
                        <div class="card-title float-left">
                            <h6 style="color: #000000">Student Fees Setup</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('custom-blade.search-student2')
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Fees Type</th>
                                    <th>Title</th>
                                    <th>Month</th>
                                    <th>Due Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                               
                            </tbody>
                        </table>

                        <div class="form-group">
                          <button type="submit" class="btn btn-primary mt-3"><i class="fa fa-save"></i>Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
@push('js')
<script>
    $(document).ready(function () {
        $('#customTable').DataTable();
        $("#accounts_setting").addClass('active');
        $('#settings-nav').removeClass('d-none');
        $('#session_id').attr("required", "true");
        $('#section_id').attr("required", "true");




    });
</script>
@endpush
