<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        form {border: 3px solid #f1f1f1;}

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

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
            .cancelbtn {
                width: 100%;
            }
        }
        label.error {
            color: red !important;
            text-align: left !important;
            width: 100%;
        }
    </style>
</head>
<body>

<h2>Signup</h2>

{!! Form::open(['url' => url('/signup'), 'id' => 'signup_form', 'enctype' => 'multipart/form-data']) !!}
    <div class="container">
        <label for="name"><b>Name</b></label>
        <input type="text" placeholder="Enter Name" name="name">

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email">

        <button type="submit">Signup</button>
        <label>
            <span>Click here to <a href="{{ url('login') }}">Login</a></span>
        </label>
    </div>
{!! Form::close() !!}

</body>
</html>
<script src="{{URL::to('js/jquery.min.js')}}"></script>
<script src="{{URL::to('js/jquery.validate.js')}}"></script>
<script>
    $('#signup_form').validate({
        rules: {
            name: {
                required: true,
                maxlength: 100
            },
            email: {
                required: true,
                email: true,
            }
        },
        messages: {
            name: {
                required: "Name is required.",
                maxlength: "Name should not be longer than 100 chars."
            },
            email: {
                required: "Email is required.",
                email: "Invalid email."
            },
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
</script>