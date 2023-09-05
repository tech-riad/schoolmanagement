@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <style>
        tr { height: 40px;padding-top: 0px;padding-bottom: 0px; }
    </style>
@endpush
@section('content')
      <div class="page-body" id="notice-id">
        @include($adminTemplate.'.webadmin.webadminnav')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Notice</h4>
                                
                            </div>
                            <a href="{{ route('notice.create') }}" class="btn btn-primary mr-2" style="width: 175px;height: 34px; display: flex;
    align-items: center;
    justify-content: center;margin-bottom:15px">Create</a>
                        </div>

                        <div class="">
                            <table id="customTable" class="table table-striped table-bordered table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 40px;">Title</th>
                                        <th style="width: 40px;">Content</th>
                                        <th style="width: 10px;">Status</th>
                                        <th style="width: 20px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($notices as $key => $notice)
                                        <tr>
                                            <td>{{ $notice->title }}</td>
                                            <td>{!! Str::limit($notice->content, 100) !!}</td>
                                            <td>
                                                @if($notice->status == true)
                                                <span class="badge badge-primary">Active</span>
                                                @else
                                                <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('notice.edit', $notice->id)}}" class="btn btn-success p-2"><i style="margin-left: 0.3125rem;" class="fa-solid fa-pen-to-square"></i></a>
                                                
                                                <a href="{{route('notice.destroy', $notice->id)}}" class="btn btn-danger deleteBtn p-2"><i style="margin-left: 0.3125rem;" class="fa-solid fa-trash"></i></a>
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
@endsection
@push('js')
<script>
    $(document).ready(function() {
        $('#customTable').DataTable();
    });
    $(".deleteBtn").click(function () {
    $(".deleteForm").submit();
});

    $('.notice').addClass('active');
    $(".home").addClass('active');
</script>
@endpush
