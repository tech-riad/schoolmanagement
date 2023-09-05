<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover" id="question-nav">
                <li class="nav-item theory_nav">
                    <a class="nav-link" href="{{ route('teacherpanel.question.index') }}" id="nav-hov">
                        Written Questions
                    </a>
                </li>

                <li class="nav-item mcq_nav">
                    <a class="nav-link" href="{{ route('teacherpanel.question.mcqquestion.index') }}" id="nav-hov">
                        MCQ Questions
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
