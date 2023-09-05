
<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover mr-auto">
                <li class="nav-item {{Request::is('digital-class-room/class-room') ? 'active':''}}">
                    <a class="nav-link " href="{{route('digital-class-room.class-room.index')}}" id="nav-hov">
                        Classroom List
                    </a>
                </li>

                <li class="nav-item {{Request::is('digital-class-room/sms') ? 'active':''}}">
                    <a class="nav-link" href="{{route('digital-class-room.sms.index')}}" id="nav-hov">
                        Send Sms
                    </a>
                </li>
                
                
            </ul>
        </div>
    </div>
</nav>
