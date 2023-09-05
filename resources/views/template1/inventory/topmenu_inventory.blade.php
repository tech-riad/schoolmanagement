
<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover mr-auto">
                <li class="nav-item {{Request::is('inventory/asset') ? 'active':''}}">
                    <a class="nav-link " href="{{route('inventory.asset.index')}}" id="nav-hov">
                        Asset
                    </a>
                </li>

                <li class="nav-item {{Request::is('inventory/asset-type') ? 'active':''}}">
                    <a class="nav-link" href="{{route('inventory.asset-type.index')}}" id="nav-hov">
                        Asset Type
                    </a>
                </li>
                <li class="nav-item {{Request::is('inventory/item-list') ? 'active':''}}">
                    <a class="nav-link" href="{{route('inventory.item-list.index')}}" id="nav-hov">
                        Item
                    </a>
                </li>
               
                
                
                
            </ul>
        </div>
    </div>
</nav>
