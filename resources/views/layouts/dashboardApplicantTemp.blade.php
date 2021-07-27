<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ICTA | Clearance</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    @yield('style_push')

</head>

<body class="top-navigation">
<div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="/home"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message">Welcome to ICTA Clearance Application System.</span>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell"></i>  <span class="label label-warning">{{$messages_no}}</span>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    @if($messages_no>0)

{{--                    Display message list herer--}}
                    @foreach($messages as $message)
                    <li>
                        <div class="dropdown-messages-box">
                            <a href="profile.html" class="pull-left">
                                <img alt="image" class="img-circle" src="img/a7.jpg">
                            </a>
                            <div>
                                <small class="pull-right">{{$message->created_at->diffForHumans()}}</small>
                                <strong>Admin</strong>
                                <br>{{$message->message}}. <br>
                                <small class="text-muted">Approved</small>
                            </div>
                        </div>
                    </li>
                    <li class="divider"></li>
                        @endforeach
                    @else

                    <li>
                        <div class="text-center link-block">
                            <a href="mailbox.html">
                                <i class="fa fa-envelope"></i> <strong>You have 0 new messages<br>
                                    <a href=""> View all?</a></strong>
                            </a>
                        </div>
                    </li>
                    @endif
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-user"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts">

                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> {{ Auth::user()->name }}
                            </div>
                        </a>
                    </li>

                    <li class="divider"></li>
                    <li>
                        <a href="profile.html">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i> {{ __('Edit Profile') }}
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="grid_options.html">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> {{ __('Change Password') }}
                            </div>
                        </a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>

    </nav>
</div>




<div id="wrapper">
    <div id="page-wrapper" class="gray-bg">

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="container">

{{--                ALLERTS --}}
                @if (session('renewal'))
                    @php(session()->forget('renewal'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Your Clearance Letter Renewal request is successfully. ') }}<br>
                        {{ __('We will notify you when it is approved. Check the table below for progress ') }}<br>

                    </div>
                @endif


                @if (session('new_app'))
                    @php(session()->forget('new_app'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Your application was successful.') }}<br>
                        {{ __('Kindly monitor the progress from the table below') }}
                    </div>
                @endif


                <div class="row">

                    {{--                    MAIN CONTENT GOS HERE--}}
                    @yield('content')


                </div>

            </div>

        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

    </div>
</div>

<!-- Mainly scripts -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

{{--aditional scripts--}}
@yield('script_push')


</body>

</html>
