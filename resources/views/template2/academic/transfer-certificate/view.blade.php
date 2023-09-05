<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transfer Cartificate</title>
</head>


<body>

    <div style=" width: 70%; margin: auto; border: 20px solid #ce9804; padding: 4px;margin-left:-19">
        <div style=" border: 2px solid #ce9804; padding: 1px;">
            <div style=" border: 2px solid #ce9804; padding: 10px 20px;">
                <table style="width: 100%;">
                    <tr>
                        <table style="padding-bottom:30px;width: 100%;">
                            <tr>

                                <td style="width: 33%; text-align: center; padding-top: 20px;">
                                    <table style="width: 100%;">
                                        <tr>
                                            <td>
                                                <table style="text-align: left;">
                                                    <tr>
                                                        <td style="font-size: 15px;">Student ID</td>
                                                        <td style="font-size: 15px;">&#160;&#160;:&#160;&#160;</td>
                                                        <td style="font-size: 15px;">{{$student->id_no}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 15px;">Sl. No</td>
                                                        <td style="font-size: 15px;">&#160;&#160;:&#160;&#160;</td>
                                                        <td style="font-size: 15px;">{{$student->roll_no}}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>

                                <td style="width: 33%; text-align: center; padding-top: 20px;">
                                    <table style="width: 100%;text-align: center;">
                                        <tr>
                                            <td>
                                                <img style="height: 125px;" src="{{asset('uploads/schoolInfo/'.Helper::school_info()->logo)}}">
                                            </td>
                                        </tr>
                                    </table>
                                </td>

                                <td style="width: 33%; text-align: right;">
                                    <table style="width: 100%;">
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom: 1px solid black; padding-bottom: 3px; text-align: right; text-transform: uppercase; font-size: 25px;font-weight: 600;color: rgb(113, 13, 153);">
                                                {{ Helper::academic_setting()->school_name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 14px; text-align: left;padding-left: 20px; text-align: right;">
                                                <strong>Address</strong> : {{Helper::school_info()->address}}
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <td style="font-size: 14px; text-align: left;padding-left: 20px; text-align: right;">
                                                <strong>Phone</strong> : 01723276085
                                            </td>
                                        </tr> --}}
                                        <tr>
                                            <td style="font-size: 14px; text-align: left;padding-left: 20px;text-align: right;">
                                                <strong>Email</strong> : {{Helper::school_info()->email}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 14px;padding-left: 20px;text-align: right;">
                                                <strong>Website</strong> : {{Helper::school_info()->qrcode}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                
                            </tr>
                        </table>
                        </td>
                    </tr>
                </table>

                </tr>


                </table>
                <table style="width: 100%;">
                    <tr>
                        <td style="
                  text-align: center;
                  font-size: 40px;
                  color: rgb(214, 5, 33);
                  margin-top: 25px;
                  font-weight: 600;
                  text-transform: capitalize;
                  padding-bottom: 10px;
                ">Transfer Certificate</td>
                    </tr>
                </table>
                <table>
                    <tr>
                        @php
                            $find = [':name',':father_name',':mother_name',':division',':district',':upazila',':class'];
                            $replacement = [@$student->name , @$student->father_name, @$student->mother_name, @$student->division->name, @$student->district->name, @$student->upazila->name, @$student->class->name];
                            $content = str_replace($find, $replacement, $template->testimonial_content);
                        @endphp
                        <td style="line-height: 25px; font-size: 16px;">
                            {!! $content !!}
                        </td>
                    </tr>
                </table>
                <br>
                <table style="padding-bottom: 30px;width:100%;">
                    <tr>
                        <td style="width: 30%; text-align: center; padding-top: 20px;">
                            <table style="width: 80%;">
                                <tr>
                                    <td>
                                        <img style="height: 100px;"
                                            src="{{asset('academic/qrcode/'.Helper::getInstituteId().'_qrcode.png')}}">
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 30%; text-align: center; padding-top: 35px;">
                            <table>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="border-top: 2px solid black;
                        padding-top: 3px; text-transform: capitalize;font-size: 14px;">Office Assistant</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 16px;">Date: 28 Dec 2022</td>
                                </tr>
                            </table>
                        </td>

                        <td style="width: 30%; text-align: center; padding-top: 50px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td
                                        style="border-top: 2px solid black; padding-top: 3px; text-transform: capitalize;font-size: 14px;">
                                        Head Master
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 16px;text-transform: uppercase;">{{ Helper::academic_setting()->school_name }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div> 
</body>

</html>