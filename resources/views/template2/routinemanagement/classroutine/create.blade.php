@extends($adminTemplate.'.admin.layouts.app')
@push('css')
<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

<style>
    #container {
        width: 1000px;
        margin: 20px auto;
    }
    .ck-editor__editable[role="textbox"] {
        /* editing area */
        min-height: 200px;
    }
</style>
@endpush
@section('content')
    <div class="page-body">

        @include($adminTemplate.'.routinemanagement.routineNav')

        <div class="card new-table mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title float-left">
                        <h6 style="color: black">Create Class Routine</h6>
                    </div>
                    <a href="{{route('classroutine.index')}}" class="btn btn-dark float-right"> <i class="fa fa-arrow-left"></i> Back</a>

                </div>
                <div class="card-body">
                    <div>
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="">Section</label>
                                <select name="section_id" class="form-control" id="section_id" required>
                                    <option value="">Select Section</option>
                                    @foreach ($sections as $section)
                                        <option value="{{$section->id}}">{{$section->class->name}}-{{$section->shift->name}}-{{$section->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="">Group</label>
                                <select name="group_id" class="form-control" id="group_id" required>
                                    <option value="">Select Group</option>

                                </select>
                            </div>
                        </div>
                        <button id="process" type="submit" class="btn btn-primary mt-2"><i class="fa fa-arrow-circle-down"></i> Process</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card new-table" id="routine-card" style="display: none">
            <div class="card-body">
                <div class="card-header">Class Routine</div>
                <form action="{{route('classroutine.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="section_id" id="sec_id">
                    <input type="hidden" name="group_id" id="grp_id">
                    <table class="table">
                        <tbody>

                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary mt-2 float-right"> <i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>


    </div>
@endsection
@push('js')
    <script>
    $(document).ready(function() {
        $('#customTable').DataTable();

        $('#section_id').change(function(){


            let section_id = $(this).val();

            $.get("{{route('assign_teacher.get-class-subjects')}}",
                {
                    section_id
                },
                function(data){

                    let html = '<option value="">Select Group</option>';
                    data.groups.map(function(item){
                        html += `<option value="${item.id}">${item.name}</option>`;
                    });
                    $('#group_id').html(html);
                });
        });

        $('#process').click(function(){

            $('#routine-card').css('display','block');

            let section_id = $('#section_id').val();
            let group_id   = $('#group_id').val();

            $('#sec_id').val(section_id);
            $('#grp_id').val(group_id);

            let html = `<tr>
                        <td>Day</td>
                        @foreach ($periods as $period)
                            <td class="text-center" ><b>{{$period->period_name}}</b></td>
                            <input type="hidden" name="period_id[]" value="{{$period->id}}"/>

                        @endforeach
                    </tr>
                    @foreach ($days as $k => $day)
                    <tr>
                        <td>
                            {{$day}}
                            <input type="hidden" name="day[]" value="{{$day}}"/>
                        </td>
                        @foreach ($periods as $key => $period)
                            <td>
                                <div class="form-row">
                                    <div class="col">
                                        <select name="subject_id_{{$k}}_{{$key}}[]" class="form-control" id="">
                                            <option value="">Subject</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{$subject->id}}">{{$subject->sub_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select name="teacher_id_{{$k}}_{{$key}}[]" class="form-control" id="">
                                            <option value="">Teacher</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </td>
                        @endforeach
                    </tr>
                    @endforeach`;
                $('tbody').html(html);
        });


    });
    </script>
@endpush
