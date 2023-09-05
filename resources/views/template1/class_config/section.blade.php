@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <style>
        tr { height: 40px;padding-top: 0px;padding-bottom: 0px; }
    </style>
@endpush
@section('content')
<div class="main-panel" id="section-id">
    @include($adminTemplate.'.academic.academicnav')
    @include($adminTemplate.'.class_config.class-nav')


    <div class="card new-table">
        <div class="card-body p-0 px-2">
            <div class="tab-content" id="pills-tabContent">
                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Class Name : <span class="h3" style="color: #154A77;font-size:20px;">{{$class_name->name}}</span></h4>
                {{-- section start --}}
                <div class="tab-pane fade show active" id="pills-section" role="tabpanel"
                    aria-labelledby="pills-section-tab">
                    <div class="d-flex mb-3 justify-content-between">
                        <div class="mt-3">
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Section List</h4>
                            <p class="card-description"></p>
                        </div>
                        <button type="button" class="btn btn-primary mr-2" style="width: 125px;height: 34px;"
                            data-toggle="modal" data-target="#sectionModal">Add Section
                        </button>
                    </div>

                    <div class="">
                        <table id="customTable2" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th width='20%'> Name </th>
                                    <th> Shift </th>
                                    <th> Students </th>
                                    <th width='9%' class="text-center"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sections as $section)
                                <tr>
                                    <td> {{ $section->name }} </td>
                                    <td> {{ ($section->shift)? $section->shift->name :'' }} </td>
                                    <td> {{$section->students->count()}} </td>
                                    <td width='9%'>
                                        <a href="javascript:void(0)" onclick="sectioneditBtn({{$section->id}})"
                                            class="btn btn-primary p-1"><i style="margin-left: 0.3125rem;" class="fa-solid fa-pen-to-square"></i></a>

                                        <a href="{{route('section.destroy',$section->id)}}"
                                            class="btn btn-danger p-1"><i style="margin-left: 0.3125rem;" class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- section end --}}


                {{-- section modal start --}}
                <div class="modal fade" id="sectionModal" tabindex="-1" aria-labelledby="sectionModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="categoryModalLabel">Create New Section</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('section.store') }}" method="POST">
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
                                        <label for="recipient-name" class="col-form-label">Section:</label>
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
                {{-- section modal end --}}


                {{-- section edit modal start --}}
                <div class="modal fade" id="editsectionModal" tabindex="-1" aria-labelledby="sectionModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="categoryModalLabel">Update Section</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('section.update',1) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Shift</label>
                                        <select class="form-control" name="shift_id" id="sectionshift_id">
                                            <option value="">select</option>
                                            @forelse ($shifts as $shift)
                                            <option value="{{$shift->id}}">{{$shift->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Section:</label>
                                        <input type="text" class="form-control" name="name" id="section_name">
                                        <input type="hidden" name="section_id" id="section_id">
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
                {{-- section edit modal end --}}
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
@endpush
