@extends($adminTemplate.'.admin.layouts.app')

@push('css')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
    rel="stylesheet">
@endpush

@section('content')
<div class="main-panel">
    @include($adminTemplate.'.attendance.partials.attendancenav')
    <div>
        <div class="card new-table">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <div>
                        <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Auto Sms Settings</h4>
                    </div>
                </div>
                <div class="content-wrapper text-primary">

                    <form class="" id="presentSMS-form" method="GET">
                        <div class="row mt-2">
                            <div class="col-3">
                                <h5 class="p-2 text-white" style="background-color: #156823">Teacher's Present SMS</h5>
                            </div>

                            <div class="col-1">
                                <div class="input-group mb-2">
                                    <input type="checkbox" data-toggle="toggle" {{@$presentSMS->status == 1 ? 'checked' : ''}} data-onstyle="primary" value="1" name="status">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="inlineFormInputGroup" value="{{@$presentSMS->content}}" name="content" placeholder="Enter SMS Content Here">
                                </div>
                            </div>

                            <div class="col-2">
                                <button type="submit" class="btn text-white" style="background-color: #10405d">Update</button>
                                <a class="btn btn-success" href="{{route('attendance.autosmssetting.reset-template','teacher-present')}}"><i class="fa-solid fa-window-restore"></i></a>
                            </div>
                        </div>
                    </form>


                    <form class="" id="absentSMS-form" method="GET">
                        <div class="row mt-2">
                            <div class="col-3">
                                <h5 class="p-2 text-white" style="background-color: #a13b3b">Teacher's Absent SMS</h5>
                            </div>

                            <div class="col-1">
                                <div class="input-group mb-2">
                                    <input type="checkbox" data-toggle="toggle" {{@$absentSMS->status == 1 ? 'checked' : ''}} data-onstyle="primary" value="1" name="status">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="inlineFormInputGroup" value="{{@$absentSMS->content}}" name="content" placeholder="Enter SMS Content Here">
                                </div>
                            </div>

                            <div class="col-2">
                                <button type="submit" class="btn text-white" style="background-color: #10405d">Update</button>
                                <a class="btn btn-success" href="{{route('attendance.autosmssetting.reset-template','teacher-absent')}}"><i class="fa-solid fa-window-restore"></i></a>
                            </div>
                        </div>
                    </form>


                    <form class="" id="studentpresentSMS-form" method="GET">
                        <div class="row mt-2">
                            <div class="col-3">
                                <h5 class="p-2 text-white" style="background-color: #47247c">Student's Present SMS</h5>
                            </div>

                            <div class="col-1">
                                <div class="input-group mb-2">
                                    <input type="checkbox" data-toggle="toggle" {{@$studentpresentSMS->status == 1 ? 'checked' : ''}} data-onstyle="primary" value="1" name="status">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="inlineFormInputGroup" value="{{@$studentpresentSMS->content}}" name="content" placeholder="Enter SMS Content Here">
                                </div>
                            </div>

                            <div class="col-2">
                                <button type="submit" class="btn text-white" style="background-color: #10405d">Update</button>
                                <a class="btn btn-success" href="{{route('attendance.autosmssetting.reset-template','student-present')}}"><i class="fa-solid fa-window-restore"></i></a>
                            </div>
                        </div>
                    </form>


                    <form class="" id="studentabsentSMS-form" method="GET">
                        <div class="row mt-2">
                            <div class="col-3">
                                <h5 class="p-2 text-white" style="background-color: #08864f">Student's Absent SMS</h5>
                            </div>

                            <div class="col-1">
                                <div class="input-group mb-2">
                                    <input type="checkbox" data-toggle="toggle" {{@$studentabsentSMS->status == 1 ? 'checked' : ''}} data-onstyle="primary" value="1" name="status">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="inlineFormInputGroup" value="{{@$studentabsentSMS->content}}" name="content" placeholder="Enter SMS Content Here">
                                </div>
                            </div>

                            <div class="col-2">
                                <button type="submit" class="btn text-white" style="background-color: #10405d">Update</button>
                                <a class="btn btn-success" href="{{route('attendance.autosmssetting.reset-template','student-absent')}}"><i class="fa-solid fa-window-restore"></i></a>
                            </div>
                        </div>
                    </form>


                    <form class="" id="delaySMS-form" method="GET">
                        <div class="row mt-2">
                            <div class="col-3">
                                <h5 class="p-2 text-white" style="background-color: #10405d">Teacher's Delay SMS</h5>
                            </div>

                            <div class="col-1">
                                <div class="input-group mb-2">
                                    <input type="checkbox" data-toggle="toggle" {{@$delaySMS->status == 1 ? 'checked' : ''}} data-onstyle="primary" value="1" name="status">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="inlineFormInputGroup" value="{{@$delaySMS->content}}" name="content" placeholder="Enter SMS Content Here">
                                </div>
                            </div>

                            <div class="col-2">
                                <button type="submit" class="btn text-white" style="background-color: #10405d">Update</button>
                                <a class="btn btn-success" href="{{route('attendance.autosmssetting.reset-template','teacher-delay')}}"><i class="fa-solid fa-window-restore"></i></a>
                            </div>
                        </div>
                    </form>


                    <form class="" id="studentdelaySMS-form" method="GET">
                        <div class="row mt-2">
                            <div class="col-3">
                                <h5 class="p-2 text-white" style="background-color: #2e77a4">Student's Delay SMS</h5>
                            </div>

                            <div class="col-1">
                                <div class="input-group mb-2">
                                    <input type="checkbox" data-toggle="toggle" {{@$studentdelaySMS->status == 1 ? 'checked' : ''}} data-onstyle="primary" value="1" name="status">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="inlineFormInputGroup" value="{{@$studentdelaySMS->content}}" name="content" placeholder="Enter SMS Content Here">
                                </div>
                            </div>

                            <div class="col-2">
                                <button type="submit" class="btn text-white" style="background-color: #2e77a4">Update</button>
                                <a class="btn btn-success" href="{{route('attendance.autosmssetting.reset-template','student-delay')}}"><i class="fa-solid fa-window-restore"></i></a>
                            </div>
                        </div>
                    </form>

                    <form class="" id="earlySMS-form" method="GET">
                        <div class="row mt-2">
                            <div class="col-3">
                                <h5 class="p-2 text-white" style="background-color: #09327a">Teacher's Early SMS</h5>
                            </div>

                            <div class=" col-1">
                                <div class="input-group mb-2">
                                    <input type="checkbox" data-toggle="toggle" name="status" value="1" {{@$earlySMS->status == 1 ? 'checked' : ''}} data-onstyle="success">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="content" id="inlineFormInputGroup" value="{{@$earlySMS->content}}" placeholder="Enter SMS Content Here">
                                </div>
                            </div>

                            <div class="col-2">
                                <button type="submit" class="btn text-white" style="background-color: #09327a">Update</button>
                                <a class="btn btn-success" href="{{route('attendance.autosmssetting.reset-template','teacher-early')}}"><i class="fa-solid fa-window-restore"></i></a>
                            </div> 
                        </div>
                    </form>


                    <form class="" id="studentearlySMS-form" method="GET">
                        <div class="row mt-2">
                            <div class="col-3">
                                <h5 class="p-2 text-white" style="background-color:#2d4d87">Student's Early SMS</h5>
                            </div>

                            <div class=" col-1">
                                <div class="input-group mb-2">
                                    <input type="checkbox" data-toggle="toggle" name="status" value="1" {{@$studentearlySMS->status == 1 ? 'checked' : ''}} data-onstyle="success">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="content" id="inlineFormInputGroup" value="{{@$studentearlySMS->content}}" placeholder="Enter SMS Content Here">
                                </div>
                            </div>

                            <div class="col-2">
                                <button type="submit" class="btn text-white" style="background-color:#2d4d87">Update</button>
                                <a class="btn btn-success" href="{{route('attendance.autosmssetting.reset-template','student-early')}}"><i class="fa-solid fa-window-restore"></i></a>
                            </div>
                        </div>
                    </form>


                    <form class="" id="StudentLeaveSMS-form" method="GET">
                        <div class="row mt-2">
                            <div class="col-3">
                                <h5 class="p-2 text-white" style="background-color:#603184">Student Leave SMS</h5>
                            </div>

                            <div class=" col-1">
                                <div class="input-group mb-2">
                                    <input type="checkbox" name="status" {{@$stuLeavesms->status == 1 ? 'checked' : ''}} value="1"  data-toggle="toggle"  data-onstyle="success">
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" value="{{@$stuLeavesms->content}}" name="content" id="inlineFormInputGroup" placeholder="Enter SMS Content Here">
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="input-group mb-2">
                                    <input type="number" class="form-control" value="{{@$stuLeavesms->number}}" name="number" id="inlineFormInputGroup" placeholder="Enter Number Here">
                                </div>
                            </div>

                            <div class="col-2">
                                <button type="submit" class="btn text-white" style="background-color:#603184">Update</button>
                                <a class="btn btn-success" href="{{route('attendance.autosmssetting.reset-template','student-leave')}}"><i class="fa-solid fa-window-restore"></i></a>
                            </div>
                        </div>
                    </form>

                    <form class="" id="teacherLeaveSMS-form" method="GET">
                        <div class="row mt-2">
                            <div class="col-3">
                                <h5 class="p-2 text-white" style="background-color: #04726f">Teacher Leave SMS</h5>
                            </div>

                            <div class=" col-1">
                                <div class="input-group mb-2">
                                    <input type="checkbox" value="1" name="status" {{@$teacherLeavesms->status == 1 ? 'checked' : ''}} data-toggle="toggle" data-onstyle="dark">
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="inlineFormInputGroup" value="{{@$teacherLeavesms->content}}" name="content" placeholder="Enter SMS Content Here">
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="input-group mb-2">
                                    <input type="number" class="form-control" value="{{@$teacherLeavesms->number}}" name="number" id="inlineFormInputGroup" placeholder="Enter Number Here">
                                </div>
                            </div>

                            <div class="col-2">
                                <button type="submit" class="btn text-white" style="background-color: #04726f">Update</button>
                                <a class="btn btn-success" href="{{route('attendance.autosmssetting.reset-template','teacher-leave')}}"><i class="fa-solid fa-window-restore"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
</script>

<script>
    
    $(document).ready(function(){


        $("#presentSMS-form").submit(function(e){
            e.preventDefault();

            var form = $(this);
            var url  = "{{route('attendance.autosmssetting.present-sms')}}";

            $.ajax({
                type: 'GET',
                url: url,
                data: form.serialize(),
                contentType: false,
                processData: false,
                success: function(data){
                    console.log(data);
                    if (data.status == '200') {
                            Toast.fire({
                                icon: 'success',
                                title: data['message']
                            });
                        }
                }
            });
        });


        $("#absentSMS-form").submit(function(e){
            e.preventDefault();

            var form = $(this);
            var url  = "{{route('attendance.autosmssetting.absent-sms')}}";

            $.ajax({
                type: 'GET',
                url: url,
                data: form.serialize(),
                contentType: false,
                processData: false,
                success: function(data){
                    console.log(data);
                    if (data.status == '200') {
                            Toast.fire({
                                icon: 'success',
                                title: data['message']
                            });
                        }
                }
            });
        });

        

        $("#studentpresentSMS-form").submit(function(e){
            e.preventDefault();

            var form = $(this);
            var url  = "{{route('attendance.autosmssetting.studentpresent-sms')}}";

            $.ajax({
                type: 'GET',
                url: url,
                data: form.serialize(),
                contentType: false,
                processData: false,
                success: function(data){
                    console.log(data);
                    if (data.status == '200') {
                            Toast.fire({
                                icon: 'success',
                                title: data['message']
                            });
                        }
                }
            });
        });



        $("#studentabsentSMS-form").submit(function(e){
            e.preventDefault();

            var form = $(this);
            var url  = "{{route('attendance.autosmssetting.studentabsent-sms')}}";

            $.ajax({
                type: 'GET',
                url: url,
                data: form.serialize(),
                contentType: false,
                processData: false,
                success: function(data){
                    console.log(data);
                    if (data.status == '200') {
                            Toast.fire({
                                icon: 'success',
                                title: data['message']
                            });
                        }
                }
            });
        });



        $("#delaySMS-form").submit(function(e){
            e.preventDefault();

            var form = $(this);
            var url  = "{{route('attendance.autosmssetting.delay-sms')}}";

            $.ajax({
                type: 'GET',
                url: url,
                data: form.serialize(),
                contentType: false,
                processData: false,
                success: function(data){
                    console.log(data);
                    if (data.status == '200') {
                            Toast.fire({
                                icon: 'success',
                                title: data['message']
                            });
                        }
                }
            });
        });


        $("#studentdelaySMS-form").submit(function(e){
            e.preventDefault();

            var form = $(this);
            var url  = "{{route('attendance.autosmssetting.student-delay-sms')}}";

            $.ajax({
                type: 'GET',
                url: url,
                data: form.serialize(),
                contentType: false,
                processData: false,
                success: function(data){
                    console.log(data);
                    if (data.status == '200') {
                            Toast.fire({
                                icon: 'success',
                                title: data['message']
                            });
                        }
                }
            });
        });

        $("#earlySMS-form").submit(function(e){
            e.preventDefault();
            var form = $(this);
            var url  = "{{route('attendance.autosmssetting.early-sms')}}";

            $.ajax({
                type: 'GET',
                url: url,
                data: form.serialize(),
                contentType: false,
                processData: false,
                success: function(data){
                    console.log(data);
                    if (data.status == '200') {
                            Toast.fire({
                                icon: 'success',
                                title: data['message']
                            });
                        }
                }
            });
        });


        $("#studentearlySMS-form").submit(function(e){
            e.preventDefault();
            var form = $(this);
            var url  = "{{route('attendance.autosmssetting.student-early-sms')}}";

            $.ajax({
                type: 'GET',
                url: url,
                data: form.serialize(),
                contentType: false,
                processData: false,
                success: function(data){
                    console.log(data);
                    if (data.status == '200') {
                            Toast.fire({
                                icon: 'success',
                                title: data['message']
                            });
                        }
                }
            });
        });

        

        $("#StudentLeaveSMS-form").submit(function(e){
            e.preventDefault();
            var form = $(this);
            var url  = "{{route('attendance.autosmssetting.student-leave-sms')}}";

            $.ajax({
                type: 'GET',
                url: url,
                data: form.serialize(),
                contentType: false,
                processData: false,
                success: function(data){
                    console.log(data);
                    if (data.status == '200') {
                            Toast.fire({
                                icon: 'success',
                                title: data['message']
                            });
                        }
                }
            });
        });

        
        $("#teacherLeaveSMS-form").submit(function(e){
            e.preventDefault();
            var form = $(this);
            var url  = "{{route('attendance.autosmssetting.teacher-leave-sms')}}";

            $.ajax({
                type: 'GET',
                url: url,
                data: form.serialize(),
                contentType: false,
                processData: false,
                success: function(data){
                    console.log(data);
                    if (data.status == '200') {
                            Toast.fire({
                                icon: 'success',
                                title: data['message']
                            });
                        }
                }
            });
        });
        
    });


    $('.setting').closest('li').addClass('custom_nav');
    $("#setting-item").removeClass('d-none');
    $('.autosms').addClass('custom_nav');
</script>
@endpush
