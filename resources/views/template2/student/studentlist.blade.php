@extends($adminTemplate.'.admin.layouts.app')

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css"/>

@endpush
@section('content')
    <div class="page-body">

        @include($adminTemplate.'.student.studentnav')

        <div class="card new-table">
            <div class="card-body">
                <h6>Search Student</h6>
                <hr>

                <form id="student-form" method="GET">

                    @include('custom-blade.search-student')

                    <div class="row py-2">
                        <div class="col-sm-6" style="display: flex">
                            <br>
                            <button type="submit" id="btn-submit" class="btn btn-primary"> <i
                                    class="fas fa-arrow-circle-down"></i>
                                Proccess</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="preload" style="margin-top: 10px">

        </div>

        <div>
            <div class="card new-table" id="table-card" style="display: none">
                <div class="card-body">
                    <div class="d-flex justify-content-between float-left">
                        <div class="mb-3">
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Student List</h4>
                            <p class="card-title" style="color:rgba(0, 0, 0, 0.5)"> Result Of :<span id="session"></span> , Class- <span id="class"></span> , Shift- <span id="shift"></span> , Category- <span id="category"></span> , Section- <span id="section"></span> , Group- <span id="group"></span></p>
                        </div>
                    </div>

                    <a href="{{ route('student.export') }}" type="submit" class="btn btn-success float-right mb-3"><i class="fa fa-file-excel" aria-hidden="true"></i>
                        Export Excell</a>

                    <a href="javascript:void(0)" type="submit" class="btn btn-success float-right mb-3 mr-2 pdfBtn"><i class="fa-solid fa-file-pdf"></i>Export pdf</a>

                    <div class="student-table">

                    </div>



                    <form style="display:none;" class="pdfForm" action="{{route('student.exportpdf')}}" method="POST">
                        @csrf
                        <div class="student_list">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {

            var loader = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#fff;display:block;" width="31px" height="31px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                        <circle cx="50" cy="50" fill="none" stroke="#e15b64" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                            <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                        </circle>
                        </svg>`;

            $('#student-form').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var class_id = $("#class_id").val();

                var url = "{{ route('student.get-admited-students') }}";
                $('#preload').html(loader);

                let img = "https://png.pngtree.com/png-vector/20210129/ourlarge/pngtree-boys-default-avatar-png-image_2854357.jpg";
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: form.serialize(),
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        console.log(data);
                        let html = '';
                        $('#preload').html('');
                        $('#table-card').css('display', 'block');

                        let photo = '';


                        if(data.search){
                            $.each(data.search,function(i,v){
                                $(`#${i}`).html(v);
                            })
                        }
                        //Loop
                        $.each(data.students, function(i, v){

                            $(".student_list").append(`<input type="hidden" name="student_ids[]" value="${v.id}">`);
                            $(".student_list").append(`<input type="hidden" name="class_id" value="${class_id}">`);


                            let link = "/student/create-user/"+v.id;

                            if(v.photo){
                                photoDiv = `<img src="{{Config::get('app.s3_url')}}<@@PHOTO@@>" width="120" />`;
                                photo = photoDiv.replace("<@@PHOTO@@>",v.photo);
                            }
                            else{
                                if (v.gender == 'Male') {

                                    photo = '<img src="{{asset('male.png')}}" width="120" />';
                                } else {
                                    photo = '<img src="{{asset('female.jpeg')}}" width="120" />';
                                }
                            }

                            let editBtn = `<a href="/student/edit/${v.id}">${v.id_no}</a>`;
                            let dltBtn  = ` <a href="{{route('student.destroy',100)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>`;
                            let deleteBtn = dltBtn.replace('100',v.id);


                            if (v) {
                                html += `<tr>
                                            <td>
                                                ${editBtn}
                                            </td>
                                            <td>
                                                ${photo}
                                            </td>
                                            <td>${v.name}</td>
                                            <td>${v.roll_no}</td>
                                            <td>${v.ins_class.name} - ${v.shift.name} - ${v.section.name}</td>
                                            <td>${v.mobile_number}</td>
                                            <td>${v.gender}</td>
                                            <td>
                                                ${v.student_user != null ? ``:`<a href="${link}" class="btn btn-info"><i class="fa fa-user-plus"></i></a>`}
                                                ${deleteBtn}
                                            </td>
                                        </tr>`;
                            } else {
                                html += `<tr>
                                            <td colspan="6" class="text-center">
                                                <h5 style="color:red">No Student Found!</h5>
                                            </td>

                                        </tr>`;
                            }

                        });

                        let table = `<table id="student-table" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th> Image </th>
                                                <th> Name </th>
                                                <th> Roll No </th>
                                                <th> Class </th>
                                                <th> Mobile Number </th>
                                                <th> Gendar </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ${html}
                                        </tbody>
                                    </table>`;

                        $('.student-table').html(table);
                        $('#student-table').DataTable({
                            dom: 'Bfrtip',
                            order: [[3 , 'asc']],
                            buttons: [ 'copyHtml5',

                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [ 0, 2, 3, 4, 5, 6 ]
                                },
                            },

                            {
                                extend: 'csvHtml5',
                                exportOptions: {
                                    columns: [ 0, 2, 3, 4, 5, 6 ]
                                },
                            },

                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [ 0, 2, 3, 4, 5, 6 ]
                                },
                                customize: function (doc) {
                                doc.content[1].table.widths =
                                    Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                                },
                            }
                        ]
                        });

                    },
                    error: function(data) {
                        $('#image-input-error').text(data.responseJSON.message);
                    }
                });
            });
        });


        $(".pdfBtn").click(function(){
            $(".pdfForm").submit();
        });
    </script>
@endpush
