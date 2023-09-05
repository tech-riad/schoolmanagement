@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div  class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card corona-gradient-card">
                        <div class="card-body py-0 px-0 px-sm-3">
                            <div class="row align-items-center">
                                <div class="col-4 col-sm-3 col-xl-2">
                                </div>
                                <div class="col-5 col-sm-7 col-xl-8 p-0">
                                    <ul style="list-style-type: none">
                                        <li style="display: inline; margin:20px"><a class="btn btn-warning mt-3"
                                                href="{{ route('admission.index') }}">Student Admission List</a></li>
                                        {{-- <li style="display: inline; margin:20px"><a class="btn btn-warning mt-3" >Designation</a></li> --}}
                                        <li style="display: inline; margin:20px"> <a class="btn btn-warning mt-3">Student
                                                Migration List</a> </li>
                                    </ul>
                                </div>
                                {{-- <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                        <span>
                          <a href="https://www.bootstrapdash.com/product/corona-admin-template/" target="_blank"
                            class="btn btn-outline-light btn-rounded get-started-btn">Upgrade to PRO</a>
                        </span>
                      </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <form method="post" action="{{ route('admission.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black">Admission no</label>
                                            <input type="text" class="form-control" placeholder="Admission no"
                                                name="admission_no" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black">Roll no</label>
                                            <input type="text" class="form-control" placeholder="Enter Roll no"
                                                name="roll_no" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black">First Name</label>
                                            <input type="text" class="form-control" placeholder="Enter First Name"
                                                name="first_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black">Last Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Last Name"
                                                name="last_name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black">Class ID</label>
                                            <input type="text" class="form-control" placeholder="Enter Class ID"
                                                name="class_id" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black">Section ID</label>
                                            <input type="number" class="form-control" placeholder="Enter Section ID"
                                                name="section_id" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    {{-- <div class="col-md-6">
                              <div class="form-group">
                                  <label style="color: black">Institute</label>
                                   <select name="instituition_id"  class="form-control">
                                      <option value="1">Test</option>
                                  </select>
                              </div>
                          </div> --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black">Categoty Id</label>
                                            <input type="text" class="form-control" placeholder="Enter Categoty Id"
                                                name="category_id" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black">Group Id</label>
                                            <input type="text" class="form-control" placeholder="Enter Group Id"
                                                name="group_id" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black">Blood Group</label>
                                            <select name="blood_group" class="form-control">
                                                <option value="1">A+</option>
                                                <option value="2">B+</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black">Gander</label>
                                            <select name="gender" class="form-control">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black">Religion</label>
                                            <select name="religion" class="form-control">
                                                <option value="1">Hindu</option>
                                                <option value="2">Islam</option>
                                                <option value="3">Buddha</option>
                                                <option value="4">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black">Date Of Birth</label>
                                            <input type="date" name="dob" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black">Email</label>
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black">Admission Date</label>
                                            <input type="date" name="" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black">Phone No</label>
                                            <input type="number" name="phone_no" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black">Photo</label>
                                            <input type="file" name="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
