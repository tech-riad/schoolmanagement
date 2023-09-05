@extends('frontent.theme3.layouts.web')

@section('content')





<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START TeacherList PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
<section class="TeacherList section_gaps pt-70 pb-110" style="padding-bottom:50px">

    <div class="container">

        <div class="row">

            <div class="col-lg-6 m-auto">

                <div class="HeaderPart text-center">

                    <h2>Teacher List</h2>

                </div>

            </div>

        </div>

        <div class="row">

            <!-- item -->
            @foreach ($teachers as $teacher)
                <div class="col-lg-3 col-sm-6 m-20">
                    <div class="TeacherListItem">
                        <button type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-bottom:10px">
                            <div class="img">
                                <img style="max-width: 302px;"  src="{{($teacher->photo) ? Config::get('app.s3_url').$teacher->photo : Helper::teacher_image()}}" alt="{{$teacher->name ?? '' }}">
                            </div>
                            <div class="text">
                                <div class="TextItem">
                                    <h5>{{@$teacher->designation->title ?? '' }}</h5>
                                    <h3>{{$teacher->name ?? '' }}</h3>
                                </div>
                                <div class="SocialIcon d_flex">

                                    <a href="{{$teacher->facebook_link ?? '' }}"><i class="fa fa-facebook-f"></i></a>
                                    <a href="{{$teacher->linkedin_link ?? '' }}"><i class="fa fa-linkedin"></i></a>
                                    <a href="{{$teacher->instagram_link ?? '' }}"><i class="fa fa-instagram"></i></a>
                                    <a href="{{$teacher->youtube_link ?? '' }}"><i class="fa fa-youtube"></i></a>
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
