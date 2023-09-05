
<header class="main-nav">
    <div class="sidebar-user text-center">
        <img class="img-90 rounded-circle" src="{{asset('template2_asset/images/dashboard/1.png')}}" alt="" />
        <div class="badge-bottom"><span class="badge badge-primary">New</span></div>
        <a href="user-profile">
            <h6 class="mt-3 f-14 f-w-600">{{ Auth::user()->name }}</h6>
        </a>
        <p class="mb-0 font-roboto">{{ Auth::user()->email }}</p>
        {{-- <ul>
            <li>
                <span><span class="counter">{{Helper::all_teacher()->count()}}</span>
                    <p>Teacher</p>
            </li>
            <li>
                <span><span class="counter">{{Helper::all_student()->count()}}</span>
                    <p>Student</p>
            </li>
            <li>
                <span><span class="counter">{{Helper::all_student()->where('gender','Male')->count()}}</span>
                    <p>Boys</p>
            </li>
            <li>
                <span><span class="counter">{{Helper::all_student()->where('gender','Female')->count()}}</span>
                    <p>Girls</p>
            </li>
        </ul> --}}
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="dropdown">
                        <a class="nav-link menu-title {{Request::is('home')? 'active':''}}"
                            href="{{url('/dashboard')}}"><i style="font-size: 15px; padding-right: 10px;" class="fa fa-gauge"></i>Dashboard</a>
                    </li>
                    
                    <li>
                        <a class="nav-link menu-title {{Request::is('home')? 'active':''}}"
                            href="{{url('/dashboard')}}"><i style="font-size: 15px; padding-right: 10px;" class="fa fa-gauge"></i>Dashboard</a>
                    </li>

                    {{-- Academic Manahgement --}}

                    <li class="dropdown ">
                        <a id="academic_setting" class="nav-link menu-title {{Request::is('academic*')? 'active':''}}"
                            href="javascript:void(0)"><i style="font-size: 15px; padding-right: 10px;" class="fa fa-building"></i><span>Academic</span></a>
                        <ul class="nav-submenu menu-content {{Request::is('academic*')? 'd-block':''}}"
                            style="display: none;" id="academic_nav">
                            <li class="{{Request::is('academic/session*')?'custom_nav':''}}">
                                <a href="{{ route('session.index') }}" id="nav-hov">
                                    Sessions
                                </a>
                            </li>

                            <li class="{{Request::is('academic/class*')?'custom_nav':''}}">
                                <a href="{{ route('classes.index') }}" id="nav-hov">
                                    Class
                                </a>
                            </li>
                            <li class="{{Request::is('academic/admit-card*')?'custom_nav':''}}">
                                <a href="{{route('academic.admit-card.index')}}" id="nav-hov">
                                    Admit Card
                                </a>
                            </li>
                            <li class="{{Request::is('academic/seat-plan*')?'custom_nav':''}}" id="seat_plan">
                                <a href="{{ route('academic.seat-plan.index') }}" id="nav-hov">
                                    Seat Plan
                                </a>
                            </li>


                            <li class="{{Request::is('academic/id-card*')?'custom_nav':''}}">
                                <a href="{{route('academic.id-card.index')}}" id="nav-hov">
                                    ID Card
                                </a>
                            </li>
                            <li class="{{Request::is('academic/testimonial*')?'custom_nav':''}}">
                                <a href="{{route('academic.testimonial.index')}}" id="nav-hov">
                                    Testimonial
                                </a>
                            </li>
                            <li class="{{Request::is('academic/transfer-certificate*')?'custom_nav':''}}">
                                <a href="{{route('academic.transfer-certificate.index')}}" id="nav-hov">
                                    Transfer Certificate
                                </a>
                            </li>
                            <li class="{{Request::is('academic/student-tag*')?'custom_nav':''}}">
                                <a href="{{route('academic.student-tag.index')}}" id="nav-hov">
                                    Tag for Student
                                </a>
                            </li>
                            <li class="{{Request::is('academic/number-sheet*')?'custom_nav':''}}">
                                <a href="{{route('academic.number-sheet.index')}}" id="nav-hov">
                                    Number Sheet
                                </a>
                            </li>
                            <hr>
                            <li class=" {{Request::is('academic*') ? 'active':''}}">
                                <a href="{{route('academic.subject.index')}}" id="nav-hov">
                                    Subject List
                                </a>
                            </li>
                            <li class=" {{Request::is('academic*') ? 'active':''}}">
                                <a href="{{route('subject-type.index')}}" id="nav-hov">
                                    Subject Type
                                </a>
                            </li>
                            <li class=" {{Request::is('academic*')?'custom_nav':''}}">
                                <a href="{{route('academic.setting.edit')}}" id="nav-hov">
                                    Academic Setting
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Teacher Management --}}
                    <li class="dropdown ">
                        <a id="teacher_nav" class="nav-link menu-title {{Request::is('teacher*')? 'active':''}}"
                            href="javascript:void(0)"><i style="font-size: 15px; padding-right: 10px;" class="fa-solid fa-chalkboard-user"></i><span>Teacher Management</span></a>
                        <ul id="teacher_menu" class="nav-submenu menu-content {{Request::is('teacher*')? 'd-block':''}}"
                            style="display: none;">
                            <li class=" ">
                                <a class="{{Request::is('teacher.index')? 'active':''}}"
                                    href="{{ route('teacher.index') }}" id="nav-hov">
                                    Teachers
                                </a>
                            </li>
                            <li class=" {{Request::is('teacher/designation')? 'custom_nav':''}}">
                                <a href="{{ route('designation.index') }}" id="nav-hov">
                                    Designation
                                </a>
                            </li>
                            <li class=" {{Request::is('staff/*')? 'custom_nav':''}}">
                                <a href="{{ route('teacher.staff.index') }}" id="nav-hov">
                                    Stuffs
                                </a>
                            </li>
                            <li class=" {{Request::is('committee/*')? 'custom_nav':''}}">
                                <a href="{{ route('teacher.committee.index') }}" id="nav-hov">
                                    Committee
                                </a>
                            </li>
                            <li class=" {{Request::is('teacher/assign_teacher/index*')? 'custom_nav':''}}">
                                <a href="{{ route('teacher.assign_teacher.index') }}" id="nav-hov">
                                    Assign Teachers
                                </a>
                            </li>
                            <li class=" {{Request::is('assign_teacher/subject*')? 'custom_nav':''}}">
                                <a href="{{ route('teacher.assign_teacher.subject') }}" id="nav-hov">
                                    Assign Subjects
                                </a>
                            </li>

                            <li class=" {{Request::is('teacher/branch')? 'custom_nav':''}}">
                                <a href="{{ route('branch.index') }}" id="nav-hov">
                                    Add Branch
                                </a>
                            </li>
                            <li class=" {{Request::is('teacher/id-card/index*')? 'custom_nav':''}}">
                                <a href="{{ route('teacher.id-card.index') }}" id="nav-hov">
                                    ID Card
                                </a>
                            </li>

                            <li class="  {{Request::is('teacher/birthday-wish/index')? 'custom_nav':''}}">
                                <a href="{{route('teacher.birthday-wish.index')}}" id="nav-hov">
                                    Birthday Wish
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Student Management --}}
                    <li class="dropdown">
                        <a id="student_management" class="nav-link menu-title {{Request::is('student*')? 'active':''}}" 
                            href="javascript:void(0)"><i style="font-size: 15px; padding-right: 10px;" class="fas fa-user-graduate"></i><span>Student Management</span></a>
                        <ul id="student-menu" class="nav-submenu menu-content {{Request::is('student*')? 'd-block':''}}"
                            style="display: none;">

                            <li class=" {{Request::is('student/dashboard*')?'active':''}}">
                                <a  href="{{ route('student.dashboard') }}" id="nav-hov">
                                    Dashboard
                                </a>
                            </li>
                            <li class=" {{Request::is('student/list*')?'custom_nav':''}}">
                                <a href="{{ route('student.list') }}" id="nav-hov">
                                    Student List
                                </a>
                            </li>
                            <li class=" {{Request::is('student/admission*')?'custom_nav':''}}">
                                <a href="{{ route('admission.index') }}" id="nav-hov">
                                    Admission
                                </a>
                            </li>
                            <li class=" {{Request::is('student/migration/index')?'custom_nav':''}}">
                                <a href="{{route('student.migration.index')}}" id="nav-hov">
                                    Migration
                                </a>
                            </li>
                            <li class=" {{Request::is('student/subject-assign/index')?'custom_nav':''}}">
                                <a href="{{route('student.subject-assign.index')}}" id="nav-hov">
                                    Subject Assign
                                </a>
                            </li>
                            <li class=" {{Request::is('student/profile-update')?'custom_nav':''}}">
                                <a href="{{route('studentprofile.index')}}" id="nav-hov">
                                    Update Profile
                                </a>
                            </li>
                            <li class="">
                                <a href="#" id="nav-hov">
                                    Reports
                                </a>
                            </li>
                            <li class=" {{Request::is('student/birthday-wish/index')?'custom_nav':''}}">
                                <a href="{{route('student.birthday-wish.index')}}" id="nav-hov">
                                    Birthday Wish
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Online Admission --}}
                    {{-- <li class="dropdown">
                        <a class="nav-link menu-title {{Request::is('online-admission*')? 'active':''}}"
                    href="javascript:void(0)"><i data-feather="layout"></i><span>Online Admission</span></a>
                    <ul class="nav-submenu menu-content {{Request::is('online-admission*')? 'd-block':''}}"
                        style="display: none;">
                        <li class=" {{Request::is('online-admission/add-subject/index') ? 'active':''}}">
                            <a href="{{ route('online-admission.add-subject.index') }}" id="nav-hov">
                                Add Subject
                            </a>
                        </li>

                        <li class=" ">
                            <a href="{{ route('online-admission.add-subject.index') }}" id="nav-hov">
                                Exam Setting
                            </a>
                        </li>
                        <li class=" {{Request::is('online-admission/marks-setup/index') ? 'active':''}}">
                            <a href="{{ route('online-admission.marks-setup.index') }}" id="nav-hov">
                                Marks Setup
                            </a>
                        </li>
                        <li class=" {{Request::is('online-admission/marks-input') ? 'active':''}}">
                            <a href="{{ route('online-admission.marks-input.index') }}" id="nav-hov">
                                Marks Input
                            </a>
                        </li>

                        <li class=" menu {{Request::is('online-admission/admission-result') ? 'active':''}}">
                            <a href="{{ route('online-admission.admission-result.index') }}" id="nav-hov">
                                Results
                            </a>
                        </li>

                    </ul>
                    </li> --}}
                    {{-- <i class="fa fa-times-circle" aria-hidden="true"></i> --}}

                    {{-- Routine Management --}}
                    <li class="dropdown">
                        <a id="routine_management" class="nav-link menu-title {{Request::is('routine*')? 'active':''}}"
                            href="javascript:void(0)"><i style="font-size: 15px; padding-right: 10px;" class="fa fa-times-circle"></i><span>Routine Management</span></a> 
                        <ul id="routine_nav" class="nav-submenu menu-content {{Request::is('routine*')? 'd-block':''}}"
                            style="display: none;">
                            <li class="{{Request::is('routine/class/*') ? 'active':''}}">
                                <a href="{{ route('classroutine.index') }}" id="nav-hov">
                                    Class Routine
                                </a>
                            </li>

                            <li class="" {{Request::is('examroutine/index') ? 'active':''}}>
                                <a href="{{ route('examroutine.index') }}" id="nav-hov">
                                    Exam Routine
                                </a>
                            </li>
                            <li class="dropdown">
                                <a class="nav-link menu-title " href="javascript:void(0)"><i
                                        data-feather="layout"></i><span>Setting</span></a>
                            <li class="nav-item" {{Request::is('routine/time-setting') ? 'active':''}}>
                                <a href="{{ route('routine.time-setting.index') }}" id="nav-hov">
                                    Time Setting
                                </a>
                            </li>
                            <li class="nav-item" {{Request::is('routine/set-design') ? 'active':''}}>
                                <a href="{{ route('routine.set-design.index') }}" id="nav-hov">
                                    Set Design
                                </a>
                            </li>
                    </li>
                </ul>
                </li>

                {{-- Exam Management --}}


                <li class="dropdown">
                    <a id="exam_management" class="nav-link menu-title {{Request::is('exam-management*')? 'active':''}}" 
                        href="javascript:void(0)"><i style="font-size: 15px; padding-right: 10px;" class="fa fa-file-lines"></i> <span>Exam
                            Management</span></a>
                    <ul id="exam_nav" class="nav-submenu menu-content {{Request::is('exam-management*')? 'd-block':''}}"
                        style="display: none;"> 
                        <li class="{{Request::is('exam-management/marks/index') ? 'active':''}}">
                            <a href="{{ route('exam-management.marks.index') }}" id="nav-hov">
                                Input Marks
                            </a>
                        </li>

                        <li class="{{Request::is('exam-management/update-marks/index') ? 'active':''}}">
                            <a href="{{ route('exam-management.update-marks.index') }}">
                                Update Marks
                            </a>
                        </li>
                        <li class="{{Request::is('exam-management/delete-marks/index') ? 'active':''}}">
                            <a href="{{ route('exam-management.delete-marks.index') }}">
                                Delete Marks
                            </a>
                        </li>
                        <li class="{{Request::is('exam-management/marks-input/index') ? 'active':''}}">
                            <a href="{{ route('exam-management.marks-input.index') }}">
                                Class Test Marks
                            </a>
                        </li>
                        <li id="exam_report">
                            <a href="#">
                                Reports
                            </a>
                        </li>


                        
                            
                        <li class="{{Request::is('exam-management/exam/*') ? 'active':''}}">
                            <a href="{{ route('exam-management.exam.index') }}" id="nav-hov">
                                Exam List
                            </a>
                        </li>
                        <li class="" {{Request::is('exam-management/setting/gpa-grading') ? 'active':''}}>
                            <a href="{{ route('exam-management.setting.gpa-grading.index') }}">GPA Grading</a>
                        </li>
                        <li class="" {{Request::is('exam-management/setting/attandance-count') ? 'active':''}}>
                            <a href="{{ route('exam-management.setting.attandance-count.index') }}">Attandance Count</a>
                        </li>
                        <li class="" {{Request::is('exam-management/setting/transcript-design') ? 'active':''}}>
                            <a href="{{ route('exam-management.setting.transcript-design.index') }}">Transcript
                                Design</a>
                        </li>
                        <li class=" {{Request::is('exam-management/setting/marks-dist-type') ? 'active':''}}">
                            <a href="{{ route('exam-management.setting.marks-dist-type.index') }}">Short Code</a>
                        </li>
                        <li class="" {{Request::is('exam-management/setting/marks-dist') ? 'active':''}}
                            id="marks-dist">
                            <a href="{{ route('exam-management.setting.marks-dist.index') }}">Marks Distribution</a>
                        </li>

                        <hr>
                        {{-- New Added --}}
                        <li id="class_position" {{Request::is('exam-management/report/class-position/index') ? 'active':''}}>
                            <a href="{{ route('exam-management.report.class-position.index') }}" >
                                Class Position
                            </a>
                        </li>
                        <li>
                            <a href="{{route('exam-management.transcript.index')}}" >Transcript</a>
                        </li>
                        <li {{Request::is('exam-management/report/tabulation-sheet') ? 'active':''}}>
                            <a href="{{ route('exam-management.report.tabulation-sheet.index') }}" >Tabulation Sheet</a>
                        </li>
                        <li {{Request::is('exam-management/report/average-report') ? 'active':''}}>
                            <a href="{{ route('exam-management.report.average-report.index') }}" >Average Report</a>
                        </li>
                        <li {{Request::is('exam-management/report/test-report') ? 'active':''}} >
                            <a href="{{ route('exam-management.report.test-report.index') }}" >Class Test Report</a>
                        </li>
                        <hr>
                        <li {{Request::is('exam-management/setting/gpa-grading') ? 'active':''}}>
                            <a  href="{{ route('exam-management.setting.gpa-grading.index') }}">GPA Grading</a>
                        </li>
                        <li {{Request::is('exam-management/setting/attandance-count') ? 'active':''}}>
                            <a  href="{{ route('exam-management.setting.attandance-count.index') }}">Attandance Count</a>
                        </li>
                        <li {{Request::is('exam-management/setting/transcript-design') ? 'active':''}}>
                            <a  href="{{ route('exam-management.setting.transcript-design.index') }}">Transcript Design</a>
                        </li>
                        <li class="nav-item {{Request::is('exam-management/setting/marks-dist-type') ? 'active':''}}">
                            <a  href="{{ route('exam-management.setting.marks-dist-type.index') }}">Short Code</a>
                        </li>
                        <li {{Request::is('exam-management/setting/marks-dist') ? 'active':''}} id="marks-dist">
                            <a  href="{{ route('exam-management.setting.marks-dist.index') }}">Marks Distribution</a>
                        </li>
                
                </ul>
                </li>

                {{-- Online Exam --}}
                {{-- <li class="dropdown">
                    <a id="online_exam" class="nav-link menu-title {{Request::is('online-exam*')? 'active':''}}"
                        href="javascript:void(0)"><i data-feather="layout"></i><span>Online
                            Exam</span></a>
                    <ul id="online_exam_nav" class="nav-submenu menu-content {{Request::is('online-exam*')? 'd-block':''}}"
                        style="display: none;">
                        <li
                            class=" {{Request::is('online-exam/index') ? 'active':''}} {{Request::is('online-exam/mcq/index') ? 'active':''}}">
                            <a href="{{ route('online-exam.mcq.index') }}" id="nav-hov">
                                Create Exam MCQ
                            </a>
                        </li>

                        <li class=" {{Request::is('online-exam/question/index') ? 'active':''}}">
                            <a class=" question" href="{{ route('online-exam.question.index') }}" id="nav-hov">
                                Questions
                            </a>
                        </li>
                        <li class=" {{Request::is('online-exam/event/index') ? 'active':''}}">
                            <a href="{{ route('online-exam.event.index') }}" id="nav-hov">
                                Create Event
                            </a>
                        </li>
                        <li class=" {{Request::is('online-exam/result-report/index') ? 'active':''}}">
                            <a href="{{ route('online-exam.result-report.index') }}" id="nav-hov">
                                Result Report
                            </a>
                        </li>
                    </ul>
                </li> --}}

                {{-- Homework --}}
                {{-- <li class="dropdown">
                    <a class="nav-link menu-title {{Request::is('home-work*')? 'active':''}}"
                href="javascript:void(0)"><i data-feather="layout"></i><span>Home
                    Work</span></a>
                <ul class="nav-submenu menu-content {{Request::is('home-work*')? 'd-block':''}}" style="display: none;">
                    <li class=" {{Request::is('home-work') ? 'active':''}}  {{Request::is('homework') ? 'active':''}} ">
                        <a class=" " href="{{route('home-work.index')}}" id="nav-hov">
                            Home Work List
                        </a>
                    </li>

                    <li class="  {{Request::is('home-work/create') ? 'active':''}}">
                        <a class="" href="{{route('home-work.create')}}" id="nav-hov">
                            Create Home Work
                        </a>
                    </li>
                    <li class=" {{Request::is('home-work/notice') ? 'active':''}} ">
                        <a class="" href="{{route('home-work.home-work-notice.index')}}" id="nav-hov">
                            Home Work Notice
                        </a>
                    </li>
                </ul>
                </li> --}}

                {{-- Attandance --}}
                <li class="dropdown">
                    <a id="attandance" class="nav-link menu-title {{Request::is('attendance*')? 'active':''}}"
                        href="javascript:void(0)"><i style="font-size: 15px; padding-right: 10px;" class="fas fa-clipboard-list"></i> <span>Manage
                            Attendance</span></a>
                    <ul id="attandance_nav" class="nav-submenu menu-content {{Request::is('attendance*')? 'd-block':''}}"
                        style="display: none;">
                        <li class=" {{Request::is('attendance/teacher*')?'custom_nav':''}}">
                            <a href="{{route('attendance.teacher.index')}}" id="nav-hov">
                                Teacher Attend.
                            </a>
                        </li>

                        <li class=" {{Request::is('attendance/student*')?'custom_nav':''}}">
                            <a href="{{route('attendance.student.index')}}" id="nav-hov">
                                Student Attend.
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('attendance.holiday.index')}}" id="nav-hov">
                                Holiday & Weekday Setup
                            </a>
                        </li>
                        <li class="">
                            <a href="#" id="nav-hov">
                                ID Mapping
                            </a>
                        </li>


                        <li class="">
                            <a href="#" id="nav-hov">
                                Device Seeting
                            </a>
                        </li>
                        <li class="">
                            <a href="#" id="nav-hov">
                                Attend. Blank Sheet
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Sms Management --}}

                <li class="dropdown">
                    <a id="sms_management" class="nav-link menu-title {{Request::is('sms*')? 'active':''}}" href="javascript:void(0)">
                    <i style="font-size: 15px; padding-right: 10px;" class="fas fa-message"></i>
                    <span>Sms Management</span></a>
                    <ul id="sms_management_nav" class="nav-submenu menu-content {{Request::is('sms*')? 'd-block':''}}" style="display: none;">
                        <li class=" {{Request::is('sms/portal') ? 'active':''}}">
                            <a href="{{Route('sms.portal')}}" id="nav-hov">
                                Send SMS
                            </a>
                        </li>
                        <li class="{{Request::is('sms/portal') ? 'active':''}}">
                            <a href="{{route('attendance.autosmssetting.index')}}"  id="nav-hov">
                                Auto SMS Setting
                            </a>
                        </li>
                        <li class=" {{Request::is('sms/result-sms') ? 'active':''}}">
                            <a href="{{Route('sms.result-sms.index')}}" id="nav-hov">
                                Results SMS
                            </a>
                        </li>
                        <li class=" {{Request::is('sms/contact') ? 'active':''}}">
                            <a href="{{Route('sms.contact.index')}}" id="nav-hov">
                                Add Contacts
                            </a>
                        </li>
                        <li class=" {{Request::is('sms/template') ? 'active':''}}">
                            <a href="{{Route('sms.template.index')}}" id="nav-hov">
                                Add Template
                            </a>
                        </li>
                        <li class=" {{Request::is('sms/orders') ? 'active':''}}">
                            <a href="{{Route('sms.orders.index')}}" id="nav-hov">
                                Orders
                            </a>
                        </li>
                        <li class=" {{Request::is('sms/sms-report') ? 'active':''}}">
                            <a href="{{Route('sms.sms-report.index')}}" id="nav-hov">
                                SMS Reports
                            </a>
                        </li>
                        <li class=" {{Request::is('sms/sms-history') ? 'active':''}}">
                            <a href="{{Route('sms.smshistory')}}" id="nav-hov">
                                History
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Push Notification --}}

                {{-- <li class="dropdown">
                    <a class="nav-link menu-title {{Request::is('push-notification*')? 'active':''}}"
                href="javascript:void(0)"><i data-feather="layout"></i><span>Push
                    Notification</span></a>
                <ul class="nav-submenu menu-content {{Request::is('push-notification*')? 'd-block':''}}"
                    style="display: none;">
                    <li class="{{Request::is('push-notification/send-notification') ? 'active':''}}">
                        <a href="{{route('push-notification.send-notification.index')}}" id="nav-hov">
                            Send Notification
                        </a>
                    </li>

                    <li class="{{Request::is('push-notification/report') ? 'active':''}}">
                        <a href="{{route('push-notification.report.index')}}" id="nav-hov">
                            Report
                        </a>
                    </li>
                </ul>
                </li> --}}

                {{-- Hostel Management --}}

                {{-- <li class="dropdown">
                    <a class="nav-link menu-title {{Request::is('hostel-management*')? 'active':''}}"
                href="javascript:void(0)"><i data-feather="layout"></i><span>Hostel
                    Management</span></a>
                <ul class="nav-submenu menu-content {{Request::is('hostel-management*')? 'd-block':''}}"
                    style="display: none;">
                    <li class="{{Request::is('hostel-management/student-list') ? 'active':''}}">
                        <a href="{{route('hostel-management.student-list.index')}}" id="nav-hov">
                            Students List
                        </a>
                    </li>

                    <li class=" {{Request::is('hostel-management/staff-list') ? 'active':''}}">
                        <a href="{{route('hostel-management.staff-list.index')}}" id="nav-hov">
                            Staff List
                        </a>
                    </li>
                    <li class=" {{Request::is('hostel-management/room-list') ? 'active':''}}">
                        <a href="{{route('hostel-management.room-list.index')}}" id="nav-hov">
                            Room List
                        </a>
                    </li>
                </ul>
                </li> --}}

                {{-- Library Management --}}

                {{-- <li class="dropdown">
                    <a class="nav-link menu-title {{Request::is('library*')? 'active':''}}"
                href="javascript:void(0)"><i data-feather="layout"></i><span>Library
                    Management</span></a>
                <ul class="nav-submenu menu-content {{Request::is('library*')? 'd-block':''}}" style="display: none;">
                    <li class="{{Request::is('library/book-list') ? 'active':''}}">
                        <a href="{{route('library.book-list.index')}}" id="nav-hov">
                            Book List
                        </a>
                    </li>

                    <li class="{{Request::is('library/staff-list') ? 'active':''}}">
                        <a href="{{route('library.staff-list.index')}}" id="nav-hov">
                            Staff List
                        </a>
                    </li>
                </ul>
                </li> --}}

                {{-- Report Management --}}
                {{-- <li class="dropdown">
                    <a class="nav-link menu-title {{Request::is('report-management*')? 'active':''}}"
                href="javascript:void(0)"><i data-feather="layout"></i><span>Report
                    Management</span></a>
                <ul class="nav-submenu menu-content {{Request::is('report-management*')? 'd-block':''}}"
                    style="display: none;">
                    <li class="{{Request::is('report-management/student-list') ? 'active':''}}">
                        <a href="{{route('report-management.student-list.index')}}" id="nav-hov">
                            Students List
                        </a>
                    </li>

                    <li class="{{Request::is('report-management/teacher-list') ? 'active':''}}">
                        <a href="{{route('report-management.teacher-list.index')}}" id="nav-hov">
                            Teachers List
                        </a>
                    </li>
                    <li class="{{Request::is('report-management/result-report') ? 'active':''}}">
                        <a href="{{route('report-management.result-report.index')}}" id="nav-hov">
                            Result Report
                        </a>
                    </li>
                    <li class="{{Request::is('report-management/attendance-report') ? 'active':''}}">
                        <a href="{{route('report-management.attendance-report.index')}}" id="nav-hov">
                            Attendance Report
                        </a>
                    </li>
                    <li class="{{Request::is('report-management/blank-sheet') ? 'active':''}}">
                        <a href="#" id="nav-hov">
                            Blank Sheet
                        </a>
                    </li>
                    <li class="{{Request::is('report-management/admit-card') ? 'active':''}}">
                        <a href="{{route('report-management.admit-card.index')}}" id="nav-hov">
                            Admit Card
                        </a>
                    </li>
                    <li class="{{Request::is('report-management/seat-plan') ? 'active':''}}">
                        <a href="{{route('report-management.seat-plan.index')}}" id="nav-hov">
                            Sit Plan
                        </a>
                    </li>
                    <li class="{{Request::is('report-management/class-routine') ? 'active':''}}">
                        <a href="{{route('report-management.class-routine.index')}}" id="nav-hov">
                            Class Routine
                        </a>
                    </li>
                    <li class="{{Request::is('report-management/exam-routine') ? 'active':''}}">
                        <a href="{{route('report-management.exam-routine.index')}}" id="nav-hov">
                            Exam Routine
                        </a>
                    </li>
                    <li class="{{Request::is('report-management/slip') ? 'active':''}}">
                        <a href="{{route('report-management.slip.index')}}" id="nav-hov">
                            Slip
                        </a>
                    </li>
                </ul>
                </li> --}}




                {{-- Accounts Management --}}
                <li class="dropdown">
                    <a id="account_management" class="nav-link menu-title {{Request::is('accountsmanagement*')? 'active':''}}"
                        href="javascript:void(0)"><i style="font-size: 15px;
                        padding-right: 10px;" class="fas  fa-file-invoice-dollar"></i><span>Accounts Management </span></a>
                    <ul id="account_management_nav" class="nav-submenu menu-content {{Request::is('accountsmanagement*')? 'd-block':''}}"
                        style="display: none;">
                        <li class="{{Request::is('accountsmanagement/dashboard') ? 'active':''}}">
                            <a href="{{route('accountsmanagement.dashboard')}}" id="nav-hov">
                                Dashboard
                            </a>
                        </li>
                        <li class="{{Request::is('accountsmanagement/payment/index') ? 'active':''}}">
                            <a href="{{route('payment.index')}}" id="nav-hov">
                                Collection
                            </a>
                        </li>
                        <li class="{{Request::is('accountsmanagement/expense/*') ? 'active':''}}">
                            <a href="{{route('expense.index')}}" id="nav-hov">
                                Expense
                            </a>
                        </li>
                        <li class="" id="reports">
                            <a href="#" id="nav-hov">
                                Reports
                            </a>

                        </li>
                        <hr>
                        <li class="{{Request::is('accountsmanagement/reports/expense') ? 'active':''}}">
                            <a href="{{route('reports.expense-report')}}" id="nav-hov">
                                Expense Report
                            </a>
                        </li>
                        <li class="{{Request::is('accountsmanagement/payment-report/paid') ? 'active':''}}">
                            <a href="{{route('payment-report.index')}}" id="nav-hov">
                                Paid Report
                            </a>
                        </li>

                        <li class="{{Request::is('accountsmanagement/payment-report/unpaid') ? 'active':''}}">
                            <a href="{{route('payment-report.unpaid')}}" id="nav-hov">
                                Unpaid Report
                            </a>
                        </li>

                        <hr>
                        <li class="{{Request::is('accountsmanagement/fees-setup') ? 'active':''}}">
                            <a href="{{route('fees-setup')}}" id="nav-hov">
                                Bulk Fees Setup
                            </a>
                        </li>
                        <li class="{{Request::is('accountsmanagement/fees-setup-edit') ? 'active':''}}">
                            <a href="{{route('fees-setup.edit')}}" id="nav-hov">
                                Bulk Fees Update
                            </a>
                        </li>
                        <li class="{{Request::is('accountsmanagement/general/fees') ? 'active':''}}">
                            <a href="{{route('accountsmanagement.general.index')}}" id="nav-hov">
                                Regular Fees
                            </a>
                        </li>
                        <li class="{{Request::is('accountsmanagement/student/fees') ? 'active':''}}">
                            <a href="{{route('accountsmanagement.index')}}" id="nav-hov">
                                Student Fees
                            </a>
                        </li>
                        <li class="{{Request::is('accountsmanagement/feestype*') ? 'active':''}}">
                            <a href="{{route('feestype.index')}}" id="nav-hov">
                                Fees Type
                            </a>
                        </li>
                        <li class="{{Request::is('accountsmanagement/scholarship*') ? 'active':''}}">
                            <a href="{{route('scholarship.index')}}" id="nav-hov">
                                Scholarship
                            </a>
                        </li>
                        <li class="{{Request::is('chart-of-account*') ? 'active':''}}">
                            <a href="{{route('chart-of-account.index')}}" id="nav-hov">
                                Chart Of Account
                            </a>
                        </li>
                        <li class="{{Request::is('payment-gateway/index') ? 'active':''}}">
                            <a href="{{route('payment-gateway.index')}}" id="nav-hov">
                                Payment Gateway
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- Website Managemrnt --}}


                <li class="dropdown">
                    <a id="website_management" class="nav-link menu-title {{Request::is('webadmin*')? 'active':''}}"
                        href="javascript:void(0)"><i style="font-size: 15px;
                        padding-right: 10px;" class="fas fa-database"></i><span>Website Management </span></a>
                    <ul id="website_management_nav" class="nav-submenu menu-content {{Request::is('webadmin*')? 'd-block':''}} {{Request::is('merit*')? 'd-block':''}}"
                        style="display: none;">
                        {{-- <li >
                            <a  id="home-tab" type="button">
                                Home
                            </a>
                        </li>
                        <li >
                            <a class="" type="button" id="about-tab">
                                About
                            </a>
                        </li>
                        <li >
                            <a class="" type="button" id="admin-tab">
                                Administration
                            </a>
                        </li>
                        <li >
                            <a class="" type="button" id="aca-tab">
                                Academic
                            </a>
                        </li>
                        <li >
                            <a class="" type="button" id="download-tab">
                                Download
                            </a>
                        </li>
                        <li >
                            <a class="" type="button" id="cocur-tab">
                                Co-Curriculum
                            </a>
                        </li>
                        <li >
                            <a href="#"  id="gal-tab">
                                Gallery
                            </a>
                        </li>
                        <li >
                            <a class=""  id="contact-tab">
                                Contact
                            </a>
                        </li>
                        <li >
                            <a class="" type="button" id="theme-tab">
                                Themes
                            </a>
                        </li>
                        <li >
                            <a class="" type="button" id="color-tab">
                                Colors
                            </a>
                        </li>
                        <hr> --}}
                        <li>
                            <a class=" banner" href="{{ route('banner.index') }}" id="nav-hov">
                                Banner
                            </a>
                        </li>

                        <li>
                            <a class=" news" href="{{route('news.index')}}" id="nav-hov">
                                News
                            </a>
                        </li>
                        <li>
                            <a href="{{route('notice.index')}}" class=" notice" id="nav-hov">
                                Notices
                            </a>
                        </li>
                        <li>
                            <a href="{{route('message.index')}}" class=" message" id="nav-hov">
                                Messages
                            </a>
                        </li>

                        <li>
                            <a href="{{route('sociallink.edit')}}" class=" social_link" id="nav-hov">
                                Link
                            </a>
                        </li>
                        <li>
                            <a class=" meritstudent" href="{{route("meritstudent.index")}}" id="nav-hov">
                                Merit Student
                            </a>
                        </li>
                        <li>
                            <a href="{{route('ataglance.edit')}}" class=" at_a_glance" id="nav-hov">
                                Glance
                            </a>
                        </li>
                        <li>
                            <a href="{{route('video.index')}}" class=" videos" id="nav-hov">
                                Video
                            </a>
                        </li>
                        <li>
                            <a href="{{route('event.index')}}" class=" events" id="nav-hov">
                                Events
                            </a>
                        </li>

                        <li>
                            <a href="{{route('getintouch.edit')}}" class=" getintouch" id="nav-hov">
                                Get in Touch
                            </a>
                        </li>

                        <li class="nav-item {{Request::is('webadmin/info*')?'active':''}}">
                            <a href="{{route('info.index')}}" class=" general_info" id="nav-hov">
                                General Info
                            </a>
                        </li>

                        <hr>
                        <li class="nav-item ">
                            <a class=" active abouthistory" href="{{ route('page.admin.show', 1) }}" id="nav-hov">
                                History
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class=" aboutwhystudy" href="{{ route('page.admin.show', 2) }}" id="nav-hov">
                                Why Study
                            </a>
                        </li>
                        <li>
                            <a class=" aboutinfrastructure" href="{{ route('page.admin.show', 3) }}" id="nav-hov">
                                Infrastructure
                            </a>
                        </li>
                        <li>
                            <a class="  aboutachievement" href="{{ route('page.admin.show', 4) }}" id="nav-hov">
                                Achievement
                            </a>
                        </li>

                        <hr>
                        <li>
                            <a class=" active" href="" id="nav-hov">
                                Governing Body List Add
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class="" href="" id="nav-hov">
                                Teachers Info Set
                            </a>
                        </li>
                        <li>
                            <a class="" href="" id="nav-hov">
                                Staff
                            </a>
                        </li>

                        <hr>

                        <li>
                            <a class=" active" href="" id="nav-hov">
                                Students List Set
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class="" href="" id="nav-hov">
                                Syllabus & Booklist
                            </a>
                        </li>
                        <li>
                            <a class="" href="" id="nav-hov">
                                Result Setting
                            </a>
                        </li>

                        <hr>
                        <li>
                            <a class=" active" href="" id="nav-hov">
                                Digital Content
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class="" href="" id="nav-hov">
                                Hand Book
                            </a>
                        </li>
                        <li>
                            <a class="" href="" id="nav-hov">
                                Class Notes
                            </a>
                        </li>
                        <li>
                            <a class="" href="" id="nav-hov">
                                Others Download
                            </a>
                        </li>

                        <hr>
                        <li>
                            <a class=" sports" href="{{ route('page.admin.show', 5) }}" id="nav-hov">
                                Sports
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class=" tours" href="{{ route('page.admin.show', 6) }}" id="nav-hov">
                                Tours
                            </a>
                        </li>
                        <li>
                            <a class=" scouts" href="{{ route('page.admin.show', 7) }}" id="nav-hov">
                                Scout
                            </a>
                        </li>

                        <hr>
                        <li>
                            <a class=" photos" href="{{ route('institutephoto.index') }}" id="nav-hov">
                                Photos
                            </a>
                        </li>
                        <li id="user_message">
                            <a class=" contact-nav" href="{{route('contact-us.index')}}" id="nav-hov">
                                User Message
                            </a>
                        </li>
                        <li>
                            <a class=" active" href="" id="nav-hov">
                                Add Theme
                            </a>
                        </li>

                        <li>
                            <a class=" add-color" href="{{route('color.index')}}" id="nav-hov">
                                Add Color
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{route('menu.index')}}" id="nav-hov">
                                Menu / Sub Menu
                            </a>
                        </li>
                        <li>
                            <a href="{{route('page.index')}}" class=" pages" id="nav-hov">
                                Pages
                            </a>
                        </li>

                    </ul>
                </li>

                
                <li class="dropdown">
                    <a id="software_setting" class="nav-link menu-title {{Request::is('question*')? 'active':''}}"
                        href="javascript:void(0)"><i style="font-size: 15px;
                        padding-right: 10px;" class="fas fa-gear"></i><span>Question Management</span></a>
                    <ul id="software_setting_nav" class="nav-submenu menu-content {{Request::is('question*')? 'd-block':''}}"
                        style="display: none;">

                        <li class=" {{Request::is('question/index') ? 'active':''}}">
                            <a href="{{ route('question.index') }}" id="nav-hov">
                                Written Questions
                            </a>
                        </li>

                        <li class="{{Request::is('question/mcq-index*') ? 'active':''}}">
                            <a href="{{ route('question.mcqindex') }}" id="nav-hov">
                                MCQ Questions
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Role Permission --}}
                <li class="dropdown">
                    <a id="software_setting" class="nav-link menu-title {{Request::is('role-management*')? 'active':''}}"
                        href="javascript:void(0)"><i style="font-size: 15px;
                        padding-right: 10px;" class="fas fa-gear"></i><span>Role Management</span></a>
                    <ul id="software_setting_nav" class="nav-submenu menu-content {{Request::is('role-management*')? 'd-block':''}}"
                        style="display: none;">

                        <li class=" {{Request::is('role-management/users*') ? 'active':''}}">
                            <a href="{{route('role-management.users.index')}}" id="nav-hov">
                                User
                            </a>
                        </li>

                        <li class="{{Request::is('role-management/roles*') ? 'active':''}}">
                            <a href="{{route('role-management.roles.index')}}" id="nav-hov">
                                Role
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Software-setting --}}
                <li class="dropdown">
                    <a id="software_setting" class="nav-link menu-title {{Request::is('software-settings*')? 'active':''}}"
                        href="javascript:void(0)"><i style="font-size: 15px;
                        padding-right: 10px;" class="fas fa-gear"></i><span>Software Setting</span></a>
                    <ul id="software_setting_nav" class="nav-submenu menu-content {{Request::is('software-settings*')? 'd-block':''}}"
                        style="display: none;">

                        <li class=" {{Request::is('idcard/theam*')?'custom_nav':''}}">
                            <a href="{{route('software-settings.idcardtheme.index')}}" id="nav-hov">
                                ID Card Theams
                            </a>
                        </li>

                        <li class="">
                            <a href="#" id="nav-hov">
                                Admit Card Theams
                            </a>
                        </li>

                        <li class="">
                            <a href="#" id="nav-hov">
                                Testimonial Theams
                            </a>
                        </li>

                        <li class="">
                            <a href="#" id="nav-hov">
                                Transfer Certificate Theams
                            </a>
                        </li>

                        <li class="">
                            <a href="{{route('software-settings.system-theme.index')}}" id="nav-hov">
                                System Theme
                            </a>
                        </li>
                        <li class="{{Request::is('software-settings/import-data')? 'active':''}}">
                            <a href="{{route('software-settings.import-data')}}" id="nav-hov">
                                Import Data
                            </a>
                        </li>
                    </ul>
                </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>

@push('js')
<script>
    $('#academic_setting').click(function () {
        $('#academic_nav').removeClass('d-block');
    });

    $('#teacher_nav').click(function () {
        $('#teacher_menu').removeClass('d-block');
    }); 
    $('#student_management').click(function () {
        $('#student-menu').removeClass('d-block');
    });
    $('#routine_management').click(function () {
        $('#routine_nav').removeClass('d-block');
    });
    $('#exam_management').click(function () {
        $('#exam_nav').removeClass('d-block');
    });
    $('#online_exam').click(function () {
        $('#online_exam_nav').removeClass('d-block');
    });
    $('#attandance').click(function () {
        $('#attandance_nav').removeClass('d-block');
    });
    $('#sms_management').click(function () {
        $('#sms_management_nav').removeClass('d-block');
    });
    $('#account_management').click(function () {
        $('#account_management_nav').removeClass('d-block');
    });
    $('#website_management').click(function () {
        $('#website_management_nav').removeClass('d-block');
    });
    $('#software_setting').click(function () {
        $('#software_setting_nav').removeClass('d-block');
    });

</script>

@endpush
