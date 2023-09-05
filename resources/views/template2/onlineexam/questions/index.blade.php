@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <style>
        tr { height: 40px;padding-top: 0px;padding-bottom: 0px; }
    </style>
@endpush
@section('content')
<div  class="page-body" id="marks-id">
    @include($adminTemplate.'.onlineexam.onlineexam_topmenu')
    <div>
        <div class="card new-table">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Question List</h4>
                            {{-- <p class="card-description"> Banner </p> --}}
                        </div>
                        <a href="" class="btn btn-primary p-2 pt-2 mb-2"
                            style="width: 175px;">Add New Question</a>
                    </div>

                    <div class="">
                        <table id="customTable" class="table table-striped table-bordered table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 40px;">SL</th>
                                    <th style="width: 40px;">Class</th>
                                    <th style="width: 40px;">Subject</th>
                                    <th style="width: 40px;">Time</th>
                                    <th style="width: 800px;">Question</th>
                                    <th class="text-center" style="width: 20px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
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
@push('js')
<script>
    $(document).ready(function () {
        $('#customTable').DataTable();
    });
    $('.question').addClass('active');
        
</script>
@endpush
