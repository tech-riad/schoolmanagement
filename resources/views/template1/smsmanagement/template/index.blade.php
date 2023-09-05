@extends($adminTemplate.'.admin.layouts.app')
@section('content')

<div class="main-panel" id="marks-id">
    @include($adminTemplate.'.smsmanagement.topmenu_sms_management')
    <div class="card new-table">
        <div class="card-header">
            <div class="card-title float-left">
                
                <h6 style="color: black">Template</h6>
            </div>
            <div class="card-title float-right btn-wrapper">
                {{-- <a href="" class="btn btn-primary mr-2" style="width: 175px;height: 27px;">Create For Student</a> --}}
                <a href="{{route('sms.template.create')}}" class="btn btn-primary mr-2" style="width: 175px;height: 27px;">Create Template</a>
            </div>
        </div>
        <div class="card-body">
            
                <table id="customTable" class="table table-striped table-bordered table-responsive" >
                    <thead>
                        <tr>
                            <th >#</th>
                            {{-- <th >Designation</th> --}}
                            <th >Title</th>
                            <th >Message</th>
                            <th >Date</th>
                            <th class="text-center" style="width: 20px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($smstemplates as $key => $t)
                            <tr>
                                <td>{{$key+1}}</td>
                                {{-- <td>{{$t->designation}}</td> --}}
                                <td>{{$t->title}}</td>
                                <td>{!! Str::of($t->message)->words(8, ' ....') !!}</td>
                                <td>{{$t->created_at}}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary p-2" href="{{route('sms.template.edit',$t->id)}}"><i style="margin-left: 0.3125rem;" class="fa-solid fa-pen-to-square"></i></a>
                                    <a class="btn btn-sm btn-danger p-2" href="{{route('sms.template.destroy',$t->id)}}"><i style="margin-left: 0.3125rem;" class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
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
