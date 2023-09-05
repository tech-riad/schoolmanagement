<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <title>Students id card</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        ,
        .page_break {
            page-break-before: always;
        }

    </style>
</head>

<body>
    @if (isset($students))
    @foreach ($students as $key => $student)
    <div>
        <table style="
                    margin-top: 20px;
                    float: left;
                    border-collapse: collapse;
                    width: 210px;
                    height: 316px;
                    /* border: 1px solid #efefef;broder-bottom:none; */
                    margin-left: 20px;
                    margin-bottom:-60px;
                    background-image: url(https://res.cloudinary.com/dnzbdnw4b/image/upload/v1675956864/Untitled_design_mkecal.jpg);
                    background-size: cover;
                  ">
            <tr>
                <td>
                    <table style="width:100%">
                        <tr>
                            <td style="font-size: 12px; text-align: center;">If found please return
                                to</td>

                        </tr>
                        <tr>
                            <td style="
                                    font-size: 13px;
                                    font-weight: 500;

                                    text-align: center;
                                  ">
                                {{Helper::academic_setting()->school_name}}
                            </td>
                        </tr>
                    </table>
                </td>

            </tr>
            <tr>
                <td>
                    {{-- {!!Helper::academic_setting()->id_card_content!!} --}}
                    <table style="width: 100%; text-align: center;line-height:8px;">
                        <tr>
                            <td style="padding-top:5px;padding-bottom:5px;">
                                <img style="height: 60px"
                                    src="{{asset('academic/qrcode/'.Helper::getInstituteId().'_qrcode.png')}}"
                                    alt="qr code image" />
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;">{{Helper::school_info()->address}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 12px;">{{Helper::institute_info()->domain}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 12px; font-weight: 500;">Email: {{Helper::institute_info()->email}}
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 12px;">Mobile: {{Helper::institute_info()->phone}}</td>
                        </tr>
                        <tr>
                        <td colspan="3" style="text-align:center; padding-top:10px; padding-bottom:10px;">
                            <img style="width:80px;" src="{{asset('uploads/schoolInfo/signImage/'.Helper::academic_setting()->signImage)}}" alt="">
                            <br style="padding:0px !important">
                            <span style="font-size: 10px;">{{Helper::academic_setting()->signText}}</span>
                        </td>
                        </tr>
                        <tr>
                            <td style="font-size: 8px; text-align: center;">
                            <!-- Head teacher & managing director -->
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    @if (($key + 1) % 3 == 0)
    <br style="clear: both">
    @endif
    @if (($key + 1) % 9 == 0)
    <div class="page_break"></div>
    @endif
    @endforeach
    @elseif(isset($student))
    <div>
        <table style="
                    margin-top: 20px;
                    float: left;
                    border-collapse: collapse;
                    width: 210px;
                    height: 316px;
                    /* border: 1px solid #efefef;broder-bottom:none; */
                    margin-left: 20px;
                    margin-bottom:-60px;
                    background-image: url(https://res.cloudinary.com/dnzbdnw4b/image/upload/v1675956864/Untitled_design_mkecal.jpg);
                    background-size: cover;
                  ">
            <tr>
                <td>
                    <table style="width:100%">
                        <tr>
                            <td style="font-size: 12px; text-align: center;">If found please return
                                to</td>

                        </tr>
                        <tr>
                            <td style="
                                    font-size: 13px;
                                    font-weight: 500;

                                    text-align: center;
                                  ">
                                {{Helper::academic_setting()->school_name}}
                            </td>
                        </tr>
                    </table>
                </td>

            </tr>
            <tr>
                <td>
                    {{-- {!!Helper::academic_setting()->id_card_content!!} --}}
                    <table style="width: 100%; text-align: center;line-height:8px;">
                        <tr>
                            <td style="padding-top:5px;padding-bottom:5px;">
                                <img style="height: 60px"
                                    src="{{asset('academic/qrcode/'.Helper::getInstituteId().'_qrcode.png')}}"
                                    alt="qr code image" />
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;">{{Helper::school_info()->address}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 12px;">{{Helper::institute_info()->domain}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 12px; font-weight: 500;">Email: {{Helper::institute_info()->email}}
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 12px;">Mobile: {{Helper::institute_info()->phone}}</td>
                        </tr>
                        <tr>
                        <td colspan="3" style="text-align:center; padding-top:10px; padding-bottom:10px;">
                            <img style="width:80px;" src="{{asset('uploads/schoolInfo/signImage/'.Helper::academic_setting()->signImage)}}" alt="">
                            <br style="padding:0px !important">
                            <span style="font-size: 10px;">{{Helper::academic_setting()->signText}}</span>
                        </td>
                        </tr>
                        <tr>
                            <td style="font-size: 8px; text-align: center;">Head teacher & managing director
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

    @else

    <div>
        <table style="
                    margin-top: 20px;
                    float: left;
                    border-collapse: collapse;
                    width: 210px;
                    height: 316px;
                    margin-left: 20px;
                    margin-bottom:-60px;
                    background-image: url(https://res.cloudinary.com/dnzbdnw4b/image/upload/v1675956864/Untitled_design_mkecal.jpg);
                    background-size: cover;
                  ">
            <tr>
                <td>
                    <table style="width:100%">
                        <tr>
                            <td style="font-size: 12px; text-align: center;">If found please return
                                to</td>

                        </tr>
                        <tr>
                            <td style="
                                    font-size: 13px;
                                    font-weight: 500;
                                    color:#000;
                                    text-align: center;
                                    margin-bottom:20px;
                                  ">
                                {{Helper::academic_setting()->school_name}}
                            </td>
                        </tr>
                    </table>
                </td>

            </tr>
            <tr>
                <td>
                    {{-- {!!Helper::academic_setting()->id_card_content!!} --}}
                    <table style="width: 100%; text-align: center;line-height:8px;">
                        <tr>
                            <td style="padding-top:5px;padding-bottom:5px;">
                                <img style="height: 60px"
                                    src="{{asset('academic/qrcode/'.Helper::getInstituteId().'_qrcode.png')}}"
                                    alt="qr code image" />
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;">{{Helper::school_info()->address}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 12px;">{{Helper::institute_info()->domain}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 12px; font-weight: 500;">Email: {{Helper::institute_info()->email}}
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 12px;">Mobile: {{Helper::institute_info()->phone}}</td>
                        </tr>
                        <tr>
                        <td colspan="3" style="text-align:center; padding-top:10px; padding-bottom:10px;">
                            <img style="width:80px;" src="{{asset('uploads/schoolInfo/signImage/'.Helper::academic_setting()->signImage)}}" alt="">
                            <br style="padding:0px !important">
                            <span style="font-size: 10px;">{{Helper::academic_setting()->signText}}</span>
                        </td>
                        </tr>
                        <tr>
                            <td style="font-size: 8px; text-align: center;">Head teacher & managing director
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    @endif
</body>

</html>
