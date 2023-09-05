@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="page-body">
        @include($adminTemplate.'.teachers.teachernav')
        <div>
            <div class="card new-table">
                <div class="card">
                  <div class="card-body">
                    <form action="{{route('branch.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="branch_name" style="color: black">Branch Name</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Branch" name="title" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                  </div>
                </div>
            </div>
        </div>
    </div>

@endsection
