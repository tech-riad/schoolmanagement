{{-- <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover mr-auto">

                <li class="nav-item {{Request::is('accountsmanagement/dashboard') ? 'active':''}}">
                    <a class="nav-link" href="{{route('accountsmanagement.dashboard')}}" id="nav-hov">
                        Dashboard
                    </a>
                </li>


                <li class="nav-item {{Request::is('accountsmanagement/payment/index') ? 'active':''}}">
                    <a class="nav-link" href="{{route('payment.index')}}" id="nav-hov">
                        Collection
                    </a>
                </li>
                <li class="nav-item {{Request::is('accountsmanagement/expense/*') ? 'active':''}}">
                    <a class="nav-link" href="{{route('expense.index')}}" id="nav-hov">
                        Expense
                    </a>
                </li>
                <li class="nav-item " id="reports">
                    <a class="nav-link" href="#" id="nav-hov">
                        Reports
                    </a>
                </li>
                <li class="nav-item " id="accounts_setting">
                    <a class="nav-link" href="#" id="nav-hov">
                        Settings
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>



<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded d-none" id="reports-nav">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover ml-auto">
                <li class="nav-item {{Request::is('accountsmanagement/reports/expense') ? 'active':''}}">
                    <a class="nav-link" href="{{route('reports.expense-report')}}" id="nav-hov">
                        Expense Report
                    </a>
                </li>
                <li class="nav-item {{Request::is('accountsmanagement/payment-report/paid') ? 'active':''}}">
                    <a class="nav-link" href="{{route('payment-report.index')}}" id="nav-hov">
                        Paid Report
                    </a>
                </li>

                <li class="nav-item {{Request::is('accountsmanagement/payment-report/unpaid') ? 'active':''}}">
                    <a class="nav-link" href="{{route('payment-report.unpaid')}}" id="nav-hov">
                        Unpaid Report
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- Settings Sub Menu 
<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded d-none" id="settings-nav">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover ml-auto">
                <li class="nav-item {{Request::is('accountsmanagement/fees-setup') ? 'active':''}}">
                    <a class="nav-link" href="{{route('fees-setup')}}" id="nav-hov">
                        Bulk Fees Setup
                    </a>
                </li>
                <li class="nav-item {{Request::is('accountsmanagement/fees-setup-edit') ? 'active':''}}">
                    <a class="nav-link" href="{{route('fees-setup.edit')}}" id="nav-hov">
                        Bulk Fees Update
                    </a>
                </li>
                <li class="nav-item {{Request::is('accountsmanagement/general*') ? 'active':''}}">
                    <a class="nav-link" href="{{route('accountsmanagement.general.index')}}" id="nav-hov">
                        Regular Fees
                    </a>
                </li>
                <li class="nav-item {{Request::is('accountsmanagement/student*') ? 'active':''}}">
                    <a class="nav-link" href="{{route('accountsmanagement.index')}}" id="nav-hov">
                        Student Fees
                    </a>
                </li>
                <li class="nav-item {{Request::is('accountsmanagement/feestype*') ? 'active':''}}">
                    <a class="nav-link" href="{{route('feestype.index')}}" id="nav-hov">
                        Fees Type
                    </a>
                </li>
                <li class="nav-item {{Request::is('accountsmanagement/scholarship*') ? 'active':''}}">
                    <a class="nav-link" href="{{route('scholarship.index')}}" id="nav-hov">
                        Scholarship
                    </a>
                </li>
                <li class="nav-item {{Request::is('chart-of-account*') ? 'active':''}}">
                    <a class="nav-link" href="{{route('chart-of-account.index')}}" id="nav-hov">
                        Chart Of Account
                    </a>
                </li>
                <li class="nav-item {{Request::is('payment-gateway/index') ? 'active':''}}">
                    <a class="nav-link" href="{{route('payment-gateway.index')}}" id="nav-hov">
                        Payment Gateway
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{--  Reports Menu   



@push('js')
<script>
$('#accounts_setting').click(function(){
    $('#settings-nav').removeClass('d-none');
    $('#reports-nav').addClass('d-none');
});

$('#reports').click(function(){
    $('#settings-nav').addClass('d-none');
    $('#reports-nav').removeClass('d-none');
});
</script>

@endpush --}}
