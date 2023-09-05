@extends($adminTemplate.'.admin.layouts.app')
@section('content')
<div class="main-panel mt-3">
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
            <form action="{{isset($role)? route('role-management.users.update',$role->id): route('role-management.users.store')}}" method="POST">
                @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{@$user->name ?? old('name')}}" class="form-control  @error('name') is-invalid @enderror" id="">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" value="{{@$user->phone ?? old('phone')}}" class="form-control @error('phone') is-invalid @enderror" id="">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" value="{{ old('password')}}" class="form-control @error('password') is-invalid @enderror" id="">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Select Role</label>
                            <select name="roles" class="form-control  @error('roles') is-invalid @enderror" id="">
                                <option value="">Select Role</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->name}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            @error('roles')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" value="{{@$user->email ?? old('email')}}" class="form-control  @error('email') is-invalid @enderror" id="">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="password_confirmation" value="{{ old('password_confirmation')}}" class="form-control @error('password_confirmation') is-invalid @enderror" id="">
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
