<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    @include("admin.component.headerlink")
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include("admin.component.sidebar")
        <!-- End Sidebar -->

        <div class="main-panel">
            @include('admin.component.header')

            <div class="container">

                @yield("content")

            </div>

            @include('admin.component.footer')
        </div>

        <!-- Custom template | don't include it in your project! -->
        <!-- @include('admin.component.seating') -->
        <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    @include('admin.component.footerLink')
</body>

</html>