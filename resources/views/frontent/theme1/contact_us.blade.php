@extends('frontent.theme1.layouts.web')

@section('content')



<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------
    START ContactUs PART
--------------------------------------------------------------------------------------------------------------------------------------------------- -->

<section class="ContactUs section_gaps">
    @php
$ins = App\Models\Institution::where('id',Helper::getInstituteId())->first();
$info = App\Models\SchoolInfo::where('institute_id',Helper::getInstituteId())->first();
$getintouch = App\Models\Getintouch::where('institute_id',Helper::getInstituteId())->first();
$sociallink = App\Models\Sociallink::where('institute_id',Helper::getInstituteId())->get();
@endphp

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="HeaderPart text-center">
                    <h2>Contact Us</h2>
                </div>

                <div class="ContactUsContent">

                    <div class="row d_flex">

                        <div class="col-lg-6">
                            @if(@$info->googlemap)
                            {!! $info->googlemap !!}
                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14605.861785163754!2d90.43156302695704!3d23.76643445330169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c78c71227c15%3A0x9f0818437919415d!2sAftab%20Nagar%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1674316567978!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                            @else
                            <h2>{{@$ins->title}}</h2>
                            <p>East : {{$info->founded_at}}
                            | EIIN: {{$info->eiin_no}}
                            | {{$getintouch->address}}
                            </p>
                            @endif

                        </div>

                        <div class="col-lg-6">

                            <div class="ContactUsAddress">

                                <ul>
                                    <li><a href="tel:{{@$getintouch->phone}}"><i class="fas fa-phone-alt"></i> {{@$getintouch->phone}}</a>
                                    </li>
                                    <li><a href="mailto:{{@$getintouch->email}}"><i class="fas fa-envelope"></i>
                                            {{@$getintouch->email}}</a></li>
                                            @if($info)
                                    <li>
                                        <i class="fas fa-location"></i>
                                    {{$getintouch->address}}
                                    </li>
                                    @endif
                                </ul>

                                <div class="Form">

                                    <form action="{{route('web.message_store')}}" method="post">
                                        @csrf

                                        <div class="CustomeInput">

                                            <label>Name</label>
                                            <input type="text" name="name" value="" placeholder="Name">

                                        </div>

                                        <div class="CustomeInput">
                                            <label for="email">Email Addresss</label>
                                            <input type="email" id="email" name="email" value="" placeholder="Email Addresss">

                                        </div>

                                        <div class="CustomeInput">

                                            <label>Message</label>
                                            <textarea name="message" rows="5"></textarea>

                                        </div>

                                        <div class="CustomeInput">

                                            <button class="bg" type="submit">Submit</button>

                                        </div>

                                    </form>

                                </div>

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
