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

    <style>
        table.table.table-bordered.table-hover {
            border: 1px solid #000;
        }

    </style>

    <div class="card new-table">
        <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-dark">
                            <tr>
                                <th style="color:#fff !important;" style="width: 50px;">SL#</th>
                                <th style="color:#fff !important;">Class</th>
                                <th style="color:#fff !important;">Day</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Eight</td>
                                <td>Saturday</td>
                            </tr>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>



@endsection
