@extends($adminTemplate.'.admin.layouts.app')

@section('content')
<div class="page-body">
    @include($adminTemplate.'.webadmin.webadminnav')
    <div>
        <div class="card new-table">
            <div class="card">

            
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Institutephoto List</h4>
                            <p class="card-description"> Institutephoto </p>
                        </div>
                        <a href="{{ route('institutephoto.create') }}" class="btn btn-primary mr-2"
                            style="width: 175px;height: 34px;">Add New </a>
                    </div>

                    <div class="content-wrapper text-primary">
                        <table id="customTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 20px;">ID</th>
                                    <th style="width:40px;">Image </th>
                                    <th>Title</th>
                                    
                                    <th style="width: 40px;">Status</th>
                                    <th style="width: 20px;">Serial Number</th>
                                    <th style="width: 40px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($institutephoto as $institutephoto)
                                <tr>
                                    <td>{{$institutephoto->id}}</td>
                                    <td><img style="height: 60px; width: 60px;"
                                            src="/uploads/institutephoto/{{$institutephoto->image}}" /></td>
                                    <td>{{$institutephoto->title}}</td>
                                    
                                    <td>
                                        @if ($institutephoto->status == 1)
                                        <span class="badge badge-primary">Active</span>
                                        @else
                                        <span class="badge badge-danger">Inactive</span>
                                        @endif

                                    </td>
                                    <td>{{$institutephoto->sl_no}}</td>

                                    <td>

                                        <a href="{{route('institutephoto.edit', $institutephoto->id)}}"
                                            class="btn btn-success p-2"><i style="margin-left: 0.3125rem;"
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <form class="deleteForm"
                                            action="{{route('institutephoto.destory', $institutephoto->id)}}" hidden
                                            method="POST">

                                            @csrf
                                        </form>
                                        <a href="javascript:void(0)" class="btn btn-danger deleteBtn p-2"><i
                                                style="margin-left: 0.3125rem;" class="fa-solid fa-trash"></i></a>
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

    $('.photos').addClass('active');
    $(".gallery").addClass('active');
    $('#gal').addClass('show').addClass('active')
    $("#home").removeClass('active')

</script>
@endpush
