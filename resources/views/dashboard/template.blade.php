<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Paper Dashboard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
	<style type="text/css">

	      .seat {
            height: 20px;
            width: 20px;
            border: 1px solid gray;
           cursor:pointer;
           background-color:white;
        }
        .walk{
            padding-left:20px;
        }
        #driver {
            background-color:gray;          
            height: 20px;
            border-radius: 50%;
        }
	</style>


    <!-- Bootstrap core CSS     -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    {{--
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" /> --}}

    <!-- Animation library for notifications   -->
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    {{--
    <link href="assets/css/animate.min.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="{{asset("css/paper-dashboard.css")}}">
    <!--  Paper Dashboard core CSS    -->
    {{--
    <link href="assets/css/paper-dashboard.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="{{asset('css/demo.css')}}">

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    {{--
    <link href="assets/css/demo.css" rel="stylesheet" /> --}}

    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    {{--
    <link href="assets/css/themify-icons.css" rel="stylesheet"> --}}
    @yield('custom-css')

</head>

<body>

    <div class="wrapper">
        <div class="sidebar" data-background-color="white" data-active-color="danger">

            <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                        Creative Tim
                    </a>
                </div>

                <ul class="nav">
                    <li class="active">
                        <a href="{{route("admin.dashboard")}}">
                            <i class="ti-panel"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("admin.dashboard.bioskophome")}}">
                            <i class="ti-user"></i>
                            <p>Bioskop</p>
                        </a>
                    </li>
					<li>
                        <a href="{{route("admin.dashboard.filmhome")}}">
                            <i class="ti-user"></i>
                            <p>Film</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.dashboard.daerah')}}">
                            <i class="ti-view-list-alt"></i>
                            <p>Daerah</p>
                        </a>
                    </li>


                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar bar1"></span>
                            <span class="icon-bar bar2"></span>
                            <span class="icon-bar bar3"></span>
                        </button>
                        <a class="navbar-brand" href="#">Dashboard</a>
                    </div>

                </div>
            </nav>


            <div class="content">
                @yield('content')
            </div>


            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>

                            <li>
                                <a href="http://www.creative-tim.com">
                                    Creative Tim
                                </a>
                            </li>
                            <li>
                                <a href="http://blog.creative-tim.com">
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="http://www.creative-tim.com/license">
                                    Licenses
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright pull-right">
                        &copy; <script>
                            document.write(new Date().getFullYear())

                        </script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative
                            Tim</a>
                    </div>
                </div>
            </footer>

        </div>
    </div>


</body>

<!--   Core JS Files   -->
<script src="{{asset("js/jquery.min.js")}}" type="text/javascript"></script>
<script src="{{asset("js/bootstrap.min.js")}}" type="text/javascript"></script>
<!--  Checkbox, Radio & Switch Plugins -->
<script src="{{asset('js/bootstrap-checkbox-radio.js')}}"></script>

<!--  Charts Plugin -->
<script src="{{asset("js/chartist.min.js")}}"></script>

<!--  Notifications Plugin    -->
<script src="{{asset("js/bootstrap-notify.js")}}"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="{{asset("js/paper-dashboard.js")}}"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset("js/demo.js")}}"></script>

<script type="text/javascript">
    $(document).ready(function () {

        demo.initChartist();

        $.notify({
            icon: 'ti-gift',
            message: "Welcome to <b>Paper Dashboard</b> - a beautiful Bootstrap freebie for your next project."

        }, {
            type: 'success',
            timer: 4000
        });

    });

</script>

</html>
