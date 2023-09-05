@extends('frontent.theme3.layouts.web')

@section('content')
    <!--====== PAGE BANNER PART ENDS ======-->
    
    <!--====== CONTACT PART START ======-->
    
    <section id="contact-page" class="pt-90 pb-120 gray-bg" style="padding-bottom:50px">
        <div class="container">
            <div class="row">
                @php
                $ins = App\Models\Institution::where('id',Helper::getInstituteId())->first();
                $info = App\Models\SchoolInfo::where('institute_id',Helper::getInstituteId())->first();
                $getintouch = App\Models\Getintouch::where('institute_id',Helper::getInstituteId())->first();
                $sociallink = App\Models\Sociallink::where('institute_id',Helper::getInstituteId())->get();
                @endphp
                
                <div class="col-lg-7">
                    <div class="contact-from mt-30">
                        <div class="section-title">
                            <h5>{{@$ins->title}}</h5>
                            <h2>Keep in touch</h2>
                        </div> <!-- section title -->
                        <div class="main-form pt-45">
                            <form id="contact-form" action="{{route('web.message_store')}}" method="post" data-toggle="validator">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <input name="name" type="text" placeholder="Your name" data-error="Name is required." required="required">
                                            
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <input name="email" type="email" placeholder="Email" data-error="Valid email is required." required="required">
                                            
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                            <textarea name="message" placeholder="Message" data-error="Please,leave us a message." required="required"></textarea>
                                            
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form">
                                            <button type="submit" class="main-btn">Send</button>
                                        </div> <!-- singel form -->
                                    </div> 
                                </div> <!-- row -->
                            </form>
                        </div> <!-- main form -->
                    </div> <!--  contact from -->
                </div>
                <div class="col-lg-5">
                    <div class="contact-address mt-30">
                        <ul>
                            <li>
                                <div class="singel-address">
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="cont">
                                        <p>
                                            <p>East : {{$info->founded_at}}
                                            | EIIN: {{$info->eiin_no}}
                                            | {{$getintouch->address}}</p>
                                    </div>
                                </div> <!-- singel address -->
                            </li>
                            <li>
                                <div class="singel-address">
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="cont">
                                        <p><a href="tel:{{@$getintouch->phone}}">{{@$getintouch->phone}}</a></p>
                                        
                                    </div>
                                </div> <!-- singel address -->
                            </li>
                            <li>
                                <div class="singel-address">
                                    <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="cont">
                                        <p><a href="mailto:{{@$getintouch->email}}">
                                            {{@$getintouch->email}}</a></p>
                                        
                                    </div>
                                </div> <!-- singel address -->
                            </li>
                        </ul>
                    </div> <!-- contact address -->
                    <div class="map mt-30">
                      
                        <div id="contact-map">
                            @if(@$info->googlemap)
                            {!! $info->googlemap !!}
                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14605.861785163754!2d90.43156302695704!3d23.76643445330169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c78c71227c15%3A0x9f0818437919415d!2sAftab%20Nagar%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1674316567978!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                            @endif
                        </div>
                    </div> <!-- map -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== CONTACT PART ENDS ======-->
   
    <!--====== FOOTER PART START ======-->
@endsection