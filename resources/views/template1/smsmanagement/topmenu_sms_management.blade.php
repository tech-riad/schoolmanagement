<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover mr-auto">
                {{-- <li class="nav-item {{Request::is('sms/teachers-sms') ? 'active':''}}">
                    <a class="nav-link " href="{{Route('sms.teachers-sms.index')}}" id="nav-hov">
                        Teachers SMS
                    </a>
                </li>

                <li class="nav-item {{Request::is('sms/students-sms') ? 'active':''}}">
                    <a class="nav-link" href="{{Route('sms.students-sms.index')}}" id="nav-hov">
                        Students SMS
                    </a>
                </li> --}}
                <li class="nav-item {{Request::is('sms/portal') ? 'active':''}}">
                    <a class="nav-link" href="{{Route('sms.portal')}}" id="nav-hov">
                        Send SMS
                    </a>
                </li>
                <li class="nav-item {{Request::is('sms/result-sms') ? 'active':''}}">
                    <a class="nav-link" href="{{Route('sms.result-sms.index')}}" id="nav-hov">
                        Results SMS
                    </a>
                </li>
                <li class="nav-item {{Request::is('sms/contact') ? 'active':''}}">
                    <a class="nav-link" href="{{Route('sms.contact.index')}}" id="nav-hov">
                        Add Contacts
                    </a>
                </li>
                <li class="nav-item {{Request::is('sms/template') ? 'active':''}}">
                    <a class="nav-link" href="{{Route('sms.template.index')}}" id="nav-hov">
                        Add Template
                    </a>
                </li>
                <li class="nav-item {{Request::is('sms/orders') ? 'active':''}}">
                    <a class="nav-link" href="{{Route('sms.orders.index')}}" id="nav-hov">
                        Orders
                    </a>
                </li>
                <li class="nav-item {{Request::is('sms/sms-report') ? 'active':''}}">
                    <a class="nav-link" href="{{Route('sms.sms-report.index')}}" id="nav-hov">
                        SMS Reports
                    </a>
                </li>
                <li class="nav-item {{Request::is('sms/sms-history') ? 'active':''}}">
                    <a class="nav-link" href="{{Route('sms.smshistory')}}" id="nav-hov">
                        History
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="new-table">

    <div class="row">
        <div class="col-md-2  grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0 text-black">{{Helper::smsBalance()->currentBalance ?? 0}}</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success ">
                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Current Balance</h6>
                </div>
            </div>
            <div class="card ml-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0 text-black">{{Helper::smsBalance()->total_balance ?? 0}}</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success ">
                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Sms</h6>
                </div>
            </div>

            <div class="card ml-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0 text-black">{{Helper::smsBalance()->total_spend ?? 0}}</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success ">
                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Spend</h6>
                </div>
            </div>
            <div class="card ml-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0 text-black">{{Helper::smsBalance()->alertBalance ?? 0}}</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success ">
                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Alert Balance</h6>
                </div>
            </div>
        </div>
    </div>

</div>
