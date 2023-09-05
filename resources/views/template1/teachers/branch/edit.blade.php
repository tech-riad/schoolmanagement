@extends($adminTemplate.'.admin.layouts.app')

@section('content')
      <div class="main-panel">
        
          <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
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
          <div >
            <div class="card new-table">
                <div class="card">
                  <div class="card-body">
                    <form action="{{route('branch.update')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="branch_name" style="color: black">Branch Name</label>
                            <input type="hidden" name="id" value="{{$branch->id}}">
                            <input type="text" value="{{$branch->title}}" class="form-control" id="title" placeholder="Enter Branch" name="title" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                  </div>
                </div>
            </div>

          </div>
     
      </div>

@endsection
