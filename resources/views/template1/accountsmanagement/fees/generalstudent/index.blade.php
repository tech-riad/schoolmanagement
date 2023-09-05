@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="main-panel">
        @include($adminTemplate.'.accountsmanagement.topmenu_accountsmanagement')

        <div class="card new-table">
            <div class="card-header">
                <div>
                    <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Fees</h4>
                </div>
                <a href="{{ route('fees.general.create') }}" class="btn btn-primary mr-2"><i class="fa fa-plus"></i> Add Fees</a>
            </div>
            <div class="card-body">



                <table id="customTable" class="table table-striped table-bordered ">
                    <thead>
                        <tr>
                            <th >SL</th>
                            <th >Session Id</th>
                            <th >Title</th>
                            <th >Fees Type Id</th>
                            <th >Date</th>
                            <th >Month</th>
                            <th >Due Date</th>
                            <th >Total Amount</th>
                            <th class="text-center" style="width: 20px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fees as $fee)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $fee->session->title }}</td>
                                <td>{{ $fee->title }}</td>
                                <td>{{ $fee->feestype->type }}</td>
                                <td>{{ $fee->date }}</td>
                                <td>{{ Helper::getMonthFromNumber($fee->month) }}</td>
                                <td>{{ $fee->due_date }}</td>
                                <td>{{ $fee->total_amount }}</td>
                                <td>
                                    <a href="{{ route('fees.general.edit', $fee->id) }}" class="btn btn-success">Edit</a>
                                    <form class="deleteForm" hidden action="" method="POST">

                                        @csrf
                                    </form>
                                    <a href="javascript:void(0)" class="btn btn-danger deleteBtn">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#customTable').dataTable();
            $("#accounts_setting").addClass('active');
            $('#settings-nav').removeClass('d-none');
        });
    </script>
@endpush
