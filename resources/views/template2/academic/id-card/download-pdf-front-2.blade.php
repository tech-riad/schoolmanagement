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
    @if (isset($students))
    @foreach ($students as $key => $student)
    <div class="card" style="background-image: url(https://res.cloudinary.com/dnzbdnw4b/image/upload/v1675951543/front_plfkqz.png);
                    background-repeat: no-repeat; background-size: cover; float: left; margin-left: 20px;width: 210px;
                        height: 316px;margin-top:20px;border:2px solid #efefef; margin-bottom:-60px;">


        <div>
            <div style="height:65px">
                    <h2 style="color:
                                white;font-size: 12px;font-weight: 600;text-align: center;text-transform: uppercase;
                                padding-top:10px;padding: 5px 0px 0px 0px; line-height:11px ">{{Helper::academic_setting()->school_name}}</h2>
                <h3 style="color: white; font-size: 11px;text-align: center; margin-right:-10px; margin-top: 5px;
                    margin-bottom:5px; text-transform: uppercase;margin-bottom: 5px;font-weight: 500;">
                    identity card</h3>
            </div>

            <div style="width: 50px;height: 50px;margin: auto;">
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
            <h1 style="font-size: 14px;text-align: center;font-weight: bold;margin-top: 6px; margin-bottom:3px;color: #1c1c1c;">
                {{$student->name}}
            </h1>
            <table
                style="margin-top: 20px; margin-left: 5px;
                text-transform: uppercase; width:200px; height:90px; line-height: 10px;">

                <tr>
                    @php
                        $stringNumber = Str::length($student->father_name);
                    @endphp
                    <td width="35%" style="font-size:10px;text-transform: capitalize; font-weight: 400;padding: 0px 19px;">Father</td>
                    <td style="{{@$stringNumber > 21 ? 'font-size:7px;' : 'font-size:10px;' }} text-transform: capitalize; font-weight: 400;"> : {{$student->father_name}}</td>
                </tr>
                <tr>
                    @php
                        $stringNumber = Str::length($student->mother_name);
                    @endphp
                    <td style="font-size:10px;text-transform: capitalize; font-weight: 400;padding: 0px 19px;">Mother</td>
                    <td style="{{@$stringNumber > 21 ? 'font-size:7px;' : 'font-size:10px;' }} text-transform: capitalize; font-weight: 400;"> : {{$student->mother_name}}</td>
                </tr>
                <tr>
                    <td style="font-size:10px;text-transform: capitalize; font-weight: 400;padding: 0px 19px;">Cell</td>
                    <td style="font-size:10px;text-transform: capitalize; font-weight: 400;"> : {{$student->mobile_number}}</td>
                </tr>
                <tr>
                    <td style="font-size:10px;text-transform: capitalize; font-weight: 400;padding: 0px 19px;">Blood</td>
                    <td style="font-size:10px;text-transform: capitalize; font-weight: 400;"> : {{@$student->blood_group}}</td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td ><img style="width:50px;height:auto;" src="{{Config::get('app.s3_url').Helper::academic_setting()->image}}" alt=""></td>
                    <td style="font-size:10px;text-transform: uppercase; font-weight: 400;text-align:right">ID : {{$student->id_no}}&nbsp;&nbsp;</td>
                </tr>
            </table>
        </div>
    </div>
    @if (($key + 1) % 3 == 0)
    <br style="clear: both">
    @endif
    @if (($key + 1) % 9 == 0)
    <div class="page_break"></div>
    @endif
    @endforeach
    @endif
</body>

</html>
