@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="main-panel" id="marks-id">
        @include($adminTemplate.'.accountsmanagement.topmenu_accountsmanagement')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title float-left">
                            <h6 style="color: #000000">Accounts Dashboard</h6>
                        </div>

                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-2  grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h3 class="mb-0 text-black" id="today_offline_collection">
                                                        {{number_format($todayOfflineCollection,2)}}
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-success ">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="text-muted font-weight-normal">Today Cash Collection</h6>
                                    </div>
                                </div>
                                <div class="card ml-2">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h3 class="mb-0 text-black" id="today_online_collection">
                                                        {{number_format($todayOnlineCollection,2)}}
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-success ">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="text-muted font-weight-normal">Today Online Collection</h6>
                                    </div>
                                </div>

                                <div class="card ml-2">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h3 class="mb-0 text-black" id="today_total_collection" >{{number_format($todayTotalCollection,2)}}</h3>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-success ">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="text-muted font-weight-normal">Today Total Collection</h6>
                                    </div>
                                </div>
                                <div class="card ml-2">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h3 class="mb-0 text-black" id="today_income">{{number_format($todayTotalCollection,2)}}</h3>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-success ">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="text-muted font-weight-normal">Today income</h6>
                                    </div>
                                </div>
                                <div class="card ml-2">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h3 class="mb-0 text-black" id="today_expense">{{number_format($todayExpense,2)}}</h3>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-success ">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="text-muted font-weight-normal">Today Expense</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header" style="background-color:#fffefe">
                        <div class="d-flex">
                            <select class="form-control" name="session_id" id="session_id2">
                                <option value="">Select Session</option>
                                @foreach ($sessions as $session)
                                    <option value="{{$session->id}}" {{$currentYear == $session->title? 'selected':'' }}>{{$session->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2  grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h3 class="mb-0 text-black" id="total_payable_session">

                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-success ">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="text-muted font-weight-normal">Total Payable</h6>
                                    </div>
                                </div>
                                <div class="card ml-2">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h3 class="mb-0 text-black" id="total_due_session">

                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-success ">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="text-muted font-weight-normal">Total Dues</h6>
                                    </div>
                                </div>
                                <div class="card ml-2">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h3 class="mb-0 text-black" id="total_scholarship_session">

                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-success ">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="text-muted font-weight-normal">Total Scholarship</h6>
                                    </div>
                                </div>
                                <div class="card ml-2">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h3 class="mb-0 text-black" id="total_income_session"></h3>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-success ">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="text-muted font-weight-normal">Total Income</h6>
                                    </div>
                                </div>
                                <div class="card ml-2">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h3 class="mb-0 text-black" id="total_expense_session"></h3>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-success ">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="text-muted font-weight-normal">Total Expense</h6>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header" style="background-color:#fffefe">
                        <div class="d-flex">
                            <select class="form-control" name="session_id" id="session_id">
                                <option value="">Select Session</option>
                                @foreach ($sessions as $session)
                                    <option value="{{$session->id}}" {{$currentYear == $session->title? 'selected':'' }}>{{$session->title}}</option>
                                @endforeach
                            </select>
                            <select class="form-control ml-2" name="month" id="month">
                                <option value="">Select month</option>
                                @foreach ($months as $key => $month)
                                    <option value="{{$key}}" {{$currentMonth == $key? 'selected':'' }}>{{$month}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2  grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h3 class="mb-0 text-black" id="total_payable">
                                                        {{number_format($totalPayable,2)}}
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-success ">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="text-muted font-weight-normal">Total Payable</h6>
                                    </div>
                                </div>
                                <div class="card ml-2">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h3 class="mb-0 text-black" id="total_due">
                                                        {{number_format($totalDue,2)}}
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-success ">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="text-muted font-weight-normal">Total Dues</h6>
                                    </div>
                                </div>
                                <div class="card ml-2">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h3 class="mb-0 text-black" id="total_scholarship">
                                                        {{number_format($totalScholarship,2)}}
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-success ">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="text-muted font-weight-normal">Total Scholarship</h6>
                                    </div>
                                </div>
                                <div class="card ml-2">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h3 class="mb-0 text-black" id="total_income">{{number_format($totalIncome,2)}}</h3>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-success ">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="text-muted font-weight-normal">Total Income</h6>
                                    </div>
                                </div>
                                <div class="card ml-2">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h3 class="mb-0 text-black" id="total_expense">{{number_format($totalExpense,2)}}</h3>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-success ">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="text-muted font-weight-normal">Total Expense</h6>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {

            $('#session_id2').change(function(){
                getAccountsDataSession();
            });
            $('#session_id').change(function(){
                getAccountsData();
            });
            $('#month').change(function(){
                getAccountsData();
            });

            //get accounts data for session
            getAccountsDataSession();
            function  getAccountsDataSession(){

                let session_id = $('#session_id2').val();


                $.get("{{route('get-dashboard-data')}}",{session_id},
                    function(data){
                        $('#total_payable_session').html(data.totalPayable);
                        $('#total_due_session').html(data.totalDue);
                        $('#total_scholarship_session').html(data.totalScholarship);
                        $('#total_income_session').html(data.totalIncome);
                        $('#total_expense_session').html(data.totalExpense);
                    });
            }


            //get accounts data for session & Month
            function  getAccountsData(){

                let session_id = $('#session_id').val();
                let month      = $('#month').val();

                $.get("{{route('get-dashboard-data')}}",{session_id,month},
                    function(data){
                        $('#total_payable').html(data.totalPayable);
                        $('#total_due').html(data.totalDue);
                        $('#total_scholarship').html(data.totalScholarship);
                        $('#total_income').html(data.totalIncome);
                        $('#total_expense').html(data.totalExpense);
                    });
            }
        });
    </script>
@endpush
