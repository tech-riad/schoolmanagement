<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover">
                <li class="nav-item teacher_attend_nav {{Request::is('attendance/teacher*')?'custom_nav':''}}">
                    <a class="nav-link" href="{{route('attendance.teacher.index')}}" id="nav-hov">
                        Teacher Attendance
                    </a>
                </li>

                <li class="nav-item student_attend_nav  {{Request::is('attendance/student*')?'custom_nav':''}}">
                    <a class="nav-link"  href="{{route('attendance.student.index')}}" id="nav-hov">
                        Student Attendance
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link manageLeave" href="javascript:void(0)" id="nav-hov">
                        Manage Leave
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link report" href="javascript:void(0)" id="nav-hov">
                        Reports
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link setting" href="javascript:void(0)" id="nav-hov">
                        Setting
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


{{-- Manage Leave item start --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded d-none" id="leave-item">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover">
                <li class="nav-item teacherapp">
                    <a class="nav-link" href="{{route('attendance.teacherapplication.index')}}" id="nav-hov">
                        Teacher Application
                    </a>
                </li>
                <li class="nav-item studentapp">
                    <a class="nav-link" href="{{route('attendance.studentapplication.index')}}" id="nav-hov">
                        Student Application
                    </a>
                </li>
                <li class="nav-item approve-list">
                    <a href="{{route('attendance.applications.approvedApplication')}}" class="nav-link" id="nav-hov">
                        Approved List
                    </a>
                </li>
                <li class="nav-item reject-list">
                    <a href="{{route('attendance.applications.rejectedApplication')}}" class="nav-link" id="nav-hov">
                        Rejected List
                    </a>
                </li>
                <li class="nav-item addtemplate">
                    <a href="{{route('attendance.leavetemplate.index')}}" class="nav-link" id="nav-hov">
                       Add Template
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
{{-- Manage Leave item end --}}


{{-- Report item start --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded d-none" id="report-item">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover">
                <li class="nav-item">
                    <a class="nav-link teacher_attend" href="{{route('attendance.teacher.report')}}" id="nav-hov">
                        Teachers Attend.
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('attendance.student.report')}}" class="nav-link student_attend" id="nav-hov">
                        Students Attend.
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" id="nav-hov">
                        Teachers Blank Sheet
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" id="nav-hov">
                        Students Blank Sheet
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
{{-- Report item end --}}


{{-- Setting item start --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded d-none" id="setting-item">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover">
                <li class="nav-item teacher_time">
                    <a class="nav-link" href="{{route('attendance.teachertime.index')}}" id="nav-hov">
                        Teachers Time
                    </a>
                </li>
                <li class="nav-item student_time">
                    <a href="{{route('attendance.studenttime.index')}}" class="nav-link" id="nav-hov">
                        Students Time
                    </a>
                </li>
                <li class="nav-item autosms">
                    <a href="{{route('attendance.autosmssetting.index')}}" class="nav-link" id="nav-hov">
                        Auto SMS Setting
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" id="nav-hov">
                       Device Configure
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" id="nav-hov">
                       Teachers Setup
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" id="nav-hov">
                        Students Setup
                    </a>
                </li>
                <li class="nav-item offdays">
                    <a href="{{route('attendance.setoffday.index')}}" class="nav-link" id="nav-hov">
                       Set Off day
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
{{-- Setting item start --}}


@push('js')
    <script>
        $(".setting").on('click',function(){
            $(this).closest('li').addClass('custom_nav');
            $('.manageLeave').closest('li').removeClass('custom_nav');
            $('.report').closest('li').removeClass('custom_nav');
            $("#setting-item").removeClass('d-none');
            $("#leave-item").addClass('d-none');
            $("#report-item").addClass('d-none');
        });

        $(".manageLeave").on('click',function(){
            $(this).closest('li').addClass('custom_nav');
            $('.setting').closest('li').removeClass('custom_nav');
            $('.report').closest('li').removeClass('custom_nav');
            $("#leave-item").removeClass('d-none');
            $("#setting-item").addClass('d-none');
            $("#report-item").addClass('d-none');
        });

        $(".report").on('click',function(){
            $(this).closest('li').addClass('custom_nav');
            $('.setting').closest('li').removeClass('custom_nav');
            $('.manageLeave').closest('li').removeClass('custom_nav');
            $("#report-item").removeClass('d-none');
            $("#leave-item").addClass('d-none');
            $("#setting-item").addClass('d-none');
        });
    </script>
@endpush
