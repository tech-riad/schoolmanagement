@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <style>
        tr { height: 40px;padding-top: 0px;padding-bottom: 0px; }
    </style>
@endpush
@section('content')
<div class="main-panel" id="webadmin-id">
    
    @include($adminTemplate.'.webadmin.webadminnav')
    <div>
        <div class="card new-table">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Banner List</h4>
                            {{-- <p class="card-description"> Banner </p> --}}
                        </div>
                        <a href="{{ route('banner.create') }}" class="btn btn-primary p-2 pt-2 mb-2"
                            style="width: 175px;">Add New Banner</a>
                    </div>

                    <div class="">
                        <table id="customTable" class="table table-striped table-bordered table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 40px;">Banner</th>
                                    <th style="width: 40px;">Title</th>
                                    <th style="width: 800px;">Description</th>
                                    <th style="width: 40px;">Slug</th>
                                    <th style="width: 40px;">Serial Number</th>
                                    <th style="width: 40px;">Status</th>
                                    <th class="text-center" style="width: 20px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banner as $banner)
                                <tr>
                                    <td><img style="height: 60px; width: 60px;" src="{{Config::get('app.s3_url').$banner->image}}"></td>
                                    <td>{{$banner->imagetitle}}</td>
                                    <td>{!! Str::limit($banner->description, 100) !!}</td>
                                    <td>{{$banner->slug}}</td>
                                    <td>{{$banner->sl_no}}</td>
                                    <td>
                                    @if ($banner->status == 1)
                                        <span class="badge badge-primary">Active</span>
                                        @else
                                        <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('banner.edit', $banner->id)}}" class="btn btn-success p-2"><i style="margin-left: 0.3125rem;" class="fa-solid fa-pen-to-square"></i></a>
                                        
                                        <a href="{{route('banner.destory', $banner->id)}}" class="btn btn-danger deleteBtn p-2"><i style="margin-left: 0.3125rem;" class="fa-solid fa-trash"></i></a>
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

    // $('#tablist li a').removeClass('active')
    //     $('#about-tab').addClass('active')
    //     $('#myTabContent nav').removeClass('show').removeClass('active')
    //     $('#about').addClass('show').addClass('active')
        $('.banner').addClass('active');
        $(".home").addClass('active');
</script>
@endpush
