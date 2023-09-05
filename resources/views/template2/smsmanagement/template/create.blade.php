@extends($adminTemplate.'.admin.layouts.app')
@push('css')
<style>
    .ck-editor__editable[role="textbox"] {
        /* editing area */
        min-height: 200px;
    }

    input.status {
        width: 20px;
        height: 20px;
        padding-right: 10px;
    }

</style>
@endpush
@section('content')
<div class="page-body">

    @include($adminTemplate.'.smsmanagement.topmenu_sms_management')
    <div class="card new-table">
        @if (isset($template))
        <div class="card-header">
            <h4>Update Template</h4>
        </div>
        @else
        <div class="card-header">
            <h4 style="color: #0078C1">Add Template</h4>
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ isset($template)? route('sms.template.update',$template->id) : route('sms.template.store') }}" method="post">
                    @csrf
                    @if(isset($template))
                    @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{@$template->title ?? old('title')}}">
                                @if($errors->has('title'))
                                <div class="error">{{ $errors->first('title') }}</div>
                                @endif
                            </div>
                        </div>
                        {{-- <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="designation" class="form-label">Designation</label>
                                <input type="text" class="form-control" name="designation" id="designation" value="{{@$template->designation ?? old('designation')}}">
                                @if($errors->has('designation'))
                                <div class="error">{{ $errors->first('designation') }}</div>
                                @endif
                            </div>
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="editor" class="form-label">Message</label>
                                <textarea class="form-control" id="editor" name="message"
                                    rows="3">{{@$template->message ?? old('message')}}</textarea>
                                @if($errors->has('message'))
                                <div class="error">{{ $errors->first('message') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if(isset($template))
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

@push('js')
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
<script>
    
</script>
@endpush
