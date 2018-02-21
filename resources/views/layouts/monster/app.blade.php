<!DOCTYPE html>
<html lang="en">

    @include('layouts.monster.partials.head')

    <body class="fix-header fix-sidebar logo-center card-no-border">

        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
        </div>

        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
            @include('layouts.monster.partials.header')

            @include('layouts.monster.partials.left-sidebar')
            
            <!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">

                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                    
                    @include('layouts.monster.partials.breadcrumb')

                    @yield('content')

                    @include('layouts.monster.partials.right-sidebar')

                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->

                @include('layouts.monster.partials.footer')

            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->

        </div>
        <!-- ============================================================== -->
        <!-- End Main Wrapper -->
        <!-- ============================================================== -->

        @include('layouts.monster.partials.foot')

    </body>

</html>