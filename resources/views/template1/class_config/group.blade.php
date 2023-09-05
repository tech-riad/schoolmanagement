@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <style>
        tr { height: 40px;padding-top: 0px;padding-bottom: 0px; }
    </style>
@endpush
@section('content')
<div class="main-panel" id="group-id">
    @include($adminTemplate.'.academic.academicnav')
    @include($adminTemplate.'.class_config.class-nav')


    <div class="card new-table">
        <div class="card-body p-0 px-2">
            <div class="tab-content" id="pills-tabContent">
                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Class Name : <span class="h3" style="color: #154A77;font-size:20px;">{{$class_name->name}}</span></h4>
                {{-- group start --}}
                <div class="tab-pane fade show active" id="pills-group" role="tabpanel"
                    aria-labelledby="pills-group-tab">
                    <div class="d-flex justify-content-between">
                        <div class="mt-3">
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Group List</h4>
                            <p class="card-description"></p>
                        </div>
                        <button type="button" class="btn btn-primary mr-2" style="width: 125px;height: 34px;"
                            data-toggle="modal" data-target="#groupModal">Add Group
                        </button>
                    </div>
                    <div class="">
                        <table id="customTable" class="table  table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th> Name </th>
                                    <th>Shift</th>
                                    <th width='9%' class="text-center"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groups as $group)
                                <tr>
                                    <td> {{ $group->name }} </td>
                                    <td> {{ $group->shift->name }}</td>
                                    <td width='9%'>
                                        <a href="javascript:void(0)" onclick="groupeditBtn({{$group->id}})"class="btn btn-primary p-1"><i style="margin-left: 0.3125rem;" class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{route('group.destroy',$group->id)}}" class="btn btn-danger p-1"><i style="margin-left: 0.3125rem;" class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- group end --}}


                {{-- group modal start --}}
                <div class="modal fade" id="groupModal" tabindex="-1" aria-labelledby="groupModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="categoryModalLabel">Create New Group</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('group.store') }}" method="POST">
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

                                    <input type="hidden" name="ins_class_id" value="{{$id}}">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Name:</label>
                                        <input type="text" name="name" class="form-control">
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
                {{-- group modal end --}}


                {{-- group edit modal start --}}
                <div class="modal fade" id="editgroupModal" tabindex="-1" aria-labelledby="groupModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="categoryModalLabel">Update Group</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('group.update',1) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Shift</label>
                                        <select class="form-control" name="shift_id" id="groupshift_id">
                                            <option value="">select</option>
                                            @forelse ($shifts as $shift)
                                            <option value="{{$shift->id}}">{{$shift->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Name:</label>
                                        <input type="text" name="name" id="groupName" class="form-control">
                                        <input type="hidden" name="group_id" id="group_id">
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
@endpush
