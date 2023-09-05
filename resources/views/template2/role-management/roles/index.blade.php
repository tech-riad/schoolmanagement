@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="page-body mt-3">
        @include($adminTemplate.'.role-management.nav')
        <div class="card new-table">
            <div class="card-header">
                <div class="float-left">
                    <p>Role List</p>
                </div>
                <div class="float-right">
                    <a href="{{route('role-management.roles.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Create New</a>
                </div>
            </div>
            <div class="card-body p-0 px-2">
                <table id="customTable" class="table  table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Permissions</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <div class="badge badge-primary">{{ $role->permissions->count() }}</div>
                            </td>

                            <td>
                                @if($role->name != 'Admin')
                                <a href="{{route('role-management.roles.edit',$role->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <a href="{{route('role-management.roles.delete',$role->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $('#customTable').DataTable();
        });


    </script>
@endpush
