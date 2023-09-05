<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Seat plan design</title>

    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        .page_break {
            page-break-before: always;
        }

    </style>
</head>

<body>

    @if (isset($students))
    @foreach ($students as $key => $student)
    <div style="width:395px;height:auto;float:left;margin-bottom:-40px;">
        <table style="width: 100%;">
            <td style="position: relative;">
              <img src="{{Helper::academic_setting()->image ? Config::get('app.s3_url').Helper::academic_setting()->image : asset('logo.jpg')}}" style="position: absolute; top: 14px; left: 20px; width: 50px; height: 50px;">
              <!-- Your table content goes here -->
          </td>
              <tr>
                  <td style="
               border-bottom: 2px dashed gray;
               border-right: 2px dashed gray;
               padding:5px;
               @if (($key+1) % 2 == 0 )
               border-right:none;
               @endif
             ">
                      <table style="border: 2px solid #3a873a; padding: 10px; width: 100%;">
                          @php
                              $stringNumber = Str::length(Helper::academic_setting()->school_name);
                          @endphp
                          <tr>
                              <td style="
                              padding-bottom: 3px;
                              text-transform: uppercase;
                              @if($stringNumber > 30 && $stringNumber < 40)
                              font-size: 10px;
                              @elseif($stringNumber > 40)
                              font-size: 8px;
                              @else
                              font-size: 13px;
                              @endif
                              text-align: center;
                              font-weight: 600;
                              color:green;
                              ">{{Helper::academic_setting()->school_name}}</td>
                              
                          </tr>
                          <tr>
                              <td style="
                              @if($stringNumber > 30 && $stringNumber < 40)
                              font-size: 9px;
                              @elseif($stringNumber > 40)
                              font-size: 7px;
                              @else
                              font-size: 10px;
                              @endif
                              text-align: center;color:black;padding-bottom: 15px">
                                  {{Helper::school_info()->address}}
                              </td>
                          </tr>
                          <tr>
                              <td style="
                              font-size: 12px;
                              text-align: center;
                              color: rgb(16, 16, 16);
                              font-weight: 600;
                              padding: 0px 0px;"><span style="border:2px solid #3a873a;padding:5px;text-transform: uppercase;border-radius: 20px; color:green; ">Exam seat plan</span></td>
                          </tr>
                          <tr>
                              <td>
                                  <table style="width: 100%;margin-top:10px;">
                                      <tr>
                                          <td style="font-size:12px;">Student Name</td>
                                          <td style="font-size:12px;">&#160;&#160;:&#160;&#160;&#160;</td>
                                          <td style="font-size:12px;">{{@$student->name}}</td>
                                          <td rowspan="2" style="
                               border-right: 1px solid #242424;
                               border-top: 1px solid #242424;
                               border-bottom: 1px solid #242424;
                               border-left: 1px solid #242424;
                               text-align: center;
                             ">
                                              <img style="width:40px;" src="{{ @$student->photo ? Config::get('app.s3_url').@$student->photo : asset('male.png')}}" alt="">
                                          </td>
                                      </tr>
                                      <tr>
                                          <td style="font-size:12px;">St ID</td>
                                          <td style="font-size:12px;">&#160;&#160;:&#160;&#160;&#160;</td>
                                          <td style="padding: 2px 0px; font-size:12px;">{{@$student->id_no}}</td>
                                      </tr>
                                      <tr>
                                          <td style="font-size:12px;">Session</td>
                                          <td style="font-size:12px;">&#160;&#160;:&#160;&#160;&#160;</td>
                                          <td style="font-size:12px;">{{@$student->session->title}}</td>
                                          <td style="
                               border-right: 1px solid #242424;
                               border-top: 1px solid #242424;
                               border-bottom: 1px solid #242424;
                               border-left: 1px solid #242424;
                               text-align: center;
                               font-weight: 600;
                               font-size:12px;
                             ">
                                              Roll
                                          </td>
                                      </tr>
                                      <tr>
                                          <td style="font-size:12px;">Exam</td>
                                          <td style="font-size:12px;">&#160;&#160;:&#160;&#160;&#160;</td>
                                          <td style="font-size:12px;">{{@$exam->name}}</td>
                                          <td style="
                               border-top: 1px solid #242424;
                               border-right: 1px solid #242424;
                               border-bottom: 1px solid #242424;
                               border-left: 1px solid #242424;
                               font-size: 12px;
                               text-align: center;
                               font-weight: 600;
                               padding: 3px 10px;
                             ">
                                              {{@$student->roll_no}}
                                          </td>
                                      </tr>
                                      <tr>
                                          <td style="padding-bottom: 3px;font-size:12px;">Class</td>
                                          <td style="font-size:12px;">&#160;&#160;:&#160;&#160;&#160;</td>
                                          <td style="font-size:12px;">{{@$student->class->name}}{{@$student->shift->name != 'N/A' ? '-'.@$student->shift->name : ''}}{{@$student->category->name != 'N/A' ? '-'.@$student->category->name : ''}}
                                          </td>
                                      </tr>
                                      <tr>
                                          <td style="font-size:12px;">Group</td>
                                          <td style="font-size:12px;">&#160;&#160;:&#160;&#160;&#160;</td>
                                          <td style="font-size:12px;">{{@$student->group->name != 'N/A' ? @$student->group->name : ''}}</td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                          <!-- another -->
                      </table>
                  </td>
              </tr>
          </table>
    </div>
    @if (($key + 1) % 2 == 0)
    <br style="clear: both">
    @endif
    @if (($key+1) % 8 == 0 )
    <div class="page_break"></div>
    @endif
    @endforeach
    @else
    <div style="width:395px;height:auto;float:left;margin-bottom:-40px;">
        <table style="width: 100%;">
            <td style="position: relative;">
              <img src="{{Helper::academic_setting()->image ? Config::get('app.s3_url').Helper::academic_setting()->image : asset('logo.jpg')}}" style="position: absolute; top: 14px; left: 20px; width: 50px; height: 50px;">
              <!-- Your table content goes here -->
          </td>
              <tr>
                  <td style="
               /* border-bottom: 2px dashed gray;
               border-right: 2px dashed gray;
               padding:14px; */
             ">
                      <table style="border: 2px solid #3a873a; padding: 10px; width: 100%;">
                          @php
                              $stringNumber = Str::length(Helper::academic_setting()->school_name);
                          @endphp
                          <tr>
                              <td style="
                              padding-bottom: 3px;
                              text-transform: uppercase;
                              @if($stringNumber > 30 && $stringNumber < 40)
                              font-size: 10px;
                              @elseif($stringNumber > 40)
                              font-size: 8px;
                              @else
                              font-size: 13px;
                              @endif
                              text-align: center;
                              font-weight: 600;
                              color:green;
                              ">{{Helper::academic_setting()->school_name}}</td>
                              
                          </tr>
                          <tr>
                              <td style="
                              @if($stringNumber > 30 && $stringNumber < 40)
                              font-size: 9px;
                              @elseif($stringNumber > 40)
                              font-size: 7px;
                              @else
                              font-size: 10px;
                              @endif
                              text-align: center;color:black;padding-bottom: 15px">
                                  {{Helper::school_info()->address}}
                              </td>
                          </tr>
                          <tr>
                              <td style="
                              font-size: 12px;
                              text-align: center;
                              color: rgb(16, 16, 16);
                              font-weight: 600;
                              padding: 0px 0px;"><span style="border:1px solid #3a873a;padding:5px;text-transform: uppercase;border-radius: 20px;color:green;">Exam seat plan</span></td>
                          </tr>
                          <tr>
                              <td>
                                  <table style="width: 100%;margin-top:10px;">
                                      <tr>
                                          <td style="font-size:12px;">Student Name</td>
                                          <td style="font-size:12px;">&#160;&#160;:&#160;&#160;&#160;</td>
                                          <td style="font-size:12px;">{{@$student->name}}</td>
                                          <td rowspan="2" style="
                               border-right: 1px solid #242424;
                               border-top: 1px solid #242424;
                               border-bottom: 1px solid #242424;
                               border-left: 1px solid #242424;
                               text-align: center;
                             ">
                                              <img style="width:40px;" src="{{ @$student->photo ? Config::get('app.s3_url').@$student->photo : asset('male.png')}}" alt="">
                                          </td>
                                      </tr>
                                      <tr>
                                          <td style="font-size:12px;">St ID</td>
                                          <td style="font-size:12px;">&#160;&#160;:&#160;&#160;&#160;</td>
                                          <td style="padding: 2px 0px; font-size:12px;">{{@$student->id_no}}</td>
                                      </tr>
                                      <tr>
                                          <td style="font-size:12px;">Session</td>
                                          <td style="font-size:12px;">&#160;&#160;:&#160;&#160;&#160;</td>
                                          <td style="font-size:12px;">{{@$student->session->title}}</td>
                                          <td style="
                               border-right: 1px solid #242424;
                               border-top: 1px solid #242424;
                               border-bottom: 1px solid #242424;
                               border-left: 1px solid #242424;
                               text-align: center;
                               font-weight: 600;
                               font-size:12px;
                             ">
                                              Roll
                                          </td>
                                      </tr>
                                      <tr>
                                          <td style="font-size:12px;">Exam</td>
                                          <td style="font-size:12px;">&#160;&#160;:&#160;&#160;&#160;</td>
                                          <td style="font-size:12px;">{{@$exam->name}}</td>
                                          <td style="
                               border-top: 1px solid #242424;
                               border-right: 1px solid #242424;
                               border-bottom: 1px solid #242424;
                               border-left: 1px solid #242424;
                               font-size: 12px;
                               text-align: center;
                               font-weight: 600;
                               padding: 3px 10px;
                             ">
                                              {{@$student->roll_no}}
                                          </td>
                                      </tr>
                                      <tr>
                                          <td style="padding-bottom: 3px;font-size:12px;">Class</td>
                                          <td style="font-size:12px;">&#160;&#160;:&#160;&#160;&#160;</td>
                                          <td style="font-size:12px;">{{@$student->class->name}}{{@$student->shift->name != 'N/A' ? '-'.@$student->shift->name : ''}}{{@$student->category->name != 'N/A' ? '-'.@$student->category->name : ''}}
                                          </td>
                                      </tr>
                                      <tr>
                                          <td style="font-size:12px;">Group</td>
                                          <td style="font-size:12px;">&#160;&#160;:&#160;&#160;&#160;</td>
                                          <td style="font-size:12px;">{{@$student->group->name != 'N/A' ? @$student->group->name : ''}}</td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                          <!-- another -->
                      </table>
                  </td>
              </tr>
          </table>
    </div>
    @endif
</body>

</html>
