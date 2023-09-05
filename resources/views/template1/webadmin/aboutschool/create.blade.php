@extends($adminTemplate.'.admin.layouts.app')

@section('content')
<div class="main-panel">
    @include($adminTemplate.'.webadmin.webadminnav')

    @if($errors->any())
    {{ implode('', $errors->all('<div>:Careful Please</div>')) }}
    @endif

    <div class="card new-table">
        <div class="card">
        @if (isset($aboutschool))
        <div class="card-header">
            <h4>Update About School</h4>
        </div>
        @else
        <div class="card-header">
            <h4>About School</h4>
        </div>
        @endif
            <div class="card-body">
                <form
                    action="{{ isset($aboutschool)? route('aboutschool.update',$aboutschool->id) : route('aboutschool.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @if(isset($aboutschool))
                    @method('PUT')
                    @endif


                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="3"
                            required>{{$aboutschool->content ?? @old('content')}}</textarea>
                        @if($errors->has('content'))
                        <div class="error">{{ $errors->first('content') }}</div>
                        @endif
                    </div>



                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input type="text" class="form-control" name="link" id="link"
                            value="{{$aboutschool->link ?? @old('link')}}" required>
                        @if($errors->has('link'))
                        <div class="error">{{ $errors->first('link') }}</div>
                        @endif
                    </div>



                    @if(isset($aboutschool))
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
