@extends($adminTemplate.'.admin.layouts.app')
@section('content')
<div class="main-panel">
    @include($adminTemplate.'.exammanagement.topmenu_exammanagement')
    <div>
        <div class="card new-table">
            <div class="card">
                <div class="card-body">
                    
                    <form id="student-form" action="" method="">
                            @include('custom-blade.search-student2')
                               
                            <button type="submit" class="btn btn-primary mt-3"><i class="fa fa-arrow-down"></i>Process</button>
                            </form>
    <br>
    <center><h3>Result Status of Session... Class...  Category... Group</h3> <br></center>
    <div class="row">
        <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0 text-black">12</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success ">
                                <span class="mdi mdi-school icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Subjects</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0 text-black">5</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success">
                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Marks Entry</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0 text-black">7</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-danger">
                                <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Remaining Entry</h6>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body ">
                    <h6 class="text-muted font-weight-normal">Bangla 1st Paper Pass (20 Students) Failed (10 Students)</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body ">
                    <h6 class="text-muted font-weight-normal">Bangla 2nd Paper Pass (40 Students) Failed (30 Students)</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body ">
                    <h6 class="text-muted font-weight-normal">English 1st Paper Pass (20 Students) Failed (10 Students)</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body ">
                    <h6 class="text-muted font-weight-normal">English 2nd Paper Pass (40 Students) Failed (33 Students)</h6>
                </div>
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
<script>
$(document).ready(function() {
$('#customTable').DataTable();
});
</script>
@endpush
