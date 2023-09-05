@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <style>
        .chosen-container-single .chosen-single div b {
            margin-top: 5px;
        }
    </style>
@endpush

@section('content')
    <div class="main-panel" id="marks-id">
        @include($adminTemplate.'.accountsmanagement.topmenu_accountsmanagement')

        <div>
            <form action="{{route('scholarship.store')}}" method="POST">
                @csrf
                <div class="card new-table">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title float-left">
                                <div>
                                    <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Scholarship Create</h4>
                                </div>

                            </div>
                            <a href="{{ Route('scholarship.index') }}" class="btn btn-dark mr-2 float-right"><i
                                    class="fa fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label for="">Select Fee Type</label>
                                    <select name="fees_type_id" class="form-control" id="fees_type_id" required>
                                        <option value="">Select Fee Type</option>
                                        @foreach ($feetypes as $feeType)
                                            <option value="{{ $feeType->id }}">{{ $feeType->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Select Student</label>
                                    <select name="student_id" class="form-control chosen-select" id="student_id" required>
                                        <option value="">Select Student</option>
                                        @foreach ($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->name }}
                                                <b>({{ $student->id_no }})</b></option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <a href="" class="btn btn-primary" id="process-btn" style="margin-top:33px "><i
                                            class="fa fa-arrow-right"></i> Process</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card new-table">
                    <div class="card-body">
                        <div class="col-md-8 px-0">
                            <div class="form-group mb-2">
                                <label for="">Note</label>
                                <textarea class="form-control" name="note" id="" cols="4" rows="4"></textarea>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="6%">SL</th>
                                        <th>Month</th>
                                        <th>Amount</th>
                                        <th>Half</th>
                                        <th>Full</th>
                                        <th width="16%">Discount</th>
                                    </tr>
                                </thead>
                                <tbody id="ref-fees-tbody">
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary mt-3"><i class="fa fa-save"></i> Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>



    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#customTable').DataTable();
            $('.chosen-select').chosen();
            $("#accounts_setting").addClass('active');
            $('#settings-nav').removeClass('d-none');
            //process data
            $('#process-btn').click(function(e){
                e.preventDefault();
                let fees_type_id = $('#fees_type_id').val();
                let student_id   = $('#student_id'  ).val();

                if(fees_type_id && student_id){
                    $.get("{{route('scholarship.get-fee-details')}}",{
                        fees_type_id,
                        student_id
                    },
                    function(data){
                        let html = '';
                        let index = 0;
                        data.map((item) => {
                            index++;
                            html += `<tr>
                                        <input type="hidden" name="fees_id[]" value="${item.id}">
                                        <input type="hidden" name="months[]" value="${item.month}">
                                        <td>${index}</td>
                                        <td>${getMonthName(item.month)}</td>
                                        <td class="total_amount" >${item.total_amount}</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input half" id="half" type="checkbox" value="" id="flexCheckDefault">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input full" id="full" type="checkbox" value="" id="flexCheckDefault">
                                            </div>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="discount[]">
                                        </td>
                                    </tr>`;
                        });
                        $('#ref-fees-tbody').html(html);
                    });
                }
            });


            //click half discount
            $(document).on('change', '.half', function() {
                var checked = $(this).is(':checked');
                let amount = $(this).closest('tr').find('.total_amount').html();

                if(checked){
                    $(this).closest('tr').find('input[name="discount[]"]').val(amount/2).attr('readonly', true);
                }
                else{
                    $(this).closest('tr').find('input[name="discount[]"]').val('').removeAttr('readonly');
                }
            });
            //click full discount
            $(document).on('change', '.full', function() {
                var checked = $(this).is(':checked');
                let amount  = $(this).closest('tr').find('.total_amount').html();
                if(checked){
                    $(this).closest('tr').find('input[name="discount[]"]').val(amount).attr('readonly', true);
                }
                else{
                    $(this).closest('tr').find('input[name="discount[]"]').val('').removeAttr('readonly');
                }

            });

            function getMonthName(monthNumber) {
                const date = new Date();
                date.setMonth(monthNumber - 1);

                return date.toLocaleString('en-US', { month: 'long' });
            }
        });
    </script>
@endpush
