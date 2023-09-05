<!-- expired modal starts here -->
<div class="modal fade" id="expiredModal" tabindex="-1" role="dialog" aria-labelledby="expiredModal"
     aria-hidden="true">
    <div class="modal-dialog" id="modal-dialog" role="document">
        <div class="modal-content relative">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="content" style="margin-top: 40px!important;">
                            <h6 class="text-center text-danger" style="font-weight: bold" id="msg_head"></h6>
                            <div class="icon mt-4" style="text-align: center;font-size: 26px;">
                                <i class="fa fa-credit-card"></i>
                            </div>
                            <p  class="expire-pera" id="msg_body" style="text-align: justify;padding: 0 8px"></p>
                            <p style="color: #009900;
                            font-size: 12px;
                            margin-top: 77px;
                            font-weight: bold;
                            padding: 8px;">EDTECO EDUCATION MANAGEMENT SYSTEM</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="head">
                            <img style="width: 50px;margin-left: 120px" src="{{@Config::get('app.s3_url').@\App\Helper\Helper::academic_setting()->image}}" alt="">
                            <h3 class="text-center mb-2 float-right">ADMIN LOGIN</h3>
                        </div>
                        <form class="form" action="{{ route('student.login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="id_no" class="form-control" placeholder="Enter Student Id" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password" />
                            </div>
                            <div>
                                <button id="login-btn" type="submit" class="btn btn-success">
                                    Login
                                </button>
                            </div>
                            <div class="forgot">
                                <a href="#">Forgot password</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- expired modal ends here -->
