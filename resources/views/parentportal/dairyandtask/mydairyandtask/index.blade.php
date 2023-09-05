@extends('parentportal.layout.app')

@section('content')

<div  class="main-panel">
    <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navigation">
                @include('parentportal.topmenu_dairyandtask')

            </div>
        </div>
    </nav>


    <div class="card new-table">
        <div class="card-body">

            <div class="row">
                <div class="col-lg-12  ">
                    <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Task List</h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav navbar-nav" style="padding:08px">
                    <li class="dropdown" style="width: 94%;padding-left: 8px;">
                        <select class="form-control" id="CategoryId">
                            <option value="">Select category</option>
                            <optgroup label="Task">
                                <option value="1">Reading</option>
                                <option value="2">Writing</option>
                            </optgroup>
                        </select>
                    </li>
                </ul>
                <ul class="nav navbar-nav" style="padding:08px">

                    <li class="dropdown" style="width: 94%;padding-left: 8px;">
                        <select class="form-control" nid="CourseId">
                            <option value="">Select course/subject</option>
                            <option value="1">Bangla</option>
                            <option value="2">English</option>

                        </select>
                    </li>
                </ul>
                <ul class="nav navbar-nav" style="padding:08px">

                    <li class="dropdown " style="width: 94%;padding-left: 8px;">

                        <select class="form-control" id="UserId">
                            <option value="">Uploaded by</option>
                            <option value="1">Md. Atikur Rahman</option>
                            <option value="2">Masuma Chowdhury</option>
                        </select>
                    </li>
                </ul>
                <ul class="nav navbar-nav" style="padding:08px">
                    <li class="dropdown" style="width: 94%;padding-left: 8px;">
                        <div class="row">
                            <div class="input-group mb-3">
                                <input type="date" class="form-control " placeholder="from date - to date">

                            </div>
                        </div>
                    </li>
                </ul>
            </div>
<!-- Task Table -->
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Subject Name</th>
                                <th scope="col">Teacher Name</th>
                                <th scope="col">Submit Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>

                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
