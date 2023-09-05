@extends('frontent.theme1.layouts.web')

@section('content')





<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------  
    START TeacherList PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
<section class="TeacherList section_gaps">

    <div class="container">

        <div class="row">

            <div class="col-lg-6 m-auto">

                <div class="HeaderPart text-center">

                    <h2>Staff List</h2>

                </div>

            </div>

        </div>

        <div class="row">

            <!-- item -->
            @foreach ($staffs as $staff)
            <div class="col-sm-6 col-lg-4 col-xl-3">

                <div class="TeacherListItem">

                    
                    <button type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">

                        <div class="img">
                            <img src="{{Helper::teacher_image()}}" alt="">
                        </div>

                        <div class="text">

                            <div class="TextItem">
                                <h5>{{$staff->designation->title  ?? '' }}</h5>
                                <h3>{{$staff->name ?? '' }}</h3>
                            </div>

                            <div class="SocialIcon d_flex">

                                <a href="{{$staff->facebook_link ?? '' }}"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{$staff->linkedin_link ?? '' }}"><i class="fab fa-linkedin-in"></i></a>
                                <a href="{{$staff->instagram_link ?? '' }}"><i class="fab fa-instagram"></i></a>
                                <a href="{{$staff->youtube_link ?? '' }}"><i class="fab fa-youtube"></i></a>

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
