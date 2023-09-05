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
    <div class="main-panel">

        <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="navbar-nav navbar-nav-hover mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('classroutine.index') }}" id="nav-hov">
                                Class Routine
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('examroutine.index') }}" id="nav-hov">
                                Exam Routine
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('unc_message') }}" id="nav-hov">
                                Settings
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="card new-table mb-3">
            <form action="{{ route('examroutine.update',$routine->id) }}" method="post" style="none;">
                @csrf
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="row py-2">
                            <div class="col-sm-6"> <label> Academic Year</label>
                                <select name="academic_year_id" id="session_id" class="form-control" required>
                                    <option value="">select</option>
                                    @foreach ($academic_years as $academic_year)
                                        <option value="{{ $academic_year->id }}" @selected($academic_year->id == $routine->session_id)>{{ $academic_year->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6"> <label>Class</label>
                                <select name="class_id" id="class_id" class="form-control" required>
                                    <option value="">select</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}" @selected($class->id == $routine->ins_class_id)>{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row py-2">
                            <div class="col-sm-6"> <label>Exam</label>
                                <select name="exam_id" id="exam_id" class="form-control">
                                    <option value="" selected hidden>select</option>
                                    @foreach ($exams as $exam)
                                      <option value="{{ $exam->id }}" @selected($exam->id == $routine->exam_id)>{{ $exam->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @php
                                foreach ($routine->subjects as $key => $s) {
                                    $start_time = $s->start_time;
                                }
                            @endphp
                            <div class="col-sm-6"> <label>Start Time</label>
                                <input type="time" class="form-control" value="{{$start_time}}" name="st_time" id="st_time">
                            </div>
                        </div>
                        @php
                            foreach ($routine->subjects as $key => $s) {
                                $end_time = $s->end_time;
                            }
                        @endphp
                        <div class="row py-2">
                            <div class="col-sm-6"> <label>End Time</label>
                                <input type="time" class="form-control" value="{{$end_time ?? ''}}" name="ed_time" id="ed_time">
                            </div>
                            <div class="col-sm-6"> <label>Start Date</label>
                                <input type="date" class="form-control" value="{{$routine->start_date}}" name="st_date" id="st_date">
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-sm-6"> <label>End Date</label>
                                <input type="date" class="form-control" value="{{$routine->end_date}}" name="ed_date" id="ed_date">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- &nbsp;
        &nbsp;
        <div id="preload"> 

        </div>--}}
            <div id="data-card">
                <div class="card new-table">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Subject List</h4>
                                </div>
                            </div>
                            {{-- table-striped --}}
                            <div class="" id="subject_table"> 
                                <table class="table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Room</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($routine->subjects as $s)
                                        
                                        <tr>
                                            <td>
                                                <input type="hidden" class="form-control" value="{{$s->pivot->subject_id}}" name="subject_id[]">
                                                <input type="text" value="{{$s->sub_name}}" class="form-control" readonly>
                                            </td>
                                            <td><input type="date" class="form-control" name="date[]" value="{{$s->pivot->date}}"></td>
                                            <td><input type="time" class="form-control start_time" value='{{$s->pivot->start_time}}' name="start_time[]"></td>
                                            <td><input type="time" class="form-control end_time" value='{{$s->pivot->end_time}}' name="end_time[]"></td>
                                            <td><input type="text" class="form-control" name="room[]" value="{{$s->pivot->room}}"></td>
                                      </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class=" mt-4 pt-0" id="instruction_table">
                                <label style="color: #878787"><strong>Instructions:</strong></label>
                                
                                <div id="instruction_row">
                                    <textarea class="form-control mb-3" id="editor" placeholder="Enter instruction here" name="instruction">{{$routine->instruction ?? ''}}</textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script>

    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
    });

        $(document).ready(function() {
            $('#customTable').DataTable();

            var loader = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#fff;display:block;" width="31px" height="31px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                        <circle cx="50" cy="50" fill="none" stroke="#e15b64" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                            <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                        </circle>
                        </svg>`;


            $("#st_time,#ed_time").change(function(){
                var start_time = $("#st_time").val();
                var end_time = $("#ed_time").val();

                $(".start_time").val(start_time);
                $(".end_time").val(end_time);
            });
        });

    </script>
@endpush
