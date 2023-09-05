@extends('admin.layouts.app')

@section('content')
<div class="main-panel">
    @include($adminTemplate.'.accountsmanagement.topmenu_accountsmanagement')
    <div class="card new-table">
        <div class="card-header">
            <h5 class="text-primary">Multiple Account Reports</h5>
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
                <div class="form-row mt-2">
                    <div class="col">
                        <label>Select Report Type</label>
                        <select name="report_type" class="form-control" id="" required>
                            @foreach ($report_types as $key => $type)
                            <option value="{{$key}}">{{$type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">

                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-2"> <i class="fa fa-arrow-circle-down"></i> Process</button>
                </div>
            </form>
        </div>
    </div>


    <div class="card new-table">

        <div class="card-body">
            <h3 class='title'style="text-align: center; margin-bottom: 10px; text-decoration: underline;">  </h3>
            <table class="table table-bordered" style='text-align: center; margin-bottom: 10px;'>
                <thead>
                    <tr class='date_table' style='text-align: center;'>

                    </tr>
                </thead>
            </table>
            <table class="table table-responsive w-100 d-block d-md-table" style='width: 100%;'>
                <thead>
                    <tr class='head' style='text-align: center;'>


                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#payment-form').submit(function (e) {
            e.preventDefault();
            let form = $(this);
            let link = "{{route('multi-report-output')}}";
            $.ajax({
                url: link,
                type: "GET",
                data: form.serialize(),
                success: function (data) {
                    console.log('aaa');
                    console.log(data);
                    $('.title').html(data.title);
                    $('.start_date').html(data.start_date);
                    $('.end_date').html(data.end_date);
                    $('.head').html(data.head);
                    $('.date_table').html(data.date_table);

                    /*
                     let html = '';
                     $.each(data, function (i, value) {
                     html += `<tr>
                     <input type="hidden" name="student_id" value="${value.id}">
                     <input type="hidden" name="month"  value="${value.month}">
                     <td>${value.id_no}</td>
                     <td>${value.name}</td>
                     <td>${value.class}-${value.shift}-${value.section}</td>
                     <td>${value.category}</td>
                     <td>${getMonthName(value.month)}</td>
                     <td>${value.regular_fee}</td>
                     <td>${value.student_fee}</td>
                     <td>${value.total}</td>
                     <td>
                     <div class="badge badge-danger">Unpaid</div>
                     </td>
                     </tr>`;
                     });
                     $('tbody').html(html);
                     */
                }
            });
        });

        $("#reports-nav").removeClass('d-none');
        $("#reports").addClass('active');

    });
</script>
@endpush
