<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800&family=Roboto:wght@100;300;400;500;700;900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Roboto", sans-serif;
        }

    </style>
</head>

<body>
  @if (isset($students))
    @foreach ($students as $key => $student)
    <div style="width:100%;border: 20px solid #1c6077; padding:4px;margin-left:-24px;">
        <div style=" border: 2px solid #1c6077; padding: 1px;">
            <div style=" border: 2px solid #1c6077; padding: 10px 20px;">
                <table style="width: 100%;">
                    <tr>
                        <td>
                            <img style="height: 100px;" src="{{Config::get('app.s3_url').Helper::academic_setting()->image}}">
                        </td>
                        <td>

                            <table style="text-align: center; width: 75%;">
                                <tr>
                                    <td
                                        style="font-size: 35px; font-weight: 600;padding-bottom: 10px;padding-top: 10px;">
                                        {{ Helper::academic_setting()->school_name }}
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <td style="font-size: 20px; color: #000; margin-top: 10px">Phone : 01723276085</td>
                                </tr> --}}
                                <tr>
                                    <td style="font-size: 20px; color: #000">{{Helper::school_info()->address}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 20px; color: #000">{{Helper::school_info()->email}}</td>
                                </tr>
                            </table>
                        </td>

                    </tr>
                    <tr>
                        <td>SL No. {{$student->id_no}}</td>

                    </tr>
                    <tr>
                        <td>ID. {{$student->roll_no}}
                        </td>
                    </tr>

                </table>
                <table style="width: 100%;">
                    <tr>
                        <td style="
                  text-align: center;
                  font-size: 40px;
                  color: black;
                  margin-top: 25px;
                  font-weight: 600;
                  text-transform: capitalize;
                ">Testimonial</td>
                    </tr>
                </table>
                <table>
                    <tr>
                        @php
                            $find = [':name',':father_name',':mother_name',':division',':district',':upazila',':class'];
                            $replacement = [@$student->name , @$student->father_name, @$student->mother_name, @$student->division->name, @$student->district->name, @$student->upazila->name, @$student->class->name];
                            $content = str_replace($find, $replacement, $template->testimonial_content);
                        @endphp
                        <td style="line-height: 25px; font-size: 18px;">
                            {!! $content !!}
                        </td>
                    </tr>
                </table>
                <br>
                <table style="padding-bottom: 30px;width:100%">
                    <tr>
                        <td style="width: 30%; text-align: center;">
                            <table>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="border-top: 2px solid black;
                        padding-top: 3px; text-transform: capitalize; text-align:center;">Office Assistant</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 18px; text-align:center;">Date: 28 Dec 2022</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 30%; text-align: center;">
                            <table style="width: 80%;">
                                <tr>
                                    <td style="text-align:center;">
                                        <img style="height: 100px;"
                                            src="{{asset('academic/qrcode/'.Helper::getInstituteId().'_qrcode.png')}}">
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 30%; text-align: center;">
                            <table style="width: 100%;">
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td
                                        style="border-top: 2px solid black; text-align:center; padding-top: 3px; text-transform: capitalize;">
                                        Head Master</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 18px;text-transform:uppercase; text-align:center;">{{ Helper::academic_setting()->school_name }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    @endforeach

    @else 
    <div style="width:100%;border: 20px solid #1c6077; padding:4px;margin-left:-24px;">
        <div style=" border: 2px solid #1c6077; padding: 1px;">
            <div style=" border: 2px solid #1c6077; padding: 10px 20px;">
                <table style="width: 100%;">
                    <tr>
                        <td>
                            <img style="height: 100px;" src="{{Config::get('app.s3_url').Helper::academic_setting()->image}}">
                        </td>
                        <td>

                            <table style="text-align: center; width: 75%;">
                                <tr>
                                    <td
                                        style="font-size: 35px; font-weight: 600;padding-bottom: 10px;padding-top: 10px;">
                                        {{ Helper::academic_setting()->school_name }}
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <td style="font-size: 20px; color: #000; margin-top: 10px">Phone : 01723276085</td>
                                </tr> --}}
                                <tr>
                                    <td style="font-size: 20px; color: #000">{{Helper::school_info()->address}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 20px; color: #000">{{Helper::school_info()->email}}</td>
                                </tr>
                            </table>
                        </td>

                    </tr>
                    <tr>
                        <td>SL No. TST000001</td>

                    </tr>
                    <tr>
                        <td>ID. ST900603
                        </td>
                    </tr>

                </table>
                <table style="width: 100%;">
                    <tr>
                        <td style="
                  text-align: center;
                  font-size: 40px;
                  color: black;
                  margin-top: 25px;
                  font-weight: 600;
                  text-transform: capitalize;
                ">Testimonial</td>
                    </tr>
                </table>
                <table>
                    <tr>
                        @php
                            $find = [':name',':father_name',':mother_name',':division',':district',':upazila',':class'];
                            $replacement = [@$student->name , @$student->father_name, @$student->mother_name, @$student->division->name, @$student->district->name, @$student->upazila->name, @$student->class->name];
                            $content = str_replace($find, $replacement, $template->testimonial_content);
                        @endphp
                        <td style="line-height: 25px; font-size: 18px;">
                            {!! $content !!}
                        </td>
                    </tr>
                </table>
                <br>
                <table style="padding-bottom: 30px;width:100%">
                    <tr>
                        <td style="width: 30%; text-align: center;">
                            <table>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="border-top: 2px solid black;
                        padding-top: 3px; text-transform: capitalize; text-align:center;">Office Assistant</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 18px; text-align:center;">Date: 28 Dec 2022</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 30%; text-align: center;">
                            <table style="width: 80%;">
                                <tr>
                                    <td style="text-align:center;">
                                        <img style="height: 100px;"
                                            src="{{asset('academic/qrcode/'.Helper::getInstituteId().'_qrcode.png')}}" alt="">
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 30%; text-align: center;">
                            <table style="width: 100%;">
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td
                                        style="border-top: 2px solid black; text-align:center; padding-top: 3px; text-transform: capitalize;">
                                        Head Master</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 18px;text-transform:uppercase; text-align:center;">{{ Helper::academic_setting()->school_name }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    @endif

</body>

</html>
