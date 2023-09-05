@extends($adminTemplate.'.admin.layouts.app')

@section('content')
<div class="main-panel">
    {{-- @php
        dd($adminTemplate);
    @endphp --}}
    @include($adminTemplate.'.webadmin.webadminnav')
    <div>
        <div class="card new-table">
            <div class="card">
                <div class="card-header">
                    <div class="card-title float-left">
                        <h6 style="color: black">
                            @isset($menuItem)
                                Edit Menu Item
                            @else
                                Add new menu item to (<code>{{$menu->name}}</code>)
                            @endisset
                        </h6>
                    </div>
                    <a href="{{route('menu.builder',$menu->id)}}"  class="btn-shadow mr-3 btn btn-dark float-right">
                        <i class="fas fa-arrow-circle-left"></i> Back To List
                    </a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{isset($menuItem)? route('menu.item.update',['id'=>$menu->id,'itemId'=>$menuItem->id]): route('menu.item.store',$menu->id)}}">
                        @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" type="text" class="form-control form-control-sm @error('title') is-invalid @enderror" name="title" value="{{ $menuItem->title ?? old('title') }}"  autofocus>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                        <div class="form-group">
                            <label for="">Select Slug</label>
                            <select class="form-control" name="" id="slug_id">
                                <option value="">Select once</option>
                                @foreach ($messages as $message)
                                    <option value="{{$message->id}}">{{$message->title}} : {{$message->slug}}</option>
                                @endforeach
                            </select>
                        </div>


                    <div class="form-group">
                        <label for="url">URL for menu item</label>
                        <input  id="menu_url" type="text" class="form-control form-control-sm @error('url') is-invalid @enderror" name="url" value="{{ $menuItem->url ?? old('url') }}"  autofocus>
                        @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="target">Open In</label>
                        <select class="custom-select form-control-sm" name="target" id="target">
                            <option value="_self" @isset($menuItem) {{$menuItem->target === '_self'? "selected":""}} @endisset>Same Tab/Window</option>
                            <option value="_blank" @isset($menuItem) {{$menuItem->target === '_blank'? "selected":""}} @endisset>New Tab</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button  type="submit" class="btn btn-primary" style="margin-top: 10px">
                            @isset($menuItem)
                                <i class="fas fa-arrow-circle-up"></i>
                                Update
                            @else
                                <i class="fa fa-plus-circle"></i>
                                Create
                            @endisset
                        </button>
                    </div>
                    </form>
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

        $("#slug_id").on('change',function(){
            var id = $(this).val();
            $.ajax({
                url     : '/webadmin/message/slug/'+id,
                type    : 'GET',
                success : function(data){
                    $("#menu_url").empty();
                    $("#menu_url").val('/page/'+data.slug);
                }
       });
    });
    
        $('.banner').addClass('active');
        $(".home").addClass('active');
</script>
@endpush
