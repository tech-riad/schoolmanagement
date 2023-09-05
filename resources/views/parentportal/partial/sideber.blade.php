 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
         <a class="sidebar-brand brand-logo" href="{{ route('parentportal') }}"><img src="{{ asset('assets/images/Edteco_logo.png') }}"
                 alt="logo" /></a>
         <a class="sidebar-brand brand-logo-mini" href="index.html"><img
                 src="{{ asset('assets/images/third-degree.svg') }}" alt="logo" /></a>
     </div>
     <ul class="nav">
         {{-- <li class="nav-item nav-category">
             <span class="nav-link">Navigation</span>
         </li> --}}
         <li class="nav-item menu-items {{Request::is('parentportal') ? 'active' : ''}}">
             <a class="nav-link" href="{{ route('parentportal') }}">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Dashboard</span>
             </a>
         </li>
         <li class="nav-item menu-items {{Request::is('parentportal') ? 'active' : ''}}">
             <a class="nav-link" href="{{ route('profile.index') }}">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Profile</span>
             </a>
         </li>

         <li class="nav-item menu-items {{Request::is('parentportal/studentinfo*') ? 'active' : ''}}">
             <a class="nav-link" href="{{ route('studentinfo.index') }}">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Student Account</span>
             </a>
         </li>
         <li class="nav-item menu-items {{Request::is('parentportal/fees*') ? 'active' : ''}}">
             <a class="nav-link" href="{{route('financial-statement.index')}}">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Fees</span>
             </a>
         </li>
         <li class="nav-item menu-items {{Request::is('parentportal/aplication*') ? 'active' : ''}}">
             <a class="nav-link" href="{{ route('aplication.index') }}">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Application</span>
             </a>
         </li>
         <li class="nav-item menu-items {{Request::is('parentportal/dairyandtask*') ? 'active' : ''}}">
             <a class="nav-link" href="{{ route('dairyandtask.index') }}">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Diary & Task</span>
             </a>
         </li>




     </ul>
 </nav>
