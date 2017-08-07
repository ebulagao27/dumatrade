<html>
    <head>
        <link href="{{ asset('/css/loginstyle.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="loginform">
            <p class="name">Log In</p>
            @if (count($errors) > 0)
                <div>
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form role="form" method="POST" action="{{ url('/login') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table style="width:100%">
                    <tr>
                        <td>
                            <input class="textbox" type="email" placeholder="E-Mail Address"class="form-control" name="email" value="{{ old('email') }}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="textbox" type="password" placeholder="Password" class="form-control" name="password">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input style="margin-left:10px" type="checkbox" name="remember"> Remember Me
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button style="margin-left:10px" type="submit">Login</button>&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>