@extends($adminTemplate.'.admin.layouts.app')

@section('content')
      <div class="main-panel" id="marks-id">
        <div id="link-id">
        @include($adminTemplate.'.webadmin.webadminnav')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Social Links List</h4>
                                <p class="card-description"> Social Links </p>
                            </div>
                        </div>

                        <div class="content-wrapper text-primary">
                            <table id="customTable" class="table table-striped table-bordered table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 10px;">ID</th>
                                        <th style="width: 10px;">Facebook</th>
                                        <th style="width: 10px;" >Linkedin</th>
                                        <th style="width: 10px;">Twitter</th>
                                        <th style="width: 10px;">Youtube</th>

                                        <th style="width: 10px;">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($sociallink as $sociallink)
                                <tr>
                                     <td>{{$sociallink->id}}</td>
                                      <td>{{$sociallink->facebook}}</td>
                                      <td>{{$sociallink->linkedin}}</td>
                                      <td>{{$sociallink->twitter}}</td>
                                      <td>{{$sociallink->youtube}}</td>
                                      
                                      <td>
                                      <a href="{{route('sociallink.edit', $sociallink->id)}}" class="btn btn-success p-2"><i style="margin-left: 0.3125rem;" class="fa-solid fa-pen-to-square"></i></a>
                                        
                                        <a href="{{route('sociallink.destory', $sociallink->id)}}" class="btn btn-danger deleteBtn p-2"><i style="margin-left: 0.3125rem;" class="fa-solid fa-trash"></i></a>
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
$('.social_link').addClass('active');
$(".home").addClass('active');
</script>
@endpush
