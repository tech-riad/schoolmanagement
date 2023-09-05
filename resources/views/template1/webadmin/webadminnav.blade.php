@push('css')

<style>
    .navbar .nav-link.active, .navbar .nav-item.active {
       border-bottom: 3px solid rgba(0, 0, 0, 0.7);
    }
</style>

@endpush
<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mb-2 nested-menu shadow-sm rounded">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation" style="display: block !important;">
            <ul class="navbar-nav navbar-nav-hover mr-auto" id="tablist">
                <li class="nav-item">
                    <a class="nav-link home" id="home-tab" type="button">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" type="button" id="about-tab">
                        About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" type="button" id="admin-tab">
                        Administration
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" type="button" id="aca-tab">
                        Academic
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" type="button" id="download-tab">
                        Download
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" type="button" id="cocur-tab">
                        Co-Curriculum
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link gallery" type="button" id="gal-tab">
                        Gallery
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" type="button" id="contact-tab">
                        Contact
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" type="button" id="theme-tab">
                        Themes
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" type="button" id="color-tab">
                        Colors
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" type="button" id="setting-tab">
                        Setting
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="tab-content p-0" id="myTabContent">
    <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mt-2 mb-2 nested-menu shadow-sm rounded tab-pane fade show active" id="home">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover ml-auto">
                <li class="nav-item">
                    <a class="nav-link banner" href="{{ route('banner.index') }}" id="nav-hov">
                        Banner
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link news" href="{{route('news.index')}}" id="nav-hov">
                        News
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('notice.index')}}" class="nav-link notice" id="nav-hov">
                        Notices
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('message.index')}}" class="nav-link message" id="nav-hov">
                        Messages
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('sociallink.edit')}}" class="nav-link social_link" id="nav-hov" >
                        Link
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link meritstudent" href="{{route("meritstudent.index")}}" id="nav-hov">
                        Merit Student
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('ataglance.edit')}}" class="nav-link at_a_glance" id="nav-hov">
                        Glance
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('video.index')}}" class="nav-link videos"  id="nav-hov">
                        Video
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('event.index')}}" class="nav-link events" id="nav-hov">
                        Events
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('getintouch.edit')}}" class="nav-link getintouch" id="nav-hov">
                        Get in Touch
                    </a>
                </li>

                <li class="nav-item {{Request::is('webadmin/info*')?'active':''}}">
                    <a href="{{route('info.index')}}" class="nav-link general_info" id="nav-hov">
                        General Info
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mt-2 mb-2 nested-menu shadow-sm rounded tab-pane fade " id="about">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav navbar-nav-hover ml-auto">

                    <li class="nav-item ">
                        <a class="nav-link active abouthistory" href="{{ route('page.admin.show', 1) }}" id="nav-hov">
                            History
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link aboutwhystudy" href="{{ route('page.admin.show', 2) }}" id="nav-hov">
                            Why Study
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link aboutinfrastructure" href="{{ route('page.admin.show', 3) }}" id="nav-hov">
                            Infrastructure
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  aboutachievement" href="{{ route('page.admin.show', 4) }}" id="nav-hov">
                            Achievement
                        </a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mt-2 mb-2 nested-menu shadow-sm rounded tab-pane fade " id="admin">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav navbar-nav-hover ml-auto">

                    <li class="nav-item">
                        <a class="nav-link active" href="" id="nav-hov">
                            Governing Body List Add
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="" id="nav-hov">
                            Teachers Info Set
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" id="nav-hov">
                            Staff
                        </a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mt-2 mb-2 nested-menu shadow-sm rounded tab-pane fade " id="aca">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav navbar-nav-hover ml-auto">

                    <li class="nav-item">
                        <a class="nav-link active" href="" id="nav-hov">
                            Students List Set
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="" id="nav-hov">
                            Syllabus & Booklist
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" id="nav-hov">
                            Result Setting
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mt-2 mb-2 nested-menu shadow-sm rounded tab-pane fade " id="download">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav navbar-nav-hover ml-auto">

                    <li class="nav-item">
                        <a class="nav-link active" href="" id="nav-hov">
                            Digital Content
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="" id="nav-hov">
                            Hand Book
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" id="nav-hov">
                            Class Notes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" id="nav-hov">
                            Others Download
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mt-2 mb-2 nested-menu shadow-sm rounded tab-pane fade " id="cocur">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav navbar-nav-hover ml-auto">

                    <li class="nav-item">
                        <a class="nav-link sports" href="{{ route('page.admin.show', 5) }}" id="nav-hov">
                            Sports
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link tours" href="{{ route('page.admin.show', 6) }}" id="nav-hov">
                            Tours
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scouts" href="{{ route('page.admin.show', 7) }}" id="nav-hov">
                            Scout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mt-2 mb-2 nested-menu shadow-sm rounded tab-pane fade " id="gal">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav navbar-nav-hover ml-auto">

                    <li class="nav-item">
                        <a class="nav-link photos" href="{{ route('institutephoto.index') }}" id="nav-hov">
                            Photos
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mt-2 mb-2 nested-menu shadow-sm rounded tab-pane fade " id="contact">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav navbar-nav-hover ml-auto">

                    {{-- <li class="nav-item">
                        <a class="nav-link active" href="" id="nav-hov">
                            Add Contact
                        </a>
                    </li> --}}
                    <li class="nav-item" id="user_message">
                        <a class="nav-link contact-nav" href="{{route('contact-us.index')}}" id="nav-hov">
                            User Message
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mt-2 mb-2 nested-menu shadow-sm rounded tab-pane fade " id="theme">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav navbar-nav-hover ml-auto">

                    <li class="nav-item">
                        <a class="nav-link active" href="" id="nav-hov">
                            Add Theme
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="color-nav navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mt-2 mb-2 nested-menu shadow-sm rounded tab-pane fade " id="color">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav navbar-nav-hover ml-auto">

                    <li class="nav-item" >
                        <a class="nav-link add-color" href="{{route('color.index')}}" id="nav-hov">
                            Add Color
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 mt-2 mb-2 nested-menu shadow-sm rounded tab-pane fade " id="setting">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav navbar-nav-hover ml-auto">

                    <li class="nav-item">
                        <a class="nav-link " href="{{route('menu.index')}}" id="nav-hov">
                            Menu / Sub Menu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('page.index')}}" class="nav-link pages" id="nav-hov" >
                            Pages
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</div>

@push('js')
<script>
    $('#home-tab').click(function(){
        $('#tablist li a').removeClass('active')
        $(this).addClass('active')
        $('#myTabContent nav').removeClass('show').removeClass('active')
        $('#home').addClass('show').addClass('active')
    })

    $('#about-tab').click(function(){
        $('#tablist li a').removeClass('active')
        $(this).addClass('active')
        $('#myTabContent nav').removeClass('show').removeClass('active')
        $('#about').addClass('show').addClass('active')
    })

    $('#admin-tab').click(function(){
        $('#tablist li a').removeClass('active')
        $(this).addClass('active')
        $('#myTabContent nav').removeClass('show').removeClass('active')
        $('#admin').addClass('show').addClass('active')
    })

    $('#aca-tab').click(function(){
        $('#tablist li a').removeClass('active')
        $(this).addClass('active')
        $('#myTabContent nav').removeClass('show').removeClass('active')
        $('#aca').addClass('show').addClass('active')
    })

    $('#download-tab').click(function(){
        $('#tablist li a').removeClass('active')
        $(this).addClass('active')
        $('#myTabContent nav').removeClass('show').removeClass('active')
        $('#download').addClass('show').addClass('active')
    })
    $('#cocur-tab').click(function(){
        $('#tablist li a').removeClass('active')
        $(this).addClass('active')
        $('#myTabContent nav').removeClass('show').removeClass('active')
        $('#cocur').addClass('show').addClass('active')
    })
    $('#gal-tab').click(function(){
        $('#tablist li a').removeClass('active')
        $(this).addClass('active')
        $('#myTabContent nav').removeClass('show').removeClass('active')
        $('#gal').addClass('show').addClass('active')
    })
    $('#contact-tab').click(function(){
        $('#tablist li a').removeClass('active')
        $(this).addClass('active')
        $('#myTabContent nav').removeClass('show').removeClass('active')
        $('#contact').addClass('show').addClass('active')
    })
    $('#theme-tab').click(function(){
        $('#tablist li a').removeClass('active')
        $(this).addClass('active')
        $('#myTabContent nav').removeClass('show').removeClass('active')
        $('#theme').addClass('show').addClass('active')
    })
    $('#color-tab').click(function(){
        $('#tablist li a').removeClass('active')
        $(this).addClass('active')
        $('#myTabContent nav').removeClass('show').removeClass('active')
        $('#color').addClass('show').addClass('active')
    })
    $('#setting-tab').click(function(){
        $('#tablist li a').removeClass('active')
        $(this).addClass('active')
        $('#myTabContent nav').removeClass('show').removeClass('active')
        $('#setting').addClass('show').addClass('active')
    })
</script>
@endpush

