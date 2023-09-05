@extends($adminTemplate.'.admin.layouts.app')
@section('content')



<div class="page-body" id="all-row-py-2">
    @include($adminTemplate.'.homework.topmenu_homework')
    <div class="card new-table">
        <div class="card-header">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            
            <div class="card-title float-left">
                <h6 style="color: black">Creating New Homework</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                
                    @include('custom-blade.search-student')

                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="title" class="form-label title-lev">Title</label>
                            <input type="text" class="form-control" name="title" id="title"
                                value="" required>
                            @if($errors->has('title'))
                            <div class="error">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                    </div>

                    
                    <div class="col-lg-4">
                        <label for="customFile" class="title-lev2">File</label>
                        <div class="custom-file">
                            <input type="file" name="filename[]" class="custom-file-input" id="customFile"
                            onchange="document.getElementById('filename[]').src = window.URL.createObjectURL(this.files[0])"
                             multiple>
                            <label class="custom-file-label" for="customFile">Choose File</label>
                            
                        </div>
                        
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="published_date" class="form-label published">Published Date</label>
                            <input type="date" class="form-control" name="published_date" id="published_date" value=""
                                required>
                            @if($errors->has('published_date'))
                            <div class="error">{{ $errors->first('published_date') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="submit_date" class="form-label">Submit Date</label>
                            <input type="date" class="form-control" name="submit_date" id="submit_date" value=""
                                required>
                            @if($errors->has('submit_date'))
                            <div class="error">{{ $errors->first('submit_date') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="editor" class="form-label">Content</label>
                            <textarea class="form-control" id="editor" name="content" rows="3" required></textarea>
                            @if($errors->has('content'))
                            <div class="error">{{ $errors->first('content') }}</div>
                            @endif
                        </div>
                    </div>
                </div>

                
                <button type="submit" class="btn btn-primary">Update</button>
               
                <button type="submit" class="btn btn-primary">Submit</button>
                
            </form>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
<script>
    

    $("#image").hide();
    $("#customFile").change(function () {
        $("#image").show();
    });

    
    

</script>
@endpush
