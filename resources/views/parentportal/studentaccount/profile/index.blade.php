@extends('parentportal.layout.app')

@section('content')
<div  class="main-panel">
    <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navigation">
                @include('parentportal.topmenu_profile')

            </div>
        </div>
    </nav>

    <div class="card new-table">
        <div class="card">
            <div class="card-header ">
                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Student Information</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-7">
                        <table class="table table-hover table-responsive{-sm|-md|-lg|-xl}">
                            
                            <tbody>
                                <tr>
                                    <th scope="row">Birth date</th>
                                    <td>01-01-2015</td>
                                    
                                </tr>
                                <tr>
                                    <th scope="row">Blood Group</th>
                                    <td>A+</td>
                                    
                                </tr>
                                <tr>
                                    <th scope="row">Birth ID</th>
                                    <td>20152692502308446</td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-4">
                      <div >
                      <img src="..." alt="..." class="img-thumbnail">
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>



@endsection
