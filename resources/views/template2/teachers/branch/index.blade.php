@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="page-body">
        @include($adminTemplate.'.teachers.teachernav')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title float-left">
                            <h4 style="color:rgba(0, 0, 0, 0.5)">Branch List</h4>
                        </div>
                        <button type="button" class="btn btn-primary mr-2 float-right" style="width: 155px;height: 34px;"
                            data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus"></i> Create Branch
                        </button>
                    </div>
                    <div class="card-body">

                        <div class="">
                            <table id="customTable" class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">SL</th>
                                        <th style="text-align:center;">title</th>
                                        <th style="text-align:center;">Status</th>
                                        <th style="text-align:center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=0; @endphp
                                    @foreach($branches as $branch)
                                    <tr>
                                    <td style="text-align:center;">{{++$i}}</td>
                                    <td style="text-align:center;">{{$branch->title}}</td>
                                    <td style="text-align:center;"><label class="badge badge-info">{{ ($branch->status == 1) ? "Active" : "Not-Active" }}</label></td>
                                    <td style="text-align:center;"><a class="badge badge-success" href="{{route('branch.edit',['id'=>$branch->id])}}">Edit</a></td>
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
                        <h5 class="modal-title" id="exampleModalLabel">Create New Branch</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('branch.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Branch Name:</label>
                                <input type="text" class="form-control" name="title" id="sessionTitle" required>
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

@push('js')
    <script>
        $(document).ready(function() {
            $('#customTable').DataTable();
        });
    </script>
@endpush
