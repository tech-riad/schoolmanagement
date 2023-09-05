<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover mr-auto">

                <li class="nav-item {{Request::is('idcard/theam*')?'custom_nav':''}}">
                    <a class="nav-link" href="{{route('software-settings.idcardtheme.index')}}" id="nav-hov">
                        ID Card Theams
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#" id="nav-hov">
                        Admit Card Theams
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#" id="nav-hov">
                        Testimonial Theams
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#" id="nav-hov">
                        Transfer Certificate Theams
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('software-settings.system-theme.index')}}" id="nav-hov">
                        System Theme
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('import-data')}}" class="nav-link pages" id="nav-hov" >
                        Import Data
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>


