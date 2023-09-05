@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="main-panel" id="marks-id">
        @include($adminTemplate.'.exammanagement.topmenu_exammanagement')

        <div>
            <div class="card new-table">
                @if (isset($types))
                <div class="card-header">
                    <h4>Update Short Code</h4>
                </div>
                @else
                <div class="card-header">
                    <h4>Add Short Code</h4>
                </div>
                @endif
                <div class="card">
                  <div class="card-body">
                    <form action="{{ isset($types)? route('exam-management.setting.marks-dist-type.update',$types->id) : route('exam-management.setting.marks-dist-type.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="title" style="color: black">Short Code Name</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter Type Name" name="title" value="{{$types->title ?? @old('title')}}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="form-group col-lg-4">
                                <label for="details" style="color: black">Short Code Details</label>
                                <input type="text" class="form-control  @error('details') is-invalid @enderror" id="details" placeholder="Type Details" name="details" value="{{$types->details ?? @old('details')}}">
                                @error('details')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i> Submit</button>
                    </form>

                  </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('js')
    <script>
        $(document).ready(function (){
            $('#setting_menu').show();
        });
    </script>
@endpush
