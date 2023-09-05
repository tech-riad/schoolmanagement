@extends('parentportal.layout.app')

@section('content')

<div  class="main-panel">
        <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navigation">
                @include('parentportal.topmenu_dairyandtask')
                </div>
            </div>
        </nav>
        <h2>Online Class Routine</h2>
</div>

@endsection