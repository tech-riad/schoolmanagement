@extends($adminTemplate.'.admin.layouts.app')

@section('content')
<div class="page-body">
    @include($adminTemplate.'.webadmin.webadminnav')
    <div>
        <div class="card new-table">
            <div class="card">
                <div class="card-header">
                    <h4>Color</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>


                        </div>
                        <a href="{{ route('color.create') }}" class="btn btn-primary mr-2" style="width:
                        175px;height: 34px;">Add New Color</a>
                    </div>

                    <div class="content-wrapper text-primary">
                        <table id="customTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Color</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>

                                
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal --}}



@endsection
@push('js')
<script>
    $(document).ready(function () {
        $('#customTable').DataTable();
    });

    $('#color-tab').addClass('active');
    
</script>
@endpush
