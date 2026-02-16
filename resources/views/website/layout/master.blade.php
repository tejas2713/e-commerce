<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('website.component.headerLink')
</head>

<body>
    <!-- Header Section Begin -->
    @include('website.component.header')
    <!-- Header Section End -->

    @yield("content")

    <!-- Footer Section Begin -->
    @include('website.component.footer')
    <!-- Footer Section End -->

    <!-- Search Begin -->
    @include('website.component.search')
    <!-- Search End -->

    @include('website.component.footerLink')
</body>

</html>