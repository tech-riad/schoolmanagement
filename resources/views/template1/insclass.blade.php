@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <style>
        tr { height: 40px;padding-top: 0px;padding-bottom: 0px; }
    </style>
@endpush
@section('content')
    <div class="main-panel">
        @include($adminTemplate.'.academic.academicnav')
        <div>
            <div class="card new-table">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Class List</h4>
                            {{-- <p class="card-description"> All Classes are displayed here </p> --}}
                        </div>
                        <button type="button" class="btn btn-primary mr-2" style="width: 125px;height: 34px;"
                            data-toggle="modal" data-target="#exampleModal">Add
                            Class</button>
                    </div>
                    <div class="">
                        <table id="customTable" class="table  table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th width='10%'> # </th>
                                    <th> Classes </th>
                                    <th> Students </th>
                                    <th> Session </th>
                                    <th width='11%' class="text-center"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($classes as $key => $c)
                                    <tr>
                                        <td> {{ $key+1 }} </td>
                                        <td>
                                            {{ $c->name }}
                                        </td>
                                        <td>{{$c->students->count()}}</td>
                                        <td>
                                            {{ $c->session->title }}
                                        </td>
                                        <td>
                                            <a href="{{ route('classes.show', $c->id) }}"
                                                class="btn btn-info btn-sm p-1"><i style="margin-left: 0.3125rem;" class="fa-solid fa-gear"></i></a>

                                            <a href="javascript:void(0)" onclick="editClass({{$c->id}})"
                                                class="btn btn-primary btn-sm
                                                p-1"><i style="margin-left: 0.3125rem;" class="fa-solid fa-pen-to-square"></i></a>

                                            <a href="{{route('classes.destroy',$c->id)}}"
                                                class="btn btn-danger btn-sm
                                                p-1"><i style="margin-left: 0.3125rem;" class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No Session Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content"  style="border: 1px solid #7c9ff5;">
                    <div class="modal-header" style="border:1px solid #dfdfdf">
                        <h5 class="modal-title" id="exampleModalLabel">Create New Class</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('classes.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Session</label>
                                <select class="form-control" name="session_id">
                                    <option value="">select</option>
                                    @forelse ($sessions as $s)
                                    <option value="{{$s->id}}">{{$s->title}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Class Name:</label>
                                <input type="text" class="form-control" name="name" id="sessionTitle">
                            </div>
                            <div class="modal-footer" style="border-top: none;">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


        {{-- edit modal start --}}
        <div class="modal fade" id="classeditmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="border: 1px solid #7c9ff5;">
                    <div class="modal-header" style="border:1px solid #dfdfdf">
                        <h5 class="modal-title" id="exampleModalLabel">Update Class</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('classes.update',1) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Session</label>
                                <select class="form-control" name="session_id" id="session_id">
                                    <option value="">select</option>
                                    @forelse ($sessions as $s)
                                    <option value="{{$s->id}}">{{$s->title}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Class Name:</label>
                                <input type="text" class="form-control" name="name" id="class_name">
                                <input type="number" hidden class="form-control" name="class_id" id="class_id">
                            </div>
                            <div class="modal-footer" style="border-top: none;">
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

@push('js')
<script>
    $(document).ready(function() {
        $('#customTable').DataTable();
    });
</script>

<script>
    function editClass(id){
        $.ajax({
            url     : '/academic/class/edit/'+id,
            type    : 'Get',
            success : function(data){
                console.log(data);
                $("#class_id").val(data.id);
                $("#session_id").append(` <option hidden selected value="${data.session_id}">${data.session.title}</option>`);
                $("#class_name").val(data.name);
                $("#classeditmodal").modal('show');
            }
        });
    }
</script>
@endpush

