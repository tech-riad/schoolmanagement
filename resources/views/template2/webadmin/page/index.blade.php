@extends($adminTemplate.'.admin.layouts.app')

@push('css')
    <style>
        td, th {
            text-transform: none;
        }
    </style>
@endpush

@section('content')
<div class="page-body">
    @include($adminTemplate.'.webadmin.webadminnav')
    <div>
        <div class="card new-table">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Page List</h4>
                            <p class="card-description"> All Pages show here </p>
                        </div>
                        <a href="{{ route('page.create') }}" class="btn btn-primary mr-2"
                            style="width: 175px;height: 34px; display:flex;justify-content:center;align-items:center;">Add New Page</a>
                    </div>

                    <div class="content-wrapper text-primary">
                        <table id="customTable" class="table table-striped table-bordered table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">ID</th>
                                    <th style="width: 40px;">Image</th>
                                    <th style="width: 40px;">Title</th>
                                    <th style="width: 40px;">Slug</th>
                                    <th>Content</th>
                                    <th style="width: 20px;">Show</th>
                                    <th style="width: 20px;" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($page as $key=>$page)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img style="height: 60px; width: 60px;"
                                            src="/uploads/pageimages/{{$page->image}}" /></td>
                                    <td>{{$page->title}}</td>
                                    <td>{{$page->slug}}</td>
                                    <td>{!! Str::limit($page->content, 100) !!}</td>
                                    <td>
                                        <a href="{{route('page.admin.show', $page->id)}}"
                                            class="btn btn-success">Show</a>
                                    </td>
                                    <td>
                                        <a href="{{route('page.edit', $page->id)}}" class="btn btn-success">Edit</a>
                                        
                                        {{-- <a href="{{route('page.destory', $page->id)}}" class="btn btn-danger deleteBtn">Delete</a> --}}
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
    

</script>
@endsection





@push('js')
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
<script>
    $('#setting-tab').addClass('active');
    $('.pages').addClass('active');

    $(document).ready(function () {
        $('#customTable').DataTable();
    });

    $(".deleteBtn").click(function () {
        $(".deleteForm").submit();
    });

</script>

@endpush
