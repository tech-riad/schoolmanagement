
<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover mr-auto">
                <li class="nav-item {{Request::is('transport/list-of-transport') ? 'active':''}}">
                    <a class="nav-link " href="{{route('transport.list-of-transport.index')}}" id="nav-hov">
                        List Of Transport
                    </a>
                </li>

                <li class="nav-item {{Request::is('transport/transport-root') ? 'active':''}}">
                    <a class="nav-link" href="{{route('transport.transport-root.index')}}" id="nav-hov">
                        Transport Root
                    </a>
                </li>
                <li class="nav-item {{Request::is('transport/booking-list') ? 'active':''}}">
                    <a class="nav-link" href="{{route('transport.booking-list.index')}}" id="nav-hov">
                        Booking
                    </a>
                </li>
               
                
                
                
            </ul>
        </div>
    </div>
</nav>
