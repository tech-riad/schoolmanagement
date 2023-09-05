@extends($adminTemplate.'.admin.layouts.app')

@section('content')
      <div class="main-panel">
    
          <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-5 nested-menu shadow-sm rounded">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="navbar-nav navbar-nav-hover mx-auto">
                        <li class="nav-item px-1">
                            <a class="nav-link" href="{{ route('branch.index') }}">
                                Branch
                            </a>
                        </li>

                        <li class="nav-item px-1">
                            <a class="nav-link" href="{{ route('designation.index') }}">
                                Designation
                            </a>
                        </li>
                        <li class="nav-item px-1">
                            <a class="nav-link" href="{{ route('teacher.index') }}">
                                Teacher
                            </a>
                        </li>
                    </ul>
                </div>

              
            </div>
        </nav>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                     {{-- <p style="color: black">Designation</p> --}}
                    <form action="{{route('designation.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="branch_name" style="color: black">Designation Name</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Designation" name="title" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                  </div>
                </div>
            </div>

          </div>
     
      </div>

@endsection
