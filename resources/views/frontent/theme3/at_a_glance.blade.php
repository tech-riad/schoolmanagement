@extends('frontent.theme3.layouts.web')

@section('content')

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------  
    START AtAGlance PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
<section class="AtAGlance section_gaps" style="padding-bottom:50px">

    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row">
        
                    <div class="col-lg-6 m-auto">
        
                        
                    </div>
        
                </div>
        
                <div class="row">
        
                    <div class="col-lg-12">
                        
        
                        <div class="AtAGlanceContent">
                            <div class="HeaderPart text-center">
        
                                <h2>{{$ataglance->title ?? ''}}</h2>
            
                            </div>
                            {!! $ataglance->content ?? '' !!}
        
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