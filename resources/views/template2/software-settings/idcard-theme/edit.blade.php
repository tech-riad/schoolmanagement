@extends($adminTemplate.'.admin.layouts.app')
@push('css')
    <style>
        .quiz_title {
            font-size: 30px;
            font-weight: 700;
            color: #292d3f;
            text-align: center;
            margin-bottom: 50px;
        }

        .quiz_card_area {
            position: relative;
            margin-bottom: 30px;
        }

        .single_quiz_card {
            border: 1px solid #efefef;
            -webkit-transition: all 0.3s linear;
            -moz-transition: all 0.3s linear;
            -o-transition: all 0.3s linear;
            -ms-transition: all 0.3s linear;
            -khtml-transition: all 0.3s linear;
            transition: all 0.3s linear;
        }

        .quiz_card_title {
            padding: 10px;
            text-align: center;
            background-color: #d6d6d6;
        }

        .quiz_card_title h3 {
            font-size: 16px;
            font-weight: 400;
            color: #292d3f;
            margin-bottom: 0;
            -webkit-transition: all 0.3s linear;
            -moz-transition: all 0.3s linear;
            -o-transition: all 0.3s linear;
            -ms-transition: all 0.3s linear;
            -khtml-transition: all 0.3s linear;
            transition: all 0.3s linear;
        }

        .quiz_card_title h3 i {
            opacity: 0;
        }

        .quiz_card_icon {
            max-width: 100%;
            min-height: 135px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quiz_icon {
            width: 70px;
            height: 75px;
            position: relative;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: auto;
            -webkit-transition: all 0.3s linear;
            -moz-transition: all 0.3s linear;
            -o-transition: all 0.3s linear;
            -ms-transition: all 0.3s linear;
            -khtml-transition: all 0.3s linear;
            transition: all 0.3s linear;
        }

        .quiz_icon1 {
            background-image: url('https://img.icons8.com/ios-filled/32/000000/maxcdn.png');
        }

        .quiz_icon2 {
            background-image: url('https://img.icons8.com/ios-filled/48/000000/download-2.png');
        }

        .quiz_icon3 {
            background-image: url('https://img.icons8.com/ios/50/000000/cloudflare.png');
        }

        .quiz_icon4 {
            background-image: url('https://img.icons8.com/dotty/80/000000/download-2.png');
        }

        .quiz_checkbox {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            z-index: 999;
            cursor: pointer;
        }

        .quiz_checkbox:checked ~ .single_quiz_card {
            border: 1px solid #2575fc;
        }

        .quiz_checkbox:checked:hover ~ .single_quiz_card {
            border: 1px solid #2575fc;
        }

        .quiz_checkbox:checked ~ .single_quiz_card .quiz_card_content .quiz_card_title {
            background-color: #2575fc;
            color: #ffffff;
        }

        .quiz_checkbox:checked ~ .single_quiz_card .quiz_card_content .quiz_card_title h3 {
            color: #ffffff;
        }

        .quiz_checkbox:checked ~ .single_quiz_card .quiz_card_content .quiz_card_title h3 i {
            opacity: 1;
        }

        .quiz_checkbox:checked:hover ~ .quiz_card_title {
            border: 1px solid #2575fc;
        }

        /*Icon Selector*/

        .quiz_checkbox:checked ~ .single_quiz_card .quiz_card_content .quiz_card_icon {
            color: #2575fc;
        }

        .quiz_checkbox:checked ~ .single_quiz_card .quiz_card_content .quiz_card_icon .quiz_icon1 {
            background-image: url('https://img.icons8.com/nolan/32/000000/maxcdn.png');
        }

        .quiz_checkbox:checked ~ .single_quiz_card .quiz_card_content .quiz_card_icon .quiz_icon2 {
            background-image: url('https://img.icons8.com/color/48/000000/download-2.png');
        }

        .quiz_checkbox:checked ~ .single_quiz_card .quiz_card_content .quiz_card_icon .quiz_icon3 {
            background-image: url('https://img.icons8.com/color/48/000000/cloudflare.png');
        }

        .quiz_checkbox:checked ~ .single_quiz_card .quiz_card_content .quiz_card_icon .quiz_icon4 {
            background-image: url('https://img.icons8.com/material-outlined/80/000000/download-2.png');
        }

        .quiz_card_icon {
            font-size: 50px;
            color: #000000;
        }

        .quiz_backBtn_progressBar {
            position: relative;
            margin-bottom: 60px;
        }

        .quiz_backBtn {
            background-color: transparent;
            border: 1px solid #d2d2d3;
            color: #8e8e8e;
            border-radius: 50%;
            position: absolute;
            top: -17px;
            left: 0px;
            width: 40px;
            height: 40px;
            text-align: center;
            vertical-align: middle;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none !important;
        }

        .quiz_backBtn:hover {
            color: #a9559b;
            border: 1px solid #2575fc;
        }

        .quiz_backBtn_progressBar .progress {
            margin-left: 50px;
            margin-top: 50px;
            height: 6px;
        }

        .quiz_backBtn_progressBar .progress-bar {
            background-color: #2575fc;
        }

        .quiz_next {
            text-align: center;
            margin-top: 50px;
        }

        .quiz_continueBtn {
            max-width: 315px;
            background-color: #2575fc;
            color: #ffffff;
            font-size: 18px;
            border-radius: 20px;
            padding: 10px 125px;
            border: 0;
        }
    </style>
@endpush
@section('content')
    <div class="page-body">
        @include($adminTemplate.'.software-settings.software-settings-nav')
        <div class="card new-table">
            <div class="card-header">
                <h6>Id Card Theams</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <input type="hidden" id="theamsCount" value="{{$theams->count()}}">
                    @foreach ($theams as $key => $theam)
                        <div class="col-sm-3">
                            <div class="quiz_card_area" id="idcardTheam_{{$key+1}}">
                                <input class="quiz_checkbox theam" type="radio"
                                       {{@$institute->idcard_theam_id == $theam->id ? 'checked' : ''}} id="theam_{{$key+1}}"
                                       value="{{$theam->id}}"/>
                                <div class="single_quiz_card">
                                    <div class="quiz_card_content">
                                        <div class="quiz_card_icon">
                                            <div class="">
                                                @if($theam->id == 1)
                                                    <img style="height:250px;width:272px" src="{{asset($theam->image)}}"
                                                         alt="">
                                                @elseif($theam->id == 2)
                                                    <img style="height:250px;width:272px" src="{{asset($theam->image)}}"
                                                         alt="">
                                                @endif
                                            </div>
                                        </div><!-- end of quiz_card_media -->

                                        <div class="quiz_card_title">
                                            <h3><i class="fa fa-check" aria-hidden="true"></i></h3>
                                        </div><!-- end of quiz_card_title -->
                                    </div><!-- end of quiz_card_content -->
                                </div><!-- end of single_quiz_card -->
                            </div><!-- end of quiz_card_area -->
                            <div class="text-center">
                                @if($theam->id == 1 || $theam->id == 2)
                                    <a class="btn btn-sm btn-primary"
                                       href="{{route('software-settings.idcardtheme.demoDownloadFront',$theam->id)}}">Demo Front</a>
                                    <a class="btn btn-sm btn-primary"
                                       href="{{route('software-settings.idcardtheme.demoDownloadBack',$theam->id)}}">Demo Back</a>
                                @endif
                            </div>
                        </div><!-- end of col3  -->

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            var totalTheams = parseInt($("#theamsCount").val());

            for (let i = 1; i < totalTheams + 1; i++) {
                var element = +i;
                $("#idcardTheam_" + element).click(function () {
                    var id = $(this).closest("div.quiz_card_area").find(".theam").val();

                    $.ajax({
                        url: '/software-settings/theme/idcard/themeUpdate/' + id,
                        type: 'GET',
                        success: function (data) {
                            toastr.success('Id Card Theam Update :)');
                        }
                    });
                });
            }

        });
    </script>
@endpush