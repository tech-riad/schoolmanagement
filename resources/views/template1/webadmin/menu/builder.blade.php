@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.css">
@endpush
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
                    <a href="{{route('menu.item.create',$menu->id)}}"  class="btn-shadow mr-3 btn btn-primary float-right">
                        <i class="fa fa-plus-circle"></i> Create Menu Item
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="menu-builder">
                                <div class="dd">
                                    <ol class="dd-list">
                                        @forelse($menu->menuItems as $item)
                                            <li class="dd-item" data-id="{{$item->id}}">
                                                <div class="item_actions float-right">
                                                        <a href="{{route('menu.item.edit',['id'=>$menu->id,'itemId'=>$item->id])}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                        <a id="delete" href="{{route('menu.item.delete',['id'=>$menu->id,'itemId'=>$item->id])}}" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
                                                </div>
                                                <div class="dd-handle">
                                                        <span>{{$item->title}}</span>
                                                        <small class="url">{{$item->url}}</small>
                                                </div>
                                                @if(!$item->childs->isEmpty())
                                                    <ol class="dd-list">
                                                        @foreach($item->childs as $childItem)
                                                            <li class="dd-item" data-id="{{$childItem->id}}">
                                                                <div class="item_actions float-right">
                                                                    <a href="{{route('menu.item.edit',['id'=>$menu->id,'itemId'=>$childItem->id])}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                                    <a id="delete" href="{{route('menu.item.delete',['id'=>$menu->id,'itemId'=>$childItem->id])}}" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
                                                                </div>
                                                                <div class="dd-handle">
                                                                        <span>{{$childItem->title}}</span>
                                                                        <small class="url">{{$childItem->url}}</small>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ol>
                                                @endif
                                            </li>
                                        @empty
                                            <div class="text-center">
                                                <strong class="badge badge-danger" >No Item Found :)</strong>
                                            </div>
                                        @endforelse
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js"></script>
    <script>
        $('.dd').nestable({maxDepth:2 });
        $('.dd').on('change',function (e){
           console.log(JSON.stringify($('.dd').nestable('serialize')));
           $.post('{{route('menu.order',$menu->id)}}',{
               order: JSON.stringify($('.dd').nestable('serialize')),
               _token : '{{csrf_token()}}'
           },function (data){
               toastr.success('Menus Order Updated :)');
           });
        });
    </script>
@endpush
