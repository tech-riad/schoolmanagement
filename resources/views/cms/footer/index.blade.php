@extends($adminTemplate.'.admin.layouts.app')
@section('content')
    <div  class="main-panel">
        <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 nested-menu shadow-sm rounded">
            <div class="container-fluid">
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
        <div class="content-wrapper text-primary">
            <table id="customTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011-04-25</td>
                        <td>$320,800</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#customTable').DataTable();
        });
    </script>
@endsection
