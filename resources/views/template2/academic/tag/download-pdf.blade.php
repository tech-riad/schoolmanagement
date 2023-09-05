<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Student Tag</title>
</head>

<style>

    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    @font-face {
        font-family: "SolaimanLipi";
        src: url({{ asset('fonts/SolaimanLipi.ttf') }});
    }

    ,

    body {
        font-family: "SolaimanLipi"
    }

    ,

    .page_break {
        page-break-before: always;
    }
</style>

<body style="line-height: 7px;">
        @if (isset($students))
            @foreach ($students as $key => $student)
            <div style="width:100%:">
                <div style="width:225px;height:100px;border:1px solid black; padding:5px;float:left;margin-left:20px; margin-top:10px;">
                    <table style="width: 100%;">
                        <tr>
                            <td colspan="4" style="font-size: 12px; font-weight: 600; text-align: center;">Mohammadpur High School</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4" style="font-size: 8px; text-align: center;padding-top: 5px;padding-bottom:5px;">EIIN : {{ Helper::school_info()->eiin_no }} ESTD : <span style="font-size: 8px;">{{ Helper::school_info()->founded_at }}</span>  </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="width: 60px;padding-right: 5px;">
                                <img style="width: 100%;" src="{{Config::get('app.s3_url').Helper::academic_setting()->image}}" alt="">
                            </td>
                            <td>
                                <table style="width: 100%;">
                                   <tr>
                                    <td style="font-size: 10px;">Name</td>
                                    <td style="font-size: 10px;">:&#160;&#160;&#160;&#160;</td>
                                    <td colspan="8" style="font-size: 10px;">{{$student->name}}</td>
                                    <td></td>
                                    <td></td>
                                   </tr>
                                   <tr>
                                    <td style="font-size: 10px;">Id</td>
                                    <td style="font-size: 10px;">:</td>
                                    <td style="font-size: 10px;">{{$student->id_no}}</td>
                                   </tr>
                                   <tr>
                                    <td style="font-size: 10px;">Section</td>
                                    <td style="font-size: 10px;">:</td>
                                    <td style="font-size: 10px;">{{$student->section->name ? $student->section->name : 'N/A'}}</td>
                                   </tr>
                                   <tr>
                                    <td style="font-size: 10px;">Roll</td>
                                    <td style="font-size: 10px;">:</td>
                                    <td style="font-size: 10px;">{{$student->roll_no}}</td>
                                   </tr>
                                </table>
                            </td>
                        </tr>
                        
                        </table>
                </div>
            </div>
                @if (($key + 1) % 3 == 0)
                    <br style="clear:both">
                @endif

                @if (($key + 1) % 21 == 0)
                    <div class="page_break"></div>
                @endif
            @endforeach
        @else
        <div style="width:100%:">
            <div style="width:225px;height:100px;border:1px solid black; padding:5px;float:left;margin-left:20px; margin-top:10px;">
                <table style="width: 100%;">
                    <tr>
                        <td colspan="4" style="font-size: 12px; font-weight: 600; text-align: center;">Mohammadpur High School</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="font-size: 8px; text-align: center;padding-top: 5px;padding-bottom:5px;">EIIN : {{ Helper::school_info()->eiin_no }} ESTD : <span style="font-size: 8px;">{{ Helper::school_info()->founded_at }}</span>  </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="width: 60px;padding-right: 5px;">
                            <img style="width: 100%;" src="{{Config::get('app.s3_url').Helper::academic_setting()->image}}" alt="">
                        </td>
                        <td>
                            <table style="width: 100%;">
                               <tr>
                                <td style="font-size: 10px;">Name</td>
                                <td style="font-size: 10px;">:&#160;&#160;&#160;&#160;</td>
                                <td colspan="8" style="font-size: 10px;">{{$student->name}}</td>
                                <td></td>
                                <td></td>
                               </tr>
                               <tr>
                                <td style="font-size: 10px;">Id</td>
                                <td style="font-size: 10px;">:</td>
                                <td style="font-size: 10px;">{{$student->id_no}}</td>
                               </tr>
                               <tr>
                                <td style="font-size: 10px;">Section</td>
                                <td style="font-size: 10px;">:</td>
                                <td style="font-size: 10px;">{{$student->section->name ? $student->section->name : 'N/A'}}</td>
                               </tr>
                               <tr>
                                <td style="font-size: 10px;">Roll</td>
                                <td style="font-size: 10px;">:</td>
                                <td style="font-size: 10px;">{{$student->roll_no}}</td>
                               </tr>
                            </table>
                        </td>
                    </tr>
                    
                    </table>
            </div>
        </div>
        @endif
</body>

</html>
