
<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover mr-auto">
                <li class="nav-item {{Request::is('hostel-management/student-list') ? 'active':''}}">
                    <a class="nav-link " href="{{route('hostel-management.student-list.index')}}" id="nav-hov">
                        Students List
                    </a>
                </li>

                <li class="nav-item  {{Request::is('hostel-management/staff-list') ? 'active':''}}">
                    <a class="nav-link" href="{{route('hostel-management.staff-list.index')}}" id="nav-hov">
                        Staff List
                    </a>
                </li>
                <li class="nav-item  {{Request::is('hostel-management/room-list') ? 'active':''}}">
                    <a class="nav-link" href="{{route('hostel-management.room-list.index')}}" id="nav-hov">
                        Room List
                    </a>
                </li>
                
                
                
            </ul>
        </div>
    </div>
</nav>
