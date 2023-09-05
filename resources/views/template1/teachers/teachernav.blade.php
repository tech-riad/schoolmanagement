<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover" id="teacher-nav">

                <li class="nav-item {{Request::is('teacher')? 'custom_nav':''}}">
                    <a class="nav-link" href="{{ route('teacher.index') }}" id="nav-hov">
                        Teachers
                    </a>
                </li>
                <li class="nav-item {{Request::is('teacher/designation')? 'custom_nav':''}}">
                    <a class="nav-link" href="{{ route('designation.index') }}" id="nav-hov">
                        Designation
                    </a>
                </li>
                <li class="nav-item {{Request::is('staff/*')? 'custom_nav':''}}">
                    <a class="nav-link" href="{{ route('staff.index') }}" id="nav-hov">
                        Stuffs
                    </a>
                </li>
                <li class="nav-item {{Request::is('committee/*')? 'custom_nav':''}}">
                    <a class="nav-link" href="{{ route('committee.index') }}" id="nav-hov">
                        Committee
                    </a>
                </li>
                <li class="nav-item {{Request::is('assign_teacher/index*')? 'custom_nav':''}}">
                    <a class="nav-link" href="{{ route('assign_teacher.index') }}" id="nav-hov">
                        Assign Teachers
                    </a>
                </li>
                <li class="nav-item {{Request::is('assign_teacher/subject*')? 'custom_nav':''}}">
                    <a class="nav-link" href="{{ route('assign_teacher.subject') }}" id="nav-hov">
                        Assign Subjects
                    </a>
                </li>

                <li class="nav-item {{Request::is('teacher/branch')? 'custom_nav':''}}">
                    <a class="nav-link" href="{{ route('branch.index') }}" id="nav-hov">
                        Add Branch
                    </a>
                </li>
                <li class="nav-item {{Request::is('teacher/id-card/index*')? 'custom_nav':''}}">
                    <a class="nav-link" href="{{ route('teacher.id-card.index') }}" id="nav-hov">
                        ID Card
                    </a>
                </li>

                <li class="nav-item  {{Request::is('teacher/birthday-wish/index')? 'custom_nav':''}}">
                    <a class="nav-link" href="{{route('teacher.birthday-wish.index')}}" id="nav-hov">
                        Birthday Wish
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
