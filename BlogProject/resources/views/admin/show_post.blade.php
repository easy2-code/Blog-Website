<!DOCTYPE html>
<html>
    <head> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @include('admin.css')
        <style>
            .title_degsing{
                font-size: 30px;
                font-weight: bold;
                color: white;
                text-align: center;
                padding: 30px
            }
            .table_design{
                border: 1px solid white;
                width: 90%;
                text-align: center;
                margin-left: 50px;
            }
            .th_desing{
                background-color: skyblue;
                color: black;
            }
            img{
                width: 60px;
                height: 50px;
                border-radius: 50px;
            }
        </style>
    </head>
    <body>
        @include('admin.header')
        <div class="d-flex align-items-stretch">
        @include('admin.sidebar')
        <div class="page-content">
            @if (session()->has('message'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
            @endif

            <h1 class="title_degsing">All Post</h1>
            <table class="table_design">
                <tr class="th_desing">
                    <th>Post Title</th>
                    <th>Post Description</th>
                    <th>Post Image</th>
                    <th>Post By</th>
                    <th>Post Status</th>
                    <th>User Type</th>
                    <th>Action</th>
                </tr>

                @foreach ($post as $post)                    
                    <tr>
                        <td>{{$post->postTitle}}</td>
                        <td>{{$post->description}}</td>
                        <td>
                            <img src="postimages/{{$post->image}}">
                        </td>
                        <td>{{$post->name}}</td>
                        <td>{{$post->post_status}}</td>
                        <td>{{$post->usertype}}</td>
                        <td>
                            <a href="{{url('edit_post', $post->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{url('delete_post', $post->id)}}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        @include('admin.footer')


        <script>
            function confirmation(ev)
            {
                ev.preventDefault();
                var urlToRedirect=ev.currentTarget.getAttribute('href');
                console.log(urlToRedirect);
                swal(
                    {
                        title:"Are you sure to delete this ",
                        text:"You won't be able to revert this delete",
                        icon:"warning",
                        buttons:true,
                        dangerMode:true,
                    }
                )
                .then((willCancel)=>
                {
                    if(willCancel)
                    {
                        window.location.href=urlToRedirect;
                    }
                });
            }
        </script>
        </body>
</html>