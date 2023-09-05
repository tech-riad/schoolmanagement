 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
         <a class="sidebar-brand brand-logo" href="{{ route('home') }}"><img src="{{ asset('assets/images/Edteco_logo.png') }}"
                 alt="logo" /></a>

     </div>
     <ul class="nav">

         <li class="nav-item menu-items {{Request::is('home') ? 'active' : ''}}">
             <a class="nav-link" href="{{ route('banner.index') }}">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Webadmin</span>
             </a>
         </li>
         <li class="nav-item menu-items {{Request::is('dashboard') ? 'active' : ''}}">
             <a class="nav-link" href="{{ route('home') }}">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Dashboard</span>
             </a>
         </li>
         <li class="nav-item menu-items {{Request::is('banner*') ? 'active' : ''}}">
             <a class="nav-link" href="{{ route('banner.index') }}">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Banner</span>
             </a>
         </li>

         <li class="nav-item menu-items {{Request::is('institutephoto*') ? 'active' : ''}}">
             <a class="nav-link" href="{{ route('institutephoto.index') }}">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Institue Photo</span>
             </a>
         </li>
         <li class="nav-item menu-items">
             <a class="nav-link" href="{{ route('ataglance.index') }}">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">At a Glance</span>
             </a>
         </li>
         <li class="nav-item menu-items">
             <a class="nav-link" href="{{ route('aboutschool.index') }}">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">About School</span>
             </a>
         </li>
         <li class="nav-item menu-items">
             <a class="nav-link" href="{{ route('sociallink.index') }}">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Social Link</span>
             </a>
         </li>
         <li class="nav-item menu-items">
             <a class="nav-link" href="{{ route('page.index') }}">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Pages</span>
             </a>
         </li>
         <li class="nav-item menu-items">
             <a class="nav-link" href="{{ route('getintouch.index') }}">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Get in Touch</span>
             </a>
         </li>
         <li class="nav-item menu-items">
             <a class="nav-link" href="{{ route('event.index') }}">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Events</span>
             </a>
         </li>
         <li class="nav-item menu-items">
             <a class="nav-link" href="{{ route('video.index') }}">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Videos</span>
             </a>
         </li>
         <li class="nav-item menu-items">
             <a class="nav-link" href="{{ route('notice.index') }}">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Notices</span>
             </a>
         </li>
         <li class="nav-item menu-items">
             <a class="nav-link" href="{{ route('message.index') }}">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Messages</span>
             </a>
         </li>


     </ul>
 </nav>
