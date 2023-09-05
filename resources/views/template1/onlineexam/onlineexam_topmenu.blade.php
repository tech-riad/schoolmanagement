
<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover mr-auto">
                <li class="nav-item {{Request::is('online-exam/index') ? 'active':''}} {{Request::is('online-exam/mcq/index') ? 'active':''}}">
                    <a class="nav-link" href="{{ route('online-exam.mcq.index') }}" id="nav-hov">
                        Create Exam MCQ
                    </a>
                </li>

                <li class="nav-item {{Request::is('online-exam/question/index') ? 'active':''}}">
                    <a class="nav-link question" href="{{ route('online-exam.question.index') }}" id="nav-hov">
                        Questions
                    </a>
                </li>
                <li class="nav-item {{Request::is('online-exam/event/index') ? 'active':''}}">
                    <a class="nav-link" href="{{ route('online-exam.event.index') }}" id="nav-hov">
                        Create Event
                    </a>
                </li>
                <li class="nav-item {{Request::is('online-exam/result-report/index') ? 'active':''}}">
                    <a class="nav-link" href="{{ route('online-exam.result-report.index') }}" id="nav-hov">
                        Result Report
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>