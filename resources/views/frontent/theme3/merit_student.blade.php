@extends('frontent.theme3.layouts.web')

@section('content')





<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START TeacherList PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
<section class="TeacherList section_gaps pt-70 pb-110" style="padding-bottom:50px">

    <div class="container">

        <div class="row">

            <div class="col-lg-6 m-auto">

                <div class="HeaderPart text-center py-3">

                    <h2>Merit Student List</h2>

                </div>

            </div>

        </div>

        <div class="row">

            
                <!-- item -->
            @foreach ($meritStudents as $s)
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="StudentTestimonialItem d_flex">
                            <div class="img">
                                <img src="{{asset('frontend_assets/images/boy1.jpg')}}" alt="" width="90px">
                            </div>
            
                            <div class="text">
                                <h3>{{@$s->student->name ?? '' }}<span>Said</span></h3>
                                <h4>{{@$s->position ?? '' }}</h4>
                                <h4>{{@$s->student->section->name ?? '' }}</h4>
                                <h4>{{@$s->student->category->name ?? '' }}</h4>
                                <h4>{{@$s->student->group->name ?? '' }}</h4>
                            </div>
                        </div>
                    </div>
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
