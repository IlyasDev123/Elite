<!DOCTYPE html>
<html lang="en">

@include('employee.Layouts.head')

<body>

    <!--////////////////// PreLoader Start//////////////////////-->
    @include('employee.Layouts.pre-loader')
    <!--////////////////// /.PreLoader END//////////////////////-->

    <!--///////////Page sidebar begin///////////////-->
    @include('employee.Layouts.sidebar')
    <!--///////////Page Sidebar End///////////////-->

    <div class="d-flex flex-column flex-root">
        <!--Page-->
        <div class="page d-flex flex-row flex-column-fluid">

            <!--///Sidebar close button for 991px or below devices///-->
            <div class="sidebar-close d-lg-none">
                <a href="#"></a>
            </div>
            <!--///.Sidebar close end///-->

            <!--///////////Page content wrapper///////////////-->
            <main class="page-content d-flex flex-column flex-row-fluid">

                <!--//page-header//-->
                @include('employee.Layouts.header')
                <!--Main Header End-->

                <!--//Page content//-->
                <div class="content p-4 pb-0 d-flex flex-column-fluid position-relative">
                    @yield('content')
                </div>
                <!--//Page content End//-->

                <!--//Page-footer//-->
                @include('employee.Layouts.footer')
                <!--/.Page Footer End-->

            </main>
            <!--///////////Page content wrapper End///////////////-->
        </div>
    </div>

    <!--////////////Theme Core scripts Start/////////////////-->
    @include('employee.Layouts.script')

    @yield('js-script')
    <!--////////////Theme Core scripts End/////////////////-->

</body>

</html>
