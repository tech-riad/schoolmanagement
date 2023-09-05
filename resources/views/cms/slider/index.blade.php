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

        <div class="card new-table">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Slider List</h4>
                        <p class="card-description"> Add your slider.</p>
                    </div>
                    <button type="button" class="btn btn-primary mr-2" style="width: 125px;height: 34px;"
                        data-toggle="modal" data-target="#exampleModal">
                        Add Slider</button>
                </div>
                <div>
                    <table id="customTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
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
