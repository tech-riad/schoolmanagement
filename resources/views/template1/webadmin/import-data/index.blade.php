@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <style>
        tr { height: 40px;padding-top: 0px;padding-bottom: 0px; }
    </style>
@endpush
@section('content')
    <div class="main-panel" id="message-id">
        @include($adminTemplate.'.webadmin.webadminnav')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Import Data</h4>
                            </div>
                        </div>

                        <div class="">

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
        $(".deleteBtn").click(function () {
            $(".deleteForm").submit();
        });

        $('#home').removeClass('show').removeClass('active');
        $('#setting').addClass('show').addClass('active');


    </script>
@endpush
