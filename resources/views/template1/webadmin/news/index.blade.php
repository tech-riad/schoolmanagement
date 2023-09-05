@extends($adminTemplate.'.admin.layouts.app')

@section('content')
      <div class="main-panel" id="news-id">
        @include($adminTemplate.'.webadmin.webadminnav')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Latest News</h4>
                                <p class="card-description"> News </p>
                            </div>
                            <a href="{{ route('news.create') }}" class="btn btn-primary mr-2" style="width: 175px;height: 34px; display: flex;
    align-items: center;
    justify-content: center">Add New news</a>
                        </div>

                        <div class="">
                            <table id="customTable" class="table table-striped table-bordered  table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th >Title</th>
                                        <th>Image</th>
                                        <th >Description</th>
                                        <th>Status</th>
                                        <th>Published Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($news as $news)
                                <tr>
                                      <td>{{$news->title}}</td>
                                      <td><img style="height: 60px; width: 60px;" src="{{Config::get('app.s3_url').$news->image}}"/></td>
                                      <td>{!! Str::limit($news->description, 100) !!}</td>
                                      <td>
                                        @if ($news->status == 1)
                                        <span class="badge badge-primary">Active</span>
                                        @else
                                        <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                      <td>{{$news->published_date}}</td>

                                      <td>
                                        <a href="{{route('news.edit', $news->id)}}" class="btn btn-success p-2"><i style="margin-left: 0.3125rem;" class="fa-solid fa-pen-to-square"></i></a>
                                        
                                        <a href="{{route('newses.destroy', $news->id)}}" class="btn btn-danger deleteBtn p-2"><i style="margin-left: 0.3125rem;" class="fa-solid fa-trash"></i></a>
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

    $('.news').addClass('active');
    $(".home").addClass('active');
</script>
@endpush
