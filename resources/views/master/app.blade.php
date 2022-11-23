<!DOCTYPE html>
<html lang="en">

@include('components.head')

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('components.sidebar')


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('components.topbar')

                @yield('content');

            </div>
            <!-- End of Main Content -->

            @include('components.footer')

        </div>
        <!-- End of Content Wrapper -->


    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('components.logOutModal')
    @include('components.js')

</body>

</html>
