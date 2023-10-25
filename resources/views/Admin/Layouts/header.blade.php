 <!--//page-header//-->
 <header class="navbar py-0 page-header navbar-expand navbar-light bg-white shadow-lg px-4">
     <a href="{{ route('dashboard') }}" class="navbar-brand d-block d-lg-none">
         <div class="d-flex align-items-center flex-no-wrap text-truncate">
             <!--Sidebar-icon-->
             <img src="{{ asset('images/logo.png') }}" alt="logo" class="brand-image img-circle elevation-3">
         </div>
     </a>
     <ul class="navbar-nav d-flex align-items-center h-100">
         <li class="nav-item d-none d-lg-flex flex-column h-100 me-lg-2 align-items-center justify-content-center">
             <a href="javascript:void(0)"
                 class="sidebar-trigger nav-link size-35 d-flex align-items-center justify-content-center p-0">
                 <i data-feather="arrow-left" class="fe-1x align-middle"></i>
             </a>
         </li>
         {{-- <li class="nav-item d-flex flex-column me-lg-2 h-100 justify-content-center dropdown">
             <a href="javascript:void(0)" data-bs-toggle="dropdown"
                 class="d-flex align-items-center justify-content-center nav-link size-35 p-0"
                 data-bs-auto-close="outside" aria-expanded="false">
                 <i data-feather="search" class="fe-1x align-middle"></i>
             </a>

             <!--Search dropdown menu-->
             <div class="dropdown-menu p-0 dropdown-menu-sm overflow-hidden mt-0">

                 <!--Search form-->
                 <form>
                     <div class="d-flex align-items-center p-1 border-bottom ps-4">
                         <div class="text-muted">
                             <i data-feather="search" class="fe-1x align-middle"></i>
                         </div>
                         <input type="text" autofocus class="form-control rounded-0 py-3 ps-2 border-0 shadow-none"
                             placeholder="Search everything...">
                     </div>
                 </form>
             </div>
         </li> --}}
         {{-- <li class="nav-item d-flex flex-column h-100 justify-content-center dropdown">
             <a href="#" data-bs-toggle="dropdown"
                 class=" dropdown-toggle nav-link py-1 px-2 d-flex align-items-center justify-content-center p-0">
                 Eng
             </a>
             <div class="dropdown-menu overflow-hidden mt-0">
                 <a href="#!" class="dropdown-item active">
                     English
                 </a>
                 <a href="#!" class="dropdown-item">
                     Spanish
                 </a>
                 <a href="#!" class="dropdown-item">
                     French
                 </a>
             </div>
         </li> --}}
     </ul>
     <ul class="navbar-nav ms-auto d-flex align-items-center h-100">
         <li class="nav-item dropdown d-flex align-items-center justify-content-center flex-column h-100 me-2 me-lg-4">
             <a href="#"
                 class="nav-link p-0 position-relative size-35 d-flex align-items-center justify-content-center rounded-2"
                 aria-expanded="false" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                 <i data-feather="bell" class="fe-2x align-middle"></i>
             </a>


             <div class="dropdown-menu mt-0 p-0 overflow-hidden dropdown-menu-end dropdown-menu-sm">
                 <div class="d-flex p-3 justify-content-between align-items-center border-bottom">
                     <h5 class="me-3 mb-0">Notifications</h5>
                     <div class="flex-shrink-0">
                     </div>
                 </div>
                 <div data-simplebar style="max-height:300px;">
                     <ul class="list-unstyled mb-0">
                         {{-- <li class="px-3 pt-3 h6">New</li> --}}
                         <!--//Notification item start//-->
                         <li class="d-block">
                             {{-- <div class="d-block me-3">
                                 <div class="avatar avatar-status status-online">
                                     <img src="{{ asset('admin/assets/media/avatars/01.jpg') }}"
                                     class="img-fluid rounded-circle w-auto" alt="">
                                    </div>
                                </div> --}}

                             <div class="flex-grow-1 flex-wrap">
                             </div>
                         </li>
                         <!--//Notification item start//-->
                         {{-- <li class="d-block">
                             <a href="#" class="hover-bg-gray px-3 py-2 text-reset d-flex align-items-center">
                                 <div class="d-block me-3">
                                     <div class="avatar avatar-status status-offline">
                                         <img src="{{ asset('admin/assets/media/avatars/06.jpg') }}"
                                             class="img-fluid rounded-circle w-auto" alt="">
                                     </div>
                                 </div>

                                 <div class="flex-grow-1 flex-wrap pe-3">
                                     <span class="mb-0 d-block"><strong>Vivianna Kiser
                                         </strong> just posted <span>"Lorem ipsum is placeholder text
                                             used in the graphic, print,
                                             and industries.
                                             "</span></span>
                                     <small class="text-muted">2h Ago</small>
                                 </div>
                             </a>
                         </li> --}}

                         {{-- <li class="px-3 pt-3 h6">Earlier</li> --}}
                         <!--//Notification item start//-->
                         {{-- <li class="d-block">
                             <a href="#" class="hover-bg-gray px-3 py-2 text-reset d-flex align-items-center">
                                 <span class="d-block me-3">
                                     <span
                                         class="d-flex align-items-center justify-content-center lh-1 size-50 bg-tint-success text-success rounded-circle">
                                         <i data-feather="tool" class="fe-2x align-middle"></i>
                                     </span>
                                 </span>

                                 <div class="flex-grow-1 flex-wrap pe-3">
                                     <span class="mb-0 d-block"><strong>Updated</strong> Your account
                                         password updated
                                         succuessfully</span>
                                     <small class="text-muted">2h Ago</small>
                                 </div>
                             </a>
                         </li> --}}
                         <!--//Notification item start//-->
                         {{-- <li class="d-block">
                             <a href="#" class="hover-bg-gray px-3 py-2 text-reset d-flex align-items-center">
                                 <span class="d-block me-3">
                                     <span
                                         class="d-flex align-items-center justify-content-center lh-1 size-50 bg-tint-danger text-danger rounded-circle">
                                         <i data-feather="percent" class="fe-2x align-middle"></i>
                                     </span>
                                 </span>

                                 <div class="flex-grow-1 flex-wrap pe-3">
                                     <span class="mb-0 d-block"><strong>Pro discount</strong> Upgrade
                                         to pro plan with 30%
                                         discount, Apply coupon <span class="badge bg-primary">PRO30</span></span>
                                     <small class="text-muted">2h Ago</small>
                                 </div>
                             </a>
                         </li> --}}
                     </ul>
                 </div>
             </div>
         </li>
         <li class="nav-item dropdown d-flex align-items-center justify-content-center flex-column h-100">
             <a href="#"
                 class="nav-link dropdown-toggle rounded-2 p-1 lh-1 pe-1 pe-md-2 d-flex align-items-center justify-content-center"
                 aria-expanded="false" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                 <div class="d-flex align-items-center">

                     <!--Avatar with status-->
                     <div class="avatar-status status-online me-sm-2 avatar xs">

                         @if (auth()->guard('admin')->user()?->profile_pic_thumbnail)
                             <img src="{{ asset('assets/img/admin_dp/compress/' .auth()->guard('admin')->user()->profile_pic_thumbnail) }}"
                                 class="rounded-circle img-fluid" alt="">
                         @else
                             <img src="{{ asset('assets/images/fav-icon.png') }}" class="rounded-circle img-fluid"
                                 alt="" style="height:25px">
                         @endif
                     </div>
                     {{-- <span class="d-none d-md-inline-block">{{ auth()?->guard('admin')?->user()?->name ?? null }}</span> --}}
                 </div>
             </a>

             <div class="dropdown-menu mt-0 pt-0 dropdown-menu-end overflow-hidden">
                 <!--User meta-->
                 <div class="position-relative overflow-hidden p-3 border-bottom">
                     {{-- <h5 class="mb-1">{{ auth()->guard('admin')->user()->name }}</h5> --}}
                 </div>
                 <a href="{{ route('showSecurity') }}" class="dropdown-item"> <i data-feather="settings"
                         class="fe-1x opacity-50 align-middle me-2"></i>Settings</a>
                 <hr class="mt-1 mb-1">
                 <a href="{{ route('adminLogout') }}" class="dropdown-item d-flex align-items-center">
                     <i data-feather="log-out" class="fe-1x opacity-50 align-middle me-2"></i>
                     Sign out
                 </a>
             </div>
         </li>
         <li
             class="nav-item dropdown ms-1 ms-lg-3 d-flex d-lg-none align-items-center justify-content-center flex-column h-100">
             <a href="#"
                 class="nav-link sidebar-trigger-lg-down hover-bg-primary text-secondary size-35 p-0 d-flex align-items-center justify-content-center rounded-circle">
                 <i data-feather="menu" class="fe-2x"></i>
             </a>
         </li>
     </ul>
 </header>
 <!--Main Header End-->
