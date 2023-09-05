<ul class="navbar-nav navbar-nav-hover mr-auto">
    <li class="nav-item {{Request::is('parentportal/profile') ? 'active':''}}">
        <a class="nav-link" href="{{ route('profile.index') }}" id="nav-hov">
            Profile
        </a>
    </li>

    <li class="nav-item {{Request::is('parentportal/attandance') ? 'active':''}}">
        <a class="nav-link" href="{{ route('attandance.index') }}" id="nav-hov">
            Attendence
        </a>
    </li>
    <li class="nav-item {{Request::is('parentportal/admitcards') ? 'active':''}}">
        <a class="nav-link" href="{{ route('admitcards.index') }}" id="nav-hov">
            Admit Card
        </a>
    </li>
</ul>
