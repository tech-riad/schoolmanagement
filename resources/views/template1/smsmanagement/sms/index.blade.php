@extends($adminTemplate.'.admin.layouts.app')
@push('css')
<style>
    tr {
        height: 40px;
        padding-top: 0px;
        padding-bottom: 0px;
    }

</style>
@endpush
@section('content')

<div class="main-panel" id="marks-id">
    @include($adminTemplate.'.smsmanagement.topmenu_sms_management')

    <div class="card new-table">
        <div class="card-header">
            <div class="card-title float-left">
                <h6 style="color: #009FFF">Send Sms</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="#" method="Get">
                @csrf
                <div class="row py-2">
                    <div class="col-md-3">
                        <label for="sms_template">Sms Template</label>
                        <select class="form-control" name="sms_template" id="sms_template">
                            <option value="all">All</option>
                            @foreach ($templates as $template)
                            <option value="{{$template->id}}" data="{{$template->message}}">{{$template->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-9">
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card new-table mt-2">
        <div class="card-body pt-2">
            <ul class="nav nav-tabs" style="border:none">
                <li class="nav-item mr-1">
                    <a class="nav-link bg-primary active py-2" data-toggle="tab" href="#student">Student</a>
                </li>
                <li class="nav-item mr-1">
                    <a class="nav-link bg-primary py-2" data-toggle="tab" href="#teacher">Teacher</a>
                </li>
                <li class="nav-item mr-1">
                    <a class="nav-link bg-primary py-2" data-toggle="tab" href="#staff">Staff</a>
                </li>
                <li class="nav-item mr-1">
                    <a class="nav-link bg-primary py-2" data-toggle="tab" href="#committee">Committee</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="student" class=" tab-pane active">
                    <br>
                    <form id="student-form" method="GET">
                        @include('custom-blade.search-student')
                        <div class="row py-2">
                            <div class="col-sm-6" style="display: flex">
                                <br>
                                <button type="submit" id="btn-submit" class="btn btn-primary"> <i class="fas fa-arrow-circle-down"></i>Proccess</button>
                            </div>
                        </div>
                    </form>

                    <div id="table-wrapp" class="d-none">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Student List</h4>
                                <p class="card-title" style="color:rgba(0, 0, 0, 0.5)"> Result Of : Academic Year- <span id="year"></span> , Class- <span id="class"></span> , Shift- <span id="shift"></span> , Category- <span id="category"></span> , Section- <span id="section"></span> ,Group- <span id="group"></span></p>
                            </div>
                        </div>
    
                        <form action="{{route('sms.student.sendsms')}}" method="POST">
                            @csrf
                            <input type="number" hidden name="template_id" class="template_id">
                            <input type="hidden" name="sms_content" class="sms_content">
                            <div style="overflow-x:scroll;">
                                <table id="dtHorizontalExample" class="table">
                                    <thead>
                                        <tr>
                                            <th width='1%' scope="col">
                                                <div class="form-check py-0 my-0">
                                                    <input type="checkbox" class="form-check-input" checked id="checkAll">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th width='15%'>ID</th>
                                            <th width='15%'>Name</th>
                                            <th>Class</th>
                                            <th>Roll No</th>
                                            <th>Mobile</th>
                                        </tr>
                                    </thead>
                                    <tbody class="student">
    
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary mt-3 mb-0">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>


                {{-- Teacher --}}
                <div id="teacher" class=" tab-pane fade"><br>
                    <div class="teacher">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Teachers List</h4>
                            </div>
                        </div>
                        <form action="{{route('sms.teacher.sendsms')}}" method="POST">
                            @csrf
                            <input type="number" hidden name="template_id" class="template_id">
                            <input type="hidden" name="sms_content" class="sms_content">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width='1%' scope="col">
                                            <div class="form-check py-0 my-0">
                                                <input type="checkbox" class="form-check-input" checked id="checkAllteacher">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th>Name</th>
                                        <th width='30%'>Designation</th>
                                        <th width='20%'>Mobile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachers as $teacher)
                                    <tr>
                                        <td><div class="form-check"><input type="checkbox" class="form-check-input"  checked name="check[]" id="exampleCheck1" value="{{$teacher->id}}"><label class="form-check-label" for="exampleCheck1"></label></div></td>
                                        <td>{{$teacher->name}}</td>
                                        <td>{{$teacher->type}}</td>
                                        <td>{{$teacher->mobile_number}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary mt-3 mb-0">Submit</button>
                        </form>
                    </div>
                </div>


                <div id="staff" class=" tab-pane fade"><br>
                    <div class="teacher">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Staff List</h4>

                            </div>
                        </div>
                        <form action="{{route('sms.staff.sendsms')}}" method="POST">
                            @csrf
                            <input type="number" hidden name="template_id" class="template_id">
                            <input type="hidden" name="sms_content" class="sms_content">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width='1%' scope="col">
                                            <div class="form-check py-0 my-0">
                                                <input type="checkbox" class="form-check-input" checked id="checkAllstaff">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th>Name</th>
                                        <th width='30%'>Designation</th>
                                        <th width='20%'>Mobile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staffs as $staff)
                                    <tr>
                                        <td><div class="form-check"><input type="checkbox" class="form-check-input"  checked name="check[]" id="exampleCheck1" value="{{$staff->id}}"><label class="form-check-label" for="exampleCheck1"></label></div></td>
                                        <td>{{$staff->name}}</td>
                                        <td>{{$staff->type}}</td>
                                        <td>{{$staff->mobile_number}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary mt-3 mb-0">Submit</button>
                        </form>
                    </div>
                </div>

                <div id="committee" class=" tab-pane fade"><br>
                    <div class="teacher">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Staff List</h4>
                            </div>
                        </div>
                        
                        <form action="{{route('sms.comittee.sendsms')}}" method="POST">
                            @csrf
                            <input type="number" hidden name="template_id" class="template_id">
                            <input type="hidden" name="sms_content" class="sms_content">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width='1%' scope="col">
                                            <div class="form-check py-0 my-0">
                                                <input type="checkbox" class="form-check-input" checked id="checkAllcomittee">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th>Name</th>
                                        <th width='30%'>Designation</th>
                                        <th width='20%'>Mobile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($committies as $committiee)
                                    <tr>
                                        <td><div class="form-check"><input type="checkbox" class="form-check-input"  checked name="check[]" id="exampleCheck1" value="{{$committiee->id}}"><label class="form-check-label" for="exampleCheck1"></label></div></td>
                                        <td>{{$committiee->name}}</td>
                                        <td>{{$committiee->type}}</td>
                                        <td>{{$committiee->mobile_number}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary mt-3 mb-0">Submit</button>
                        </form>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>



@endsection

@push('js')
<script>
    $(document).ready(function () {
        $("#teacher-form").hide();
        $("#staff-form").hide();
    });

    $(document).ready(function () {
        $('#sms_template').change(function () {
            var sms_template_id = $("#sms_template").val();
            let sms_template = $('#sms_template option:selected').attr('data');
            $('#message').text(sms_template);
            $('.template_id').val(sms_template_id);
            $(".sms_content").val(sms_template);
        })

        $("#message").keyup(function(){
            var smsContent = $(this).val();
            console.log(smsContent);
            $(".sms_content").val(smsContent);
        });

    })




    var loader = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#fff;display:block;" width="31px" height="31px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                    <circle cx="50" cy="50" fill="none" stroke="#e15b64" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                                        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                                    </circle>
                                    </svg>`;

    $('#student-form').submit(function (e) {
        e.preventDefault();
        var form = $(this);

        var url = "{{ route('student.get-admited-students') }}";
        var exam_id = $('#exam_id').val();
        var session = $("#session_id").val();
        var class_id = $("#class_id").val();


        $('#preload').html(loader);
        $.ajax({
            type: 'GET',
            url: url,
            data: form.serialize(),
            contentType: false,
            processData: false,
            success: (data) => {
                // console.log(data);
                let html = '';
                $('#preload').html('');
                $('#table-wrapp').removeClass('d-none');
                $.each(data.students, function (i, v) {
                    console.log(v);
                    if (v) {
                        let html;
                        html += '<tr>'
                        html +='<td><div class="form-check"><input type="checkbox" class="form-check-input"  checked name="check[]" id="exampleCheck1" value="'+v.id+'"><label class="form-check-label" for="exampleCheck1"></label></div></td>'
                        html +='<td><input type="text" class="form-control" name="id_no['+v.id+']" id="name" value="'+v.id_no+'" readonly></td>'
                        html +='<td><input type="text" class="form-control" name="name['+v.id+']" id="name" value="'+v.name+'" readonly></td>'
                        html +='<td><input type="text" class="form-control" name="name['+v.id+']" id="name" value="'+v.ins_class.name+'" readonly></td>'
                        html +='<td><input type="text" class="form-control" name="roll_no['+v.id+']" id="roll_no" value="'+v.roll_no+'" readonly></td>'
                        html +='<td><input type="text" class="form-control" name="roll_no['+v.id+']" id="roll_no" value="'+v.mobile_number+'" readonly></td>'
                        html +='</tr>'
                        html +='</br>'
                        $('.student').append(html);
                    }
                });
            }
        });


        var searchUrl = "{{route('search-result')}}";
        $.ajax({
            type: 'GET',
            url: searchUrl,
            data: form.serialize(),
            contentType: false,
            processData: false,
            success: function (data) {
                $("#year").html(data.academic_year.title);
                $("#class").html(data.class.name);
                $("#group").html(data.group.name);
                $("#section").html(data.section.name);
                $("#shift").html(data.shifts.name);
            }
        });
    });


    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    $("#checkAllteacher").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    $("#checkAllstaff").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    }); 

    $("#checkAllcomittee").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    }); 

</script>
@endpush
