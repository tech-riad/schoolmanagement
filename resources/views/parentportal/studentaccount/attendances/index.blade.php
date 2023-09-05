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
                <div class="col-md-6">
                    <div class="form-group">
                        <label  for="StudentId">Student ID</label>
                        <div >
                            <input class="form-control" id="StudentId" readonly="readonly" type="text" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="Attendance_Type">Attendance Type</label>
                        <div >
                            <div class="input-group">
                                <select class="form-control" id="AttendanceType" name="AttendanceType">
                                    <option value="">--</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="row mt-2">
                <div class="col-lg-12 text-center">
                    <button style="background: #0090e7 !important; border:none !important;" class="btn btn-success search-btn px-4 py-2">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
