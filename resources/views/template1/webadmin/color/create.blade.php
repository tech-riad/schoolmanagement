@extends($adminTemplate.'.admin.layouts.app')
@push('css')


@endpush
@section('content')
<div class="main-panel">
    @include($adminTemplate.'.webadmin.webadminnav')


    @if($errors->any())
    {{ implode('', $errors->all('<div>:Careful Please</div>')) }}
    @endif

    <div class="card new-table">
        <div class="card">
        @if (isset($color))
        <div class="card-header">
            <h4>Update Color Combination</h4>
        </div>
        @endif
        
            <div class="card-body">
                <form
                    action="{{route('color.update',$color->id)}}"
                    method="post" >
                    @csrf

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="front_section_id" class="form-label">Section Name</label>
                                <select name="front_section_id" class="form-control">
                                    <option value="">select</option>
                                    @foreach($frontsection as $fs)
                                    <option value="{{$fs->id}}">{{$fs->name ?? ''}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="color" class="form-label">Color</label>
                                <input type="text" class="form-control color-picker" name="color">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="background_color" class="form-label">Background Color</label>
                                <input type="text" class="form-control color-picker" name="background_color">
                            </div>
                        </div>
                    </div>

                    @if(isset($color))
                    <button type="submit" class="btn btn-primary">Update</button>
                    @else
                    <button type="submit" class="btn btn-primary">Submit</button>
                    @endif
                </form>
            </div>
        </div>
    </div>


</div>
</div>

@endsection



