@extends('frontent.theme2.layouts.web')
@section('content')
<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------  
    START AtAGlance PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
<section class="AtAGlance section_gaps pt-70 pb-110">

    <div class="container">

        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-lg-12">
        
                        <div class="AtAGlanceContent">
                            
        
                            <h1 class="text-center">{{$notice->title ?? $event->title }}</h1>
        
                            <div class="mt-4 text-center">
                                {!! $notice->content ?? $event->content!!}
                            </div>
                        </div>
        
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