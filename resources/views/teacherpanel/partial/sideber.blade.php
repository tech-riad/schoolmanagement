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
         <li class="nav-item menu-items {{Request::is('teacherpanel') ? 'active' : ''}}">
             <a class="nav-link" href="{{ route('teacherpanel.index') }}">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Dashboard</span>
             </a>
         </li>
        
         <li class="nav-item menu-items {{Request::is('academic*') ? 'active' : ''}}">
             <a class="nav-link" href="">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Attendance Report</span>
             </a>
         </li>

         <li class="nav-item menu-items {{Request::is('teacherpanel/question*') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('teacherpanel.question.index')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Question Mangement</span>
            </a>
        </li>

         <li class="nav-item menu-items {{Request::is('fees*') ? 'active' : ''}}">
             <a class="nav-link" href="">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Marks Entry</span>
             </a>
         </li>
         <li class="nav-item menu-items {{Request::is('aplication*') ? 'active' : ''}}">
             <a class="nav-link" href="">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Manage Routine</span>
             </a>
         </li>
         <li class="nav-item menu-items {{Request::is('teacherpanel/leave-application*') ? 'active' : ''}}">
             <a class="nav-link" href="{{route('teacherpanel.application.index')}}">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Leave Application</span>
             </a>
         </li>
         <li class="nav-item menu-items {{Request::is('teacherpanel/homework *') ? 'active':''}}">
             <a class="nav-link" href="{{ route('teacherpanel.homework.index') }}">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Home Work</span>
             </a>
         </li>
         <li class="nav-item menu-items">
             <a class="nav-link" href="">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Fees Collection</span>
             </a>
         </li>
         <li class="nav-item menu-items">
             <a class="nav-link" href="">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Tutors Management</span>
             </a>
         </li>
         <li class="nav-item menu-items">
             <a class="nav-link" href="">
                 <span class="menu-icon">
                     <i class="mdi mdi-speedometer"></i>
                 </span>
                 <span class="menu-title">Tuition Manage</span>
             </a>
         </li>


         

     </ul>
 </nav>
