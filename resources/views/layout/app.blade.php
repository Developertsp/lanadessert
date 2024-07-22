<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        @include('include.style')

    </head>

    <body class="hold-transition light-skin sidebar-mini theme-primary fixed">
        <div class="wrapper">
            <div id="loader"></div>

            <!-- Topbar -->
            @include('include.navbar')

            <!-- Left Sidebar -->
            {{-- @include('layout.sidebar') --}}

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">
                <!-- Main content -->
                    @yield('content')
                <!-- /.content -->
                </div>
            </div>
            <!-- /.content-wrapper -->

            <!-- Rightbar -->
             {{-- @include('layout.rightbar') --}}

            <!-- Footer -->
            @include('include.footer')

        </div>

        @include('include.script')

        @yield('script')
    </body>

</html>
