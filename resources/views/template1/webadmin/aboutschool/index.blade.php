@extends($adminTemplate.'.admin.layouts.app')

@section('content')
<div class="main-panel">
    @include($adminTemplate.'.webadmin.webadminnav')
    <div>
        <div class="card new-table">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">About School List</h4>
                            <p class="card-description"> About School </p>
                        </div>
                        <a href="{{ route('aboutschool.create') }}" class="btn btn-primary mr-2"
                            style="width: 175px;height: 34px;">Add New Link</a>
                    </div>

                    <div class="content-wrapper text-primary">
                        <table id="customTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">ID</th>
                                    <th>Content</th>
                                    <th style="width: 10px;">Link</th>
                                    <th style="width: 40px;">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aboutschool as $aboutschool)
                                <tr>
                                    <td>{{$aboutschool->id}}</td>
                                    <td>{!! Str::limit($aboutschool->content, 100) !!}</td>
                                    <td>{{$aboutschool->link}}</td>

                                    <td>
                                        <a href="{{route('aboutschool.edit', $aboutschool->id)}}"
                                            class="btn btn-success">Edit</a>
                                        <form class="deleteForm"
                                            action="{{route('aboutschool.destory', $aboutschool->id)}}" hidden
                                            method="POST">

                                            @csrf
                                        </form>
                                        <a href="javascript:void(0)" class="btn btn-danger deleteBtn">Delete</a>
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
@section('javascript')
<script>
    $(document).ready(function () {
        $('#customTable').DataTable();
    });
    $(".deleteBtn").click(function () {
        $(".deleteForm").submit();
    });

</script>
@endsection
