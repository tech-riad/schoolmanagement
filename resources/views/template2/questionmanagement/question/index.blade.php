@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css"/>
@endpush
@section('content')
    <div class="page-body">
        @include($adminTemplate.'.questionmanagement.questionnav')
        <div>
            <div class="card new-table">
                <div class="card">

                    <div class="card-header">
                        <div class="card-title float-left">
                            <h6 style="color: black">Qustion List</h6>
                        </div>
                        {{-- <div class="teachers">
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
                        </div> --}}

                    </div>
                    <div class="card-body">
                        <table id="customTable" class="table table-bordered table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-align:center;">SL</th>
                                    <th style="text-align:center;">Teacher</th>
                                    <th style="text-align:center;">Class</th>
                                    <th style="text-align:center;">Subject</th>
                                    <th style="text-align:center;">Chapter</th>
                                    <th style="text-align:center;">Question</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chapters as $key => $chapter)
                                    <tr>
                                        <td style="text-align:center;">{{$key+1}}</td>
                                        <td style="text-align:center;">{{$chapter->teacher->name}}</td>
                                        <td style="text-align:center;">{{$chapter->ins_class->name}}</td>
                                        <td style="text-align:center;">{{$chapter->subject->sub_name}}</td>
                                        <td style="text-align:center;">{{$chapter->name}}</td>
                                        <td style="text-align:center;">
                                            @foreach ($chapter->questions as $q)
                                                <p class="pb-1 pt-1">{!! Str::limit($q->question, 90, '...')!!}</p>
                                            @endforeach
                                        </td>
                                        <td style="text-align:center;">
                                            <a class="btn btn-sm btn-info" href="javascript:void(0)" onclick="showData({{$chapter->id}})"><i class="fa-solid fa-eye"></i></a>
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

    {{-- grade edit modal --}}
<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="groupModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><span class="text-warning">Question List</span>  <span id="question-info" class="ml-3 text-center"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding-right: 26px; padding-top: 24px;">
                  <span aria-hidden="true" class="text-white">&times;</span>
                </button>
              </div>
            <div class="modal-body p-0">
                <div class="" style="padding-top:0px;height:auto !important;" id="wrapperr">
                    
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
            $('#customTable').DataTable();
        });

        function showData(id) {
        $.ajax({
            url: '/question/show/' + id,
            type: 'GET',
            success: (data) => {
                $("#wrapperr").empty();

                var question='';
                 $.each(data.questions,function(i,v){
                    question += `<div class='col-6 pl-4 p-3' style='border:1px solid #00000020'>${v.question}</div>`;
                });
            

                var html = `
                    <div class="content-wrapper" style='padding-top:21px;'>
                        <div class="row mt-2">
                            ${question}
                        </div>
                     </div>
                `;

                var questionInfo = `
                    ( <span id="class" class='text-white'> Class : ${data.ins_class.name}</span>, 
                    <span id="sub" class='text-white ml-1'> Subject : ${data.subject.sub_name}</span>, 
                    <span class='text-white ml-1' id="chapter"> Chapter : ${data.name}</span> )
                `;
                
                $("#question-info").html(questionInfo);
                $("#wrapperr").html(html);
                $("#showModal").modal('show');
            }
        });
    }
    </script>
@endpush
