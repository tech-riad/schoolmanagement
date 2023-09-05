@extends('parentportal.layout.app')
@section('content')
    <div  class="main-panel" id="marks-id">
        <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navigation">@include('parentportal.topmenu_fees') </div>
            </div>
        </nav>
        <style>
            table.table.table-bordered.table-striped {
                border: 1px solid #000;
            }
        </style>
        <!-- Fees Payment -->
        <div class="card new-table">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="">Select Month</label>
                                <select name="month" class="form-control" id="month">
                                    @foreach ($months as $key => $month)
                                        <option value="{{ $key }}">{{ $month }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="">Select Year</label>
                                <select name="year" class="form-control" id="year">
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <a href="" id="process-btn" class="btn btn-primary"><i class="fa fa-arrow-down"></i>
                                Process</a>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Title</th>
                                    <th>Month</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="fees-tbody">

                            </tbody>
                            <tfoot id="t-foot" class="d-none">
                                <tr>
                                    <th class="text-right" colspan="5">Total</th>
                                    <th colspan="2" id="total_amount"></th>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="form-group d-none" id="payment-btn">
                            <form action="{{route('fees-payment.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="fees_id[]" id="fees_id">
                                <input type="hidden" name="fees_type[]" id="fees_type">
                                <input type="hidden" name="total_amount" id="total_am">
                                <input type="hidden" name="year" id="_year">
                                <input type="hidden" name="month" id="_month">
                                <button type="submit" class="btn btn-info mt-3"><i class="fa fa-credit-card"></i> Pay
                                        Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- Modal --}}
    <div class="modal modal-lg fade" id="fee-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fee-modalLabel">Fee Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th class="text-right">Amount</th>
                            </tr>
                        </thead>
                        <tbody id="modal-tbody">

                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="text-right text-bold">
                                    <b>Total</b>
                                </td>
                                <td class="text-right" id="total"></td>
                            </tr>
                        </tfoot>
                    </table>

                </div>

            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {


            let total = 0;

            $(document).on('click', 'input[name^=check]', function() {
                let checked = $(this).prop('checked');
                if (checked) {
                    total += parseInt($(this).val());
                } else {
                    total -= parseInt($(this).val());
                }
                $('#t-foot').removeClass('d-none');
                $('#total_amount').html(total);
                //input field
                $('#total_am').val(total);

                showPaymentButton();
                getFeesIds();
                getFeesType();
            });

            //show mayment button
            function showPaymentButton() {
                let amount = $('#total_amount').html();
                if (amount > 0) {
                    $('#payment-btn').removeClass('d-none');
                } else {
                    $('#payment-btn').addClass('d-none');
                }
            }

            //get fees ids
            function getFeesIds(){
                var fees_ids = $('input:checkbox:checked.check').map(function(){
                            return $(this).data('id'); }).get();
                $('#fees_id').val(fees_ids);

            }
            //get fees type
            function getFeesType(){
                var fees_type = $('input:checkbox:checked.check').map(function(){
                            return $(this).data('type'); }).get();
                $('#fees_type').val(fees_type);

            }



            //process btn
            $('#process-btn').click(function(e) {
                e.preventDefault();
                let month = $('#month').val();
                let year = $('#year').val();

                //set input fiend year & Month
                $('#_month').val(month);
                $('#_year').val(year);


                $.get("{{ route('student.get-fees') }}", {
                    month,
                    year
                }, function(data) {

                    console.log(data);
                    let html = '';
                    data.regFees.map(function(item) {

                        if(item.status == 'unpaid'){
                            html += `<tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input check" data-type="reg-fee" data-id="${item.id}" name="check" type="checkbox" value="${item.total_amount}" id="flexCheckDefault">
                                            </div>
                                        </td>
                                        <td>${item.date}</td>
                                        <td>Regular Fee</td>
                                        <td>${item.title}</td>
                                        <td>${getMonthName(item.month)},${item.year}</td>
                                        <td>${item.total_amount}</td>
                                        <td>${item.status}</td>
                                        <td>
                                            <a href="" data-id="${item.id}" data-type="reg-fee" class="btn btn-info view-btn"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>`;
                        }
                    });
                    data.studentFees.map(function(item) {
                        if(item.status == 'unpaid'){
                            html += `<tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input check" data-type="student-fee" data-id="${item.id}" name="check" type="checkbox"  value="${item.total_amount}" id="flexCheckDefault">
                                            </div>
                                        </td>
                                        <td>${item.date}</td>
                                        <td>Student Fee</td>
                                        <td>${item.title}</td>
                                        <td>${getMonthName(item.month)},${item.year}</td>
                                        <td>${item.total_amount}</td>
                                        <td>${item.status}</td>
                                        <td>
                                            <a href="" data-id="${item.id}" data-type="student-fee" class="btn btn-info view-btn"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>`;
                        }
                    });
                    $('#fees-tbody').html(html);
                });
            });
            //get Fees details
            $(document).on('click', '.view-btn', function(e) {
                e.preventDefault();
                $('#fee-modal').modal('show');

                let id = $(this).data('id');
                let type = $(this).data('type');

                $.get("{{ route('student.fees.details') }}", {
                    id,
                    type
                }, function(data) {
                    let html = "";
                    let total = 0;
                    data.map(function(item) {

                        total += parseInt(item.amount)
                        html += `<tr>
                                    <td>${item.head}</td>
                                    <td class="text-right">${item.amount}</td>
                                </tr>`;
                    });
                    $('#modal-tbody').html(html);
                    $('#total').html(total.toFixed(2));
                });
            });

            //get month name
            function getMonthName(monthNumber) {
                const date = new Date();
                date.setMonth(monthNumber - 1);

                return date.toLocaleString('en-US', {
                    month: 'long'
                });
            }

        });
    </script>
@endpush
