
@extends('frontent.theme1.layouts.web')

@section('content')
<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------  
    START Notice PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
<section class="Notice section_gaps">

    <div class="container">

        <div class="row">

            <div class="col-lg-8 m-auto">

                <div class="NoticeContent text-center">

                    <h2>All Notice</h2>

                    <!-- item  -->
                    @foreach ($notice as $n)
                    <div class="NoticeItem">

                        <a href="{{route('web.noticeShow',$n->id)}}">

                            <h5>{{$n->published_date ?? '' }}</h5>
                            <h3>{!!$n->title ?? '' !!}</h3>
                            <p>{!! Str::limit($n->content,30) ?? '' !!}<p>

                        </a>

                    </div>
                    @endforeach
                    

                    
                </div>

            </div>

        </div>

    </div>

</section>


<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------  
    START Footer PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
@endsection