@extends($adminTemplate.'.admin.layouts.app')

@section('content')
      <div class="main-panel">
        @include($adminTemplate.'.teachers.teachernav')
        <div>
            <div class="card new-table mb-3">
                <div class="card">
                    <div class="card-body">
                        <h6>Create Staff</h6>
                        <hr>
                        <form action="{{route('staff.get_number_of.table')}}" method="post">
                            @csrf
                            <div class="row">
                                <label for="" class="">Number Of Row <span class="color:red">(Maximum Rows 50)</span></label>
                                <input type="number" value="{{$table_number}}" class="form-control" name="table_number" required>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card new-table">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('staff.store')}}" method="post">
                            @csrf
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Select</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Mobile No</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Branch</th>
                                </tr>
                            </thead>


                            <tbody>
                                @for($i=0;$i<$table_number;$i++)
                                <tr>
                                    <th><input type="checkbox" name="check[]" class=""></th>
                                    <th><input type="text" class="form-control" name="name[]" ></th>
                                    <td><input type="text" class="form-control" name="mobile_number[]" ></td>
                                    <td> <select name="gender[]" class="form-control" >
                                            <option value="">select</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                        </select>
                                    </td>
                                    <td> <select name="designation_id[]" class="form-control" >
                                        <option value="">select</option>
                                        @foreach($designations as $designation)
                                        <option value="{{$designation->id}}">{{$designation->title}}</option>
                                        @endforeach
                                    </select>
                                    </td>
                                    <td> <select name="branch_id[]" class="form-control" >
                                            <option value="">select</option>
                                            @foreach($branches as $branch)
                                            <option value="{{$branch->id}}">{{$branch->title}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                @endfor

                            </tbody>


                        </table>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
             </div>


          </div>
        </div>

@endsection

@section('javascript')
     <script>

$('input[type="checkbox"]').change(function(){
  var checked = $(this).is(':checked');
  var input = $(this).closest('tr').find('input[type="text"]');
  var select = $(this).closest('tr').find('select,input');
  input.prop('required', checked)
  select.prop('required', checked)
})
</script>
@stop

