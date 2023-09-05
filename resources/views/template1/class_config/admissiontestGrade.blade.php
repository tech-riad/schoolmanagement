
@extends($adminTemplate.'.admin.layouts.app')

@section('content')
<div class="main-panel">
    @include($adminTemplate.'.academic.academicnav')
    @include($adminTemplate.'.class_config.class-nav')


    <div class="card new-table">
        <div class="card-body p-0 px-2">
            <div class="tab-content" id="pills-tabContent">
                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Class Name : <span class="h3" style="color: #154A77">{{$class_name->name}}</span></h4>
                <div class="tab-pane fade show active" id="pills-admission_test-grade" role="tabpanel"
                aria-labelledby="pills-admission_test-grade-tab">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Admission Grade List</h4>
                        <p class="card-description"></p>
                    </div>
                    <a class="btn btn-primary pt-2 mr-2" style="width: 125px;height: 34px;"
                        href="{{route('addGrade.create',$id)}}">Add Grade</a>
                </div>
                <div class="">
                    <table id="customTable" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>GPA Name </th>
                                <th>Range From</th>
                                <th>Range To</th>
                                <th>GPA Point </th>
                                <th width='10%' class="text-center"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($add_grades as $key=>$g)
                            <tr>
                                <td> {{ $g->gpa_name }} </td>
                                <td> {{ $g->range_from }} </td>
                                <td> {{ $g->range_to }} </td>
                                <td> {{ $g->gpa_point }} </td>
                                <td width='10%'>
                                    <a href="{{route('addGrade.edit',$g->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
@section('javascript')
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


{{-- <script>
    function shifteditBtn(id) {
        $.ajax({
            url: '/academic/class/shift/edit/' + id,
            type: 'Get',
            success: function (data) {
                console.log(data);
                $("#shift_id").val(data.id);
                $("#shiftName").val(data.name);
                $("#editshiftModal").modal('show');
            }
        });
    }

    function shiftdeleteBtn() {
        $("#shiftdeleteForm").submit();
    }

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

<script>
    function sectioneditBtn(id) {
        $.ajax({
            url: '/academic/class/section/edit/' + id,
            type: 'Get',
            success: function (data) {
                console.log(data);
                $("#section_id").val(data.id);
                $("#sectionshift_id").append(
                    `<option hidden selected value='${data.shift.id}'>${data.shift.name}</option>`);
                $("#section_name").val(data.name);
                $("#editsectionModal").modal('show');
            }
        });
    }

    function sectiondeleteBtn() {
        $("#sectiondeleteForm").submit();
    }

</script>


<script>
    function groupeditBtn(id) {
        $.ajax({
            url: '/academic/class/group/edit/' + id,
            type: 'Get',
            success: function (data) {
                console.log(data);
                $("#group_id").val(data.id);
                $("#groupshift_id").append(
                    `<option hidden selected value='${data.shift.id}'>${data.shift.name}</option>`);
                // $("#groupsection_id").append(`<option hidden selected value='${data.shift.id}'>${data.section.name}</option>`);
                $("#groupName").val(data.name);
                $("#editgroupModal").modal('show');
            }
        });
    }

    function groupdeleteBtn() {
        $("#groupdeleteForm").submit();
    }

</script>


<script>
    function generalgradedeleteBtn() {
        $("#generalgradedeleteForm").submit();
    }

</script>

<script>
    function testgradedeleteBtn() {
        $("#testgradedeleteForm").submit();
    }

</script> --}}

<script>
    function addgradedeleteBtn() {
        $("#addgradedeleteForm").submit();
    }

</script>

@endsection
