@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <style>
        tr { height: 40px;padding-top: 0px;padding-bottom: 0px; }
    </style>
@endpush
@section('content')
    <div class="main-panel" id="marks-id">

        @include($adminTemplate.'.academic.academicnav')
        <div>
            <div class="card new-table">
                <div class="card-header">
                    <div class="card-title float-left">
                        <h6 style="color: black">Transfered Student List</h6>
                    </div>
                    <div class="wrapper">
                        <a href="{{route('academic.transfer-certificate.create')}}" class="btn btn-primary mr-2 float-right"><i class="fa fa-arrow-circle-right"></i> Transfer Student</a>
                        @if($t_students->count())
                            <a href="javascript:void(0)" id="downloadBtn" class="btn btn-primary text-white float-right mr-2"><i class="fa-solid fa-file-pdf"></i>Pdf Generates</a> 
                        @endif
                    </div>
                    
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <table id="customTable" class="table table-striped table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th> Name </th>
                                <th> Session </th>
                                <th> Class </th>
                                <th> Group </th>
                                <th width='9%' class="text-center"> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($t_students as $key=>$s)

                                    <tr>
                                        <td>{{$s->name}}</td>
                                        <td>{{$s->session}}</td>
                                        <td>{{$s->class}}</td>
                                        <td>{{$s->group}}</td>
                                        <td>
                                            <a href="{{route('academic.transfer-certificate.view',$s->id)}}" class="btn btn-sm btn-info p-1"><i style="margin-left: 0.3125rem;" class="fa-solid fa-eye"></i></a>
                                            <a href="{{route('academic.transfer-certificate.downloadPdf',$s->id)}}" class="btn btn-sm btn-primary p-1"><i style="margin-left: 0.3125rem;" class="fa-solid fa-download"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>

                    <form action="{{route('academic.transfer-certificate.alldownload')}}" hidden id="download-form" method="POST">
                        @csrf

                        @foreach ($t_students as $key=>$s)
                            <input type="number" name="student_id[]" hidden value='{{$s->id}}'>
                        @endforeach

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#customTable').DataTable();
    });

    $("#downloadBtn").click(function(){
        $("#download-form").submit();
    });
</script>
@endpush
