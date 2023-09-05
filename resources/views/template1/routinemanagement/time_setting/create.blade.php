@extends($adminTemplate.'.admin.layouts.app')

@push('css')
    <style>
        tr { height: 40px;padding-top: 0px;padding-bottom: 0px; }
    </style>
@endpush

@section('content')
    <div class="main-panel">
        @include($adminTemplate.'.routinemanagement.routineNav')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Period Time Setting</h4>
                            </div>
                            <a href="{{route('routine.time-setting.index')}}" class="btn btn-dark"><i class="fa fa-arrow-left"></i>Back</a>

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

    $(".deleteBtn").click(function(){
        $(".deleteForm").submit();
    });
</script>
@endpush
