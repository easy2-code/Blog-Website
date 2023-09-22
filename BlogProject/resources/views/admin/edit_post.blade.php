<!DOCTYPE html>
<html>
    <head> 
        <base href="/public">
        @include('admin.css')
        <style type="text/css">
            * {
                box-sizing: border-box;
            }
            
            h1{
                text-align: center;
                color: white;
                font-weight: bold;
                font-size: 30px;
            }
            input[type=text], select, textarea {
                width: 80%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                resize: vertical;
            }

            label {
                padding: 12px 12px 12px 0;
                display: inline-block;
            }

            input[type=submit] {
                background-color: #04AA6D;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                float: right;
            }

            input[type=submit]:hover {
                background-color: #45a049;
            }

            .container {
                border-radius: 5px;
                background-color: #111;
                padding: 30px;
            }

            .col-25 {
                float: left;
                width: 25%;
                margin-top: 6px;
            }

            .col-75 {
                float: left;
                width: 75%;
                margin-top: 6px;
            }

            /* Clear floats after the columns */
            .row::after {
                content: "";
                display: table;
                clear: both;
            }
        </style>
    </head>
    <body>
        @include('admin.header')
        <div class="d-flex align-items-stretch">
        @include('admin.sidebar')

        <div class="page-content">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
            @endif

            <h1 class="post_title">Edit Post</h1>
            <div class="container">
                <form action="{{url('update_post', $post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- Post Title start --}}
                    <div class="row">
                        <div class="col-25">
                            <label for="postTitle">Post Title</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="postTitle" value="{{$post->postTitle}}" name="postTitle" placeholder="Post title..">
                        </div>
                    </div>
                    {{-- Post Title end --}}

                    {{-- Post description start --}}
                    <div class="row">
                        <div class="col-25">
                            <label for="description">Description</label>
                        </div>
                        <div class="col-75">
                            <textarea id="description"    name="description" placeholder="Write something.." style="height:200px">{{$post->description}}</textarea>
                        </div>
                    </div>
                    {{-- Post description start --}}

                    {{-- Image old start --}}
                    <div class="row">
                        <div class="col-25">
                            <label for="myFile">Old Image</label>
                        </div>
                        <div class="col-25" style="height: 150px; width:150px; background-color: white;">
                            <img src="/postimages/{{$post->image}}" height="150px" width="150px">
                        </div>
                    </div>
                    <br>
                    {{-- Image old end --}}
                    {{-- Image new start --}}
                    <div class="row">
                        <div class="col-25">
                            <label for="myFile">Upload new Image</label>
                        </div>
                        <div class="col-25">
                            <input type="file" id="myFile" name="image">
                        </div>
                    </div>
                    <br>
                    {{-- Image new end --}}

                    <div class="row">
                        <input type="submit" value="Update">
                    </div>
                    
                </form>
            </div>
        </div>
        @include('admin.footer')
    </body>
</html>