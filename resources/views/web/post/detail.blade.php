<!DOCTYPE html>
<html lang="en">
<head>
    <title>Post Detail</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Style the header */
        header {
            background-color: #666;
            padding: 30px;
            text-align: center;
            font-size: 35px;
            color: white;
        }

        /* Create two columns/boxes that floats next to each other */
        nav {
            float: left;
            width: 10%;
            height: 100vh; /* only for demonstration, should be removed */
            background: #ccc;
            padding: 20px;
        }

        /* Style the list inside the menu */
        nav ul {
            list-style-type: none;
            padding: 0;
        }

        article {
            float: left;
            padding: 20px;
            width: 90%;
            background-color: #f1f1f1;
            height: 100vh; /* only for demonstration, should be removed */
        }

        /* Clear floats after the columns */
        section:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Style the footer */
        footer {
            background-color: #777;
            padding: 10px;
            text-align: center;
            color: white;
        }

        /* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
        @media (max-width: 600px) {
            nav, article {
                width: 100%;
                height: auto;
            }
        }

        div.gallery {
            margin: 5px;
            border: 1px solid #ccc;
            float: left;
            width: 180px;
        }

        div.gallery:hover {
            border: 1px solid #777;
        }

        div.gallery img {
            width: 100%;
            height: auto;
        }

        div.desc {
            padding: 15px;
            text-align: center;
        }
        .user_name{
            font-size:14px;
            font-weight: bold;
        }
        .comments-list .media{
            border-bottom: 2px dotted #ccc;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }
        label.error {
            color: red !important;
            text-align: left !important;
            width: 100%;
        }
    </style>
</head>
<body>
<header>
    <h3>View Post - {{ $post['title'] }}</h3>
</header>

<section>
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">post</a></li>
            @if(\App\Web\WebController::$users)
                <li><a href="{{ url('/logout') }}">logout</a></li>
            @else
                <li><a href="{{ url('/login') }}">Login</a></li>
            @endif
        </ul>
    </nav>

    <article>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="page-header">
                        <h1><small class="pull-right">{{count($postComments)}} </small>comments
                            @if(\App\Web\WebController::$users)
                                - <a href="#" id="add_comment">Add comment</a>
                            @endif
                        </h1>
                    </div>

                    <div style="display: none" id="comment_form">
                        {!! Form::open(['url' => url('/post/comment'), 'id' => 'add-comment']) !!}
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <div class="container">
                            <label for="name"><b>Comment</b></label>
                            <input type="text" placeholder="Comment here" name="comment">

                            <button type="submit">Submit</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="comments-list">
                        @foreach($postComments as $postComment)
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading user_name">{{ $postComment->user ? $postComment->user->name : '-' }}</h4>
                                    @if(\App\Web\WebController::$users && \App\Web\WebController::$users->id == $postComment->user_id)
                                        <a href="{{url('post/'.$postComment->post_id.'/comment/delete/'.$postComment->id)}}" id="add_comment">Delete comment</a>
                                    @endif
                                    {{$postComment->comments ? $postComment->comments : '-'}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>
</body>
</html>
<script src="{{URL::to('js/jquery.min.js')}}"></script>
<script src="{{URL::to('js/jquery.validate.js')}}"></script>
<script>
    $("#add_comment").click(function () {
        $("#comment_form").show();
    })

    $('#add-comment').validate({
        rules: {
            comment: {
                required: true
            }
        },
        messages: {
            comment: {
                required: "Comment is required."
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
</script>
