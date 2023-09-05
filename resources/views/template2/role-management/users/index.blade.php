@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <style>
        #td-email{
            text-transform: lowercase!important;

        }
    </style>
@endpush
@section('content')
    <div class="page-body mt-3">
        @include($adminTemplate.'.role-management.nav')
        <div class="card new-table">
            <div class="card-header">
                <div class="float-left">
                    <p>User List</p>
                </div>
                <div class="float-right">
                    <a href="{{route('role-management.users.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Create New</a>
                </div>
            </div>
            <div class="card-body p-0 px-2">
                <table id="customTable" class="table  table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ucfirst($user->name)}}</td>
                            <td>
                                @if($user->getRoleNames()->first())
                                    <div class="badge badge-primary">
                                        {{$user->getRoleNames()->first()}}
                                    </div>
                                @else
                                    <div class="badge badge-danger">
                                        Not Assigned
                                    </div>
                                @endif
                            </td>
                            <td id="td-email">{{$user->email}}</td>
                            <td>
                                <a href="" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                @if(!$user->getRoleNames()->first() == 'Admin')
                                    <a href="{{route('role-management.users.delete',$user->id)}}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
