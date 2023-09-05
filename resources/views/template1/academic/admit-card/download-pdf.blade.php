<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Admit Card</title>

</head>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;

    }
    .page_break {
            page-break-before: always;
        }
</style>

<body>
    <div>
        @if (isset($students))
            @foreach ($students as $key => $student)
            <div style="border-bottom: 2px dotted gray">
            <div style="width:750px; margin: auto; border: 8px solid #92d092;border-style:double;padding:10px;margin-bottom:10px;margin-top:10px;
            @if(isset($routine))
            height:auto;
            @else
            height:auto;
            @endif
            ">
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 50px;height: auto;padding-bottom:5px;">
                            <img style="width: 100%;" src="{{Helper::academic_setting()->image ? Config::get('app.s3_url').Helper::academic_setting()->image : asset('logo.jpg')}}" >
                        </td>
                        <td style="padding-bottom:5px;">
                            <table style="width: 100%;">
                                @php
                                    $stringNumber = Str::length(Helper::academic_setting()->school_name );
                                @endphp
                                <tr>
                                    <td colspan="3" style="text-align: center; padding-right: 85px; font-weight: 600;color:green;text-transform: uppercase;
                                    @if($stringNumber > 30 && $stringNumber < 40)
                                    font-size: 25px;
                                    @elseif($stringNumber > 40)
                                    font-size: 18px;
                                    @else
                                    font-size: 25px;
                                    @endif
                                    ">{{Helper::academic_setting()->school_name}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3" style=" width: 200px; text-align: center;padding-right: 85px;padding-top: 5px;text-transform: uppercase;color:black;
                                    @if($stringNumber > 40)
                                        font-size: 10px;
                                    @else
                                        font-size: 13px;
                                    @endif
                                    ">ESTD {{Helper::school_info()->founded_at}} EIIN: {{Helper::school_info()->eiin_no}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3" style=" width: 200px; text-align: center;padding-right: 85px;padding-top: 5px;text-transform: uppercase;color:black;padding-bottom:10px;
                                        @if($stringNumber > 40)
                                            font-size: 10px;
                                        @else
                                            font-size: 13px;
                                        @endif
                                    ">Address: {{Helper::school_info()->address}}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align: center;padding: 5px ;"> <span style="padding: 6px 30px; background-color: white; color: #000;font-size: 18px;font-weight: 600;text-transform: uppercase;border: 2px solid #36414d; margin-bottom:20px;">Admit Card</span> </td>
                    </tr>
                    <tr>
                        <td style="width: 95px; height: 100px;padding:16px 0px">
                            <img style="width: 100%;border: 3px solid black; padding: 3px;" src="{{ @$student->photo ? Config::get('app.s3_url').$student->photo : asset('male.png') }}">
                        </td>
                        <td style="padding-left: 20px;">
                            <table style="width:90%;margin-top:9px;">
                                <tr>
                                    <td style="padding:5px;font-size: 15px;">Name</td>
                                    <td style="padding:5px;font-size: 15px;" >:&#160;&#160;&#160;&#160;&#160;</td>
                                    <td style="padding:5px;font-size: 15px;">{{@$student->name}}</td>
                                    <td style="padding:5px;font-size: 15px;">Exam</td>
                                    <td style="padding:5px;font-size: 15px;" >:&#160;&#160;&#160;&#160;&#160;</td>
                                    <td style="padding:5px;font-size: 15px;">{{@$exam->name}}</td>
                                </tr>
                                <tr>
                                    <td style="padding:5px;font-size: 15px;">Father's Name</td>
                                    <td style="padding:5px;font-size: 15px;">:&#160;&#160;&#160;</td>
                                    <td style="padding:5px;font-size: 15px;">{{@$student->father_name}}</td>
                                    <td style="padding:5px;font-size: 15px;">ST ID</td>
                                    <td style="padding:5px;font-size: 15px;">:</td>
                                    <td style="padding:5px;font-size: 15px;">{{@$student->id_no}}</td>
                                </tr>
                                <tr>
                                    <td style="padding:5px;font-size: 15px;">Mother's Name</td>
                                    <td style="padding:5px;font-size: 15px;">:&#160;&#160;&#160;</td>
                                    <td style="padding:5px;font-size: 15px;">{{@$student->mother_name}}</td>
                                    <td style="padding:5px;font-size: 15px;">Roll</td>
                                    <td style="padding:5px;font-size: 15px;">:</td>
                                    <td style="padding:5px;font-size: 15px;">{{@$student->roll_no}}</td>
                                </tr>
                                <tr>
                                    <td style="padding:5px;font-size: 15px;">Class-Shift-Section</td>
                                    <td style="padding:5px;font-size: 15px;">:&#160;&#160;&#160;</td>
                                    <td style="padding:5px;font-size: 15px;">{{@$student->class->name}}-{{@$student->shift->name}}-{{@$student->section->name}}</td>
                                    <td style="padding:5px;font-size: 15px;">Session</td>
                                    <td style="padding:5px;font-size: 15px;">:</td>
                                    <td style="padding:5px;font-size: 15px;">{{@$student->session->title}}</td>
                                </tr>
                                <tr>
                                    <td style="padding:5px;font-size: 15px;">Category</td>
                                    <td style="padding:5px;font-size: 15px;">:&#160;&#160;&#160;</td>
                                    <td style="padding:5px;font-size: 15px;">{{Str::limit(@$student->category->name, 13,'...')}}</td>
                                    <td style="padding:5px;font-size: 15px;">Group</td>
                                    <td style="padding:5px;font-size: 15px;">:&#160;&#160;&#160;</td>
                                    <td style="padding:5px;font-size: 15px;">{{@$student->group->name}}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    @if(isset($routine))
                    <tr>
                        <td colspan="5" style="text-align: center;border: 2px solid #36414d;padding: 5px ;background-color: #ACBAC8;"> <span style="padding: 6px 30px; background-color: white; color: #000;font-size: 18px;font-weight: 600;">EXAM ROUTINE: {{$session->title}}</span></td>
                    </tr>
                    @endif
                </table>
                @if (isset($routine))
                <table style="width: 100%;margin-top:10px;">
                    <tr>
                        <td>
                            <table style="width: 100%;border: 1px solid;border-collapse: collapse;text-align:center;padding-right: 3px;">
                                <tr>
                                    <td style="border: 2px solid #36414d;background-color:#d8d8d8;padding:5px; font-weight: 500;">Date</td>
                                    <td style="border: 2px solid #36414d ;background-color: #d8d8d8; padding:5px; font-weight: 500;">Subject</td>
                                    <td style="border: 2px solid #36414d;background-color:#d8d8d8; padding:5px; font-weight: 500;">Time</td>
                                    <td style="border: 2px solid #36414d;background-color:#d8d8d8;padding:5px; font-weight: 500;">Date</td>
                                    <td style="border: 2px solid #36414d ;background-color: #d8d8d8; padding:5px; font-weight: 500;">Subject</td>
                                    <td style="border: 2px solid #36414d;background-color:#d8d8d8; padding:5px; font-weight: 500;">Time</td>
                                </tr>
                                    @foreach ($routine->subjects as $key => $sub)
                                        @if (($key + 1) % 2 != 0)
                                            <tr style="border:1px solid #36414d;">
                                        @endif
                                            <td align="center" style="border:1px solid #36414d; border-bottom:1px solid #36414d;padding-top:10px;padding-bottom:10px;">
                                                {{date('d-M-y', strtotime($sub->pivot->date))}}</td>
                                            <td align="center" style="border:1px solid #36414d;padding-top:10px;padding-bottom:10px;">
                                                {{ $sub->sub_name }}</td>
                                            <td align="center" style="border:1px solid #36414d;padding-top:10px;padding-bottom:10px;">
                                                {{date('h:i', strtotime($sub->pivot->start_time))}} - {{date('h:i', strtotime($sub->pivot->end_time))}}</td>

                                        @if (($key + 1) % 2 == 0)
                                            </tr>
                                        @endif
                                    @endforeach
                            </table>
                        </td>
                    </tr>
                </table>
                @endif
                <table style="width: 100%; padding: 5px">
                    @if (isset($routine))
                        <tr>
                            <td>{!! $routine->instruction !!}</td>
                        </tr>
                    @endif
                </table>
                <table style="width: 100%;padding-right:3px;margin-top:20px;">
                    <tr> 
                        <td style="padding-left:30px;"><img style="width:100px;" src="{{$assign_teacher_signature ? Config::get('app.s3_url').$assign_teacher_signature : asset('signature.png')}}" alt=""></td>
                        <td style="padding-left:480px;text-align:center;"><img style="width:100px;" src="{{Helper::academic_setting()->signImage ? Config::get('app.s3_url').Helper::academic_setting()->signImage : asset('signature.png')}}" alt=""></td>
                    </tr>
                    <tr>
                        <td style="padding-left:30px;">-----------------</td>
                        <td style="padding-left:480px;text-align:center;">----------------</td>
                    </tr>
                    <tr>
                        <td style="padding-left:30px;">Class Teacher</td>
                        <td style="padding-left:480px;text-align:center;">{{Helper::academic_setting()->signText}}</td>
                    </tr>
                </table>
            </div>
    </div>
            @if(!isset($routine))
                @if (($key + 1) % 2 == 0)
                <br style="clear: both">
                @endif

                @if (($key+1) % 2 == 0)
                    <div class="page_break"></div>
                @endif
            @else
                @if (($key + 1) % 1 == 0)
                <br style="clear: both">
                @endif

                @if (($key+1) % 1 == 0)
                    <div class="page_break"></div>
                @endif
            @endif
            @endforeach
    </div>

        @else
        <div style="border-bottom:3px dotted rgba(0, 0, 0, 0.352); padding:3px;">
        <div style="width:750px; margin: auto; border: 8px solid #92d092;border-style: double; height:auto; padding: 10px;margin-bottom:5px;margin-top:5px;">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 50px;height: auto;padding-bottom:5px;">
                        <img style="width: 100%;" src="{{Helper::academic_setting()->image ? Config::get('app.s3_url').Helper::academic_setting()->image : asset('logo.jpg')}}" >
                    </td>
                    <td style="padding-bottom:5px;">
                        <table style="width: 100%;">
                            @php
                                $stringNumber = Str::length(Helper::academic_setting()->school_name );
                            @endphp
                            <tr>
                                <td colspan="3" style="text-align: center; padding-right: 85px; font-weight: 600;color:green;text-transform: uppercase;
                                @if($stringNumber > 30 && $stringNumber < 40)
                                font-size: 25px;
                                @elseif($stringNumber > 40)
                                font-size: 18px;
                                @else
                                font-size: 25px;
                                @endif
                                ">{{Helper::academic_setting()->school_name}}</td>
                            </tr>
                            <tr>
                                <td colspan="3" style=" width: 200px; text-align: center;padding-right: 85px;padding-top: 5px;text-transform: uppercase;color:black;
                                @if($stringNumber > 40)
                                    font-size: 10px;
                                @else
                                    font-size: 13px;
                                @endif
                                ">ESTD {{Helper::school_info()->founded_at}} EIIN: {{Helper::school_info()->eiin_no}}</td>
                            </tr>
                            <tr>
                                <td colspan="3" style=" width: 200px; text-align: center;padding-right: 85px;padding-top: 5px;text-transform: uppercase;color:black;padding-bottom:10px;
                                    @if($stringNumber > 40)
                                        font-size: 10px;
                                    @else
                                        font-size: 13px;
                                    @endif
                                ">Address: {{Helper::school_info()->address}}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: center;padding: 5px ;"> <span style="padding: 6px 30px; background-color: white; color: #000;font-size: 18px;font-weight: 600;text-transform: uppercase;border: 2px solid #36414d; margin-bottom:20px;">Admit Card</span> </td>
                </tr>
                <tr>
                    <td style="width: 95px; height: 100px;padding:16px 0px">
                        <img style="width: 100%;border: 3px solid black; padding: 3px;" src="{{ @$student->photo ? Config::get('app.s3_url').$student->photo : asset('male.png') }}">
                    </td>
                    <td style="padding-left: 20px;">
                        <table style="width:90%;margin-top:9px;">
                            <tr>
                                <td style="padding:5px;font-size: 15px;">Name</td>
                                <td style="padding:5px;font-size: 15px;" >:&#160;&#160;&#160;&#160;&#160;</td>
                                <td style="padding:5px;font-size: 15px;">{{@$student->name}}</td>
                                <td style="padding:5px;font-size: 15px;">Exam</td>
                                <td style="padding:5px;font-size: 15px;" >:&#160;&#160;&#160;&#160;&#160;</td>
                                <td style="padding:5px;font-size: 15px;">{{@$exam->name}}</td>
                            </tr>
                            <tr>
                                <td style="padding:5px;font-size: 15px;">Father's Name</td>
                                <td style="padding:5px;font-size: 15px;">:&#160;&#160;&#160;</td>
                                <td style="padding:5px;font-size: 15px;">{{@$student->father_name}}</td>
                                <td style="padding:5px;font-size: 15px;">ST ID</td>
                                <td style="padding:5px;font-size: 15px;">:</td>
                                <td style="padding:5px;font-size: 15px;">{{@$student->id_no}}</td>
                            </tr>
                            <tr>
                                <td style="padding:5px;font-size: 15px;">Mother's Name</td>
                                <td style="padding:5px;font-size: 15px;">:&#160;&#160;&#160;</td>
                                <td style="padding:5px;font-size: 15px;">{{@$student->mother_name}}</td>
                                <td style="padding:5px;font-size: 15px;">Roll</td>
                                <td style="padding:5px;font-size: 15px;">:</td>
                                <td style="padding:5px;font-size: 15px;">{{@$student->roll_no}}</td>
                            </tr>
                            <tr>
                                <td style="padding:5px;font-size: 15px;">Class-Shift-Section</td>
                                <td style="padding:5px;font-size: 15px;">:&#160;&#160;&#160;</td>
                                <td style="padding:5px;font-size: 15px;">{{@$student->class->name}}-{{@$student->shift->name}}-{{@$student->section->name}}</td>
                                <td style="padding:5px;font-size: 15px;">Session</td>
                                <td style="padding:5px;font-size: 15px;">:</td>
                                <td style="padding:5px;font-size: 15px;">{{@$student->session->title}}</td>
                            </tr>
                            <tr>
                                <td style="padding:5px;font-size: 15px;">Category</td>
                                <td style="padding:5px;font-size: 15px;">:&#160;&#160;&#160;</td>
                                <td style="padding:5px;font-size: 15px;">{{Str::limit(@$student->category->name, 13,'...')}}</td>
                                <td style="padding:5px;font-size: 15px;">Group</td>
                                <td style="padding:5px;font-size: 15px;">:&#160;&#160;&#160;</td>
                                <td style="padding:5px;font-size: 15px;">{{@$student->group->name}}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                @if(isset($routine))
                <tr>
                    <td colspan="5" style="text-align: center;border: 2px solid #36414d;padding: 5px ;background-color: #ACBAC8;"> <span style="padding: 6px 30px; background-color: white; color: #000;font-size: 18px;font-weight: 600;">EXAM ROUTINE: {{$session->title}}</span></td>
                </tr>
                @endif
            </table>
            @if (isset($routine))
            <table style="width: 100%;margin-top:10px;">
                <tr>
                    <td>
                        <table style="width: 100%;border-collapse: collapse;text-align:center;padding-right: 3px;">
                            <tr>
                                <td style="border: 2px solid #36414d;background-color:#d8d8d8;padding:5px; font-weight: 500;">Date</td>
                                <td style="border: 2px solid #36414d ;background-color: #d8d8d8; padding:5px; font-weight: 500;">Subject</td>
                                <td style="border: 2px solid #36414d;background-color:#d8d8d8; padding:5px; font-weight: 500;">Time</td>
                                <td style="border: 2px solid #36414d;background-color:#d8d8d8;padding:5px; font-weight: 500;">Date</td>
                                <td style="border: 2px solid #36414d ;background-color: #d8d8d8; padding:5px; font-weight: 500;">Subject</td>
                                <td style="border: 2px solid #36414d;background-color:#d8d8d8; padding:5px; font-weight: 500;">Time</td>
                            </tr>
                                @foreach ($routine->subjects as $key => $sub)
                                    @if (($key + 1) % 2 != 0)
                                        <tr style="border:1px solid #36414d;">
                                    @endif
                                        <td align="center" style="border:1px solid #36414d; border-bottom:1px solid #36414d;padding-top:10px;padding-bottom:10px;">
                                            {{date('d-M-y', strtotime($sub->pivot->date))}}</td>
                                        <td align="center" style="border:1px solid #36414d;border-bottom:1px solid #36414d;padding-top:10px;padding-bottom:10px;">
                                            {{ $sub->sub_name }}</td>
                                        <td align="center" style="border:1px solid #36414d;border-bottom:1px solid #36414d;padding-top:10px;padding-bottom:10px;">
                                            {{date('h:i', strtotime($sub->pivot->start_time))}} - {{date('h:i', strtotime($sub->pivot->end_time))}}</td>
                                    @if (($key + 1) % 2 == 0)
                                        </tr>
                                    @endif
                                @endforeach
                        </table>
                    </td>
                </tr>
            </table>
            @endif
            <table style="width: 100%; padding: 5px">
                @if (isset($routine))
                    <tr>
                        <td>{!! $routine->instruction !!}</td>
                    </tr>
                @endif
            </table>
            <table style="width: 100%;padding-right:3px;margin-top:20px;">
                <tr> 
                    <td style="padding-left:30px;"><img style="width:100px;" src="{{$assign_teacher_signature ? Config::get('app.s3_url').$assign_teacher_signature : asset('signature.png')}}" alt=""></td>
                    <td style="padding-left:480px;text-align:center;"><img style="width:100px;" src="{{Helper::academic_setting()->signImage ? Config::get('app.s3_url').Helper::academic_setting()->signImage : asset('signature.png')}}" alt=""></td>
                </tr>
                <tr>
                    <td style="padding-left:30px;">-----------------</td>
                    <td style="padding-left:480px;text-align:center;">----------------</td>
                </tr>
                <tr>
                    <td style="padding-left:30px;">Class Teacher</td>
                    <td style="padding-left:480px;text-align:center;">{{Helper::academic_setting()->signText}}</td>
                </tr>
            </table>
        </div>
    </div>
        @endif
    </div>
</body>

</html>
