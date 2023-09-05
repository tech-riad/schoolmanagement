@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div  class="main-panel" id="marks-id">
        @include($adminTemplate.'.accountsmanagement.topmenu_accountsmanagement')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5)">Payment Gateways</h4>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header" style="padding: 10px!important">
                                <h3>Shurjopay</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="">User Name</label>
                                        <input type="text" name="sj_user_name" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="">User Password</label>
                                        <input type="text" name="sj_user_password" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="">Api Key</label>
                                        <input type="text" name="sj_apy_key" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="card-header" style="padding: 10px!important">
                                <h3>Sonali Bank</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="">User Name</label>
                                        <input type="text" name="sbl_user_name" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="">User Password</label>
                                        <input type="text" name="sbl_user_password" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="">Api Key</label>
                                        <input type="text" name="sbl_apy_key" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
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
            $("#accounts_setting").addClass('active');
            $('#settings-nav').removeClass('d-none');
        });
    </script>
@endpush
