<ul class="navbar-nav navbar-nav-hover mr-auto">
    <li class="nav-item {{Request::is('student-portal/financial-statement') ? 'active':''}}">
        <a class="nav-link" href="{{ route('financial-statement.index') }}" id="nav-hov">
            Financial Statement
        </a>
    </li>

    <li class="nav-item {{Request::is('student-portal/fees-payment') ? 'active':''}}">
        <a class="nav-link" href="{{ route('fees-payment.index') }}" id="nav-hov">
            Fees Payment
        </a>
    </li>

</ul>
