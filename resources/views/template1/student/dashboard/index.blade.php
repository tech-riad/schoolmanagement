@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div class="main-panel">

        @include($adminTemplate.'.student.studentnav')

        <div class="card new-table mb-3">
            <div class="card">
                <div class="card-header">
                    <h6>Dashboard</h6>
                    <select name="session_id" class="form-control col-md-2" id="session_id">
                        @foreach($sessions as $session)
                            <option value="{{$session->id}}">{{$session->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="card-body" id="sec-list">




                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {

            let session_id = $('#session_id').val();
            getSections(session_id);

            $('#session_id').change(function (){
               let session_id = $(this).val();
               getSections(session_id);
            });

            function getSections(session_id){
                $.get("{{route('student.get-sections-by-session')}}",{session_id},function (data){
                    let html = '';
                    console.log(data);
                    $.each(data,function (i,val){
                        let row = '';

                        $.each(val,function (idx,value){
                            row += `<div class="card col-md-2" style="margin-left: 30px">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h3 class="mb-0 text-black" id="today_offline_collection">
                                                        ${value.student_count}
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-success ">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-muted font-weight-normal">${value.class}-${value.shift}-${value.name}</p>
                                    </div>
                                </div>`;
                        });

                        html += `<div class="row ${i > 0? 'mt-4':''}">
                                    ${row}
                                </div>`;
                    });
                    $('#sec-list').html(html);
                });
            }
        });
    </script>
@endpush
