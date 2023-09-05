<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <div style="width: 80%; margin: auto; padding: 40px;">
      <div
        style="
          border: 15px solid #1c6077;
          width: 100%;
          padding: 4px;
          float: left;
          margin-bottom: 40px;
        "
      >
        <div
          style="
            border: 2px solid #1c6077;
            width: 100%;
            padding: 1px;
            float: left;
            
          "
        >
          <div
            style="
              border: 2px solid #1c6077;
              width: 100%;
              padding: 4px;
              float: left;
            "
          >
            <div style="width: auto; float: left">
              <img style="height: 120px" src="{{Config::get('app.s3_url').Helper::academic_setting()->image}}" />
              <p style="font-size: 15px; color: #000">SL No. {{$student->id_no}}</p>
              <p style="font-size: 15px; color: #000">ID. {{$student->roll_no}}</p>
            </div>
            <div style="width: 70%; float: left">
              <div
                style="
                  width: 100%;
                  float: left;
                  text-align: center;
                  margin-top: 16px;
                "
              >
                <h1 style="font-size: 25px; font-weight: 600">
                  {{ Helper::academic_setting()->school_name }}
                </h1>
                <p style="font-size: 16px; color: #000; margin-top: 10px">
                  {{Helper::school_info()->address}}
                </p>
                <p style="font-size: 16px; color: #000">
                  Email : {{Helper::school_info()->email}}
                </p>
              </div>
            </div>
            <div style="width: 100%; float: left">
              <h1
                style="
                  text-align: center;
                  font-size: 40px;
                  color: rgb(20, 20, 20);
                  margin-top: 25px;
                "
              >
                Testimonial
              </h1>
            </div>
            <div
              style="
                width: 100%;
                float: left;
                margin-top: 15px;
                padding: 0px 30px;
              "
            >
                @php
                    $find = [':name',':father_name',':mother_name',':division',':district',':upazila',':class'];
                    $replacement = [@$student->name , @$student->father_name, @$student->mother_name, @$student->division->name, @$student->district->name, @$student->upazila->name, @$student->class->name];
                    $content = str_replace($find, $replacement, $template->testimonial_content);
                @endphp
              <p>
                {!! $content !!}
              </p>
            </div>
            
            <div style="width: 40%; float: left; text-align: center;margin-bottom:40px;">
                <div style="width: 30%; margin: auto; height: 2px; background-color: #000;margin-top: 100px;"></div>
                <p style="margin-top: 10px;font-size: 15px;">Office Assistant</p>
                <p>Date: 28 Dec 2022</p>
            </div>
            <div style="width: 20%;float: left;margin: auto;margin-bottom: 20px;margin-top:40px">
                <img style="height: 120px; " src="{{asset('academic/qrcode/'.Helper::getInstituteId().'_qrcode.png')}}">
            </div>
            <div style="width: 40%; margin: auto; float: left; text-align: center;margin-bottom: 40px;">
                <div style="width: 50%; margin: auto; height: 2px; background-color: #000;margin-top: 100px;"></div>
                <p style="margin-top: 10px;font-size: 15px;">Head Master
                </p>
                <p>NEW GOLDEN CHILD EDUCATION SCHOOL</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
