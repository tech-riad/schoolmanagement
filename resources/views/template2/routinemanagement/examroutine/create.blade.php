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
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="row py-2">
                            <div class="col-sm-6"> <label> Academic Year</label>
                                <select name="academic_year_id" id="session_id" class="form-control" required>
                                    <option value="">select</option>
                                    @foreach ($academic_years as $academic_year)
                                        <option value="{{ $academic_year->id }}">{{ $academic_year->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6"> <label>Class</label>
                                <select name="class_id" id="class_id" class="form-control" required>
                                    <option value="">select</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row py-2">
                            <div class="col-sm-6"> <label>Exam</label>
                                <select name="exam_id" id="exam_id" class="form-control">
                                    <option value="" selected hidden>select</option>
                                    @foreach ($exams as $exam)
                                      <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6"> <label>Start Time</label>
                                <input type="time" class="form-control" id="st_time">
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-sm-6"> <label>End Time</label>
                                <input type="time" class="form-control" id="ed_time">
                            </div>
                            <div class="col-sm-6"> <label>Start Date</label>
                                <input type="date" class="form-control" value="{{date('Y-m-d')}}" id="st_date">
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-sm-6"> <label>End Date</label>
                                <input type="date" class="form-control" value="{{date('Y-m-d')}}" id="ed_date">
                            </div>
                        </div>
                        {{-- @include('custom-blade.search-student') --}}
                        <div class="row py-2">

                            <div class="col-sm-6" style="display: flex">
                                <br>
                                <a href="javascript:void(0)" class="btn btn-primary" id="process"> <i
                                        class="fas fa-arrow-circle-down"></i> Proccess</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        &nbsp;
        &nbsp;
        <div id="preload">

        </div>
        <form action="{{ route('examroutine.store') }}" method="post">
            @csrf
            <div id="data-card" style="display: none">
                <div class="card new-table">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Subject List</h4>
                                </div>
                            </div>

                            <input type="number" hidden name="session_id" id="session">
                            <input type="number" hidden name="exam_id" id="exam">
                            <input type="date"   hidden name="st_date" id="start_date">
                            <input type="date"   hidden name="ed_date" id="end_date">
                            <input type="time"   hidden name="st_time" id="start_time">

                            <div id="subject_table">
                                
                            </div>
                           <div class="mt-4 pt-0">
                            <label style="color: #878787"><strong>Instructions:</strong></label>
                                <div id="instruction_row">
                                    <textarea class="form-control mb-3" id="editor" placeholder="Enter instruction here" name="instruction"></textarea>
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

            //Get Shift By Class
            $('#class_id').change(function() {
                var class_id = $(this).val();

                $.ajax({
                    url: '/routine/exam/group/' + class_id,
                    type: 'GET',
                    success: function(data) {
                        data.map(function(val, index) {
                            $("#group_id").append(`<option value='${val.id}'>${val.name}</option>`);
                        })
                    }
                });
            });

            //Get Admission Students
            $('#process').click(function(e) {
                e.preventDefault();

               const class_id   = $('#class_id').val();
               const session_id = $("#session_id").val();
               const exam_id    = $("#exam_id").val();
               
               const start_time = $("#st_time").val();
               const end_time   = $("#ed_time").val();
               const start_date = $("#st_date").val();
               const end_date   = $("#ed_date").val();

               $("#session").val(session_id);
               $("#exam").val(exam_id);

               $("#start_time").val(start_time);
               $("#start_date").val(start_date);
               $("#end_date").val(end_date);
               

                var url = "{{ route('examroutine.subject') }}";
                $('#preload').html(loader);

                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        class_id: class_id,
                    },
                    success: function(data) {
                        var tbody = '';
                        var index = 1;
                        $('#preload').html('');
                        $('#data-card').css('display', 'block');
                        $.each(data.subjects, function(index, item) {
                            index++;

                            tbody += `<tr>
                                            <td>
                                            <input type="hidden" class="form-control" readonly name="subject_id[]" value="${item.id}">
                                            <input type="text" class="form-control" readonly value="${item.sub_name}">
                                            </td>
                                            <td><input type="date" class="form-control" value="{{date('Y-m-d')}}" name="date[]"></td>
                                            <td><input type="time" class="form-control" value='${start_time}' name="start_time[]"></td>
                                            <td><input type="time" class="form-control" value='${end_time}' name="end_time[]"></td>
                                            <td><input type="text" class="form-control" name="room[]"></td>

                                            <input type="hidden" name="class_id" value="${data.id}">
                                      </tr>`;
                        });

                        var table = `<table id="customTable" class="table table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Subject</th>
                                                <th>Date</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Room No</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ${tbody}
                                        </tbody>
                                    </table>`;
                        $('#subject_table').html(table);

                    },
                    error: function() {

                    }
                });
            });

        });
    </script>
@endpush
