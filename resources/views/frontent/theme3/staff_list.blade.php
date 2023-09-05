@extends('frontent.theme3.layouts.web')

@section('content')





<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------  
    START TeacherList PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
<section class="Stafflist section_gaps " style="padding-bottom:50px">

    <div class="container">

        <div class="row">

            <div class="col-lg-6 m-auto">

                <div class="HeaderPart text-center py-3">

                    <h2>Staff List</h2>

                </div>

            </div>

        </div>

        <div class="row">

            <!-- item -->
            @foreach ($staffs as $staff)
            <div class="col-sm-4 col-lg-4 col-xl-3">

                <div class="TeacherListItem mb-20">

                    
                    <button type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-bottom:10px">

                        <div class="img" >
                            <img src="{{Helper::teacher_image()}}" alt="" width="290px">
                        </div>

                        <div class="text">

                            <div class="TextItem">
                                <h5>{{$staff->designation->title  ?? '' }}</h5>
                                <h3>{{$staff->name ?? '' }}</h3>
                            </div>

                            <div class="SocialIcon d_flex">

                                <a href="{{$staff->facebook_link ?? '' }}"><i class="fa fa-facebook-f"></i></a>
                                <a href="{{$staff->linkedin_link ?? '' }}"><i class="fa fa-linkedin"></i></a>
                                <a href="{{$staff->instagram_link ?? '' }}"><i class="fa fa-instagram"></i></a>
                                <a href="{{$staff->youtube_link ?? '' }}"><i class="fa fa-youtube"></i></a>

                            </div>

                        </div>

                    </button>
                    

                </div>

            </div>
            @endforeach





        </div>

    </div>

</section>


<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------  
    START Footer PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
@endsection
