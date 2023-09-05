
@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <style>
        tr { height: 40px;padding-top: 0px;padding-bottom: 0px; }
    </style>
@endpush
@section('content')
    <div class="main-panel" id="category-id">
        @include($adminTemplate.'.academic.academicnav')


        <div class="card new-table">
            <div class="card">

                @if (@isset($subjecttype))
                <div class="card-header">
                    <h3>Update Subject Type</h3>
                </div>  
                @else
                <div class="card-header">
                    <h3>Add New Subject Type</h3>
                </div>
                @endif
                
                <div class="card-body">

                    <form action="{{ isset($subjecttype)? route('subject-type.update',$subjecttype->id) : route('subject-type.store')}}" method="post">

                        @csrf
                        @if(isset($subjecttype))
                        @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="name" class="form-label title-lev">Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{$subjecttype->name ?? @old('name')}}" >
                                    @if($errors->has('name'))
                                    <div class="error">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="is_common" class="form-label title-lev">Is Common</label>
                                    <input type="text" class="form-control" name="is_common" id="is_common"
                                        value="{{$subjecttype->is_common ?? @old('is_common')}}" >
                                    @if($errors->has('is_common'))
                                    <div class="error">{{ $errors->first('is_common') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    @if(isset($subjecttype))
                    <button type="submit" class="btn btn-primary">Update</button>
                    @else
                    <button type="submit" class="btn btn-primary">Submit</button>
                    @endif
                    </form>
                  
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

