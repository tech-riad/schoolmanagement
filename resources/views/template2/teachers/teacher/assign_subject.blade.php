@extends($adminTemplate.'.admin.layouts.app')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-results__option{
            background: white;
        }
    </style>
@endpush
@section('content')
    <div class="page-body">
        @include($adminTemplate.'.teachers.teachernav')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-body">
                        <h6>Assign Subject Teacher</h6>
                        <hr>
                        <form action="{{ route('teacher.assign_teacher.subject-store') }}" method="post">
                            @csrf
                            <div>
                                <div class="row" id="table">
                                    <div class="col">
                                        <label> Select Teacher</label>
                                        <select name="teacher_id" id="teacher_id" class="form-control" required>
                                            <option>Select Teacher</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="">Select Session/Year</label>
                                        <select name="session_id" id="session_id" class="form-control select2"  required>
                                            <option value="">select</option>
                                            @foreach ($sessions as $session)
                                                <option value="{{$session->id}}">{{$session->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col" id="first">
                                        <label for="">Select Section</label>
                                        <select name="section_id" id="section_id" class="form-control chosen-select" required>
                                            <option value="">Select Section</option>
                                            @foreach ($sections as $section)
                                                <option value="{{$section->id}}">{{$section->class->name}}{{$section->shift->name != 'N/A' ? '-'.$section->shift->name : ''}}{{$section->name != 'N/A' ? '-'.$section->name : ''}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="form-row mt-4" id="table">
                                      <div class="col">
                                        <label for="">Select Category</label>
                                        <select name="category_id" id="category_id" class="form-control select2" >
                                            <option value="">select</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="">Select Subject</label>
                                        <select name="subject_id[]" id="subject_id" class="form-control select2-multiple"  multiple="multiple">
                                            <option value="">Select Subject</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3 float-end">
                                <i class="mdi mdi-content-save-settings"></i>
                                Submit
                            </button>
                        </form>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h6>Teacher Subject List</h6>
                        </div>
                        <div class="card-body">
                            <table id="customTable" class="table table-striped table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">SL</th>
                                        <th style="text-align:center;">Name</th>
                                        <th style="text-align:center;">designation</th>
                                        <th style="text-align:center;">Section</th>
                                        <th style="text-align:center;">Subjects</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assign_teachers as $key =>  $item)
                                    <tr>
                                        <td sytle="text-align=center">{{$loop->iteration}}</td>
                                        <td style="width:30%;">{{$item->name}}</td>
                                        <td style="width:20%; text-align:center">{{@$item->designation->title}}</td>

                                        <td style="width:25%; text-align:center">
                                            @forelse ($item->sections as $section)
                                                <div class="badge badge-primary">{{@$section->class->name}}-{{@$section->shift->name}}-{{@$section->name}}</div>
                                            @empty
                                                <div class="badge badge-danger">Not Assigned</div>
                                            @endforelse
                                        </td>
                                        <td style="width:25%; text-align:center">
                                            @forelse ($item->subjects as $subject)
                                                <div class="badge badge-primary">{{$subject->sub_name}}</div>
                                            @empty
                                                <div class="badge badge-danger">Not Assigned</div>
                                            @endforelse
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#customTable').DataTable();
            $('.select2-multiple').select2();
            $(".chosen-select").chosen();


            //GET SUBJECTS
            $('#section_id').change(function(){

                let section_id = $(this).val();

                $.get("{{route('teacher.assign_teacher.get-class-subjects')}}",
                {
                    section_id
                },
                function(data){

                    let html = '<option value="">Select Subject</option>';
                    let html2 = '<option hidden value="">Select Catgory</option>';

                    data.subjects.map(function(item){
                        html += `<option value="${item.id}">${item.sub_name}</option>`;
                    });
                    data.categories.map(function(item){
                        html2 += `<option ${item.name == 'N/A' ? 'selected hidden' : ''} value="${item.id}">${item.name != 'N/A' ? item.name : 'No Category In This Class'}</option>`;
                    });

                    $('#subject_id').html(html);
                    $('#category_id').html(html2);
                });
            });


        });
    </script>
@endpush
