@extends($adminTemplate.'.admin.layouts.app')
@section('content')
<div class="page-body mt-3">
    <div>
        <div class="card new-table" style="margin-top: 20px;">
            <div class="card-header">
                <div class="float-left">
                    <p>Create Role</p>
                </div>
                <div class="float-right">
                    <a href="{{route('role-management.roles.index')}}" class="btn btn-dark"><i class="fa fa-arrow-left"></i>Back</a>
                </div>
            </div>
            <form action="{{isset($role)? route('role-management.roles.update',$role->id): route('role-management.roles.store')}}" method="POST">
                @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ @$role->name ?? old('name')}}" class="form-control @error('name') is-invalid @enderror"
                           id="">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="text-center my-3">
                    <h4 class="pb-2"><b>Manage Permission for Role</b></h4>
                    @error('permissions')
                    <p class="p-2">
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    </p>
                    @enderror
                </div>

                @error('permissions')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="row">
                    @foreach($permissions->chunk(2) as $chunk)
                        <div class="col-md-6">
                            <ul class="list-group">
                                @foreach($chunk as $key => $permission)
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   name="permissions[]" value="{{$permission->id}}"
                                                   id="defaultCheck1-{{$key}}"
                                                    @isset($role)
                                                        @foreach($role->permissions as $rPermission)
                                                            {{$permission->id == $rPermission->id ? 'checked' : ''}}
                                                        @endforeach
                                                    @endisset
                                            >
                                            <label class="form-check-label" for="defaultCheck1-{{$key}}">
                                                <p>{{str_replace('-',' ',strtoupper($permission->name))}}</p>
                                            </label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary mt-2"><i class="fa fa-save"></i>Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
