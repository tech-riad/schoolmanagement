@extends('parentportal.layout.app')

@section('content')

<div  class="main-panel">
    <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navigation">
                @include('parentportal.topmenu_fees')
            </div>
        </div>
    </nav>

    <div class="card new-table">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="student_id" for="">Student ID</label>
                        <div>
                            <input class="form-control" id="student_id" placeholder="Student Id" value="{{Auth::guard('student')->user()->id_no}}" id="student_id" name="StudentIdc"
                                type="text" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="from_date" class="required">From Date</label>
                        <div>
                            <div class="input-group" id="dtpFromDate">
                                <input class="form-control" placeholder="Please enter From Date." id="from_date"
                                    name="FromDate" type="date" value="{{date('Y-m-01')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="to_date">To Date</label>
                        <div>
                            <div class="input-group">
                                <input class="form-control"   id="to_date" value="{{date('Y-m-d')}}" type="date">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-4 text-center">
                    <button type="submit" id="btn-submit" class="btn btn-primary px-4 py-2"><i class="fa fa-search"></i> Search</button>
                    {{-- <button type="button" class="btn btn-info  px-4 py-2"><i class="fa fa-download"></i>Download</button> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- preloader --}}
    <div id="preload" style="margin-top: 10px">

    </div>
    {{-- preloader --}}
    <!-- Details -->

    <div class="card new-table d-none" id="trans-div">
        <div class="card-body ">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 50px;">SL#</th>
                            <th>TRAN DATE</th>
                            <th>TRANTYPE</th>
                            <th>PAYMENT TYPE</th>
                            <th>TRANID</th>
                            <th>FOR</th>
                            <th class="text-right">Balance</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody id="tran-body">

                    </tbody>
                </table>



        </div>
    </div>

</div>

{{-- Modal --}}
<div class="modal fade" id="transaction-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="transaction-modalLabel">Transaction Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Title</td>
                        <td>Amount</td>
                    </tr>
                </thead>
                <tbody id="modal-body">

                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
{{-- Modal --}}

@endsection
@push('js')
    <script>
        $(document).ready(function(){

            var loader = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#fff;display:block;" width="31px" height="31px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                            <circle cx="50" cy="50" fill="none" stroke="#e15b64" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                                <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                            </circle>
                        </svg>`;
            $('#btn-submit').click(function(e){

                e.preventDefault();
                $('#preload').html(loader);

                let student_id = $('#student_id').val();
                let from_date = $('#from_date').val();
                let to_date = $('#to_date').val();

                $.get("{{route('financial-statement.report')}}",{
                    student_id,
                    from_date,
                    to_date
                },function(data){
                    $('#preload').html('');
                    $('#trans-div').removeClass('d-none');
                    let html = '';
                    let index = 0;
                    if(data.length > 0){
                        data.map(function(item){
                            let link = "/student-portal/download-report/"+item.id;
                            index++;
                            html += `<tr>
                                        <td>${index}</td>
                                        <td>${item.date}</td>
                                        <td>Received</td>
                                        <td>${item.payment_type}</td>
                                        <td>trx-${item.id.toString().padStart(4, '0')}</td>
                                        <td>${getMonthName(item.month)}-${item.year}</td>
                                        <td class="text-right">${item.total.toFixed(2)}</td>
                                        <td>
                                            <a href="${link}"  class="btn btn-success btn-sm dwn-btn"><i class="fa fa-download"></i></a>
                                            <a href="" data-id="${item.id}" class="btn btn-info btn-sm view-btn"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>`;
                        });
                    }
                    else{
                        html += `<tr>
                                    <td colspan="7" style="text-align:center;color:red!important">No Data Found</td>
                                </tr>`;
                    }

                    $('#tran-body').html(html);
                });
            });

            $(document).on('click','.view-btn',function(e){
                e.preventDefault();
                let fee_received_id = $(this).data('id');
                $('#transaction-modal').modal('show');

                $.get("{{route('get-transaction-details')}}",{
                    fee_received_id
                },function(data){

                    let html = '';
                    data.map((item) => {
                        html += `<tr>
                                    <td>${item.source.title}</td>
                                    <td>${item.source.total_amount}</td>
                                </tr>`;
                    });

                    $('#modal-body').html(html);
                });
            });


            //get month name
            function getMonthName(monthNumber) {
                const date = new Date();
                date.setMonth(monthNumber - 1);

                return date.toLocaleString('en-US', { month: 'long' });
            }


        });
    </script>
@endpush
