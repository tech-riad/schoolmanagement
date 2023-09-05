@extends('parentportal.layout.app')

@section('content')
<div  class="main-panel">
    <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navigation">
                @include('parentportal.topmenu_profile')
            </div>
        </div>
    </nav>

    <div class="card new-table">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div style="color:green">
                        <h6 class="panel-title">
                            <b>Term Exam</b>
                        </h6>
                    </div>
                </div>
                <div class="col-sm-12">
                    <b style="color:gray">
                        Please select your desire exam and click on download button.
                    </b>
                </div>
                <br>
                <br>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="StudentId">Student ID</label>
                        <div class="">
                            <input class="form-control " id="StudentId" readonly="readonly" type="text"
                                placeholder="Student Id" required>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tern_name">Term Name</label>
                        <div class="">
                            <select class="form-control" id="tern_name" required>
                                <option value="">Select</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exam_name">Exam Name</label>
                        <div class="">
                            <select required class="form-control" id="exam_name">
                                <option value="">Select</option>
                            </select>
                        </div>
                    </div>
                </div>
               
               
            </div>
            <div class="row">
                
            </div>
        </div>
    </div>
</div>



@endsection
