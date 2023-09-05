@extends('teacherpanel.layout.app')
@push('css')
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>
@endpush
@section('content')
<div class="main-panel">
    @include('teacherpanel.question.questionnav')
    <div class="content-wrapper">
            <div class="card new-table">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">
                                @if (isset($chapter))
                                Update Question
                                @else
                                Create New Question
                                @endif
                                
                            </h4>
                        </div>
                        <a href="{{ route('teacherpanel.question.index') }}" class="btn btn-primary mr-2"
                            style="width: 175px;height: 34px;">Question List
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
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Class : <span id="class"></span></h4>
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Subject : <span id="sub"></span></h4>
                                <h4 class="card-title" style="color:rgb(71, 201, 69)">Chapter : <span id="chapter"></span></h4>
                            </div>

                            <form action="{{route('teacherpanel.question.store')}}" method="POST">
                                @csrf
                                <button id="add_btn" class="btn-sm btn-primary mr-4 float-right" type="button"><i class="fa-solid fa-plus"></i></button><br>
                                <div class="card-body">
                                    <div id="card_row" class="row">
                                        <div class="col-md-12 mb-2">
                                        <textarea name="question[]" class="editor mb-2" cols="30" rows="10"></textarea> 
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
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Class : <span>{{$chapter->ins_class->name}}</span></h4>
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Subject : <span>{{$chapter->subject->sub_name}}</span></h4>
                                <h4 class="card-title" style="color:rgb(71, 201, 69)">Chapter : <span>{{$chapter->name}}</span></h4>
                            </div>

                            <form action="{{route('teacherpanel.question.update',$chapter->id)}}" method="POST">
                                @method('PUT')
                                @csrf
                                <button id="add_btn" class="btn-sm btn-primary mr-4 float-right" type="button"><i class="fa-solid fa-plus"></i></button><br>
                                <div class="card-body">
                                    <div id="card_row" class="row">
                                        
                                        @foreach ($chapter->questions as $key => $question)
                                        <div class="col-md-12 mb-2">
                                            <textarea name="question[]" id="editor_{{$key+1}}" class="editor2 mb-2" cols="30" rows="10">{{$question->question}}</textarea> 
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
                    <div class="col-md-12 mb-2">
                        <textarea name="question[]" class="editor mb-2" cols="30" rows="10"></textarea> 
                    </div>
                `);

                // Get the newly appended textarea element
                var newEditor = $(".editor").last();

                // Initialize the CKEditor instance on the new textarea element
                ClassicEditor.create(newEditor[0]);
            });
        });


        $(".theory_nav").addClass('custom_nav');
    </script>
@endpush
