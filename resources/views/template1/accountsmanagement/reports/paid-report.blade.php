@extends($adminTemplate.'.admin.layouts.app')

@section('content')
<div class="main-panel">
@include($adminTemplate.'.accountsmanagement.topmenu_accountsmanagement')
    <div class="card new-table">
        <div class="card-header">
            <h5 class="text-primary">Student Paid Report</h5>
        </div>
        <div class="card-body">
            <form action="" id="payment-form" method="GET">
                <div class="form-row">
                    <div class="col">
                        <label>Select Session/Year</label>
                        <select name="session_id" class="form-control" id="">
                            @foreach ($sessions as $session)
                                <option value="{{$session->id}}">{{$session->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label>Select Section</label>
                        <select name="section_id" class="form-control" id="">
                            @foreach ($sections as $section)
                                <option value="{{$section->id}}">{{$section->class->name}}-{{$section->shift->name}}-{{$section->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col">
                        <label>Select Category</label>
                        <select name="category_id" class="form-control" id="">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
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

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#payment-form').submit(function(e){
                e.preventDefault();
                let form = $(this);
                let link = "{{route('payment-report.paid-report')}}";
                $.ajax({
                    url:link,
                    type:"GET",
                    data:form.serialize(),
                    success:function(data){
                        let html = '';
                        $.each(data,function(i,value){
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
                                           <div class="badge badge-success">Paid</div>
                                        </td>
                                    </tr>`;
                        });
                        $('tbody').html(html);
                        $('#customTable').DataTable();
                    }
                });
            });

            function getMonthName(monthNumber) {
                const date = new Date();
                date.setMonth(monthNumber - 1);
                return date.toLocaleString('en-US', { month: 'long' });
            }

            $("#reports-nav").removeClass('d-none');
            $("#reports").addClass('active');
        });
    </script>
@endpush
