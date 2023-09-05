@extends($adminTemplate.'.admin.layouts.app')
@push('css')

@endpush
@section('content')
    <div class="page-body">
        @include($adminTemplate.'.attendance.partials.attendancenav')
        <div class="card new-table">
            <div class="card-header">
                <h6>Add New Template</h6>
            </div>
            <div class="card-body">

                <form action="{{!isset($template) ? route('attendance.leavetemplate.store') : route('attendance.leavetemplate.update',$template->id)}}" method="POST">
                    @csrf
                    @if (isset($template))
                       @method('PUT') 
                    @endif
                    
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input id="title" name="title" type="text" placeholder="Enter The Title" class="form-control" value="{{$template->title ?? @old('title')}}"
                                class="@error('title') is-invalid @enderror">

                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-1">
                                <label for="application" class="form-label">Application</label>
                                <textarea id="application" name="application" type="text" class="form-control" rows="10" placeholder="Enter The application"
                                class="@error('application') is-invalid @enderror">{{$template->application ?? @old('application')}}</textarea>

                                @error('application')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    @if (isset($template))
                        <button type="submit" class="btn btn-primary mt-4">Update</button>
                    @else
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(".manageLeave").closest('li').addClass('custom_nav');
        $('.setting').closest('li').removeClass('custom_nav');
        $('.addtemplate').addClass('custom_nav');
        $('.report').closest('li').removeClass('custom_nav');
        $("#leave-item").removeClass('d-none');
        $("#setting-item").addClass('d-none');
        $("#report-item").addClass('d-none');
        
    </script>
@endpush
