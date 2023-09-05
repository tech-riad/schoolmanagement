@extends('teacherpanel.layout.app')
@push('css')
<style>
    table thead th {
        background: #ddd !important;
        text-transform: uppercase;
        color: #777 !important;
        font-weight: 600;
    }

</style>
@endpush
@section('content')
<div class="main-panel">
    @include('teacherpanel.question.questionnav')
    <div class="content-wrapper">
        <div class="card new-table">
            <div class="card-header">
                <div class="card-title float-left">
                    <h6 style="color: black">Question List</h6>
                </div>
                <div class="btn-wrapper">
                    <a href="{{route('teacherpanel.question.create')}}" class="btn btn-primary mr-2 float-right"><i
                            class="fa fa-plus"></i>Add New</a>
                </div>

            </div>
            <div class="card-body">
                <table id="customTable" class="table table-bordered table-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">Class</th>
                            <th class="text-center">Subject</th>
                            <th class="text-center">Chapter</th>
                            <th class="text-center">Questions</th>
                            <th width=10% class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($chapters as $key => $chapter)
                        <tr>
                            <td class="text-left">{{$chapter->ins_class->name}}</td>
                            <td class="text-left">{{$chapter->subject->sub_name}}</td>
                            <td class="text-left">{{$chapter->name}}</td>
                            <td class="text-left">
                                @foreach ($chapter->questions as $q)
                                <p class="">{!! Str::limit($q->question, 90, '...')!!}</p>
                                @endforeach
                            </td>
                            <td width=10% class="text-center">
                                <a class="btn btn-sm btn-info" href="javascript:void(0)" onclick="showData({{$chapter->id}})"><i class="fa-solid fa-eye"></i></a>
                                <a class="btn btn-sm btn-primary" href="{{route('teacherpanel.question.edit',$chapter->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



{{-- question show modal --}}
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
<script>
    $(document).ready(function () {
        $('#customTable').DataTable();
    });

    function showData(id) {
        $.ajax({
            url: '/teacherpanel/question/show/' + id,
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


    $(".theory_nav").addClass('custom_nav');
</script>
@endpush
