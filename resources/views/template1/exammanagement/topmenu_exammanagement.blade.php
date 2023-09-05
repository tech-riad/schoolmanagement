<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded" id="exam_main">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover mr-auto">
                <li class="nav-item {{Request::is('exam-management/dashboard/index') ? 'active':''}}">
                    <a class="nav-link" href="{{ route('exam-management.dashboard.index') }}" id="nav-hov">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item {{Request::is('exam-management/marks*') ? 'active':''}}">
                    <a class="nav-link" href="{{ route('exam-management.marks.create') }}" id="nav-hov">
                        Input Marks
                    </a>
                </li>
                <li class="nav-item {{Request::is('exam-management/marks-input/index') ? 'active':''}}">
                    <a class="nav-link" href="{{ route('exam-management.marks-input.index') }}" id="nav-hov">
                        Class Test Marks
                    </a>
                </li>
                <li class="nav-item" id="exam_report">
                    <a class="nav-link nav-hov" href="#" id="nav-hov" >
                        Reports
                    </a>
                </li>
                <li class="nav-item" id="setting">
                    <a class="nav-link" href="#" id="nav-hov">Settings</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- Report Menu --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded" style="display: none" id="exam_report_nav">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover ml-auto">

                <li class="nav-item " id="class_position" {{Request::is('exam-management/report/class-position/index') ? 'active':''}}>
                    <a class="nav-link" href="{{ route('exam-management.report.class-position.index') }}" id="nav-hov">
                        Class Position
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('exam-management.transcript.index')}}" id="nav-hov">Transcript</a>
                </li>
                <li class="nav-item" {{Request::is('exam-management/report/tabulation-sheet') ? 'active':''}}>
                    <a class="nav-link" href="{{ route('exam-management.report.tabulation-sheet.index') }}" id="nav-hov">Tabulation Sheet</a>
                </li>
                <li class="nav-item" {{Request::is('exam-management/report/average-report') ? 'active':''}}>
                    <a class="nav-link" href="{{ route('exam-management.report.average-report.index') }}" id="nav-hov">Average Report</a>
                </li>
                <li class="nav-item" {{Request::is('exam-management/report/test-report') ? 'active':''}} >
                    <a class="nav-link" href="{{ route('exam-management.report.test-report.index') }}" id="nav-hov">Class Test Report</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



{{-- Setting Menu --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded" style="display: none" id="setting_menu">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover ml-auto">

                <li class="nav-item {{Request::is('exam-management/exam/*') ? 'active':''}}">
                    <a class="nav-link" href="{{ route('exam-management.exam.index') }}" id="nav-hov">
                        Exam List
                    </a>
                </li>
                <li class="nav-item"{{Request::is('exam-management/setting/gpa-grading') ? 'active':''}}>
                    <a class="nav-link" href="{{ route('exam-management.setting.gpa-grading.index') }}" id="nav-hov">GPA Grading</a>
                </li>
                <li class="nav-item"{{Request::is('exam-management/setting/attandance-count') ? 'active':''}}>
                    <a class="nav-link" href="{{ route('exam-management.setting.attandance-count.index') }}" id="nav-hov">Attandance Count</a>
                </li>
                <li class="nav-item"{{Request::is('exam-management/setting/transcript-design') ? 'active':''}}>
                    <a class="nav-link" href="{{ route('exam-management.setting.transcript-design.index') }}" id="nav-hov">Transcript Design</a>
                </li>
                <li class="nav-item {{Request::is('exam-management/setting/marks-dist-type') ? 'active':''}}">
                    <a class="nav-link" href="{{ route('exam-management.setting.marks-dist-type.index') }}" id="nav-hov">Short Code</a>
                </li>
                <li class="nav-item"{{Request::is('exam-management/setting/marks-dist') ? 'active':''}} id="marks-dist">
                    <a class="nav-link" href="{{ route('exam-management.setting.marks-dist.index') }}" id="nav-hov">Marks Distribution</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@push('js')
<script>

$('#exam_report').click(function(){
    $('#exam_report_nav').show();
    $('#setting_menu').hide();

})
$('#setting').click(function(){
    $('#setting_menu').show();
    $('#exam_report_nav').hide();
})
// $('#class_position').click(function(){
// $(document).ready(function(){
//     $('#exam_report_nav').show();
// })
// })
</script>
@endpush
