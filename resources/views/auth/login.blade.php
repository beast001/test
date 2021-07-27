<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ICTA | Login </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="loginColumns animated fadeInDown">
    <div class="row">

        <div class="col-md-6">

            <h2 class="font-bold">Welcome to ICTA</h2>

            <p>
                Apply for your clearance letter today at the comfort of your home/office.
            </p>

            <p>
                Lets go paperless with the E-clearance application system
            </p>

            <p>
                Submit your application today and get your clearacne letter instantly.
            </p>

            <p>
                <small>Paperless society.</small>
            </p>

        </div>
        <div class="col-md-6">
            <div class="ibox-content">
                <img src="{{asset ('images/logo-ict-authority.png')}}" alt="ICTA Logo" class="brand-image elevation-3"
                     style="opacity: .8;">
                <form class="m-t" role="form" method="POST" action="{{ route('login')}}">
                    @csrf
                    <div>
                        <span style="color: red">@error('email'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control input_user" value=""
                               placeholder="Email Address">
                    </div>

                    <div>
                        <span style="color: red">@error('password'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control input_pass" value="" placeholder="password">
                    </div>
                    <button type="submit" class="btn btn-danger block full-width m-b">Login</button>

                    <a href="/password_reset">
                        <small>Forgot password?</small>
                    </a>

                    <p class="text-muted text-center">
                        <small>Do not have an account?</small>
                    </p>
                    <a class="btn btn-sm btn-info btn-block" href="/register">Create an account</a>
                </form>
                <p class="m-t">
                    <small>The Information and Communication Technology Authority &copy; 2021</small>
                </p>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            Copyright ICTA
        </div>
        <div class="col-md-6 text-right">
            <small>© 2021-2022</small>
        </div>
    </div>
</div>

</body>

</html>
