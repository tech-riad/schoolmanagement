<ul class="navbar-nav navbar-nav-hover mr-auto">
    <li class="nav-item  {{Request::is('parentportal/academic-calender') ? 'active':''}}">
        <a class="nav-link" href="{{ route('academic-calender.index') }}" id="nav-hov">
            Academic Calender
        </a>
    </li>

    <li class="nav-item {{Request::is('parentportal/dairy-task') ? 'active':''}}">
        <a class="nav-link" href="{{ route('dairy-task.index') }}" id="nav-hov">
            My Dairy And Task
        </a>
    </li>
    <li class="nav-item {{Request::is('parentportal/class-routine') ? 'active':''}}">
        <a class="nav-link" href="{{ route('class-routine.index') }}" id="nav-hov">
            Class Routine
        </a>
    </li>
    <li class="nav-item {{Request::is('parentportal/online-class-routine') ? 'active':''}}">
        <a class="nav-link" href="{{ route('online-class-routine.index') }}" id="nav-hov">
            Online Class Routine
        </a>
    </li>
</ul>
