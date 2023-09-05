@extends($adminTemplate.'.admin.layouts.app')

@section('content')
<div class="page-body">
    @include($backendTemplate.'.webadmin.webadminnav')
    <div>
        <div class="card new-table">
            <div class="card">
                <div class="card-header">
                    <div class="card-title float-left">
                        <h6 style="color: black">Create Menu</h6>
                    </div>
                    <a href="{{route('menu.index')}}"  class="btn-shadow mr-3 btn btn-primary float-right">
                        <i class="fa fa-list"></i> Menu List
                    </a>
                </div>
                <form method="POST" action="{{isset($menu)? route('menu.update',$menu->id): route('menu.store')}}">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $menu->name ?? old('name') }}"  autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="15" rows="3" autofocus>{{ $menu->description ?? old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button  type="submit" class="btn btn-primary" style="margin-top: 10px">
                                @isset($menu)
                                    <i class="fas fa-arrow-circle-up"></i>
                                    Update
                                @else
                                    <i class="fa fa-plus-circle"></i>
                                    Create
                                @endisset
                            </button>
                        </div>
                    </div>
                </form>
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
