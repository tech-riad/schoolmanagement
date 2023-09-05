@extends($adminTemplate.'.admin.layouts.app')
@push('css')
<style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    .main-dev {
      width: 100%;
      padding: 2rem 0;
    }

    .container {
      width: 75%;
      margin: auto;
      border: 4px solid #4caf50;
    }

    .all-wrapper {
      display: flex;
      flex-direction: row;
      justify-content: flex-start;
      align-items: center;
      padding: 20px 20px;
      position: relative;
      border-bottom: 4px solid #4caf50;
    }

    .all-wrapper img {
      height: 150px;
      object-fit: cover;
      position: absolute;
    }

    .head-text {
      text-align: center;
      margin:  auto;
      margin-bottom: 20px;
    }

    .head-text h2 {
      font-size: 30px;
      color: #057405;
      font-weight: 600;
    }
    p.estd {
      margin-top: 10px;
      margin-bottom: 3px;
      font-size: 15px;
    }

    p.place-name {
      font-size: 15px;
    }

    .admid-box {
      position: absolute;
      width: 100%;
      text-align: center;
      bottom: -25px;
      /* margin-top: 20px; */
    }

    .admid-box h2 {
      margin: auto;
      font-family: "Algerian";
      font-size: 28px;
      font-weight: 500;
      position: absolute;
      top: -52px;
      left: 50%;
      transform: translateX(-50%);
      border: 2px solid #4b8baf;
      padding: 6px 40px;
      text-align: center;
      background: #fff;
    }

    .result-wrapper {
      padding: 5px;
      margin-top: 2.5rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    img.profile-img {
      height: 165px;
      object-fit: cover;
      margin-right: 15px;
      border: 1px solid black;
      padding: 3px;
    }
    tbody.table-body {
  font-size: 16px;
  font-weight: 500;
}
.table-2 {
  width: 35%;
}

.table-class-wrapper,.table-end {
  border-collapse: collapse;
  width: 100%;

}
.tb-td{
  border: 2px solid;
  font-weight: bold;
}
/* .table-end,th,td{
  border: 2px solid gray; font-weight: bold;
  font-weight: bold;
} */
.table-4{
  margin-top: 2rem;
  padding: 5px;
}
  </style>
@endpush
@section('content')
    <div class="page-body">
        @include($adminTemplate.'.exammanagement.topmenu_exammanagement')
        <div class="container">
            <div class="all-wrapper">
              <img
                src="{{asset('uploads/schoolinfo/logo.jpg')??Helper::school_info()->logo}}"
                alt="logo"
              />
              <div class="head-text">
                <h2>{{Helper::school_info()->name}}</h2>
                <p class="estd">
                  <span>ESTD: {{Helper::school_info()->founded_at}}</span>
                  EIIN: {{Helper::school_info()->eiin_no}}
                </p>
                <p class="place-name">{{Helper::school_info()->address}}</p>
              </div>
              <div class="admid-box">
                <h2>ACADEMIC TRANSCRIPT</h2>
              </div>
            </div>

            <div class="result-wrapper">
              <table class="table-1">
                <tbody class="table-body">
                  <tr class="table-tr-1">
                    <th colspan="5" rowspan="5">
                      <img
                        class="profile-img"
                        src="{{($student->photo != null) ? asset('uploads/students/'.$student->photo) : Helper::default_image_male()}}"
                        alt="profile img"
                      />
                    </th>
                    <td class="student-name">Student Name</td>
                    <td class="">&#160;&#160;&#160;&#160;: {{$student->name}}</td>
                  </tr>
                  <tr class="table-tr-2">
                    <td>Student Id</td>
                    <td>&#160;&#160;&#160;&#160;: {{$student->id_no}} (Class Roll : {{$student->roll_no}})</td>
                  </tr>
                  <tr class="table-tr-3">
                    <td>Father's Name</td>
                    <td>&#160;&#160;&#160;&#160;: {{$student->father_name}}</td>
                  </tr>
                  <tr class="table-tr-4">
                    <td>Mother's Name</td>
                    <td>&#160;&#160;&#160;&#160;: {{$student->mother_name}}</td>
                  </tr>
                  <tr class="table-tr-5">
                    <td>Mobile Number</td>
                    <td>&#160;&#160;&#160;&#160;: {{$student->mobile_number}}</td>
                  </tr>
                </tbody>
              </table>
              <!-- another table -->

              <div class="table-2">
                <table class="table-class-wrapper">
                    <tbody class="tbody">
                        <tr class="tbtr">
                            <td class="tb-td" style="padding: 5px;">Class</td>
                            <td class="tb-td" style="text-align: center;">:</td>
                            <td class="tb-td" style="padding: 5px;">{{$student->ins_class->name}}</td>
                        </tr>
                        <tr>
                            <td class="tb-td" style="padding: 5px;">Group</td>
                            <td class="tb-td" style="text-align: center;">:</td>
                            <td class="tb-td" style="padding: 5px;">{{$student->group->name}}</td>
                        </tr>
                        <tr>
                            <td class="tb-td" style="padding: 5px;">Section</td>
                            <td class="tb-td" style="text-align: center;">:</td>
                            <td class="tb-td" style="padding: 5px;">Section : {{$student->section->name}}</td>
                        </tr>
                        <tr>
                            <td class="tb-td" style="padding: 5px;">Session</td>
                            <td class="tb-td" style="text-align: center;">:</td>
                            <td class="tb-td" style="padding: 5px;">{{$student->session->title}}</td>
                        </tr>
                        <tr>
                            <td class="tb-td" style="padding: 5px;">Semester</td>
                            <td class="tb-td" style="text-align: center;">:</td>
                            <td rowspan="3" class="tb-td" style="padding: 5px;">{{$exam->name}}</td>
                        </tr>
                    </tbody>
                </table>
              </div>



            </div>
            <!-- last table -->
           <div class="table-4">
            <table class="table-end">
                <tr>
                    <td rowspan="2" style="padding: 15px 5px; background-color: #d5d5d5; font-size: 18px; text-align: center; border: 2px solid gray; font-weight: bold;">Sl</td>
                    <td rowspan="2" style="padding: 15px 5px; background-color: #d5d5d5; font-size: 18px; text-align: center; border: 2px solid gray; font-weight: bold;">Subject Name</td>
                    <td rowspan="2" style="padding: 15px 5px; background-color: #d5d5d5; font-size: 18px; text-align: center; border: 2px solid gray; font-weight: bold;">SUB
                        CODE</td>
                    <td rowspan="2" style="padding: 10px 5px; background-color: #d5d5d5; font-size: 18px; text-align: center; border: 2px solid gray; font-weight: bold;">Full Mark</td>
                    <td colspan="5" style="padding: 15px 5px; background-color: #d5d5d5; font-size: 18px; text-align: center; border: 2px solid gray; font-weight: bold;">OBTAINED MARKS</td>
                    <td rowspan="2" style="padding: 15px 5px; background-color: #d5d5d5; font-size: 18px; text-align: center; border: 2px solid gray; font-weight: bold;">Grand
                        Total</td>
                        <td rowspan="2" style="padding: 15px 5px; background-color: #d5d5d5; font-size: 18px; text-align: center; border: 2px solid gray; font-weight: bold;">GP</td>
                        <td rowspan="2" style="padding: 15px 5px; background-color: #d5d5d5; font-size: 18px; text-align: center; border: 2px solid gray; font-weight: bold;">Grade</td>


                </tr>
                <tr>
                    <td style="padding:5px; background-color: #d5d5d5; font-size: 18px; text-align: center; border: 2px solid gray; font-weight: bold;">SUB</td>
                    <td style="padding:5px; background-color: #d5d5d5; font-size: 18px; text-align: center; border: 2px solid gray; font-weight: bold;">OBJ</td>
                    <td style="padding:5px; background-color: #d5d5d5; font-size: 18px; text-align: center; border: 2px solid gray; font-weight: bold;">PRC</td>
                    <td style="padding:5px; background-color: #d5d5d5; font-size: 18px; text-align: center; border: 2px solid gray; font-weight: bold;">SBA</td>
                    <td style="padding:5px; background-color: #d5d5d5; font-size: 18px; text-align: center; border: 2px solid gray; font-weight: bold;">TOTAL</td>
                </tr>
                <tr>
                    <td style="padding: 5px; border: 2px solid gray; text-align: center;">1</td>
                    <td style="padding: 8px; border: 2px solid gray;">BANGLA 2ND</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">102</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">100</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">80</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">-</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">-</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">-</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center; background-color: #d5d5d5;">80</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center; background-color: rgb(249 220 229);">80</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">5</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">A+</td>
                </tr>
                <tr>
                    <td style="padding: 5px; border: 2px solid gray; text-align: center;">2</td>
                    <td style="padding: 8px; border: 2px solid gray;">ENGLISH 2ND </td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">102</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">100</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">80</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">-</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">-</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">-</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center; background-color: #d5d5d5;">80</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center; background-color: rgb(249 220 229);">80</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">5</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">A+</td>
                </tr>
                <tr>
                    <td style="padding: 5px; border: 2px solid gray; text-align: center;">3</td>
                    <td style="padding: 8px; border: 2px solid gray;">MATH</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">102</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">100</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">80</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">-</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">-</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">-</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center; background-color: #d5d5d5;">80</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center; background-color: rgb(249 220 229);">80</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">5</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">A+</td>
                </tr>
                <tr>
                    <td style="padding: 5px; border: 2px solid gray; text-align: center;">4</td>
                    <td style="padding: 8px; border: 2px solid gray;">RELIGION</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">102</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">100</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">80</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">-</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">-</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">-</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center; background-color: #d5d5d5;">80</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center; background-color: rgb(249 220 229);">80</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">5</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">A+</td>
                </tr>
                <tr>
                    <td style="padding: 5px; border: 2px solid gray; text-align: center;">5</td>
                    <td style="padding: 8px; border: 2px solid gray;">GENERAL SCIENCE</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">102</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">100</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">80</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">-</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">-</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">-</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center; background-color: #d5d5d5;">80</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center; background-color: rgb(249 220 229);">80</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">5</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">A+</td>
                </tr>
                <tr>
                    <td style="padding: 5px; border: 2px solid gray; text-align: center;">6</td>
                    <td style="padding: 8px; border: 2px solid gray;">BANGLADESH AND GLOBAL STUDIES</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">102</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">100</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">80</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">-</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">-</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">-</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center; background-color: #d5d5d5;">80</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center; background-color: rgb(249 220 229);">80</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">5</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">A+</td>
                </tr>
                <tr>
                    <td colspan="3" style="padding: 8px; border: 2px solid gray; text-align: right; color: green; font-weight: bold;">FULL MARK :</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: right; background-color: rgb(137, 196, 137); font-weight: bold; text-align: center; font-weight: bold;">600</td>
                    <td colspan="5" style="padding: 8px; border: 2px solid gray; text-align: right; color: rgb(248, 24, 98); font-weight: bold; text-align: center; font-weight: bold;">TOTAL MARK :</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: right; background-color: rgb(240, 190, 206); font-weight: bold; text-align: center; color: rgb(248, 24, 98); font-weight: bold;">555</td>
                    <td colspan="3" rowspan="3" style="padding: 8px; border: 2px solid gray; text-align: center;"></td>
                </tr>
                <tr>
                    <td colspan="9" style="padding: 8px; border: 2px solid gray; text-align: right; font-weight: bold;">Model Test Mark :</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">587</td>
                </tr>
                <tr>
                    <td colspan="9" style="padding: 8px; border: 2px solid gray; text-align: right; font-weight: bold;">Total Mark - 90 % (499.5) + Model Test Mark - 10 % (58.7)</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center;">558.2</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 5px; border: 2px solid gray; text-align: right; font-weight: bold;">Position In Class :</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center; font-weight: bold;">10</td>
                    <td colspan="3" style="padding: 8px; border: 2px solid gray; text-align: right; font-weight: bold;">GPA :</td>
                    <td colspan="2" style="padding: 8px; border: 2px solid gray; text-align: center; font-weight: bold; color: rgb(248, 24, 98);">5.00</td>
                    <td colspan="3" style="padding: 8px; border: 2px solid gray; text-align: right; font-weight: bold;">Total Subject Failed :</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center; font-weight: bold; color: rgb(248, 24, 98);">0</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 8px; border: 2px solid gray; text-align: right; font-weight: bold; ">Position In Section (GIRL's-A) :</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center; font-weight: bold;">1</td>
                    <td colspan="3" style="padding: 8px; border: 2px solid gray; text-align: right; font-weight: bold;">Grade Letter :</td>
                    <td colspan="2" style="padding: 8px; border: 2px solid gray; text-align: center; font-weight: bold; color: rgb(248, 24, 98);">A+</td>
                    <td colspan="3" style="padding: 8px; border: 2px solid gray; text-align: right; font-weight: bold;">Total Activities Days :</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center; font-weight: bold;">84</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 8px; border: 2px solid gray; text-align: right; font-weight: bold;">Result Status:</td>
                    <td colspan="6" style="padding: 8px; border: 2px solid gray; text-align: center; font-weight: bold;">PASS</td>
                    <td colspan="3" style="padding: 8px; border: 2px solid gray; text-align: right; font-weight: bold;">Absent Days:</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center; font-weight: bold;">83</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 8px; border: 2px solid gray; text-align: right; font-weight: bold;">School Opinion:</td>
                    <td colspan="6" style="padding: 8px; border: 2px solid gray; text-align: center; font-weight: bold;">EXCELLENT RESULT</td>
                    <td colspan="3" style="padding: 8px; border: 2px solid gray; text-align: right; font-weight: bold;">Absent Days:</td>
                    <td style="padding: 8px; border: 2px solid gray; text-align: center; font-weight: bold;">1</td>
                </tr>
                <tr>
                    <td rowspan="2" colspan="2" style="padding: 8px; border: 2px solid gray; text-align: center; font-weight: bold;">SELINA AKHTER <br>
                        <span style="font-size: 14px;">Class Teacher</span>
                    </td>
                    <td colspan="6" rowspan="2" style="padding: 8px; border: 2px solid gray; text-align: center; font-weight: bold;">Guardian/Parents Signature</td>
                    <td colspan="4" rowspan="2" style="padding: 8px; border: 2px solid gray; text-align: center; font-weight: bold;">MD. SAMSUL ALAM <br>
                        <span style="font-size: 14px;">Head Master</span>
                    </td>
                </tr>




            </table>
            <p style="padding: 8px; border-left: 2px solid gray; border-right: 2px solid gray; border-bottom: 2px solid gray; text-align: center; font-weight: bold; font-size: 12px;"></p>
           </div>

          </div>

    </div>
@endsection

@push('js')
<script>
    $('#exam_report_nav').show();
    $('#setting_menu').hide();
</script>
@endpush
