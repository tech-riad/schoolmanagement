@extends('teacherpanel.layout.app')
@section('content')



<div class="main-panel">
    <div class="card new-table">

        @if (isset($homework))
            
        
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
            @endif
            <div class="card-title float-left">
                <h6 style="color: black">Creating New Homework</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ isset($homework)? route('teacherpanel.homework.update',$homework->id) : route('teacherpanel.homework.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($homework))
                    @method('PUT')
                    @endif 

                    @if (isset($homework))
                    <div class="row py-2">
                        <div class="col-sm-4"> <label for="session_id"> Academic Year</label>
                            <select name="academic_year_id" id="session_id" class="form-control">
                    
                                <option value="">Select</option>
                                @foreach ($academic_years as $academic_year)
                                <option value="{{ $academic_year->id }}" 
                                    @if (isset($homework)) {{($homework->session_id)? 'selected':''}}
                                    @endif
                                    
                                    >{{ $academic_year->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4"> <label for="class_id">Class</label>
                            <select name="class_id" id="class_id" class="form-control">
                                <option value="">Select</option>
                                @foreach ($classes as $class)
                                <option value="{{ $class->id }}"
                                    @if (isset($homework)) {{($homework->class_id)? 'selected':''}}
                                    @endif
                                    >{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="col-sm-4"> <label for="shift_id">Shift</label>
                            <select name="shift_id" id="shift_id" class="form-control">
                                <option value=""
                                
                                >Select</option>
                    
                            </select>
                        </div>
                    
                    </div>
                    <div class="row py-2">
                    
                        <div class="col-sm-4"> <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select</option>
                    
                            </select>
                        </div>
                    
                        <div class="col-sm-4"> <label for="section_id">Section</label>
                            <select name="section_id" id="section_id" class="form-control ">
                                <option value="">Select</option>
                    
                            </select>
                        </div>
                        <div class="col-sm-4"> <label for="group_id">Group</label>
                            <select name="group_id" id="group_id" class="form-control">
                                <option value="">Select</option>
                            </select>
                        </div>
                    </div>
                    
                    @push('js')
                    <script>
                        $('#class_id').change(function () {
                            var class_id = $(this).val();
                            $.ajax({
                                url: '/student/getShiftbyClass/' + class_id,
                                type: 'GET',
                                success: function (data) {
                                    data.map(function (val, index) {
                                        $("#shift_id").append(`<option value='${val.id}'>${val.name}</option>`);
                                    })
                                }
                            });
                        });
                    
                        $('#shift_id').change(function () {
                            var class_id = $('#class_id').val();
                            var shift_id = $(this).val();
                    
                            $.ajax({
                                url: '/student/getCatSecGro/' + class_id + '/' + shift_id,
                                type: 'GET',
                                success: function (data) {
                                    data.category.map(function (val, index) {
                                        $("#category_id").append(
                                            `<option value='${val.id}'>${val.name}</option>`);
                                    })
                                    data.section.map(function (val, index) {
                                        $("#section_id").append(
                                            `<option value='${val.id}'>${val.name}</option>`);
                                    })
                                    data.group.map(function (val, index) {
                                        $("#group_id").append(`<option value='${val.id}'>${val.name}</option>`);
                                    })
                                }
                            });
                        });
                    
                    </script>
                    @endpush
                    
                    @else
                    @include('custom-blade.search-student') 
                    @endif
                


                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title"
                                value="{{$homework->title ?? @old('title')}}" required>
                            @if($errors->has('title'))
                            <div class="error">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                    </div>

                    
                    <div class="col-lg-4">
                        <label for="customFile">File</label>
                        <div class="custom-file">
                            <input type="file" name="filename[]" class="custom-file-input" id="customFile"
                            onchange="document.getElementById('filename[]').src = window.URL.createObjectURL(this.files[0])"
                             multiple>
                            <label class="custom-file-label" for="customFile">Choose File</label>
                            
                        </div>
                        <img class="mt-2" id="image" alt="image" width="100" height="100" />
                            @if (isset($homework))
                            <div class="old_image mt-2">
                                <label class="mb-0" for="">Old Image:</label><br>
                                @php
                                $getImg = json_decode($homework->filename);
                                @endphp
                                @foreach ($getImg as $item)
                                <img src="{{asset($item)}}"  alt="" class="mr-2" style="height: 90px; width:90px;">
                                @endforeach
                            </div>
                            @endif

                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="published_date" class="form-label">Published Date</label>
                            <input type="date" class="form-control" name="published_date" id="published_date" value="{{$homework->published_date ?? @old('published_date')}}"
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
                            <input type="date" class="form-control" name="submit_date" id="submit_date" value="{{$homework->submit_date ?? @old('submit_date')}}"
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
                            <textarea class="form-control" id="editor" name="content" rows="3" required>{{$homework->content ?? @old('title')}}</textarea>
                            @if($errors->has('content'))
                            <div class="error">{{ $errors->first('content') }}</div>
                            @endif
                        </div>
                    </div>
                </div>

                @if(isset($homework))
                <button type="submit" class="btn btn-primary">Update</button>
                @else
                <button type="submit" class="btn btn-primary">Submit</button>
                @endif
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
