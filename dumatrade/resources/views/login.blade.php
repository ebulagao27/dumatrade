<html>
<head>

    <link href="{{ asset('/css/loginstyle.css') }}" rel="stylesheet">

</head>
<body>
<div class="login-container">
    <div class="login-header">
        <center><img src='./images/icon3.png'  style=' height: 50px; width: 180px;' ></center>
    </div><br /><center>
        @if (count($errors) > 0)
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{url('/login')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="email" placeholder="Username" class="form" name="email"><br />
            <input type="password" name="password" placeholder="Password" class="form"><br /><br />
            <input style="margin-left:10px" type="checkbox" name="remember"> Remember Me
            <input type="submit" class="button-style">
        </form>
    </center>
</div>
</body>
</html>
