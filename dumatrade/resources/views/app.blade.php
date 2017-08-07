<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('/css/myapp.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/search.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/popup.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/profile-product.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/boot.css') }}" rel="stylesheet">
    <script src="{{ asset('script/jquery.min.js')}}"></script>
    <script src="{{ asset('script/bootstrap.min.js')}}"></script>


</head>
<body >

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                            <a class="navbar-brand" href="{{ url('/') }}">
                    <img src='{{ asset('/images/icon3.png') }}'  style=' height: 60px; width: 200px;' >
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="{{url('listproduct')}}">
                            <img src='{{ asset('/images/66629.png') }}'  style=' height: 15px; width:15px;' >
                            All Products
                        </a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a  href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a  href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    @else
                        <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> {{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a  href="{{url('shoppingcart')}}">
                                    <img src='{{ asset('/images/sc.png') }}'  style=' height: 25px; width: 25px;' >
                                    Shopping Cart
                                </a></li>
                            <li><a href="{{url('pendingpurchases')}}">
                                    <img src='{{ asset('/images/66240.png') }}'  style=' height: 25px; width: 25px;' >
                                    Pending Purchases
                                </a></li>
                            <li><a href="{{ url('profile') }}">
                                    <img src='{{ asset('/images/72905.png') }}' style=' height: 22px; width: 22px;' >
                                    Profile
                                </a></li>
                            <li><a href="{{url('requests')}}">
                                    <img src='{{ asset('/images/notif.png') }}' style=' height: 22px; width: 22px;' >
                                    Requests
                                </a></li>
                            <li><a href="{{ url('/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                    @endif
                     </ul>
            </div>
        </div>
    </nav>


@yield('content')
</body>
</html>
