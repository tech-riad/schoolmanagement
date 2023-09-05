<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="{{ route('home') }}"><img src="{{ asset('assets/images/Edteco_logo.png') }}"
                alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img
                src="{{ asset('assets/images/third-degree.svg') }}" alt="logo" /></a>
    </div>
    <ul class="nav">
        {{-- <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li> --}}
        <li class="nav-item menu-items {{Request::is('dashboard') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('home') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <!-- <li class="nav-item menu-items {{Request::is('page*') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('page.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Web Admin</span>
            </a>
        </li> -->
        <li class="nav-item menu-items {{Request::is('academic*') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('session.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Academic Management</span>
            </a>
        </li>
        <li class="nav-item menu-items {{Request::is('teacher*') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('teacher.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Teacher Management</span>
            </a>
        </li>
        <li class="nav-item menu-items {{Request::is('student*') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('student.list') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Student Management</span>
            </a>
        </li>

        <li class="nav-item menu-items {{Request::is('online-admission*') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('online-admission.index')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Online Admisssion</span>
            </a>
        </li>
        <li class="nav-item menu-items {{Request::is('routine*') ? 'active':''}}">
            <a class="nav-link" href="{{ route('classroutine.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Routine Management</span>
            </a>
        </li>
        <li class="nav-item menu-items {{Request::is('exam-management*') ? 'active':''}}">
            <a class="nav-link" href="{{ route('exam-management.dashboard.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Exam Management</span>
            </a>
        </li>
        <li class="nav-item menu-items {{Request::is('online-exam*') ? 'active':''}}">
            <a class="nav-link" href="{{route('online-exam.index')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Online Exam</span>
            </a>
        </li>
        <li class="nav-item menu-items {{Request::is('home-work*') ? 'active':''}}">
            <a class="nav-link" href="{{route('homework.index')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Home Work</span>
            </a>
        </li>
        <li class="nav-item menu-items {{Request::is('attendance*') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('attendance.teacher.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Manage Attendance</span>
            </a>
        </li>
        <li class="nav-item menu-items {{Request::is('sms*') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('sms.portal')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">SMS Management</span>
            </a>
        </li>
        <li class="nav-item menu-items {{Request::is('push-notification*') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('push-notification.send-notification.index')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Push Notification</span>
            </a>
        </li>
        <li class="nav-item menu-items {{Request::is('transport*') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('transport.list-of-transport.index')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Manage Transport</span>
            </a>
        </li>
        <li class="nav-item menu-items {{Request::is('hostel-management*') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('hostel-management.student-list.index')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Hostel Management</span>
            </a>
        </li>
        <li class="nav-item menu-items {{Request::is('library*') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('library.book-list.index')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Library Management</span>
            </a>
        </li>
        <li class="nav-item menu-items {{Request::is('inventory*') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('inventory.asset.index')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Inventrory Management</span>
            </a>
        </li>
        <li class="nav-item menu-items {{Request::is('digital-class-room*') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('digital-class-room.class-room.index')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Digital Classroom</span>
            </a>
        </li>
        <li class="nav-item menu-items {{Request::is('report-management*') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('report-management.student-list.index')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Report Management</span>
            </a>
        </li>
        <li class="nav-item menu-items {{Request::is('accountsmanagement*') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('accountsmanagement.dashboard')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Accounts Management</span>
            </a>
        </li>
        <li class="nav-item menu-items {{Request::is('webadmin*') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('banner.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Website Management</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('role-management.roles.index')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Role Management</span>
            </a>
        </li>
        <li class="nav-item menu-items mb-5">
            <a class="nav-link" href="{{route('software-settings.idcardtheme.index')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Software Setting</span>
            </a>
        </li>
    </ul>
</nav>
