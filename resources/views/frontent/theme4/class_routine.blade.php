@extends('frontent.theme4.layouts.web')

@section('content')

@php
                        $class_id = app('request')->input('class_id');
                        $group_id = app('request')->input('group_id');
                        //dd($class_id);
                    @endphp

<div id="contents" class="sixteen columns">
    <div class="twelve columns" id="left-content">
        <div class="row mainwrapper">
            <div style=" background-color: #EFEFEF;border: 1px solid #CCCCCC;margin-bottom: 20px;padding: 10px;"
                class="row" id="news">
                <h5 style="float:left;margin:-3px 5px 0 0; font-weight:bold;font-size:.9em">খবর:</h5>
                <div id="news-ticker" style="overflow: hidden; position: relative; height: 0px;">
                    <ul style="font-size: 0.9em; position: absolute; margin: 0px; padding: 0px; width: 95%;">
                        <li class="lineheight"><a
                                href="site/news/4b812e79-fcfd-464f-b28b-0a2ff8f13036/%e0%a6%ac%e0%a7%87%e0%a6%95%e0%a6%be%e0%a6%b0%e0%a6%a4%e0%a7%8d%e0%a6%ac-%e0%a6%95%e0%a6%ae%e0%a6%be%e0%a6%a4%e0%a7%87-%e0%a6%b8%e0%a7%81%e0%a6%a6%e0%a6%95%e0%a7%8d%e0%a6%b7-%e0%a6%93-%e0%a6%95%e0%a6%b0%e0%a7%8d%e0%a6%ae%e0%a6%a0-%e0%a6%95%e0%a6%b0%e0%a7%8d%e0%a6%ae%e0%a6%b8%e0%a7%81%e0%a6%9a%e0%a6%bf-%e0%a6%9a%e0%a6%be%e0%a6%b2%e0%a7%81-%e0%a6%95%e0%a6%b0%e0%a6%be-%e0%a6%b9%e0%a6%ac%e0%a7%87---%e0%a6%ae%e0%a6%be%e0%a6%a8%e0%a6%a8%e0%a7%80%e0%a7%9f-%e0%a6%b6%e0%a6%bf%e0%a6%95%e0%a7%8d%e0%a6%b7%e0%a6%be-%e0%a6%89%e0%a6%aa%e0%a6%ae%e0%a6%a8%e0%a7%8d%e0%a6%a4%e0%a7%8d%e0%a6%b0%e0%a7%80-%e0%a6%ae%e0%a6%b9%e0%a6%bf%e0%a6%ac%e0%a7%81%e0%a6%b2-%e0%a6%b9%e0%a6%be%e0%a6%b8%e0%a6%be%e0%a6%a8-%e0%a6%9a%e0%a7%8c%e0%a6%a7%e0%a7%81%e0%a6%b0%e0%a7%80.html">বেকারত্ব
                                কমাতে সুদক্ষ ও কর্মঠ কর্মসুচি চালু করা হবে - মাননীয় শিক্ষা উপমন্ত্রী মহিবুল
                                হাসান চৌধুরী</a>
                            <i>(&#x09E8;&#x09E6;&#x09E7;&#x09EF;-&#x09E6;&#x09EF;-&#x09E8;&#x09EB;)</i></li>
                        <li class="lineheight"><a
                                href="site/news/c8e3aef6-ef0c-4062-b634-8e75677faca3/%e0%a6%aa%e0%a6%b0%e0%a7%8d%e0%a6%af%e0%a6%be%e0%a7%9f%e0%a6%95%e0%a7%8d%e0%a6%b0%e0%a6%ae%e0%a7%87--%e0%a6%b8%e0%a6%95%e0%a6%b2-%e0%a6%b6%e0%a6%bf%e0%a6%95%e0%a7%8d%e0%a6%b7%e0%a6%be-%e0%a6%ac%e0%a7%8d%e0%a6%af%e0%a6%ac%e0%a6%b8%e0%a7%8d%e0%a6%a5%e0%a6%be%e0%a6%95%e0%a7%87-%e0%a6%9c%e0%a6%be%e0%a6%a4%e0%a7%80%e0%a7%9f%e0%a6%95%e0%a6%b0%e0%a6%a3-%e0%a6%95%e0%a6%b0%e0%a6%be-%e0%a6%b9%e0%a6%ac%e0%a7%87---%e0%a6%b6%e0%a6%bf%e0%a6%95%e0%a7%8d%e0%a6%b7%e0%a6%be-%e0%a6%89%e0%a6%aa%e0%a6%ae%e0%a6%a8%e0%a7%8d%e0%a6%a4%e0%a7%8d%e0%a6%b0%e0%a7%80-%e0%a6%ae%e0%a6%b9%e0%a6%bf%e0%a6%ac%e0%a7%81%e0%a6%b2-%e0%a6%b9%e0%a6%be%e0%a6%b8%e0%a6%be%e0%a6%a8-%e0%a6%9a%e0%a7%8c%e0%a6%a7%e0%a7%81%e0%a6%b0%e0%a7%80--.html">পর্যায়ক্রমে
                                সকল শিক্ষা ব্যবস্থাকে জাতীয়করণ করা হবে - শিক্ষা উপমন্ত্রী মহিবুল হাসান চৌধুরী
                            </a> <i>(&#x09E8;&#x09E6;&#x09E7;&#x09EF;-&#x09E6;&#x09EF;-&#x09E7;&#x09EF;)</i>
                        </li>
                        <li class="lineheight"><a
                                href="site/news/9b39a022-8088-45d8-96a6-a23ecc98dd5e/%e0%a6%ac%e0%a6%be%e0%a6%82%e0%a6%b2%e0%a6%be%e0%a6%a6%e0%a7%87%e0%a6%b6-%e0%a6%a4%e0%a6%a5%e0%a6%be-%e0%a6%ac%e0%a6%bf%e0%a6%b6%e0%a7%8d%e0%a6%ac-%e0%a6%b6%e0%a6%be%e0%a6%a8%e0%a7%8d%e0%a6%a4%e0%a6%bf-%e0%a6%aa%e0%a7%8d%e0%a6%b0%e0%a6%a4%e0%a6%bf%e0%a6%b7%e0%a7%8d%e0%a6%a0%e0%a6%be%e0%a7%9f-%e0%a6%86%e0%a6%97%e0%a6%be%e0%a6%ae%e0%a7%80-%e0%a6%a6%e0%a6%bf%e0%a6%a8%e0%a7%87-%e0%a6%ad%e0%a7%81%e0%a6%ae%e0%a6%bf%e0%a6%95%e0%a6%be-%e0%a6%b0%e0%a6%be%e0%a6%96%e0%a6%ac%e0%a7%87-%e0%a6%b6%e0%a6%bf%e0%a6%95%e0%a7%8d%e0%a6%b7%e0%a6%be%e0%a6%b0%e0%a7%8d%e0%a6%a5%e0%a7%80%e0%a6%b0%e0%a6%be---%e0%a6%ae%e0%a6%be%e0%a6%a8%e0%a6%a8%e0%a7%80%e0%a7%9f-%e0%a6%b6%e0%a6%bf%e0%a6%95%e0%a7%8d%e0%a6%b7%e0%a6%be-%e0%a6%89%e0%a6%aa%e0%a6%ae%e0%a6%a8%e0%a7%8d%e0%a6%a4%e0%a7%8d%e0%a6%b0%e0%a7%80-%e0%a6%ae%e0%a6%b9%e0%a6%bf%e0%a6%ac%e0%a7%81%e0%a6%b2-%e0%a6%b9%e0%a6%be%e0%a6%b8%e0%a6%be%e0%a6%a8-%e0%a6%9a%e0%a7%8c%e0%a6%a7%e0%a7%81%e0%a6%b0%e0%a7%80--.html">বাংলাদেশ
                                তথা বিশ্ব শান্তি প্রতিষ্ঠায় আগামী দিনে ভুমিকা রাখবে শিক্ষার্থীরা - মাননীয়
                                শিক্ষা উপমন্ত্রী মহিবুল হাসান চৌধুরী </a>
                            <i>(&#x09E8;&#x09E6;&#x09E7;&#x09EF;-&#x09E6;&#x09EF;-&#x09E7;&#x09EB;)</i></li>
                    </ul>
                    <div style="float:right">
                        <a class="btn" href="site/view/news.html">সকল</a>
                    </div>
                </div>
            </div>
            <style>
                .lineheight {
                    line-height: 22px;
                }
            </style>
            <script></script>
            @php
                        $class_id = app('request')->input('class_id');
                        $group_id = app('request')->input('group_id');
                        //dd($class_id);
                    @endphp

            <div class="column block">
                <h5 class="bk-org title">
                Class Routine </h5>

                <div class="row">

                        <div class="col-lg-4">
                           <div class="form-control">
                            <select name="section_id" class="form-control" id="section_id" required>
                                <option value="">Select Section</option>
                                @foreach ($sections as $section)
                                    <option value="{{$section->id}}">{{@$section->class->name != 'N/A' ? @$section->class->name : ''}}{{@$section->shift->name != 'N/A' ? '-'. @$section->shift->name : ''}}{{@$section->name != 'N/A' ? '-'. @$section->name : '' }}</option>
                                @endforeach
                            </select>
                           </div>
                           <br>
                           <a href="" id="search" style="text-align: center" class="btn btn-info"><i class="fa fa-search"></i> Search Routine</a>
                        </div>
                    </div>
            
                <p>&nbsp;</p>

                
            </div>
            <style>
                #right-content .block {
                    display: block !important
                }
            </style>
            <script></script>
            
            
           
            
            
            <div class="column block">
                <h5 class="bk-org title">
                    মাধ্যমিক ও উচ্চ শিক্ষা বিভাগের অবস্থান </h5>

                <p>&nbsp;</p>

                <p><iframe frameborder="0" height="250"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14606.811117937137!2d90.37441860000003!3d23.75797610000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf5503de42ab%3A0x1f4f7d0b6e90a3be!2sAsad%20Gate!5e0!3m2!1sen!2sbd!4v1681028093237!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        style="border:0" width="720"></iframe></p>
                <p>
                    <a href="#" class="btn"
                        style="display:block;text-align:center;width:100%;">বিস্তারিত</a>
                </p>
            </div>
            <style>
                #right-content .block {
                    display: block !important
                }
            </style>
            <script></script>
        </div>
    </div>
    <div class="four columns right-side-bar" id="right-content">
        @foreach ($messages as $item)
        <div class="column block">
            <h5 class="bk-org title">
                {{@$item->messager_designation}}</h5>

            <p style="text-align:center">@if ($item->image === 'default.png')
                <div class="cover_img">
                    <img src="{{ Helper::default_image() }}" height="220px" alt="" />
                </div>
                @else
                <div class="cover_img">
                    <img src="{{ asset('uploads/messages/'.$item->image) }}" height="220px" alt="" />
                </div>
                @endif</p>

            <p style="text-align:center"><strong><span style="font-size:20px"><span style="font-size:22px">{{@$item->messager_name}}</span><span
                        style="font-size:16px">&nbsp;</span></strong></p>

            <p style="text-align:center">&nbsp;</p>
            <p>
                <a href="{{ route('web.messages',$item->id) }}" class="btn"
                    style="display:block;text-align:center;width:100%;">বিস্তারিত</a>
            </p>
        </div>
        <style>
            #right-content .block {
                display: block !important
            }
        </style>
        <script></script>
        @endforeach
        
        <div class="column block">
            <h5 class="bk-org title">
                একনজরে প্রতিষ্ঠান সম্পর্কে  </h5>

            <ul>
                {!! @$ataglance->content ?? '' !!}
            </ul>
            <p>
            </p>
        </div>
        <style>
            #right-content .block {
                display: block !important
            }
        </style>
        <script></script>
        <link rel="stylesheet" href="../code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="../code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <div class="column block">
            <h5 class="bk-org title">ইভেন্ট ক্যালেন্ডার
            </h5>

            @foreach ($events as $item)
            <ul>
                <li>
                    <h4>{{ date('M', strtotime($item->event_date)) }}
                        <span>{{ date('d', strtotime($item->event_date)) }}</span>
                    </h4>
                    <a href="{{ route('web.eventShow', $item->id) }}">{{ $item->title }}</a>
                </li>
            </ul>
            @endforeach
            <div class="clearfix"></div>
            <div id="datepicker"></div>
        </div>
        <style>
            .ui-widget {
                font-size: 12px;
            }

            .ui-datepicker {
                width: 97%;
            }

            td {
                padding: 3px !important;
            }

            .ui-state-default,
            .ui-widget-content .ui-state-default,
            .ui-widget-header .ui-state-default {
                text-align: center;
            }

            .css-class-to-highlight {
                background: orange !important;
            }
        </style>
        <script></script>
       
        
    </div>
</div>
    
@endsection