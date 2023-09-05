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
        },
        .page_break {
            page-break-before: always;
        }
    </style>
</head>

<body>
    <div style="width:100%">

        <div style="width: 796px;height: 900px;overflow: hidden;border: 1px solid;padding: 2rem 3.8rem;">
            @if (isset($students))
            @foreach ($students as $key => $student)
            <div>
                <table
                    style="margin-top:20px;float:left;border-collapse: collapse; width: 220px; height: 324px; border: 1px solid #efefef;broder-bottom:none; margin-right: 25px;">
                    <tr>
                        <td colspan="3"
                            style="font-size: 13px; background-color: #009688;padding: 10px 0px; font-weight: bold; color: white; text-align: center;">
                            TRAMS AND CONDITIONS</td>
                    </tr>
                    <tr>
                        <td style="text-align:center; padding-top:10px;">
                            <img style="height: 100px;" src="{{asset('academic/qrcode/'.Helper::getInstituteId().'_qrcode.png')}}" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size:10px;height: auto;text-align: center;padding: 0px 7px">
                            {!!Helper::academic_setting()->id_card_content!!}
                        </td>
                    </tr>
                    <tr>
                    <td colspan="3" style="text-align:center; padding-top:10px; padding-bottom:10px;">
                            <img style="width:80px;" src="{{asset('uploads/schoolInfo/signImage/'.Helper::academic_setting()->signImage)}}" alt="">
                            <br style="padding:0px !important">
                            <span style="font-size: 10px;">{{Helper::academic_setting()->signText}}</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="background-color: #009688; text-align: center; border-top: 6px solid rgb(48, 48, 48);">
                            <div style="height: 30px;">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
                @if (($key + 1) % 3 == 0)
                <br style="clear: both">
                @endif
                @if (($key + 1) % 6 == 0)
                    <div class="page_break"></div>
                @endif
            @endforeach
            @elseif(isset($student))
            <div>
                <table
                    style="margin-top:20px;float:left;border-collapse: collapse; width: 220px; height: 324px; border: 1px solid #efefef;broder-bottom:none; margin-right: 25px;">
                    <tr>
                        <td colspan="3"
                            style="font-size: 13px; background-color: #009688;padding: 10px 0px; font-weight: bold; color: white; text-align: center;">
                            TRAMS AND CONDITIONS</td>
                    </tr>
                    <tr>
                        <td style="text-align:center; padding-top:10px;">
                            <img style="height: 100px;" src="{{asset('academic/qrcode/'.Helper::getInstituteId().'_qrcode.png')}}" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size:10px;height: auto;text-align: center;padding: 0px 7px">
                            {!!Helper::academic_setting()->id_card_content!!}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align:center; padding-top:10px; padding-bottom:10px;">
                            <img style="width:80px;" src="{{asset(@'uploads/schoolInfo/signImage/'.Helper::academic_setting()->signImage)}}" alt="">
                            <br style="padding:0px !important">
                            <span style="font-size: 10px;">{{Helper::academic_setting()->signText}}</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="background-color: #009688; text-align: center; border-top: 6px solid rgb(48, 48, 48);">
                            <div style="height: 30px;">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            @else

                <div>
                    <table
                        style="margin-top:20px;float:left;border-collapse: collapse; width: 220px; height: 324px; border: 1px solid #efefef;broder-bottom:none; margin-right: 25px;">
                        <tr>
                            <td colspan="3"
                                style="font-size: 13px; background-color: #009688;padding: 10px 0px; font-weight: bold; color: white; text-align: center;">
                                TRAMS AND CONDITIONS</td>
                        </tr>
                        <tr>
                            <td style="text-align:center; padding-top:10px;">
                                <img style="height: 100px;" src="{{asset('academic/qrcode/'.Helper::getInstituteId().'_qrcode.png')}}" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size:10px;height: auto;text-align: center;padding: 0px 7px">
                                {!!Helper::academic_setting()->id_card_content!!}
                            </td>
                        </tr>
                        <tr>
                        <td colspan="3" style="text-align:center; padding-top:10px; padding-bottom:10px;">
                            <img style="width:80px;" src="{{asset(@'uploads/schoolInfo/signImage/'.Helper::academic_setting()->signImage)}}" alt="">
                            <br style="padding:0px !important">
                            <span style="font-size: 10px;">{{Helper::academic_setting()->signText}}</span>
                        </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="background-color: #009688; text-align: center; border-top: 6px solid rgb(48, 48, 48);">
                                <div style="height: 30px;">
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            @endif
        </div>
    </div>
</body>

</html>
