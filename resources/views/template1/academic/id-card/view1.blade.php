@extends($adminTemplate.'.admin.layouts.app')
@push('css')
<style>
*{
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Poppins', sans-serif;
}
.main-div {
width: 100%;
}

.container {
width: 85%;
margin: auto;
}

.id-card-wrapper {
width: 100%;
display: flex;
justify-content: space-evenly;
/* align-items: center; */
height: 100vh;
}


@media (max-width:991px) {
.id-card-wrapper{
    flex-direction: column;
    height: 100%;
}
.card {
margin-bottom: 3rem;
}
}


@media (min-width:992px) {
.id-card-wrapper{
    flex-direction: row;
    height: 100%;
}
}

.card {
margin-top: 40px;
width: 340px;
height: 530px;
display: flex;
flex-direction: column;
position: relative;
z-index: 10;
box-shadow: 0px 4px 19.98px 7.02px rgb(0 0 0 / 20%);
}

.card h2 {
font-size: 18px;
font-weight: 600;
text-align: center;
text-transform: uppercase;
padding-top: 20px;
color: white;
padding: 20px 20px 0px 20px;
}

.card span {
text-align: center;
color: white;
font-size: 14px;
}

.card h3 {
text-align: center;
margin-top: 10px;
text-transform: uppercase;
margin-bottom: 15px;
color: white;
font-size: 15px;
font-weight: normal;
}

.card-img {
width: 150px;
height: 150px;
margin: auto;
}

.card-img img {
width: 100%;
height: 100%;
border-radius: 100px;
display: flex;
object-fit: cover;
border: 5px solid white;
justify-content: center;
align-items: center;
padding:5px;
}

.card h1 {
font-size: 22px;
text-align: center;
font-weight: bold;
margin-top: 10px;
color: #1c1c1c;
}

p.cls {
text-align: center;
margin-bottom: 20px;
color: #161616;
font-size: 15px;
font-weight: 500;
}

.table {
width: 60%;
font-size: 16px;
margin: auto;
text-transform: uppercase;
}

.flex {
display: flex;
justify-content: space-between;
align-items: center;
}
.flex p{
text-transform: capitalize;
}

footer {
width: 100%;
}

h2.slogan {
margin-top: 20px;
background: #009688;
color: white;
padding: 13px;
font-size: 15px;
font-weight: 500;
border-top: 5px solid #303030;
}

.card::after {
position: absolute;
width: 100%;
height: 160px;
background: #009688;
content: "";
z-index: -1;
border-bottom: 5px solid #303030;
border-bottom-right-radius: 140px;
padding-top: 20px;
}


.card2 {
margin-top: 40px;
display: flex;
flex-direction: column;
width: 340px;
box-shadow: 0px 4px 19.98px 7.02px rgb(0 0 0 / 20%);
height: 530px;
}

.trams {
background: #009688;
font-size: 20px;
text-align: center;
font-weight: 600;
color: white;
text-transform: uppercase;
margin-bottom: 30px;
margin-top: 20px;
padding: 15px;
}

.line {
display: flex;
gap: 20px;
align-items: center;
justify-content: space-between;
margin-bottom: 12px;
padding: 0 10px;
}

.box {
width: 20px;
height: 16px;
background: #ffc107;
}

p.lorem {
font-size: 14px;
width: 100%;
}
.call {
text-align: center;
margin: 4rem 0;
}

.call h2 {
font-size: 16px;
text-transform: capitalize;
font-weight: 600;
position: relative;
}

.call h2::after {
position: absolute;
content: "";
width: 50%;
bottom: -2px;
height: 1px;
background: #9e9e9e;
left: 85px;
}

.call p {
font-size: 15px;
margin-top: 3px;
}

footer.sig {
background: #009688;
text-align: center;
border-top: 10px solid #303030;
}

footer.sig img {
height: 121px;
object-fit: cover;
}
</style>
@endpush
@section('content')
    <div class="main-panel">
        @include($adminTemplate.'.academic.academicnav')

            <div class="id-card-wrapper">
                <div class="card">
                    {{-- <table style="border: none;">
                        <tr>
                            <td></td>
                            <td>
                                <h2 style="color:
                                white;font-size: 11px;font-weight: 600;text-align: right;text-transform: uppercase;padding-top:
                                20px;padding: 5px 0px 0px 0px;">{{Helper::academic_setting()->school_name}}</h2>
                                <p style="text-align: center; margin-left:-20px; color: white; font-size: 8px;">(Est-{{Helper::school_info()->founded_at}})</p>
                            </td>
                        </tr>
                    </table> --}}
                    <div class="row">
                        <div class="col-3">
                            <img style="width:70px;" src="{{Config::get('app.s3_url').Helper::academic_setting()->image}}" alt="">
                        </div>
                        <div class="col-9 px-0">
                            <h2 class="mt-2" style="color:
                                white;font-size: 15px;font-weight: 600;text-align:left;text-transform: uppercase;padding-top:
                                20px;padding: 5px 0px 0px 0px;">{{Helper::academic_setting()->school_name}}</h2>
                                <p style="text-align: left; margin-left:70px; color: white; font-size: 12px;">(Est-{{Helper::school_info()->founded_at}})</p>
                        </div>
                    </div>
                    {{-- <h2>{{Helper::school_info()->name}}</h2>
                    <span>(Est-{{Helper::school_info()->founded_at}})</span> --}}
                    <h3>identity card</h3>
                    <div class="card-img">
                        <img src="{{($student->photo != null) ? asset('uploads/students/'.$student->photo) : Helper::default_image_male()}}" alt="card image">
                    </div>
                    
                    <h1>{{$student->name}}</h1>
                    <p class="cls">(Class {{$student->ins_class->name}})</p>
                    <div class="table">
                        <div class="flex">
                            <p>Id no :</p>
                            <p>{{$student->id_no}}</p>
                        </div>
                        <div class="flex">
                            <p>Blood :</p>
                            <p>{{$student->blood_group}}</p>
                        </div>
                        <div class="flex">
                            <p>Roll :</p>
                            <p>{{$student->roll_no}}</p>
                        </div>
                        <div class="flex">
                            <p>Address :</p>
                            <p>{{$student->address}}</p>
                        </div>
                    </div>
                    <footer>
                        <h2 class="slogan">Your slogan here</h2>
                    </footer>
                </div>
    
    
                <div class="card2">
                    <h2 class="trams">Trams and conditions</h2>
                    <div class="line">
                        <div class="box"></div>
                        <p class="lorem">Lorem ipsum dolor sit amet consectetur. adipisicing elit.</p>
                    </div>
                    <div class="line">
                        <div class="box"></div>
                        <p class="lorem">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="call">
                        <h2>For emergency call</h2>
                        <p>01729-462003</p>
                    </div>
                    <footer class="sig">
                        <img src="https://cutewallpaper.org/cdn-cgi/mirage/dd19f2d06ebc24f541f142b37b4289ffa7de722a7607e39984c5c6dd4ce8defd/1280/24/signature-png/free-e1e5e-signature-9090e-generator-01853-easily-b6cb9-sign-799e5-digital-16c88-docs.png" alt="signeture image">
                    </footer>
                </div>
            </div>
    </div>
@endsection

@push('js')
<script>

</script>
@endpush
