@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <style>
        tr { height: 40px;padding-top: 0px;padding-bottom: 0px; }
    </style>
@endpush
@section('content')
<div class="page-body" id="marks-id">
    <div id="testGrade-id">
    @include($adminTemplate.'.academic.academicnav')
    @include($adminTemplate.'.class_config.class-nav')

    <div class="card new-table">
        <div class="card-body p-0 px-2">
            <div class="tab-content" id="pills-tabContent">
                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Class Name : <span class="h3" style="color: #154A77;font-size:20px;">{{$class_name->name}}</span></h4>
                {{--class_test grade start --}}
                <div class="tab-pane fade show active" id="pills-class_test-grade" role="tabpanel"
                    aria-labelledby="pills-class_test-grade-tab">
                    <div class="d-flex justify-content-between">
                        <div class="mt-3">
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Class Test Grade List</h4>
                            <p class="card-description"></p>
                        </div>
                        <a class="btn btn-primary pt-2 mr-2" id="addBtn" 
                            href="javascript:void(0)">Add Grade</a>
                    </div>
                    <div class="">
                        <table id="customTable" class="table  table-bordered table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th>GPA Name </th>
                                    <th>Range From</th>
                                    <th>Range To</th>
                                    <th>GPA Point </th>
                                    <th width='9%' class="text-center"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($test_grades as $key=>$g)
                                <tr>
                                    <td> {{ $g->gpa_name }} </td>
                                    <td> {{ $g->range_from }} </td>
                                    <td> {{ $g->range_to }} </td>
                                    <td> {{ $g->gpa_point }} </td>
                                    <td width='9%'>
                                        <a href="javascript:void(0)" onclick="editBtn({{$g->id}})"
                                            class="btn btn-sm btn-primary p-1"><i style="margin-left: 0.3125rem;" class="fa-solid fa-pen-to-square"></i></a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{--class_test grade end --}}
            </div>
        </div>
    </div>
    </div>

</div>

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="groupModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{route('testGrade.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="ins_class_id" value="{{$id}}">

                    <div class="tab-pane fade show active" id="pills-general-grade" role="tabpanel"
                    aria-labelledby="pills-general-grade-tab">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Class Test Grade Create</h4>
                            <p class="card-description"></p>
                        </div>

                        <a class="btn btn-sm btn-primary pt-2 pb-2 mb-2" id="addMoreBtn"
                            href="javascript:void(0)">Add</a>
                    </div>
                    <div class="content-wrapper text-primary">
                        <table id="customTable" class="table table-striped table-bordered table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Range From:</th>
                                    <th>Range To:</th>
                                    <th>GPA Name:</th>
                                    <th>GPA Point </th>
                                    <th>Comment:</th>
                                </tr>
                            </thead>
                            <tbody id="t_body">
                                <tr>
                                    <td><input type="number" name="range_from[]" class="form-control"></td>
                                    <td><input type="number" name="range_to[]" class="form-control"></td>
                                    <td><input type="text" name="gpa_name[]" class="form-control"></td>
                                    <td><input type="number" step="any" name="gpa_point[]" class="form-control"></td>
                                    <td><textarea style="resize: vertical;" name="comment[]" rows="2" class="form-control"></textarea></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                    <div class="modal-footer" style="border-top: none;">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



{{-- grade edit modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="groupModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{route('testGrade.update',1)}}" method="POST">
                    @csrf

                    <div class="tab-pane fade show active" id="pills-general-grade" role="tabpanel"
                    aria-labelledby="pills-general-grade-tab">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Update General Grade</h4>
                            <p class="card-description"></p>
                        </div>

                        {{-- <a class="btn btn-sm btn-primary pt-2 pb-2 mb-2" id="addMoreBtn"
                            href="javascript:void(0)">Add</a> --}}
                    </div>
                    <div class="content-wrapper text-primary">
                        <table id="customTable" class="table table-striped table-bordered table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Range From:</th>
                                    <th>Range To:</th>
                                    <th>GPA Name:</th>
                                    <th>GPA Point </th>
                                    <th>Comment:</th>
                                </tr>
                            </thead>
                            <tbody id="table_body">

                            </tbody>
                        </table>
                    </div>
                </div>
                    <div class="modal-footer" style="border-top: none;">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
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
    $("#addBtn").click(function(){
        $("#addModal").modal('show');
    });
</script>

<script>
    $("#addMoreBtn").on('click',function(){
        var data = `<tr>
                        <td><input type="number" name="range_from[]" class="form-control"></td>
                        <td><input type="number" name="range_to[]" class="form-control"></td>
                        <td><input type="text" name="gpa_name[]" class="form-control"></td>
                        <td><input type="number" step="any" name="gpa_point[]" class="form-control"></td>
                        <td><textarea style="resize: vertical;" name="comment[]" rows="2" class="form-control"></textarea></td>


                    </tr>`;

            $("#t_body").append(data);
    });


    function editBtn(id)
    {
        $.ajax({
            url     : '/academic/class/test-grade/edit/'+id,
            type    : 'Get',
            success : function(data){
                var data = `<tr>
                                <td><input type="number" name="range_from" value='${data.range_from}' class="form-control"></td>
                                <td><input type="number" name="range_to" value='${data.range_to}' class="form-control"></td>
                                <td><input type="text"  name="gpa_name" value='${data.gpa_name}' class="form-control"></td>
                                <td><input type="number" step="any" value='${data.gpa_point}' name="gpa_point" class="form-control"></td>
                                <td><textarea style="resize: vertical;" name="comment" class="form-control">${data.comment}</textarea></td>

                                <input type="hidden" name="grade_id" value='${data.id}'>
                            </tr>`;
                $("#table_body").html(data);
                $("#editModal").modal('show');
            }
        });
    }
</script>


<script>
    function testgradedeleteBtn() {
        $("#testgradedeleteForm").submit();
    }
</script>

@endpush
