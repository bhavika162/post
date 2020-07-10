<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
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
    </style>
</head>
<body>
<header>
    <h3>Post</h3>
</header>

<section>
    <nav>
        <ul>

            @if(\App\Web\WebController::$users)
                <li><a href="{{ url('/post') }}">Add post</a></li>
                <li><a href="{{ url('/logout') }}">logout</a></li>
            @else
                <li><a href="{{ url('/login') }}">Login</a></li>
            @endif
        </ul>
    </nav>

    <article>
        @foreach($posts as $post)
            <div class="gallery">
                <a href="{{url('post',$post['id'])}}">
                    <img src="{{ url('storage/images/post/'.$post['image']) }}" alt="post image" width="100px" height="100px">
                </a>
                <div class="desc">{{$post['title']}}</div>
            </div>
        @endforeach
    </article>
</section>
</body>
</html>
