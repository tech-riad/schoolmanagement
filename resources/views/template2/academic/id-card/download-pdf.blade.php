<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <title>Students id card</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        .page_break {
            page-break-before: always;
        }
    </style>
</head>

<body>
    <div class="main-div" style="width: 100%;">
        <div style="width: 816px; height:900px; margin: auto;  padding: 2rem 28px;">
                    <div class="card"
                        style="background-image: url(https://res.cloudinary.com/dyjw9ybsc/image/upload/v1672150222/own-img/bac_oud63u.png);
                         background-repeat: no-repeat; background-size: contain; float: left; margin-right: 15px;width: 240px;
                            height: 351px;margin-top:20px">

                        <div style="float:left:marign-top:10px;">
                            <img style="width:40px;" src="{{Config::get('app.s3_url').Helper::academic_setting()->image}}" alt="">
                        </div>
                        <div style="float:left;margin-left:45px;">
                            <h2 style="color:
                        white;font-size: 11px;font-weight: 600;text-align: right;text-transform: uppercase;padding-top:
                        20px;padding: 5px 0px 0px 0px;">{{Helper::academic_setting()->school_name}}</h2>
                        <p style="text-align: center; margin-left:-20px; color: white; font-size: 8px;">(Est-{{Helper::school_info()->founded_at}})</p>
                        </div>
                        <hr style="clear:both;border:none;padding:0px;margin:0px;">
                        
                        <h3
                            style="color: white; font-size: 11px;text-align: center;margin-top: 5px;text-transform: uppercase;margin-bottom: 5px;font-size: 10px;font-weight: 500;">
                            identity card</h3>
                        <div style="width: 90px;height: 90px;margin: auto;">
                            <img style="width: 100%;height: 100%;border-radius: 100px;object-fit: cover;border: 3px solid white;justify-content: center;align-items: center;"
                                src="{{@$student->photo ? asset($student->photo):asset('male.png')}}"
                                alt="card image">
                        </div>
                        <h1
                            style="font-size: 12px;text-align: center;font-weight: bold;margin-top: 5px;color: #1c1c1c;">
                            {{$student->name}}</h1>
                        <p
                            style="font-size: 12px;text-align: center;margin-bottom: 5px;color: #161616;font-size: 15px;font-weight: 500;">
                            (Class {{$student->class->name}})</p>
                        <table
                            style="margin: auto; width: 100%; margin-left: 15px;width: 60%;font-size: 16px;margin: auto;text-transform: uppercase;">
                            <tr>
                                <td style="font-size:12px;text-transform: capitalize; font-weight: 400;">id no</td>
                                <td style="font-size:12px;text-transform: capitalize; font-weight: 400;">: {{$student->id_no}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;text-transform: capitalize; font-weight: 400;">Group</td>
                                <td style="font-size:12px;text-transform: capitalize; font-weight: 400;"> : {{@$student->group->name}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;text-transform: capitalize; font-weight: 400;">Section</td>
                                <td style="font-size:12px;text-transform: capitalize; font-weight: 400;"> : {{@$student->section->name}}-{{@$student->shift->name}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;text-transform: capitalize; font-weight: 400;">Roll</td>
                                <td style="font-size:12px;text-transform: capitalize; font-weight: 400;"> : {{$student->roll_no}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;text-transform: capitalize; font-weight: 400;">B/G</td>
                                <td style="font-size:12px;text-transform: capitalize; font-weight: 400;"> : {{@$student->blood_group}}</td>
                            </tr>
                        </table>


                        <h2
                            style="text-align: center; color: white;margin-top: 12px;background: #009688;padding: 5.5px;font-size: 10px;font-weight: 500;border-top: 3px solid #303030;">
                            Your slogan here</h2>
                    </div>

                    <table style=" width: 240px;height: 351px!important;margin-top:20px;float:left;border-collapse: collapse;border: 1px solid #efefef;broder-bottom:none; margin-right: 25px;">
                    <tr>
                        <td colspan="3"
                            style="font-size: 13px; background-color: #009688;padding: 10px 0px; font-weight: bold; color: white; text-align: center;">
                            TRAMS AND CONDITIONS</td>
                    </tr>
                    <tr>
                        <td style="height: 209px">

                        </td>
                    </tr>

                    <tr>
                        <td colspan="3"
                            style="font-size: 12px;font-weight: bold;text-align: center;padding: 15px 0px;text-decoration: underline;">
                            For An Emergency Call
                            <br>
                            <span style="font-size: 12px;"> 01729-462003</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="background-color: #009688; text-align: center; border-top: 6px solid rgb(48, 48, 48);">
                            <div style="height: 60px;">
                            </div>
                        </td>
                    </tr>
                </table>
        </div>
    </div>
</body>

</html>
