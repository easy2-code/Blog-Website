<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <base href="/public">
    @include('home.homecss')
</head>
<body>
    <!-- header section start -->
    <div class="header_section">
        @include('home.header')
    </div>
    <!-- header section end -->
    <div class="col-md-4" style="text-align: center">
        <div>
            <img src="/postimages/{{$post->image}}" class="services_img" style="padding: 20px;">
        </div>
        <h3><b>{{$post->postTitle}}</b></h3>
        <h4>{{$post->description}}</h4>
        <p>
            Post by <strong>{{$post->name}}</strong>
        </p>
    </div><hr>
    @include('home.footer')
</body>

</html>