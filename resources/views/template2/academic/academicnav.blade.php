{{-- <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover mr-auto">
                <li class="nav-item {{Request::is('academic/session*')?'custom_nav':''}}">
                    <a class="nav-link" href="{{ route('session.index') }}" id="nav-hov">
                        Sessions
                    </a>
                </li>

                <li class="nav-item {{Request::is('academic/class*')?'custom_nav':''}}">
                    <a class="nav-link" href="{{ route('classes.index') }}" id="nav-hov">
                        Class
                    </a>
                </li>
                <li class="nav-item {{Request::is('academic/admit-card*')?'custom_nav':''}}">
                    <a href="{{route('academic.admit-card.index')}}" class="nav-link"id="nav-hov">
                        Admit Card
                    </a>
                </li>
                <li class="nav-item {{Request::is('academic/seat-plan*')?'custom_nav':''}}" id="seat_plan">
                    <a class="nav-link" href="{{ route('academic.seat-plan.index') }}" id="nav-hov">
                        Seat Plan
                    </a>
                </li>


                <li class="nav-item {{Request::is('academic/id-card*')?'custom_nav':''}}">
                    <a href="{{route('academic.id-card.index')}}" class="nav-link" id="nav-hov" >
                        ID Card
                    </a>
                </li>
                <li class="nav-item {{Request::is('academic/testimonial*')?'custom_nav':''}}">
                    <a class="nav-link" href="{{route('academic.testimonial.index')}}" id="nav-hov">
                        Testimonial
                    </a>
                </li>
                <li class="nav-item {{Request::is('academic/transfer-certificate*')?'custom_nav':''}}">
                    <a class="nav-link" href="{{route('academic.transfer-certificate.index')}}" id="nav-hov">
                        Transfer Certificate
                    </a>
                </li>
                <li class="nav-item {{Request::is('academic/student-tag*')?'custom_nav':''}}">
                    <a class="nav-link" href="{{route('academic.student-tag.index')}}" id="nav-hov">
                        Tag for Student
                    </a>
                </li>
                <li class="nav-item {{Request::is('academic/number-sheet*')?'custom_nav':''}}">
                    <a class="nav-link" href="{{route('academic.number-sheet.index')}}" id="nav-hov">
                        Number Sheet
                    </a>
                </li>
                <li class="nav-item" id="academic_setting">
                    <a class="nav-link" href="#" id="nav-hov">
                        Setting
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded d-none" id="settings-nav">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover ml-auto">
                <li class="nav-item {{Request::is('academic/subject*') ? 'active':''}}">
                    <a class="nav-link" href="{{route('academic.subject.index')}}" id="nav-hov">
                        Subject List
                    </a>
                </li>
                <li class="nav-item {{Request::is('academic/setting*') ? 'active':''}}">
                    <a class="nav-link" href="{{route('subject-type.index')}}" id="nav-hov">
                        Subject Type
                    </a>
                </li>
                <li class="nav-item {{Request::is('academic/setting*')?'custom_nav':''}}">
                    <a class="nav-link" href="{{route('academic.setting.edit')}}" id="nav-hov">
                        Academic Setting
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@push('js')
    <script>
        $('#academic_setting').click(function(){
            $('#settings-nav').removeClass('d-none');
        });


    </script>

@endpush
 --}}
