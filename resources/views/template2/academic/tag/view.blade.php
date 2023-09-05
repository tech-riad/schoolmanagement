<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Student Tag</title>
</head>
<style>
    @font-face {
                font-family: "Kalpurush";
                src: url({{asset('fonts/Kalpurush.ttf')}}) format('truetype');
            },

    body { font-family: "Kalpurush",DejaVu Sans},
</style>
<body style="line-height: 12px;">
    <div style="width: 100%;margin-bottom:0px;">
        <div style="width:280px;height:120px;border:1px solid black;float:left; margin-top:0px;margin-left:0px;">
            <div>
                <h4 style="text-align: center;font-weight:600;margin-top:8px; margin-bottom:5px;">{{ Helper::academic_setting()->school_name }}</h4>
                <p style="font-size: 8px;text-align:center;">{{Helper::school_info()->address}}</p>
            </div>

            {{-- @php
                dd(Helper::school_info()->logo);
            @endphp --}}

            <table style="width: 30%;float:left;">
                <tr>
                    <td>
                        <img style="height:75px;margin-top:-12px;" src="{{Config::get('app.s3_url').Helper::academic_setting()->image}}" alt="logo img">
                    </td>
                </tr>
            </table>

            <table style="width: 70%;float:right;">
                <tr>
                    <th style="text-align: left; font-size:12px;">Name</th>
                    <th style="text-align: right; font-size:12px;">:</th>
                    <td style="text-align: left; font-size:12px;;padding-left:10px;">{{$student->name}}</td>
                </tr>
                <tr>
                    <th style="text-align: left;font-size:12px;">Id</th>
                    <th style="text-align: right;font-size:12px;">:</th>
                    <td style="text-align: left;padding-left:10px;font-size:12px;">{{$student->id_no}}</td>
                </tr>
                <tr>
                    <th style="text-align: left;font-size:12px;">Section</th>
                    <th style="text-align: right;font-size:12px;">:</th>
                    <td style="text-align: left;padding-left:10px;font-size:12px;">{{@$student->section->name}}</td>
                </tr>
                <tr>
                    <th style="text-align: left;font-size:12px;">Roll</th>
                    <th style="text-align: right;font-size:12px;">:</th>
                    <td style="text-align: left;padding-left:10px;font-size:12px;">{{$student->roll_no}}</td>
                </tr>
            </table>
            <hr style="clear: both;border:none;margin:0;padding:-10px">
        </div>
    </div>
</body>
</html>
