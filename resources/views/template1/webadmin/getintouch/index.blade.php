@extends($adminTemplate.'.admin.layouts.app')

@section('content')
      <div class="main-panel" id="marks-id">
        <div id="getintouch-id">
 @include($adminTemplate.'.webadmin.webadminnav')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Get In Touch</h4>

                            </div>
                            <a href="{{ route('getintouch.create') }}" class="btn btn-primary mr-2" style="width: 175px;height: 34px; margin-bottom:15px; display:flex; justify-content:center; align-items:center;">Add New Link</a>
                        </div>

                        <div class="content-wrapper text-primary">
                            <table id="customTable" class="table table-striped table-bordered  table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 10px;">ID</th>
                                        <th style="width: 40px;">Phone</th>
                                        <th style="width: 40px;">Email</th>
                                        <th style="width: 40px;">Address</th>
                                        <th style="width: 40px;">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($getintouch as $getintouch)
                                <tr>
                                     <td>{{$getintouch->id}}</td>
                                      <td>{{$getintouch->phone}}</td>
                                      <td>{{$getintouch->email}}</td>
                                      <td>{{$getintouch->address}}</td>

                                      
                                      <td>
                                      <a href="{{route('getintouch.edit', $getintouch->id)}}" class="btn btn-success p-2"><i style="margin-left: 0.3125rem;" class="fa-solid fa-pen-to-square"></i></a>
                                        
                                        <a href="{{route('getintouch.destory', $getintouch->id)}}" class="btn btn-danger deleteBtn p-2"><i style="margin-left: 0.3125rem;" class="fa-solid fa-trash"></i></a>
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
        </div>
       
    </div>
@endsection
@push('js')
<script>
    $(document).ready(function() {
        $('#customTable').DataTable();
    });

    $(".deleteBtn").click(function () {
    $(".deleteForm").submit();
});

    $('.getintouch').addClass('active');
    $(".home").addClass('active');
</script>
@endpush
