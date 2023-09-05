<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Number Sheet</title>

</head>

<style>
    @font-face {
                font-family: "Kalpurush";
                src: url({{asset('fonts/Kalpurush.ttf')}}) format('truetype');
            },

    body { font-family: "Kalpurush"},


    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .table1 {
        margin-top: 3rem;
        margin-bottom: 40px;
    }

    .student-img {
        margin-right: 35px;
        object-fit: cover;
    }

    @media (max-width:515px) {
        .student-img {
            margin-right: 10px;
            width: 90px !important;
            height: 90px !important;
        }
    }

    td.tb-td-1 {
        font-size: 17px;
        line-height: 28px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;

    }

    td.tb-td-2 {
        padding: 0 20px;
        font-size: 17px;
        line-height: 28px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;

    }

    td.tb-td-father-name {
        font-size: 17px;
        line-height: 28px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;

    }

    td.father {
        padding: 0 20px;
        font-size: 17px;
        line-height: 28px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;

    }

    td.class {
        font-size: 17px;
        line-height: 28px;
        padding: 0 20px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;

    }

    td.six {
        font-size: 17px;
        line-height: 28px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;

    }

    td.mother {
        font-size: 17px;
        padding: 0 20px;
        line-height: 28px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;

    }

    td.mother-name {
        font-size: 17px;
        line-height: 28px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;

    }

    td.session {
        font-size: 17px;
        padding: 0 20px;
        line-height: 28px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;

    }

    td.year {
        font-size: 17px;
        line-height: 28px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;
        /* display: flex; */
        /* align-items: center; */
        gap: 5px;

    }

    span.span-1 {
        color: black;
    }

    td.contact {
        font-size: 17px;
        line-height: 28px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;

    }

    td.dot {
        font-size: 17px;
        padding: 0 20px;
        line-height: 28px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;

    }

    @media (max-width:1020px) {
        section#section {
            padding: 0 5px
        }
    }
</style>

<body>


    <div>
        <div style=" margin: auto; border: 4px solid #44536a; padding: 10px;">
            <div>
                <div style="width:25%;float:left">
                    <img style="height: 125px; width:125px; border-radius:50%;" src="{{Config::get('app.s3_url').Helper::academic_setting()->image}}" alt="logo img">
                </div>

                <div style="width: 50%; float:left; text-align:center">
                    <h2>
                        {{ Helper::academic_setting()->school_name }}</h2>
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <p
                            style="margin: 0 5px; font-family: Segoe UI;
              font-size: 18px;
              line-height: 10px;
              font-weight: 400;
              color: rgb(61, 104, 183);
              text-transform: uppercase;
              margin-top: 5px;">
                            ESTD {{ Helper::school_info()->founded_at }} EIIN:
                            {{ Helper::school_info()->eiin_no }}</p>
                        <p
                            style="font-family: Segoe UI;
              font-size: 14px;
              line-height: 14px;
              font-weight: 400;
              color: rgb(61, 104, 183);
              text-transform: uppercase;
              margin-top: 2px;">
                            {{ Helper::school_info()->address }}</p>
                    </div>
                </div>
            </div>

            <hr style="clear: both">


            <hr>
            <div
                style="background: #acbac3;
                border: 3px solid #44536a;
                margin-top: 30px;
                margin-bottom: 10px;
                text-align: center;
                overflow: hidden;">
                <span
                    style="font-size: 26px;
                    line-height: 20px;
                    text-transform: uppercase;
                    font-weight: 600;
                    background: #fff;
                    display: inline-block;
                    padding: 8px 10px;
                    ">{{$exam->name}}</span>
            </div>


            <!-- table -->
            <div>
                <table width="100%">
                    <tr style="border:1px solid;">
                        <th align="center" style="border:1px solid;">Student Id</th>
                        @foreach ($class->subjects as $s)
                            <th align="center" style="border:1px solid;">{{$s->sub_name}}</th>
                        @endforeach
                    </tr>

                    @foreach ($students as $s)
                    <tr style="border:1px solid;">
                        <td align="center" style="border:1px solid;">{{$s->id_no}}</td>
                        
                        @foreach ($class->subjects as $s)
                        <td align="center" style="border:1px solid;"></td>
                        @endforeach
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>

</html>
