@extends($adminTemplate.'.admin.layouts.app')
@section('content')
    <div  class="main-panel">
        <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 nested-menu shadow-sm rounded">
            <div class="container-fluid">
                {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                    aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    @if (in_array($route, ['admin.administrative_area.index', 'admin.project_category.index', 'admin.project_activity.index'])) mm-active @endif
                </button> --}}
                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="navbar-nav navbar-nav-hover mx-auto">
                        <li class="nav-item px-1">
                            <a class="nav-link" href="{{ route('slider.index') }}">
                                Slider
                            </a>
                        </li>

                        <li class="nav-item px-1">
                            <a class="nav-link" href="{{ route('footer.index') }}">
                                Footer
                            </a>
                        </li>
                        <li class="nav-item px-1">
                            <a class="nav-link" href="{{ route('session.index') }}">
                                Sessions
                            </a>
                        </li>

                        <li class="nav-item px-1">
                            <a class="nav-link" href="{{ route('classes.index') }}">
                                Classes
                            </a>
                        </li>

                        <li class="nav-item px-1">
                            <a class="nav-link">
                                Routine
                            </a>
                        </li>

                        <li class="nav-item px-1">
                            <a class="nav-link ">
                                Academic Calender
                            </a>
                        </li>

                        <li class="nav-item px-1">
                            <a class="nav-link ">
                                Accessories
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content-wrapper">
            list of teachers
        </div>
    </div>
@endsection
