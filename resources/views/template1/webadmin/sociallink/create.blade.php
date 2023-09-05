@extends($adminTemplate.'.admin.layouts.app')

@section('content')
<div class="main-panel">
    @include($adminTemplate.'.webadmin.webadminnav')

    @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    <div class="card new-table">
        <div class="card">
            @if (isset($sociallink))
            <div class="card-header">
                <h4>Update Social Link</h4>
            </div>
            @else
            <div class="card-header">
                <h4>Add Social Link</h4>
            </div>
            @endif
            <div class="card-body">
                <form
                    action="{{ isset($sociallink)? route('sociallink.update',$sociallink->id) : route('sociallink.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @if(isset($sociallink))
                    @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="facebook" class="form-label">Facebook</label>
                                <input type="text" class="form-control" name="facebook" id="facebook"
                                    value="{{$sociallink->facebook ?? @old('facebook')}}">
                                @if($errors->has('facebook'))
                                <div class="error">{{ $errors->first('facebook') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="linkedin" class="form-label">Linkedin</label>
                                <input type="text" class="form-control" name="linkedin" id="linkedin"
                                    value="{{$sociallink->linkedin ?? @old('linkedin')}}">
                                @if($errors->has('linkedin'))
                                <div class="error">{{ $errors->first('linkedin') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="twitter" class="form-label">Twitter</label>
                                <input type="text" class="form-control" name="twitter" id="twitter"
                                    value="{{$sociallink->twitter ?? @old('twitter')}}">
                                @if($errors->has('twitter'))
                                <div class="error">{{ $errors->first('twitter') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="youtube" class="form-label">Youtube</label>
                                <input type="text" class="form-control" name="youtube" id="youtube"
                                    value="{{$sociallink->youtube ?? @old('youtube')}}">
                                @if($errors->has('youtube'))
                                <div class="error">{{ $errors->first('youtube') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if(isset($sociallink))
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

@section('javascript')
<script>
    $('input[type="checkbox"]').change(function () {
        var checked = $(this).is(':checked');
        var input = $(this).closest('tr').find('input[type="text"]');
        var select = $(this).closest('tr').find('select,input');
        input.prop('required', checked)
        select.prop('required', checked)
    })


    

</script>
@stop

@push('js')
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>

<script>
    $('.social_link').addClass('active');
    $(".home").addClass('active');

</script>

@endpush