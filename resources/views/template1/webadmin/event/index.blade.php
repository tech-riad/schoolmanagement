@extends($adminTemplate.'.admin.layouts.app')

@section('content')
      <div class="main-panel" id="event-id">
        @include($adminTemplate.'.webadmin.webadminnav')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Event List</h4>
                                <p class="card-description"> Event </p>
                            </div>
                            <a href="{{ route('event.create') }}" class="btn btn-primary mr-2" style="width: 175px;height: 34px; display: flex;
    align-items: center;
    justify-content: center">Add New Event</a>
                        </div>

                        <div class="">
                            <table id="customTable" class="table table-striped table-bordered table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width='15%'>Title</th>
                                        <th>Image</th>
                                        <th width='25%'>Description</th>
                                        <th>Status</th>
                                        <th>Event Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($event as $event)
                                <tr>
                                      <td>{{$event->title}}</td>
                                      <td><img style="height: 60px; width: 60px;" src="{{Config::get('app.s3_url').$event->image}}"/></td>
                                      <td>{!! Str::limit($event->description, 50) !!}</td>
                                      <td>
                                      @if ($event->status == 1)
                                        <span class="badge badge-primary">Active</span>
                                        @else
                                        <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                      </td>
                                      <td>{{$event->event_date}}</td>

                                      <td>
                                        <a href="{{route('event.edit', $event->id)}}" class="btn btn-success p-2"><i style="margin-left: 0.3125rem;" class="fa-solid fa-pen-to-square"></i></a>
                                        
                                        <a href="{{route('event.destory', $event->id)}}" class="btn btn-danger deleteBtn p-2"><i style="margin-left: 0.3125rem;" class="fa-solid fa-trash"></i></a>
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

    $('.events').addClass('active');
    $(".home").addClass('active');
</script>
@endpush
