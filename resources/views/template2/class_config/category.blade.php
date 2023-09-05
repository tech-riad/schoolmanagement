@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <style>
        tr { height: 40px;padding-top: 0px;padding-bottom: 0px; }
    </style>
@endpush
@section('content')
<div class="page-body" id="category-id">
    @include($adminTemplate.'.academic.academicnav')
    @include($adminTemplate.'.class_config.class-nav')



    <div class="card new-table">
        <div class="card-body p-0 px-2">
            <div class="tab-content" id="pills-tabContent">
                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Class Name : <span class="h3" style="color: #154A77;font-size:20px">{{$class_name->name}}</span></h4>
                {{-- category start --}}
                <div class="tab-pane fade show active" id="pills-category" role="tabpanel"
                    aria-labelledby="pills-category-tab">
                    <div class="d-flex mb-3 justify-content-between">
                        <div class="mt-3">
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Category List</h4>
                            <p class="card-description"> </p>
                        </div>
                        <button type="button" class="btn btn-primary mr-2" 
                            data-toggle="modal" data-target="#categoryModal">Add
                            Category
                        </button>
                    </div>
                    <div class="">
                        <table id="customTable1" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th width='15%'>Name</th>
                                    <th>Shift</th>
                                    <th>Students</th>
                                    <th width='9%' class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td> {{ $category->name }} </td>
                                    <td> {{ ($category->shift)? $category->shift->name : '' }} </td>
                                    <td> {{$category->students->count()}} </td>
                                    <td width='9%'>
                                        <a href="javascript:void(0)" onclick="categoryeditBtn({{$category->id}})"
                                            class="btn btn-primary p-1"><i style="margin-left: 0.3125rem;" class="fa-solid fa-pen-to-square"></i></a>

                                        <a href="{{route('category.destroy',$category->id)}}"
                                            class="btn btn-danger p-1"><i style="margin-left: 0.3125rem;" class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- catagory end --}}



                {{-- category modal start --}}
                <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="categoryModalLabel">Create New Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('category.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Shift</label>
                                        <select class="form-control" name="shift_id">
                                            <option value="">select</option>
                                            @forelse ($shifts as $shift)
                                            <option value="{{$shift->id}}">{{$shift->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Category:</label>
                                        <input type="text" class="form-control" name="name" id="sessionTitle">
                                        <input type="hidden" name="ins_class_id" value="{{$id}}">
                                    </div>
                                    <div class="modal-footer" style="border-top: none;">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- category modal end--}}


                {{-- category edit modal start --}}
                <div class="modal fade" id="editcategoryModal" tabindex="-1" aria-labelledby="categoryModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="categoryModalLabel">Update Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('category.update',1) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Shift</label>
                                        <select class="form-control" name="shift_id" id="catshift_id">
                                            @forelse ($shifts as $shift)
                                            <option value="{{$shift->id}}">{{$shift->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Category:</label>
                                        <input type="text" class="form-control" name="name" id="category_name">
                                        <input type="hidden" name="category_id" id="category_id">
                                    </div>
                                    <div class="modal-footer" style="border-top: none;">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- category edit modal end --}}
            </div>
        </div>
    </div>
</div>

<style>
    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link,
    .nav-pills .nav-link {
        background-color: transparent !important;
        border: 0px solid !important
    }

</style>

{{-- group edit modal end --}}
@endsection
@push('js')
<script>
    $(document).ready(function () {
        $('#customTable').DataTable();
    });

    $(document).ready(function () {
        $('#customTable1').DataTable();
    });
    $(document).ready(function () {
        $('#customTable2').DataTable();
    });
    $(document).ready(function () {
        $('#customTable3').DataTable();
    });

</script>

<script>
    function categoryeditBtn(id) {
        $.ajax({
            url: '/academic/class/category/edit/' + id,
            type: 'Get',
            success: function (data) {
                console.log(data);
                $("#category_id").val(data.id);
                $("#catshift_id").append(
                    `<option hidden selected value='${data.shift.id}'>${data.shift.name}</option>`);
                $("#category_name").val(data.name);
                $("#editcategoryModal").modal('show');
            }
        });
    }

    function categorydeleteBtn() {
        $("#categorydeleteForm").submit();
    }

</script>
@endpush
