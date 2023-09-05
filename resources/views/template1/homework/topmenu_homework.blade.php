
<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover mr-auto">
                <li class="nav-item {{Request::is('home-work') ? 'active':''}}  {{Request::is('homework') ? 'active':''}} ">
                    <a class="nav-link " href="{{route('home-work.index')}}" id="nav-hov">
                        Home Work List
                    </a>
                </li>

                <li class="nav-item  {{Request::is('home-work/create') ? 'active':''}}">
                    <a class="nav-link" href="{{route('home-work.create')}}" id="nav-hov">
                        Create Home Work
                    </a>
                </li>
                <li class="nav-item {{Request::is('home-work/notice') ? 'active':''}} ">
                    <a class="nav-link" href="{{route('home-work.home-work-notice.index')}}" id="nav-hov">
                        Home Work Notice
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>
