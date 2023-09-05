
<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover mr-auto">
                <li class="nav-item {{Request::is('library/book-list') ? 'active':''}}">
                    <a class="nav-link " href="{{route('library.book-list.index')}}" id="nav-hov">
                        Book List
                    </a>
                </li>

                <li class="nav-item {{Request::is('library/staff-list') ? 'active':''}}">
                    <a class="nav-link" href="{{route('library.staff-list.index')}}" id="nav-hov">
                        Staff List
                    </a>
                </li>
               
                
                
                
            </ul>
        </div>
    </div>
</nav>
