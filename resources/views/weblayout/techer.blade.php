@extends($adminTemplate.'.admin.layouts.app')

@section('content')
    <div  class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card corona-gradient-card">
                        <div class="card-body py-0 px-0 px-sm-3">
                            <div class="row align-items-center">
                                <div class="col-4 col-sm-3 col-xl-2">
                                    <img src="assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid"
                                        alt="">
                                </div>
                                <div class="col-5 col-sm-7 col-xl-8 p-0">
                                    <h4 class="mb-1 mb-sm-0">Want even more features?</h4>
                                    <p class="mb-0 font-weight-normal d-none d-sm-block">Check out our Pro version with 5
                                        unique
                                        layouts!</p>
                                </div>
                                <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                                    <span>
                                        <a href="https://www.bootstrapdash.com/product/corona-admin-template/"
                                            target="_blank"
                                            class="btn btn-outline-light btn-rounded get-started-btn">Upgrade to PRO</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <section class="sms-breadcrumb mb-40 up_breadcrumb white-box">
                    <div class="container-fluid">
                        <div class="row justify-content-between">
                            <h1>@lang('student.student_admission')</h1>
                            <div class="bc-pages">
                                <a href="{{ route('dashboard') }}">@lang('common.dashboard')</a>
                                <a href="#">@lang('student.student_information')</a>
                                <a href="#">@lang('student.student_admission')</a>
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="sms-breadcrumb mb-40 up_breadcrumb white-box">
                    <div class="justify-content-start text-start w-100 my-5">
                        <a class="btn btn-tag btn-rounded" data-mdb-close="true">
                            <i class="fas fa-times me-2"></i>
                            Online Admission
                        </a>
                    </div>
                </section>

            </div>
        </div>
    </div>
@endsection
