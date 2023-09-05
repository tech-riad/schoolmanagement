@extends('frontent.theme3.layouts.web')

@section('content')


@php
    $msg = App\Models\Messages::find(2);
@endphp

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------  
    START PrincipalMsg PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
<section class="PrincipalMsg section_gaps" style="padding-bottom:50px">

    <div class="container">

        <div class="row">

            <div class="col-lg-6 m-auto">

                <div class="HeaderPart text-center">

                    <h2>{{$msg->title ?? ''}}</h2>

                </div>

            </div>

        </div>

        <div class="row d_flex">

            <div class="col-lg-4" style="border:1px solid #645151">

                <div class="PrincipalMsgImg">
                    <img src="{{@$msg->image ? asset('uploads/messages/'.$msg->image) : asset('uploads/Chairman.jpg')}}" alt="" width="320px">
                </div>

            </div>

            <div class="col-lg-8">
                
                <div class="PrincipalMsgContent">

                    <h3>{!! $msg->messager_name ?? '' !!}</h3>
                    <h4>{!! $msg->messager_designation ?? '' !!}</h4>

                    <p>{!! $msg->content ?? '' !!}</p>

                </div>
                
            </div>

        </div>

    </div>

</section>



<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------  
    START Footer PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->
@endsection