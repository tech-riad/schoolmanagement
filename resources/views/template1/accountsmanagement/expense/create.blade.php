@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="main-panel" id="marks-id">
    @include($adminTemplate.'.accountsmanagement.topmenu_accountsmanagement')
    <div>
        <div class="card new-table">
            <div class="card">
                <div class="card-header">
                    <div class="card-title float-left">
                        <h6 style="color: #000000">Expense Create</h6>
                    </div>
                    <a href="{{ route('expense.index') }}" class="btn btn-dark float-right"> <i
                        class="fa fa-arrow-left"></i> Back</a>
                </div>
                <form action="{{route('expense.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="">Date</label>
                                <input type="date" name="date" value="{{date('Y-m-d')}}" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-row mt-2">
                            <div class="col-md-6">
                                <label for="">Details</label>
                                <textarea class="form-control" name="details" id="" cols="8" rows="3"></textarea>
                            </div>
                        </div>
                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block mt-2">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        <table class="table table-bordered mt-2">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Mode</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="trow">
                                    <td>
                                        <select class="form-control type" name="chart_of_account_id[]" id="type" required>
                                            <option value="">Select Type</option>
                                            @foreach ($expenditures as $expenditure)
                                                <option value="{{$expenditure->id}}">{{$expenditure->acc_head}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control mode" name="chart_of_account_id[]" id="mode" disabled required>
                                            <option value="">Select Mode</option>
                                            @foreach ($modes as $mode)
                                                <option value="{{$mode->id}}">{{$mode->acc_head}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="form-control debit_amount_1" type="number" name="debit_amount[]">
                                    </td>
                                    <td>
                                        <input class="form-control credit_amount_1" type="number" name="credit_amount[]">
                                    </td>
                                    <td>
                                        <a href="" id="add-btn" class="btn btn-info"><i class="fa fa-plus"></i></a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary mt-2"><i class="fa fa-save"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    </div>
@endsection
@push('js')
<script>

$(document).ready(function () {
    $('#customTable').DataTable();

    let i = 1;
            //Add New Row
            $('#add-btn').click(function(e){
                e.preventDefault();
                i++;
                let html = `<tr class="trow">
                                <td>

                                </td>
                                <td>
                                    <select class="form-control mode" name="chart_of_account_id[]" id="mode" required>
                                        <option value="">Select Mode</option>
                                        @foreach ($modes as $mode)
                                            <option value="{{$mode->id}}">{{$mode->acc_head}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control debit_amount_${i}" type="number" name="debit_amount[]">
                                </td>
                                <td>
                                    <input class="form-control credit_amount_${i}" type="number" name="credit_amount[]">
                                </td>
                                <td>
                                    <a href="" id="rm-btn" class="btn btn-danger rm-btn"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>`;
                $('tbody').append(html);
                let trow = $(this).closest('tr');
                validationCheck(trow);
            });

            //remove Row
            $(document).on('click','.rm-btn',function(e){
                e.preventDefault();
                let $this = $(this);
                $this.closest('tr').remove();
                let trow = $(this).closest('tr');
                validationCheck(trow);
            });

            //mode change
            $(document).on('change','.mode',function(){
               let trow  = $(this).closest('tr');
               let debit = '.debit_amount_'+i;


               trow.find('.type').prop("disabled", true);
               trow.find(debit).prop("readonly", true);
               trow.find('.credit_amount').focus();
               validationCheck(trow);

            });
            $(document).on('change','.type',function(){
               let trow   = $(this).closest('tr');
               let credit = '.credit_amount_'+i;
               trow.find('.mode').prop("disabled", true);
               trow.find(credit).prop("readonly", true);
               trow.find('.debit_amount').focus();
               validationCheck(trow);

            });



});



</script>
@endpush

