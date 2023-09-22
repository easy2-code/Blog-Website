<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    @include('home.homecss')
</head>
<body>
    <!-- header section start -->
    <div class="header_section">
        @include('home.header')
        @include('home.banner')
    </div>
    <!-- header section end -->
    @include('home.services')
    @include('home.about')
    @include('home.footer')
</body>

</html>