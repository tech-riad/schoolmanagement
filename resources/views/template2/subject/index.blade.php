@extends($adminTemplate.'.admin.layouts.app')
@section('content')
<style>
    input[type="radio"],
    input[type="checkbox"] {
        box-sizing: border-box;
        padding: 0;
    }

    .form-check-input {
        position: absolute;
        margin-top: 0.3rem;
        margin-left: -4.25rem;
    }

    .form-check {
        min-height: 18px;
        padding-left: 0rem;
    }

    .list-group-item {
        background-color: transparent;
        border-bottom: 1px solid #ddd;
        border-radius: 0;
        color: #6C7293;
    }

</style>
<div class="page-body">
    @include($adminTemplate.'.academic.academicnav')
    <nav class="navbar navbar-expand-lg navbar-light bg-white mt-2 z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav navbar-nav-hover ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('classes.show',$id)}}" id="nav-hov">
                            Shifts
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('category.index',$id)}}" id="nav-hov">
                            Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('section.index',$id)}}" id="nav-hov">
                            Sections
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('group.index',$id)}}" id="nav-hov">
                            Groups
                        </a>
                    </li>

                    <li class="nav-item {{Request::is('academic/class/subject*')?'custom_nav':''}}">
                        <a class="nav-link" href="{{route('subject.list',$id)}}" id="nav-hov">
                            Subject
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('genGrade.index',$id)}}" id="nav-hov">
                            General Grades
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('academic/test-grade*')?'active':''}}">
                        <a class="nav-link" href="{{route('testGrade.index',$id)}}" id="nav-hov">
                            Class Test Grade
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div>
        <div class="card new-table" style="margin-top: 20px;">
            <div class="card-header">
                <h4>Subject Assign</h4>
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus"></i>Add Subject</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('subject.subjectAdd')}}" method="post">
                            @csrf
                            <input type="number" value="{{$id}}" name="class_id" hidden>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="list-group" id="list-tab" role="tablist">
                                   <a class="list-group-item list-group-item-action"   href="">All Subjects <i class="fa fa-arrow-right"></i></a>

                                   @foreach($subjectTypes as $type)
                                        <a class="list-group-item list-group-item-action  subject-type" data-id="{{$type['id']}}"  href="">{{ucfirst($type['name'])}} ({{$type['count']}})</a>
                                   @endforeach
                                </div>
                                <div class="form-group  mt-3">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save</button>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <table class="table table-bordered">
                                    <tbody id="subject-list">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </form>
                    


                
            </div>
        </div>
    </div>
</div>
{{--    modal--}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Subject Create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('subject.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Subject Name</label>
                        <input type="text" class="form-control" name="name" id="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Subject Code</label>
                        <input type="text" class="form-control" name="code" id="" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--    modal--}}
@endsection



@push('js')
<script>
$(document).ready(function (){
    let class_id = {{$id}};

    $.get("{{route('subject.get-subjects')}}",{class_id},function (data){

       let html = '';

        console.log(data.subjects);
        $.each(data.subjects,function (i,v){
            let trow = '';
            $.each(v,function (i,v){
                let subjectTypes = '';
                $.each(data.subjects_types,function (index,value){
                    subjectTypes += `<input class="" ${v.type_id == value.id ? 'checked':''}  title="${value.name}" type="radio" name="subject_id-${v.id}" value="${value.id}-${v.id}" id="subject_id-${v.id}" >`;
                });
                trow += `<td>
                    
                            <h4>${v.sub_name} (${v.sub_code})</h4>
                            <div class="form-check-inline ">
                                ${subjectTypes} 
                              
                            </div>
                        </td>`;
            });
            
            

            html += `<tr>
                        ${trow}
                    </tr>`;
        });

        $('#subject-list').html(html);

    });

    $(document).on('click','.subject-type',function (e){
        e.preventDefault();
        let type_id = $(this).data('id');
        getSubjectByType(type_id);
    });


    function getSubjectByType(type_id){
        $.get("{{route('subject.get-subjects-by-type')}}",{type_id,class_id},function (data){
            let html = '';

            $.each(data.subjects,function (i,v){

                let trow = '';

                $.each(v,function (i,v){
                    let subjectTypes = '';
                    $.each(data.subjects_types,function (index,value){
                        subjectTypes += `<input class="" ${v.type_id == value.id ? 'checked':''}  title="${value.name}" type="radio" name="subject_id-${v.id}" value="${value.id}-${v.id}" id="subject_id-${v.id}" >`;
                    });

                    trow += `<td>
                                <div class="form-check form-check-inline d-flex">
                                  ${subjectTypes}
                                  <label class="form-check-label" for="subject_id-${v.id}">${v.sub_name} (${v.sub_code})</label>
                                </div>
                            </td>`;
                });

                html += `<tr>
                            ${trow}
                        </tr>`;


            });

            $('#subject-list').html(html);


        });
    }



})








</script>
@endpush
