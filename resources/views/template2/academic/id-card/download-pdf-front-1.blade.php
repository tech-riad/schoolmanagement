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
        <div style="width: 816px; margin: auto;  padding: 2rem 28px;">
            @if (isset($students))
            @foreach ($students as $key =>  $student)
                <div class="card"
                    style="background-image: url(https://res.cloudinary.com/dyjw9ybsc/image/upload/v1672150222/own-img/bac_oud63u.png);
                    background-repeat: no-repeat; background-size: contain; float: left; margin-right: 15px;width: 240px;
                        height: 372px;margin-top:20px;border:2px solid #efefef;">

                    <table>
                        <tr>
                            <td><img style="width:40px;" src="{{Config::get('app.s3_url').Helper::academic_setting()->image}}" alt=""></td>
                            <td>
                                <h2 style="color:
                                white;font-size: 11px;font-weight: 600;text-align: right;text-transform: uppercase;padding-top:
                                20px;padding: 5px 0px 0px 0px;">{{Helper::academic_setting()->school_name}}</h2>
                                <p style="text-align: center; margin-left:-20px; color: white; font-size: 8px;">(Est-{{Helper::school_info()->founded_at}})</p>
                            </td>
                        </tr>
                    </table>

                    <div>
                        <h3
                        style="color: white; font-size: 11px;text-align: center;margin-top: 5px;text-transform: uppercase;margin-bottom: 5px;font-size: 10px;font-weight: 500;">
                        identity card</h3>
                    <div style="width: 80px;height: 80px;margin: auto;">
                        @if ($student->gender == 'Male')
                            <img style="width: 100%;height: 100%;border-radius: 100px;object-fit: cover;border: 3px solid white;justify-content: center;align-items: center;"
                            src="{{Config::get('app.s3_url').$student->photo ? Config::get('app.s3_url').$student->photo : asset('male.png')}}"
                            alt="card image">
                        @else
                            <img style="width: 100%;height: 100%;border-radius: 100px;object-fit: cover;border: 3px solid white;justify-content: center;align-items: center;"
                            src="{{Config::get('app.s3_url').$student->photo ? Config::get('app.s3_url').$student->photo : asset('female.jpeg')}}"
                            alt="card image">
                        @endif

                    </div>
                    <h1
                        style="font-size: 14px;text-align: center;font-weight: bold;margin-top: 5px;color: #1c1c1c;">
                        {{$student->name}}</h1>
                    <p
                        style="text-align: center;margin-bottom: 5px;color: #161616;font-size: 13px;font-weight: 500;">
                        {{$student->class->name}}{{@$student->shift->name != 'Null' ? '-'.$student->shift->name : ''}}{{@$student->section->name != 'Null' ? '-'.$student->section->name : ''}}</p>

                    <table style="margin: auto; width: 100%; margin-left: 15px;width: 60%;font-size: 16px;margin: auto;text-transform: uppercase;">
                        <tr>
                            <td style="font-size:12px;text-transform: capitalize; font-weight: 400;">Roll no</td>
                            <td style="font-size:12px;text-transform: capitalize; font-weight: 400;">: {{$student->roll_no}}</td>
                        </tr>
                        <tr>
                            <td style="font-size:12px;text-transform: capitalize; font-weight: 400;">Father</td>
                            <td style="font-size:12px;text-transform: capitalize; font-weight: 400;">: {{$student->father_name}}</td>
                        </tr>
                        <tr>
                            <td style="font-size:12px;text-transform: capitalize; font-weight: 400;">Mother</td>
                            <td style="font-size:12px;text-transform: capitalize; font-weight: 400;">: {{$student->mother_name}}</td>
                        </tr>
                        <tr>
                            <td style="font-size:12px;text-transform: capitalize; font-weight: 400;">Blood</td>
                            <td style="font-size:12px;text-transform: capitalize; font-weight: 400;"> : {{@$student->blood_group}}</td>
                        </tr>
                    </table>
                    <h2
                        style="text-align: center; color: white;margin-top: 14px;background: #009688;padding: 5.5px;font-size: 10px;font-weight: 500;border-top: 3px solid #303030;">
                        Your slogan here</h2>
                    </div>
                </div>
                @if (($key + 1) % 3 == 0)
                    <br style="clear: both">
                @endif
                @if (($key + 1) % 6 == 0)
                    <div class="page_break"></div>
                @endif
            @endforeach
            @elseif(isset($student))
            <div class="card"
            style="background-image: url(https://res.cloudinary.com/dyjw9ybsc/image/upload/v1672150222/own-img/bac_oud63u.png);
            background-repeat: no-repeat; background-size: contain; float: left; margin-right: 15px;width: 240px;
                height: 372px;margin-top:20px;border:2px solid #efefef;">

                <table>
                    <tr>
                        <td><img style="width:40px;" src="{{Config::get('app.s3_url').Helper::academic_setting()->image}}" alt=""></td>
                        <td>
                            <h2 style="color:
                            white;font-size: 11px;font-weight: 600;text-align: right;text-transform: uppercase;padding-top:
                            20px;padding: 5px 0px 0px 0px;">{{Helper::academic_setting()->school_name}}</h2>
                            <p style="text-align: center; margin-left:-20px; color: white; font-size: 8px;">(Est-{{Helper::school_info()->founded_at}})</p>
                        </td>
                    </tr>
                </table>

                <div>
                    <h3
                    style="color: white; font-size: 11px;text-align: center;margin-top: 5px;text-transform: uppercase;margin-bottom: 5px;font-size: 10px;font-weight: 500;">
                    identity card</h3>
                <div style="width: 90px;height: 90px;margin: auto;">
                    @if ($student->gender == 'Male')
                        <img style="width: 100%;height: 100%;border-radius: 100px;object-fit: cover;border: 3px solid white;justify-content: center;align-items: center;"
                        src="{{Config::get('app.s3_url').$student->photo ? Config::get('app.s3_url').$student->photo : asset('male.png')}}"
                        alt="card image">
                    @else
                        <img style="width: 100%;height: 100%;border-radius: 100px;object-fit: cover;border: 3px solid white;justify-content: center;align-items: center;"
                        src="{{Config::get('app.s3_url').$student->photo ? Config::get('app.s3_url').$student->photo : asset('female.jpeg')}}"
                        alt="card image">
                    @endif
                </div>
                <h1
                    style="font-size: 14px;text-align: center;font-weight: bold;margin-top: 5px;color: #1c1c1c;">
                    {{$student->name}}</h1>
                <p
                    style="font-size: 12px;text-align: center;margin-bottom: 5px;color: #161616;font-size: 15px;font-weight: 500;">
                    (Class {{$student->class->name}})</p>
                <table
                    style="margin: auto; width: 100%; margin-left: 15px;width: 60%;font-size: 16px;margin: auto;text-transform: uppercase;">
                    <tr>
                        <td style="font-size:14px;text-transform: capitalize; font-weight: 400;">id no</td>
                        <td style="font-size:14px;text-transform: capitalize; font-weight: 400;">: {{$student->id_no}}</td>
                    </tr>
                    <tr>
                        <td style="font-size:14px;text-transform: capitalize; font-weight: 400;">blood</td>
                        <td style="font-size:14px;text-transform: capitalize; font-weight: 400;"> : {{@$student->blood_group}}</td>
                    </tr>
                    <tr>
                        <td style="font-size:14px;text-transform: capitalize; font-weight: 400;">Roll</td>
                        <td style="font-size:14px;text-transform: capitalize; font-weight: 400;"> : {{$student->roll_no}}</td>
                    </tr>
                    <tr>
                        <td style="font-size:14px;text-transform: capitalize; font-weight: 400;">Address</td>
                        <td style="font-size:14px;text-transform: capitalize; font-weight: 400;"> : {{@$student->address}}</td>
                    </tr>
                </table>


                <h2
                    style="text-align: center; color: white;margin-top: 14px;background: #009688;padding: 5.5px;font-size: 10px;font-weight: 500;border-top: 3px solid #303030;">
                    Your slogan here</h2>
                </div>
            </div>

            @else

            <div class="card"
                    style="background-image: url(https://res.cloudinary.com/dyjw9ybsc/image/upload/v1672150222/own-img/bac_oud63u.png);
                    background-repeat: no-repeat; background-size: contain; float: left; margin-right: 15px;width: 240px;
                        height: 372px;margin-top:20px;border:2px solid #efefef;">

                    <table>
                        <tr>
                            <td><img style="width:40px;" src="{{Config::get('app.s3_url').Helper::academic_setting()->image}}" alt=""></td>
                            <td>
                                <h2 style="color:
                                white;font-size: 11px;font-weight: 600;text-align: right;text-transform: uppercase;padding-top:
                                20px;padding: 5px 0px 0px 0px;">{{Helper::academic_setting()->school_name}}</h2>
                                <p style="text-align: center; margin-left:-20px; color: white; font-size: 8px;">(Est-{{Helper::school_info()->founded_at}})</p>
                            </td>
                        </tr>
                    </table>

                    <div>
                        <h3
                        style="color: white; font-size: 11px;text-align: center;margin-top: 5px;text-transform: uppercase;margin-bottom: 5px;font-size: 10px;font-weight: 500;">
                        identity card</h3>
                    <div style="width: 90px;height: 90px;margin: auto;">
                            <img style="width: 100%;height: 100%;border-radius: 100px;object-fit: cover;border: 3px solid white;justify-content: center;align-items: center;"
                            src="{{asset('male.png')}}"
                            alt="card image">
                    </div>
                    <h1 style="font-size: 14px;text-align: center;font-weight: bold;margin-top: 5px;color: #1c1c1c;"> MD. Rahman</h1>
                    <p
                        style="font-size: 12px;text-align: center;margin-bottom: 5px;color: #161616;font-size: 15px;font-weight: 500;">
                        (Class: 9)</p>
                    <table
                        style="margin: auto; width: 100%; margin-left: 15px;width: 60%;font-size: 16px;margin: auto;text-transform: uppercase;">
                        <tr>
                            <td style="font-size:14px;text-transform: capitalize; font-weight: 400;">id no</td>
                            <td style="font-size:14px;text-transform: capitalize; font-weight: 400;">: 22000801</td>
                        </tr>
                        <tr>
                            <td style="font-size:14px;text-transform: capitalize; font-weight: 400;">blood</td>
                            <td style="font-size:14px;text-transform: capitalize; font-weight: 400;"> : A+</td>
                        </tr>
                        <tr>
                            <td style="font-size:14px;text-transform: capitalize; font-weight: 400;">Roll</td>
                            <td style="font-size:14px;text-transform: capitalize; font-weight: 400;"> : 10001</td>
                        </tr>
                        {{-- <tr>
                            <td style="font-size:14px;text-transform: capitalize; font-weight: 400;">Address</td>
                            <td style="font-size:14px;text-transform: capitalize; font-weight: 400;"> : Uttara,Dhaka</td>
                        </tr> --}}
                    </table>
                    <h2
                        style="text-align: center; color: white;margin-top: 14px;background: #009688;padding: 5.5px;font-size: 10px;font-weight: 500;border-top: 3px solid #303030;">
                        Your slogan here</h2>
                    </div>
                </div>
            @endif
        </div>
    </div>
</body>

</html>
