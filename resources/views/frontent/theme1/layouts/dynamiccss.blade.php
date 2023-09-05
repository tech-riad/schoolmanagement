@php
$header = $FrontSection->where('name', 'Header')->first();
$menubar = $FrontSection->where('name', 'Menubar')->first();
$marquee = $FrontSection->where('name', 'Marquee')->first();
$programs = $FrontSection->where('name', 'Programs')->first();
$LatestNews = $FrontSection->where('name', 'LatestNews')->first();
$VisiteSchool = $FrontSection->where('name', 'VisiteSchool')->first();
$WhyChooseUs = $FrontSection->where('name', 'WhyChooseUs')->first();
$Blog = $FrontSection->where('name', 'Blog')->first();
$Event = $FrontSection->where('name', 'Event')->first();
// dd($marquee);
    
@endphp

<style>
#Header{
    background-color: {{@$header->color->background_color}};
}

.HeaderContent li a{
    color:{{@$header->color->color}};

}
.Menubar{
    background-color:{{ @$menubar->color->background_color }}  !important;

}
.Menu ul li ul.Submenu{
    background-color:{{ @$menubar->color->background_color }}  !important;
}
.Menu ul li ul.Submenu li a{
    color:{{ @$menubar->color->color }}  !important;
}
.Marquee {
    background-color:{{ @$marquee->color->background_color }}  !important;
}

.middle ul li a{
    color:{{ @$marquee->color->color }}  ;
}


.Programs{
    background-color: {{@$programs->color->background_color}};
    color: {{@$programs->color->color}};

}
.LatestNews{
    background-color: {{@$LatestNews->color->background_color}};

}
.VisiteSchool{
    background-color: {{@$VisiteSchool->color->background_color}};
    color: {{@$VisiteSchool->color->color}};
}
.WhyChooseUs{
    background-color: {{@$WhyChooseUs->color->background_color}};
}
.Blog{
    background-color: {{@$Blog->color->background_color}};
}
.Event{
    background-color: {{@$Event->color->background_color}};
}




</style>
