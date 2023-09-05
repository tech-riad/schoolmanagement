@extends('frontent.theme1.layouts.web')

@section('content')




<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------  
    START GalleryEvent PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
<section class="GalleryEvent section_gaps">

    <div class="container">

        <div class="row">

            <div class="col-lg-8 m-auto">

                <div class="header text-center">

                    <h2>GALLERY EVENTS</h2>

                </div>

            </div>

        </div>

        <div class="GalleryEventContent">

            <div class="row">
               
                @foreach ($galleries as $g)
                <div class="col-lg-4 col-sm-6">
                    <div class="img">
                        <img style="height: auto; width: 300px;"
                        src="/uploads/institutephoto/{{$g->image}}" />
                        <div class="overlay">
                            <a class="my-image-links" data-gall="gallery01" href="/uploads/institutephoto/{{$g->image}}">
                                <i class="fas fa-search"></i>
                            </a>
                        </div>

                    </div>

                </div>
                @endforeach

                

            </div>

        </div>

    </div>

</section>


<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------  
    START Footer PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
@endsection