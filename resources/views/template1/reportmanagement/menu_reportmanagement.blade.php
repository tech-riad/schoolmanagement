
<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover mr-auto">
                <li class="nav-item {{Request::is('report-management/student-list') ? 'active':''}}">
                    <a class="nav-link " href="{{route('report-management.student-list.index')}}" id="nav-hov">
                        Students List
                    </a>
                </li>

                <li class="nav-item {{Request::is('report-management/teacher-list') ? 'active':''}}">
                    <a class="nav-link" href="{{route('report-management.teacher-list.index')}}" id="nav-hov">
                        Teachers List
                    </a>
                </li>
                <li class="nav-item {{Request::is('report-management/result-report') ? 'active':''}}">
                    <a class="nav-link" href="{{route('report-management.result-report.index')}}" id="nav-hov">
                        Result Report
                    </a>
                </li>
                <li class="nav-item {{Request::is('report-management/attendance-report') ? 'active':''}}">
                    <a class="nav-link" href="{{route('report-management.attendance-report.index')}}" id="nav-hov">
                        Attendance Report
                    </a>
                </li>
                <li class="nav-item {{Request::is('report-management/blank-sheet') ? 'active':''}}">
                    <a class="nav-link" href="#" id="nav-hov">
                        Blank Sheet 
                    </a>
                </li>
                <li class="nav-item {{Request::is('report-management/admit-card') ? 'active':''}}">
                    <a class="nav-link" href="{{route('report-management.admit-card.index')}}" id="nav-hov">
                        Admit Card
                    </a>
                </li>
                <li class="nav-item {{Request::is('report-management/seat-plan') ? 'active':''}}">
                    <a class="nav-link" href="{{route('report-management.seat-plan.index')}}" id="nav-hov">
                        Sit Plan
                    </a>
                </li>
                <li class="nav-item {{Request::is('report-management/class-routine') ? 'active':''}}">
                    <a class="nav-link" href="{{route('report-management.class-routine.index')}}" id="nav-hov">
                        Class Routine
                    </a>
                </li>
                <li class="nav-item {{Request::is('report-management/exam-routine') ? 'active':''}}">
                    <a class="nav-link" href="{{route('report-management.exam-routine.index')}}" id="nav-hov">
                        Exam Routine
                    </a>
                </li>
                <li class="nav-item {{Request::is('report-management/slip') ? 'active':''}}">
                    <a class="nav-link" href="{{route('report-management.slip.index')}}" id="nav-hov">
                        Slip
                    </a>
                </li>
                
                
            </ul>
        </div>
    </div>
</nav>
