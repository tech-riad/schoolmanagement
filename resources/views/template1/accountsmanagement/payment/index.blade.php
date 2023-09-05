@extends($adminTemplate.'.admin.layouts.app')
@push('css')
<style>
    .disable-link {
        pointer-events: none;
    }
</style>
@endpush
@section('content')
<div class="main-panel">
    @include($adminTemplate.'.accountsmanagement.topmenu_accountsmanagement')
    <div class="card new-table">
        <div class="card-header">
            <h5 class="text-primary">Student Fees Collection</h5>
        </div>
        <div class="card-body" style="margin-bottom:-20px;">
            <form action="" id="payment-form" method="GET">
                <div class="row py-2" id="all-row-py-2">
                    <div class="col-sm-3"> <label for="session_id"> Academic Year</label>
                        <select name="session_id" id="session_id" class="form-control">
                            <option value="">Select</option>
                            @foreach ($academic_years as $academic_year)
                            <option value="{{ $academic_year->id }}">{{ $academic_year->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3"> <label for="section_id">Section</label>
                        <select name="section_id" id="section_id" class="form-control chosen-select">
                            <option value="">Select Section</option>
                        </select>
                    </div>
                    <div class="col-sm-3"> <label for="category_id">Select Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Select Category</option>

                        </select>
                    </div>
                    <div class="col-sm-3"> <label for="group_id">Select Group</label>
                        <select name="group_id" id="group_id" class="form-control">
                            <option value="">Select Group</option>
                        </select>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col-sm-3">
                        <label>Select Month</label>
                        <select name="month" class="form-control" id="">
                            @foreach ($months as $key => $month)
                            <option value="{{$key}}">{{$month}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-2"> <i class="fa fa-arrow-circle-down"></i> Process</button>
                </div>
            </form>
        </div>
    </div>


    <div class="card new-table">
        <div class="card-body" >
            <div style="width:100%" id="student-info-id">
                <table id="dtHorizontalExample" class="table table-responsive table-striped" style=" display: block; width:100%;">
                    <thead id="table_head">
  
                    </thead>
                    <tbody id="table-body">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- Payment Modal --}}
<!-- Modal -->
<div class="modal fade" id="payment-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="payment-modal">Payment List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table mb-2" style="border:0">
                    <thead>
                        <tr>
                            <td>Student Name</td>
                            <td id="std-name"></td>
                        </tr>
                        <tr>
                            <td>Roll No</td>
                            <td id="std-roll"></td>
                        </tr>
                        <tr>
                            <td>Class</td>
                            <td id="std-class"></td>
                        </tr>
                    </thead>
                </table>

                <table class="table table-bordered">
                    <thead>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Month</th>
                    <th>Amount</th>
                    </thead>
                    <tbody id="modal-body">

                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="text-right text-bold" colspan="3">Total</td>
                            <td id="total"></td>

                        </tr>
                    </tfoot>
                </table>
            </div>
            {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function () {
        $('#total').html(0);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#payment-form').submit(function (e) {

            e.preventDefault();
            let form = $(this);
            let link = "{{route('payment.get-payments')}}";
            $.ajax({
                url: link,
                type: "GET",
                data: form.serialize(),
                success: function (data) {
                    let head = '';

                    head += `<tr>
                            <th>Id No</th>
                            <th>Name</th>
                            <th>Roll No</th>
                            <th>Class-Shift-Section</th>
                            <th>Category</th>
                            <th>Month</th>
                            <th>Regular Fee</th>
                            <th>Student Fee</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>`;


                    let html = '';
                    let paid = `<div class="badge badge-success">Paid</div>`;
                    let unpaid = `<div class="badge badge-danger">Unpaid</div>`;

                    $.each(data, function (i, value) {
                        let link = "/accountsmanagement/payment-report/download-report/" + value.id + '/' + value.month;
                        let category = value.category === null ? 'No Category' : value.category;
                        var shift_section = '';
                        if (value.shift !== 'N/A') {
                            shift_section = shift_section + '-' + value.shift;
                        }
                        if (value.section !== 'N/A') {
                            shift_section = shift_section + '-' + value.section;
                        }
                        html += `<tr>
                                    <input type="hidden" name="student_id" value="${value.id}">
                                    <input type="hidden" name="month"  value="${value.month}">
                                    <input type="hidden" name="total"  value="${value.total}">
                                    <td>${value.id_no}</td>
                                    <td>${value.name}</td>
                                    <td>${value.roll_no}</td>
                                    <td>${value.class} ${shift_section}</td>
                                    <td>${category}</td>
                                    <td>${getMonthName(value.month)}</td>
                                    <td>${value.regular_fee}</td>
                                    <td>${value.student_fee}</td>
                                    <td>${value.total}</td>
                                    <td class="status-col-${value.id}">${value.status === 'Paid' ? paid : unpaid}</td>
                                    <td class="action-col-${value.id}">
                                        ${value.status === 'Unpaid' ? `<a href="" id="pay-btn-${value.id}" class="btn btn-info pay-btn ${value.regular_fee == 0 ? 'disable-link' : ''}" >Pay</a>` : `<a href="${link}"  id="dwn-btn" class="btn btn-dark dwn-btn" ><i class="fa fa-download"></i></a>`}
                                        <a href="" data-id="${value.id}" data-month="${value.month}" id="view-btn" class="btn btn-warning view-btn ${value.regular_fee == 0 ? 'disable-link' : ''}" ><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>`;
                    });
                    $('#table_head').html(head);
                    $('#table-body').html(html);
                }
            });
        });

        function getMonthName(monthNumber) {
            const date = new Date();
            date.setMonth(monthNumber - 1);
            return date.toLocaleString('en-US', {month: 'long'});
        }

        //pay Now
        $(document).on('click', '.pay-btn', function (e) {

            e.preventDefault();

            let student_id = $(this).closest('tr').find("[name='student_id']").val();
            let month = $(this).closest('tr').find("[name='month']").val();
            let total = $(this).closest('tr').find("[name='total']").val();
            let link = "{{route('payment.store-transaction')}}";
            let $this = $(this);

            $.ajax({
                url: link,
                type: "POST",
                dataType: 'json',
                data: {
                    student_id: student_id,
                    month: month,
                    total: total
                },
                beforeSend: function () {
                    $('#pay-btn-' + student_id).html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function (data) {
                    let link2 = "/accountsmanagement/payment-report/download-report/" + student_id + '/' + month;
                    if (data.status == 200) {
                        $('.status-col-' + student_id).html('<div class="badge badge-success">Paid</div>');
                        $('.action-col-' + student_id).prepend(`<a href="${link2}" id="dwn-btn"  class="btn btn-dark" ><i class="fa fa-download"></i></a>`);
                        $this.remove();
                    }
                }
            });
        });

        //view btn
        $(document).on('click', '.view-btn', function (e) {
            e.preventDefault();
            let student_id = $(this).attr("data-id");
            let month = $(this).attr("data-month");
            let link = "{{route('payment.view-payments')}}";

            $.ajax({
                url: link,
                type: "POST",
                dataType: 'json',
                data: {
                    student_id: student_id,
                    month: month
                },
                success: function (data) {
                    //modal head
                    $('#std-name').html(data.student.name);
                    $('#std-roll').html(data.student.roll_no);
                    $('#std-class').html(`${data.student.ins_class.name}-${data.student.shift.name}-${data.student.section.name}`);

                    $('#payment-modal').modal('show');
                    let html = '';
                    let total = 0;
                    $.each(data.payments, function (i, v) {
                        total += parseInt(v.total_amount);
                        html += `<tr>
                                    <td>${v.date}</td>
                                    <td>${v.title}</td>
                                    <td>${getMonthName(v.month)}</td>
                                    <td>${v.total_amount}</td>
                                </tr>`;
                    });
                    $('#total').html(total.toFixed(2));
                    $('#modal-body').html(html);

                }
            });
        });

        function downloadFile(response) {
            var blob = new Blob([response], {type: 'application/pdf'})
            var url = URL.createObjectURL(blob);
            location.assign(url);
        }


    });

    $('#session_id').change(function () {
        let session_id = $(this).val();
        $('.chosen-select').chosen("destroy");

        $.get("{{route('student.get-sections')}}",
                {
                    session_id
                },
                function (data) {
                    let html = '<option value="" selected hidden>Select Section</option>';

                    if (data) {
                        $.each(data, function (i, item) {
                            html += `<option value="${item.id}">${item.class}${item.shift != 'N/A' ? '-' + item.shift : ''}${item.name != 'N/A' ? '-' + item.name : ''}</option>`;
                        });
                    }

                    $('#section_id').html(html);
                    $('.chosen-select').chosen();


                });
    });

    $('#section_id').change(function () {
        let section_id = $(this).val();
        $.get("{{route('student.get-class-shift')}}",
                {
                    section_id
                },
                function (data) {
                    $('#class_id').val(data.class_id);
                    $('#shift_id').val(data.shift_id);
                    getCategoryGroup(data.class_id, data.shift_id);
                    getsubjectByClass(data.class_id);
                });
    });

    //Get Category && Group
    function getCategoryGroup(class_id, shift_id) {

        $.ajax({
            url: '/student/getCatSecGro/' + class_id + '/' + shift_id,
            type: 'GET',
            success: function (data) {

                let group = '<option hidden value="">Select Group</option>';
                if (data['category'].length === 1) {
                    let category = '<option hidden value="">No Category In This Class</option>';
                    $('#category_id').html(category);
                } else {
                    let category = '<option hidden value="">Select Category</option>';
                    data.category.map(function (val, index) {
                        category += `<option ${val.name == 'N/A' ? 'selected hidden' : ''} value='${val.name != 'N/A' ? val.id : ''}'>${val.name != 'N/A' ? val.name : 'Select Category'}</option>`;
                    });
                    $('#category_id').html(category);
                }

                if (data['group'].length === 1) {
                    let group = '<option hidden value="">No Group In This Class</option>';
                    $('#group_id').html(group);
                } else {
                    let group = '<option hidden value="">Select Group</option>';
                    data.group.map(function (val, index) {
                        group += `<option ${val.name == 'N/A' ? 'selected hidden' : ''} value='${val.name != 'N/A' ? val.id : ''}'>${val.name != 'N/A' ? val.name : 'Select Group'}</option>`;
                    });
                    $('#group_id').html(group);
                }
            }
        });
    }


    function getsubjectByClass(class_id) {
        $.ajax({
            type: 'GET',
            url: '/academic/number-sheet/subjectbyclassid/' + class_id,
            success: function (data) {
                if ($("#subject")) {
                    data.subjects.map(function (val, index) {
                        var items = `<option value='${val.sub_name}'>${val.sub_name}</option>`;
                        $("#subject_id").append(items);
                    });
                }
            }
        });
    }
</script>


</script>
@endpush
