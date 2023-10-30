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

     </ul>
     <ul class="navbar-nav ms-auto d-flex align-items-center h-100">
         <li class="nav-item dropdown d-flex align-items-center justify-content-center flex-column h-100 me-2 me-lg-4">
             <a href="#"
                 class="nav-link p-0 position-relative size-35 d-flex align-items-center justify-content-center rounded-2"
                 aria-expanded="false" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                 <i id="notificationBell" data-feather="bell" class="fe-2x align-middle"></i>
             </a>

             <div class="dropdown-menu mt-0 p-0 overflow-hidden dropdown-menu-end dropdown-menu-sm">
                 <div class="d-flex p-3 justify-content-between align-items-center border-bottom">
                     <h5 class="me-3 mb-0">Notifications</h5>
                     <div class="flex-shrink-0">
                     </div>
                 </div>

                 <div id="notificationList" data-simplebar style="max-height: 300px;">
                     <ul class="list-unstyled mb-0">
                         <!-- Notifications will be added here -->
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
 @section('js-script')
     <script>
         // Get notifications
         function getNotifications() {
             $.ajax({
                 url: "{{ route('admin.notifications') }}",
                 type: "GET",
                 dataType: "json",
                 success: function(response) {
                     console.log("response", response);
                     var notifications = response;

                     // Clear existing notifications
                     $('#notificationList ul').empty();

                     // Add fetched notifications to the list
                     notifications.forEach(function(notification) {
                         $('#notificationList ul').append('<li class="m-4">' + notification
                             .content + '</li><hr>');
                     });
                 }
             });
         }

         // Get notifications on page load
         $('#notificationBell').click(function() {
             getNotifications();
         });
         // Get notifications every 5 seconds
     </script>
 @endsection
