@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <style>
        td, th {
            text-transform: capitalize;
        }
    </style>
@endpush
@section('content')
    <div class="main-panel" id="marks-id">
        @include($adminTemplate.'.teachers.teachernav')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between" id="teachers">
                           
                            <div>
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Designation List</h4>
                            </div>
                            <button type="button" class="btn btn-primary mr-2" style="width: 175px;height: 34px;"
                                    data-toggle="modal" data-target="#exampleModal">Create Designation
                            </button>
                        </div>
                        <div class="">
                            <table id="customTable" class="table table-bordered table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">SL</th>
                                        <th style="text-align:center">title</th>
                                        <th style="text-align:center">Status</th>
                                        <th style="text-align:center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=0; @endphp
                                    @foreach($designations as $designation)
                                <tr>
                                    <td style="text-align:center">{{++$i}}</td>
                                    <td>{{$designation->title}}</td>
                                    <td style="text-align:center"><label class="badge badge-info">{{ ($designation->status == 1) ? "Active" : "Not-Active" }}</label></td>
                                    <td style="text-align:center"><a class="badge badge-success" href="{{route('designation.edit',['id'=>$designation->id])}}">Edit</a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create New Designation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('designation.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Designation Name:</label>
                                <input type="test" class="form-control" name="title" id="sessionTitle">
                            </div>
                            <div class="modal-footer" style="border:1px solid #dfdfdf">
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
@endpush
