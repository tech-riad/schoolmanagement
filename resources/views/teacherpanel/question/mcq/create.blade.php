@extends('teacherpanel.layout.app')
@push('css')
    <style>
        .ck-editor__editable_inline {
            min-height: 80px;
        }
    </style>
@endpush
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
            <div class="card new-table">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">
                                @if (isset($chapter))
                                Update MCQ Question
                                @else
                                Create MCQ Question
                                @endif
                            </h4>
                        </div>
                        <a href="{{ route('teacherpanel.question.mcqquestion.index') }}" class="btn btn-primary mr-2"
                            style="width: 175px;height: 34px;">MCQ List
                            <i class="fa fa-list"></i>
                        </a>
                    </div>
                    <div class="content-wrapper text-primary">

                        <form id="subject_form" method="Get">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="">Select Class</label>
                                    <select class="form-control" id="class_id" name='class'>
                                        <option selected hidden>Select class</option>
                                        @foreach ($classes as $class)
                                          <option value="{{$class->id}}" @selected(@$chapter->ins_class_id == $class->id)>{{$class->name}}</option>  
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="">Select Subject</label>
                                    <select class="form-control" id="subject" name="subject">
                                        @if (isset($chapter))
                                            @foreach ($chapter->ins_class->subjects as $subject)
                                                <option @selected(@$chapter->subject_id == $subject->id) value="{{$subject->id}}">{{$subject->sub_name}}</option>
                                            @endforeach
                                        @else
                                            <option selected hidden >Select class first</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="">Chapter</label>
                                    <input type="text" class="form-control" name="chapter_name" placeholder="Enter Chaper Name" value="{{@$chapter->name ?? old('chapter_name')}}" required>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3 ml-1"><i class="fa-solid fa-download"></i> Process</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            @if(!isset($chapter))
                <div class="row mt-3 d-none" id="table-card" style="padding:0px 28px 0px 31px;">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="pl-4 pt-3">
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Class : <span id="class" class="text-primary"></span>, Subject : <span id="sub" class="text-primary"></span>, Chapter : <span id="chapter" class="text-primary"></span></h4>
                            </div>

                            <form action="{{route('teacherpanel.question.mcqquestion.store')}}" method="POST">
                                @csrf
                                <button id="add_btn" class="btn-sm btn-primary mr-4 float-right" type="button"><i class="fa-solid fa-plus"></i></button><br>
                                <div class="card-body">
                                    <div id="card_row">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <textarea name="question[]" class="editor mb-2" cols="30" rows="70"></textarea> 
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <label for="">Option (One)</label>
                                                <input type="text" class="form-control option" name="option1[]" placeholder="Enter Option One">
                                            </div>
    
                                            <div class="col-md-3">
                                                <label for="">Option (Two)</label>
                                                <input type="text" class="form-control option" name="option2[]" placeholder="Enter Option Two">
                                            </div>
    
                                            <div class="col-md-3">
                                                <label for="">Option (Three)</label>
                                                <input type="text" class="form-control option" name="option3[]" placeholder="Enter Option Three">
                                            </div>
    
                                            <div class="col-md-3">
                                                <label for="">Option (Four)</label>
                                                <input type="text" class="form-control option" name="option4[]" placeholder="Enter Option Four">
                                            </div>
    
                                            <div class="col-md-3 mt-2">
                                                <label for="">Answer</label>
                                                <select class="form-control" id="answer" name="answer[]">
                                                    <option value="1">Option (One)</option>
                                                    <option value="2">Option (Two)</option>
                                                    <option value="3">Option (Three)</option>
                                                    <option value="4">Option (Four)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary mb-2 ml-4">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="row mt-3" id="table-card" style="padding:0px 28px 0px 31px;">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="pl-4 pt-3">
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Class : <span id="class" class="text-primary">{{$chapter->ins_class->name}}</span>, Subject : <span id="sub" class="text-primary">{{$chapter->subject->sub_name}}</span>, Chapter : <span id="chapter" class="text-primary">{{$chapter->name}}</span></h4>
                            </div>

                            <form action="{{route('teacherpanel.question.mcqquestion.update',$chapter->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button id="add_btn" class="btn-sm btn-primary mr-4 float-right" type="button"><i class="fa-solid fa-plus"></i></button><br>
                                <div class="card-body">
                                    <div id="card_row">
                                        @foreach ($chapter->questions as $key => $question)
                                        <div class="row mb-3">

                                            <div class="col-md-12 mb-2">
                                                <textarea name="question[]" id="editor_{{$key+1}}" class="editor2 mb-2" cols="30" rows="10">{{$question->question}}</textarea> 
                                            </div> 
                                            
                                            <div class="col-md-3">
                                                <label for="">Option (One)</label>
                                                <input type="text" class="form-control option" name="option1[]" placeholder="Enter Option One" value="{{$question->option1}}">
                                            </div>
    
                                            <div class="col-md-3">
                                                <label for="">Option (Two)</label>
                                                <input type="text" class="form-control option" name="option2[]" placeholder="Enter Option Two" value="{{$question->option2}}">
                                            </div>
    
                                            <div class="col-md-3">
                                                <label for="">Option (Three)</label>
                                                <input type="text" class="form-control option" name="option3[]" placeholder="Enter Option Three" value="{{$question->option3}}">
                                            </div>
    
                                            <div class="col-md-3">
                                                <label for="">Option (Four)</label>
                                                <input type="text" class="form-control option" name="option4[]" placeholder="Enter Option Four" value="{{$question->option4}}">
                                            </div>
                                            
                                            <div class="col-md-3 mt-2">
                                                <label for="">Answer</label>
                                                <select class="form-control" id="answer" name="answer[]">
                                                    <option @selected($question->answer == 1 ? true : '') value="1">Option (One)</option>
                                                    <option @selected($question->answer == 2 ? true : '') value="2">Option (Two)</option>
                                                    <option @selected($question->answer == 3 ? true : '') value="3">Option (Three)</option>
                                                    <option @selected($question->answer == 4 ? true : '') value="4">Option (Four)</option>
                                                </select>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <button class="btn btn-primary mb-2 ml-4">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
</div>
@endsection

@push('javascript')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });


    var editors = $(".editor2");
    if(editors.length > 1){
        for (let i = 0; i < editors.length; i++) {
            ClassicEditor
                .create( document.querySelector( '#editor_'+[i+1]))
                .catch( error => {
                    console.error( error );
            });
        }
    }
    

    ClassicEditor
        .create( document.querySelector( '.editor' ) )
        .catch( error => {
            console.error( error );
    });


</script>

    <script>
        $(document).ready(function() {
            
            $("#class_id").change(function(){
                var class_id = $(this).val();
                $.ajax({
                    url     : '/teacherpanel/question/subject-list/'+class_id,
                    type    : 'GET',
                    success : function(data){
                        $("#subject").empty();

                        if(data.subjects.length > 0){
                            $.each(data.subjects,function(i,v){
                                $("#subject").append(`<option value="${v.id}">${v.sub_name} (${v.sub_code})</option>`);  
                            });
                        }else{
                            $("#subject").html(`<option selected hidden>No subject in this class</option>`);
                        }
                    }
                });
            });


            $("#subject_form").submit(function(e){
                e.preventDefault();
                var form= $(this);
                var url = "{{ route('teacherpanel.question.select_sub')}}";

                $.ajax({
                    url         : url,
                    type        : 'Get',
                    data        : form.serialize(),
                    contentType : false,
                    processData : false,
                    success     : (data) => {
                        if(data.subject){
                            $("#sub").text(data.subject.sub_name);
                            $("#chapter").text(data.items.chapter_name);
                            $("#class").text(data.class.name);
                            $("#table-card").removeClass('d-none');

                            $("#card_row").append(`
                                <input type="hidden" class="form-control" name="class_id" value='${data.class.id}'>
                                <input type="hidden" class="form-control" name="subject_id" value='${data.subject.id}'>
                                <input type="hidden" class="form-control" name="chapter_name" value='${data.items.chapter_name}'>
                            `);
                        }else{
                            Toast.fire({
                                icon: 'error',
                                title: 'No Subject Select In This Class'
                            });
                        }
                    }
                });
            });


            $("#add_btn").click(function() {
                $("#card_row").append(`
                <div class='row mt-4'>
                    <div class="col-md-12 mb-2">
                        <textarea name="question[]" class="editor mb-2" cols="30" rows="10"></textarea>
                    </div>

                    <div class="col-md-3">
                        <label for="">Option (One)</label>
                        <input type="text" class="form-control" name="option1[]" placeholder="Enter Option One">
                    </div>
    
                    <div class="col-md-3">
                        <label for="">Option (Two)</label>
                        <input type="text" class="form-control" name="option2[]" placeholder="Enter Option Two">
                    </div>
    
                    <div class="col-md-3">
                        <label for="">Option (Three)</label>
                        <input type="text" class="form-control" name="option3[]" placeholder="Enter Option Three">
                    </div>
    
                    <div class="col-md-3">
                        <label for="">Option (Four)</label>
                        <input type="text" class="form-control" name="option4[]" placeholder="Enter Option Four">
                    </div>
    
                    <div class="col-md-3 mt-2">
                        <label for="">Answer</label>
                        <select class="form-control" id="answer" name="answer[]">
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                            <option value="4">Option 4</option>
                        </select>
                    </div>
                </div>
            `);

                // Get the newly appended textarea element
                var newEditor = $(".editor").last();

                // Initialize the CKEditor instance on the new textarea element
                ClassicEditor.create(newEditor[0]);
            });
        });
    </script>
@endpush
