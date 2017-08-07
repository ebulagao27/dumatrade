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
        <form action="{{url('/register')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input type="text" class="form" placeholder="Full Name" name="name" value="{{ old('name') }}"><br>
            <input type="email" placeholder="E-Mail" class="form" name="email" value="{{ old('email') }}"><br />
            <input type="text" class="form" placeholder="User Name" name="userName" value="{{ old('userName') }}"><br>
            <input type="password" name="password" placeholder="Password" class="form"><br />
            <input type="password" class="form" placeholder="Verify Password" name="passwordv"><br><br>
            <input type="submit" class="button-style" value="Register">
        </form>
    </center>
</div>
</body>
</html>
