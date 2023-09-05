@extends('parentportal.layout.app')

@section('content')


<div  class="main-panel">
    <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navigation">
                @include('parentportal.topmenu_aplication')
            </div>
        </div>
    </nav>
    <!-- Aplication -->
    <div class="card new-table">
        <div class="card-body">
            <form action="#">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="type" required>Type</label>
                            <div>
                                <select class="form-control " id="type">
                                    <option value="">--Select--</option>
                                    <option value="31">Suggestion</option>
                                    <option value="32">Complain</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user" required>User</label>
                            <div>
                                <select class="form-control" id="user">
                                    <option value="">--Select--</option>
                                </select>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title" required>Title</label>
                            <div>
                                <input class="form-control " type="text">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label" for="description">Description</label>
                            <div>
                                <textarea class="form-control " id="description" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn btn-success px-4 py-2" title="Submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <style>
        table#responseTable {
            border: 1px solid #000;
        }

    </style>

    <div class="card new-table">
        <div class="card-header">
            <h3><b>Feed Back Response</b></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="table-responsive">
                    <table id="responseTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> Date</th>
                                <th> Type</th>
                                <th> Title</th>
                                <th> Description</th>
                                <th> Status</th>
                                <th> Response</th>
                                <th> User</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#</td>
                                <td> Date</td>
                                <td> Type</td>
                                <td> Title</td>
                                <td> Description</td>
                                <td> Status</td>
                                <td> Response</td>
                                <td> User</td>
                                <td>Action</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection


