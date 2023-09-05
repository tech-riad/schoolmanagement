@extends($adminTemplate.'.admin.layouts.app')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .select2-results { 
        background-color: #fff;
    }
</style>
@endpush

@section('content')
    <div class="page-body">

        @include($adminTemplate.'.attendance.partials.attendancenav')
        <div>
            <div class="card new-table">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Teacher's Time Setting</h4>
                        </div>
                        {{-- data-toggle="modal" data-target="#exampleModal" --}}
                        <a href="{{ route('attendance.teachertime.index') }}" class="btn btn-primary mr-2 mb-2"
                            style="width: 200px;height: 34px;">Teacher's Time List
                            <i class="fa fa-list"></i>
                        </a>
                    </div>
                    <div class="content-wrapper text-primary">
                        <form id="teacher-form" method="POST">
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label for="">Select Teacher</label>
                                    <select class="form-control js-example-basic-multiple" name="teachers_id[]" multiple="multiple" id="teacher_id" style="width:100%;">
                                        @foreach ($teachers as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                       <span class="text-danger">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>

                                <div class=" col-3">
                                    <label for="">In Time</label>
                                    <input type="time" value="" class="form-control" id="in_time" required>
                                </div>
                                <div class=" col-3">
                                    <label for="">Out Time</label>
                                    <input type="time" value="" class="form-control" id="out_time" required>
                                </div>

                                <div class=" col-3">
                                    <label for="">Max Delay</label>
                                    <input type="number" value="" class="form-control" id="max_delay" placeholder="Enter max delay time" required>
                                </div>
                            </div>

                            <div class="form-row mt-2">
                                <div class=" col-3">
                                    <label for="">Max Early</label>
                                    <input type="number" value="" class="form-control" id="max_early" placeholder="Enter max early time" required>
                                </div>
                            </div>
                            
                            
                            <div class="form-group" style="margin-top: 10px">
                                <button type="submit" class="btn btn-primary">Process <i class="fa fa-arrow-circle-down"></i></button>
                            </div>
                        </form>
                    </div>

                    <div class="row" id="table-card" style="display: none">
                        <div class="col-md-12">
                            <div class="card">
                                <form action="{{ route('attendance.teachertime.store') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        
                                        <hr>
                                        <table class="table table-hover" style="border: 1px solid grey">
                                            <thead>
                                                <th>
                                                    <div class="form-check py-0 my-0">
                                                        <input type="checkbox" class="form-check-input" checked
                                                            id="checkAll">
                                                        <label class="form-check-label" for="checkAll"></label>
                                                    </div>
                                                </th>
                                                <th>ID No</th>
                                                <th>Taecher Name</th>
                                                <th>Designation</th>
                                                <th>In Time</th>
                                                <th>Out Time</th>
                                                <th>Max Delay</th>
                                                <th>Max Early</th>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                        <button class="btn btn-primary mt-2">Submit</button>
                                    </div>
                                </form>
                            </div>
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
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            

            $("#checkAll").click(function() {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

            $('#customTable').DataTable();

            $('#teacher-form').submit(function(e) {
                e.preventDefault();

                var in_time     = $("#in_time").val();
                var out_time    = $("#out_time").val();
                var max_delay   = $("#max_delay").val();
                var max_early   = $("#max_early").val();


                var form = $(this);
                var url = "{{ route('attendance.teachertime.get-teachers') }}";

                $.ajax({
                    type: 'GET',
                    url: url,
                    data: form.serialize(),
                    contentType: false,
                    processData: false,
                    success: function(data) {

                        console.log(data);


                        $('#table-card').css('display', 'block');
                        let html = '';

                        if (data.length > 0) {
                            $.each(data, function(i, value){
                                html += `<tr>
                                            <input type="hidden" name="teacher_id[]" value="${value.id}" />
                                            <td scope="col">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input checkbox" value="${i}" name="check[]" id="exampleCheck1" checked>
                                                    <label class="form-check-label" for="exampleCheck1"></label>
                                                </div>
                                            </td>
                                            <td>${value.id_no}</td>
                                            <td>${value.name}</td>
                                            <td>${value.designation.title}</td>
                                            <td>
                                                <input type="time" value="${in_time}" class="form-control in_time_input" name="in_time[]" id="in_time_input" />
                                            </td>
                                            <td>
                                                <input type="time" value="${out_time}" class="form-control out_time_input" name="out_time[]" id="out_time_input" />
                                            </td>
                                            <td width='15%'>
                                                <input type="number" value="${max_delay}" class="form-control max_delay_time" name="max_delay_time[]" id="max_delay_time" />
                                            </td>
                                            <td width='15%'>
                                                <input type="number" value="${max_early}" class="form-control max_early_time" name="max_early_time[]" id="max_early_time" />
                                            </td>
                                        </tr>`;

                            });
                        }
                        else{
                            html += `<tr>
                                        <td colspan="6"><p class="text-center text-danger">No Data Found!</p></td>
                                        </tr>
                                    `;
                        }

                        $('tbody').html(html);
                    }
                });
            });

            $(document).on('change', '.checkbox', function() {
                var checked = $(this).is(':checked');
                var input = $(this).closest('tr').find('input[type="time"]');

                var select = $(this).closest('tr').find('select,input');
                input.prop('required', checked)
                select.prop('required', checked)
            });
        });


        $(".teacher_time").addClass('custom_nav');
        $('.setting').closest('li').addClass('custom_nav');
        $('#setting-item').removeClass('d-none');
        $('.teacher_attend_nav').removeClass('custom_nav');
    </script>
@endpush
