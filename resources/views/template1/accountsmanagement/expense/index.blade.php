@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="main-panel" id="marks-id">
        @include($adminTemplate.'.accountsmanagement.topmenu_accountsmanagement')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title float-left">
                            <h6 style="color: #000000">Expense List</h6>
                        </div>
                        <a href="{{ route('expense.create') }}" class="btn btn-primary float-right"> <i class="fa fa-plus"></i>
                            Create New</a>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered" id="customTable">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Details</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenses as $expense)
                                    <tr>
                                        <td>{{ $expense->date }}</td>
                                        <td>{{ $expense->details }}</td>
                                        <td>{{ $expense->total_amount }}</td>
                                        <td>
                                            <a href="{{route('expense.download-invoice',$expense->id)}}" class="btn btn-success"><i class="fa fa-download"></i></a>
                                            <a href="" data-id="{{ $expense->id }}" class="btn btn-info view-btn"
                                                data-toggle="modal" data-target="#expense-modal"><i
                                                    class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="expense-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="expense-modalLabel">Expense Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-sm table-striped">
                        <thead>
                            <tr>
                                <td>Type/Mode</td>
                                <td>Debit</td>
                                <td>Credit</td>
                            </tr>
                        </thead>
                        <tbody id="modal-tbody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#customTable').DataTable();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.view-btn').click(function(e) {
                e.preventDefault();
                let expense_id = $(this).data('id');

                $.post("{{ route('expense.get-expense-details') }}", {
                        expense_id
                    },
                    function(data) {
                        let html = '';

                        $.each(data, function(i, v) {
                            html += `<tr>
                            <td>${v.chart_of_account.acc_head}</td>
                            <td>${v.debit}</td>
                            <td>${v.credit}</td>
                        </tr>`;

                        });
                        $('#modal-tbody').html(html);
                    });

            });
        });
    </script>
@endpush
