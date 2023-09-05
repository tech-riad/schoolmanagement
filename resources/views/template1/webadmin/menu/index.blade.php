@extends($adminTemplate.'.admin.layouts.app')

@section('content')
<div class="main-panel">
    @include($adminTemplate.'.webadmin.webadminnav')
    <div>
        <div class="card new-table">
            <div class="card">
                <div class="card-header">
                    <div class="card-title float-left">
                        <h6 style="color: black">Menu List</h6>
                    </div>
                    <a href="{{route('menu.create')}}"  class="btn-shadow mr-3 btn btn-primary float-right">
                        <i class="fa fa-plus-circle"></i> Create Menu
                    </a>
                </div>
                <div class="card-body">
                    <table id="customTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menus as $key => $menu)
                            <tr>
                                <td class="text-center">{{$key+1}}</td>
                                <td class="text-primary">{{$menu->name}}</td>
                                <td class="text-center">{{$menu->description}}</td>
                                <td class="text-center">
                                    <a href="{{route('menu.builder',$menu->id)}}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Builder</a>
                                    <a href="{{route('menu.edit',$menu->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                    <a id="delete" href="{{route('menu.delete',$menu->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>
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
        $('.setting-tab').addClass('active');
        $(".home").addClass('active');
</script>
@endpush
