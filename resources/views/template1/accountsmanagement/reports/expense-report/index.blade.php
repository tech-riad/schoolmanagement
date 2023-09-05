@extends($adminTemplate.'.admin.layouts.app')

@section('content')
<div class="main-panel">
@include($adminTemplate.'.accountsmanagement.topmenu_accountsmanagement')
    <div class="card new-table">
        <div class="card-header">
            <h5 class="text-primary">Expense Report</h5>
        </div>
        <div class="card-body">
            <form action="" id="payment-form" method="GET">
                <div class="form-row">
                    <div class="col-md-3">
                        <label for="">From Data</label>
                        <input type="date" name="from_date" value="{{date('Y-m-01')}}" class="form-control" id="">
                    </div>

                    <div class="col-md-3">
                        <label for="">To Data</label>
                        <input type="date" name="to_date" value="{{date('Y-m-d')}}" class="form-control" id="">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-2"> <i class="fa fa-arrow-circle-down"></i> Process</button>
            </form>
        </div>
    </div>


    <div class="card new-table">
        <div class="card-body">
            <table id="customTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id No</th>
                        <th style="width:30%">Name</th>
                        <th>Class-Shift-Section</th>
                        <th>Category</th>
                        <th>Month</th>
                        <th>Regular Fee</th>
                        <th>Student Fee</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        $(document).ready(function(){

            $("#reports-nav").removeClass('d-none');
            $("#reports").addClass('active');
        });
    </script>
@endpush
