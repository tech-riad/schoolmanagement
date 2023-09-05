@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div  class="main-panel">
        <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="navbar-nav navbar-nav-hover mx-auto">
                        <li class="nav-item px-1">
                            <a class="nav-link" href="{{ route('admission.index') }}">
                                Student Admission List
                            </a>
                        </li>

                        <li class="nav-item px-1">
                            <a class="nav-link" href="{{ route('admission.categories') }}" >
                                Student Categories List
                            </a>
                        </li>
                        <li class="nav-item px-1">
                            <a class="nav-link" >
                                Student Migration List
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div>
            <div class="card new-table">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Student List
                            </h4>

                            <div>
                                <button type="button" class="btn btn-primary mr-2 float-right add_section" style="width: 125px;height: 34px;">
                                    Add Section
                                  </button>

                                  <button type="button" class="btn btn-primary float-right mr-2 add_group"  style="width: 125px;height: 34px;">
                                      Add Group
                                    </button>

                                    <button type="button" class="btn btn-primary float-right mr-2 add_category" style="width: 130px;height: 34px;">
                                        Add Category
                                      </button>


                            </div>
                            {{-- <p class="card-description"> Session wise assigned Classes </p> --}}
                        </div>

                    </div>
                    <div class="content-wrapper text-primary">
                        <table id="customTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Name </th>
                                    <th> Roll No </th>
                                    <th> Mobile Number </th>
                                    <th> Gendar </th>
                                    <th> Group </th>
                                    <th> Category </th>
                                    <th> Section </th>
                                    {{-- <th> Action </th> --}}
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($admission as $ad)
                                <tr>
                                    <th><input type="checkbox" name="check[]" class="" value="{{$ad->id}}"></th>
                                    <td> {{$ad->name}} </td>
                                    <td>
                                        {{$ad->roll_no}}
                                    </td>
                                       <td>
                                        {{$ad->mobile_number}}
                                    </td>
                                    <td> {{$ad->gender}} </td>
                                    <td> {{$ad->group->name ?? ''}} </td>
                                    <td> {{$ad->category->name ?? ''}} </td>
                                    <td> {{$ad->section->name ?? ''}} </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Student Section</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admission.section_store') }}" method="post">
                            @csrf

                            <input type="hidden" name="ids[]" class="ids">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Section</label>
                                <select name="section" class="form-control " >
                                    <option value="">select</option>
                                    @foreach($sections as $section)
                                    <option value="{{$section->id}}">{{$section->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="groupModal" tabindex="-1" aria-labelledby="groupModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="groupModal">Add Student Group</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admission.section_store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="ids[]" class="ids">
                                <label for="recipient-name" class="col-form-label">Group</label>
                                <select name="group" class="form-control " >
                                    <option value="">select</option>
                                    @foreach($groups as $group)
                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="categoriesModal" tabindex="-1" aria-labelledby="categoriesModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="categoriesModal">Add Student Categories</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admission.section_store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                 <input type="hidden" name="ids[]" class="ids">
                                <label for="recipient-name" class="col-form-label">Category</label>
                                <select name="category" class="form-control " >
                                    <option value="">select</option>
                                    @foreach($categoties as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

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
        var ids = [];
        $('input[type="checkbox"]').change(function(){
        var checked = $(this).is(':checked');

        if(checked){
        ids.push(this.value);
        }if(!checked){
            var index = ids.indexOf(this.value);
           ids.splice(index, 1)
           console.log(this.value);
        }
        // console.log(checked);
         console.log(ids);

         console.log(index);
        })







 $(document).on('click','.add_section',function(){
     $('input[name=ids').val('');
        $('#exampleModal').modal('show')
     $('.ids').val(ids);

      });

      $(document).on('click','.add_group',function(){
        $('input[name=ids').val('');
        $('#groupModal').modal('show')
         $('.ids').val(ids);

      });

  $(document).on('click','.add_category',function(){
        $('input[name=ids').val('');
        $('#categoriesModal').modal('show')
         $('.ids').val(ids);

      });

</script>
@stop

