@extends($adminTemplate.'.admin.layouts.app')
@section('content')

<div class="main-panel" id="marks-id">
    @include($adminTemplate.'.smsmanagement.topmenu_sms_management')
    <div class="card new-table">
        <div class="card-header">
            <div class="card-title float-left">
                <h6 style="color: black">Teachers SMS</h6>
            </div>
            <div class="card-title float-right">
                <a href="" class="btn btn-primary mr-2" style="width: 175px;height: 27px;">Add New</a>
            </div>
        </div>
        <div class="card-body">
            
                <table id="customTable" class="table table-striped table-bordered table-responsive" >
                    <thead>
                        <tr>
                            
                            <th >Teacher Name</th>
                            <th >Teacher ID</th>
                            <th >Title</th>
                            <th >Description</th>
                            <th >Date</th>
                            <th class="text-center" style="width: 20px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($allsms as $sms)
                            <tr>
                                <td>{{$sms->teacher->name}}</td>
                                <td>{{$sms->teacher->id_no}}</td>
                                <td>{{$sms->title}}</td>
                                <td>{{Str::of($sms->description)->words(10, ' ....')}}</td>
                                <td>{{$sms->created_at}}</td>
                                <td><a class="btn btn-sm btn-danger p-2" href="{{route('sms.teachers-sms.destroy',$sms->id)}}"><i style="margin-left: 0.3125rem;" class="fa-solid fa-trash"></i></a></td>
                            </tr> 
                        @endforeach --}}
                    </tbody>
                </table>
            
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#customTable').DataTable();
    });
    

    
</script>
@endpush
