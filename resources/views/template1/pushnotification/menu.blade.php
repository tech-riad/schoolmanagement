
<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover mr-auto">
                <li class="nav-item {{Request::is('push-notification/send-notification') ? 'active':''}}">
                    <a class="nav-link " href="{{route('push-notification.send-notification.index')}}" id="nav-hov">
                        Send Notification
                    </a>
                </li>

                <li class="nav-item {{Request::is('push-notification/report') ? 'active':''}}">
                    <a class="nav-link" href="{{route('push-notification.report.index')}}" id="nav-hov">
                        Report
                    </a>
                </li>
                
                
            </ul>
        </div>
    </div>
</nav>
