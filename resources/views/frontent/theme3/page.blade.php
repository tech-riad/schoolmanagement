@extends('frontent.theme3.layouts.web')

@section('content')


<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------  
    START AtAGlance PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
<section class="AtAGlance section_gaps" style="padding-bottom:50px">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <div class="AtAGlanceContent">
                    <h1 class="text-center">{{$page->title ?? ''}}</h1>
                    <div class="mt-3 text-center">
                        <img style="width: 220px;" src="{{@$page->image ? asset('uploads/pageimages/'.$page->image) : ''}}" alt="" srcset="">
                    </div>
                    <div class="mt-4 text-left">
                        {!! @$page->content ?? '' !!}
                    </div>
                </div>

            </div>

        </div>

    </div>

</section>


<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------  
    START Footer PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
@endsection