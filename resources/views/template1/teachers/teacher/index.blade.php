@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css"/>
@endpush
@section('content')
    <div class="main-panel">
        @include($adminTemplate.'.teachers.teachernav')
        <div>
            <div class="card new-table">
                <div class="card">

                    <div class="card-header">
                        <div class="card-title float-left">
                            <h6 style="color: black">Teacher List</h6>
                        </div>
                        <div class="teachers">
                            <a href="{{ route('teacher.export') }}" class="btn btn-success float-right"><i class="fa fa-file-excel"></i>
                        Export Excell</a>
                        <a href="javascript:void(0)" type="submit" class="btn btn-success float-right mb-3 mr-2 pdfBtn"><i class="fa-solid fa-file-pdf"></i>Export pdf</a>
                        <a href="{{ route('teacher.upload.create') }}" class="btn btn-secondary mr-2 float-right"><i class="fa fa-arrow-circle-up"></i>Upload Teacher</a>
                        <a href="{{ route('teacher.create') }}" class="btn btn-primary mr-2 float-right" ><i class="fa fa-plus"></i> Add New</a>
                        <form style="display:none;" class="pdfForm" action="{{route('teacher.exportpdf')}}" method="POST">
                            @csrf
                            <div class="student_list">

                            </div>
                        </form>
                        </div>

                    </div>
                    <div class="card-body">





                        <table id="customTable" class="table table-bordered table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-align:center;">SL</th>
                                    <th style="text-align:center;">Id No</th>
                                    <th style="text-align:center;">Name</th>
                                    <th style="text-align:center;">Image</th>
                                    <th style="text-align:center;">Gender</th>
                                    <th style="text-align:center;">Branch</th>
                                    <th style="text-align:center;">Designation</th>
                                    <th style="text-align:center;">Mobile number</th>
                                    <th style="text-align:center;">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td style="text-align:center;">
                                            <a class="" href="{{ route('teacher.edit',['id' => $teacher->id]) }}"  title="Update Teacher Record">{{ $teacher->id_no }}</a>
                                        </td>
                                        <td style="width:80%">{{ $teacher->name }}</td>
                                        <td style="width:20%; text-align:center;">
                                            <img style="width: 60px!important;height: 60px!important;" src="{{@$teacher->photo ?Config::get('app.s3_url').$teacher->photo:Helper::default_image()}}" alt="">
                                        </td>
                                        <td style="text-align:center;">{{ $teacher->gender }}</td>
                                        <td style="text-align:center;">{{ @$teacher->branch->title }}</td>
                                        <td style="text-align:center;">{{ @$teacher->designation->title }}</td>
                                        <td>{{ $teacher->mobile_number }}</td>
                                        <td>
                                            @if (!$teacher->teacherUser)
                                                <a href="{{route('teacher.create.user',$teacher->id)}}" class="btn btn-warning"><i class="fa fa-user-plus"></i></a>
                                            @endif
                                            <a href="{{route('teacher.destroy', $teacher->id)}}" class="btn btn-danger deleteBtn p-2"><i style="margin-left: 0.3125rem;" class="fa-solid fa-trash"></i></a>
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
            $('#customTable').DataTable(
                {
                            dom: 'Bfrtip',
                            buttons: [ 'copyHtml5',

                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [ 1, 2, 4, 5, 6, 7 ]
                                },
                            },

                            {
                                extend: 'csvHtml5',
                                exportOptions: {
                                    columns: [ 1, 2, 4, 5, 6, 7 ]
                                },
                            },

                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [ 1, 2, 4, 5, 6, 7 ],
                                    title: 'title'
                                },
                                customize: function (doc) {
                                doc.content[1].table.widths =
                                    Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                                },
                            }
                        ]
                        }
            );


            $(".pdfBtn").click(function(){
                $(".pdfForm").submit();
            });
        });
    </script>
@endpush
