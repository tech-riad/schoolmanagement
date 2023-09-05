@extends($adminTemplate.'.admin.layouts.app')

@section('content')
<div class="page-body" id='marks-id'>

    <div id="video-list">
        @include($adminTemplate.'.webadmin.webadminnav')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Video List</h4>
                                <p class="card-description"> Video </p>
                            </div>
                            <a href="{{ route('video.create') }}" class="btn btn-primary mr-2" style="width: 175px;height: 34px; display: flex;
    align-items: center;
    justify-content: center;margin-bottom:15px">Add New video</a>
                        </div>

                        <div class="content-wrapper text-primary">
                            <table id="customTable" class="table table-striped table-bordered table-responsive"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Thumbnail</th>
                                        <th>Date</th>
                                        <th style="width: 40px;">Description</th>
                                        <th>Code</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($video as $video)
                                    <tr>
                                        <td>{{$video->id}}</td>
                                        <td>{!! Str::limit($video->title, 20) !!}</td>
                                        <td><img style="height: 60px; width: 60px;"
                                                src="{{Config::get('app.s3_url').$video->thumbnail}}"/></td>
                                        <td>{{$video->date}}</td>
                                        <td>{!! Str::limit($video->description, 40) !!}</td>
                                        <td>{{$video->code}}</td>
                                        <td>{{$video->type}}</td>
                                        <td> @if ($video->status == 1)
                                            <span class="badge badge-primary">Active</span>
                                            @else
                                            <span class="badge badge-danger">Inactive</span>
                                            @endif</td>
                                        <td>
                                            <a href="{{route('video.edit', $video->id)}}" class="btn btn-success p-2"><i
                                                    style="margin-left: 0.3125rem;"
                                                    class="fa-solid fa-pen-to-square"></i></a>

                                            <a href="{{route('video.destory', $video->id)}}"
                                                class="btn btn-danger deleteBtn p-2"><i style="margin-left: 0.3125rem;"
                                                    class="fa-solid fa-trash"></i></a>
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
    $(document).ready(function () {
        $('#customTable').DataTable();
    });

    $(".deleteBtn").click(function () {
        $(".deleteForm").submit();
    });

    $('.videos').addClass('active');
    $(".home").addClass('active');

</script>
@endpush
