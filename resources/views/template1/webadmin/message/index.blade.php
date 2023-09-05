@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <style>
        tr { height: 40px;padding-top: 0px;padding-bottom: 0px; }
    </style>
@endpush
@section('content')
<div class="main-panel" id="message-id">
    @include($adminTemplate.'.webadmin.webadminnav')


    <div>
        <div class="card new-table">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Massage</h4>
                        </div>
                        <a href="{{ route('message.create') }}" class="btn btn-primary p-1 pt-1 mb-2"
                            style="width: 175px;height: 34px; display: flex;
    align-items: center;
    justify-content: center;margin-bottom:15px">Create</a>
                    </div>

                    <div class="">
                        <table id="customTable" class="table table-striped table-bordered table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 80px;">Name</th>
                                    <th style="width: 80px;">Designation</th>
                                    <th style="width: 80px;">Title</th>
                                    <th style="width: 80px;">Image</th>
                                    <th style="width: 80px;">Content</th>
                                    <th style="width: 10px;">Status</th>
                                    <th class="text-center" style="width: 10px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($messages as $message)
                                <tr>
                                    <td>{{ $message->messager_name }}</td>
                                    <td>{{ $message->messager_designation }}</td>
                                    <td>{{ $message->title }}</td>
                                    <td><img src="{{Config::get('app.s3_url').$message->image}}" alt="not found" style="width: 55px;height:55px;"></td>
                                    <td>{!! Str::words($message->content, 9, '...') !!}</td>
                                    <td>
                                        @if ($message->status == 1)
                                        <span class="badge badge-primary">Active</span>
                                        @else
                                        <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('message.edit', $message->id)}}" class="btn btn-success p-2"><i style="margin-left: 0.3125rem;" class="fa-solid fa-pen-to-square"></i></a>
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
    $(document).ready(function () {
        $('#customTable').DataTable();
    });
    $(".deleteBtn").click(function () {
        $(".deleteForm").submit();
    });

    $('.message').addClass('active');
    $(".home").addClass('active');
</script>
@endpush
