<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Horizon Academy Student Management System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
        <!-- Styles -->
        <style>
            html, body {
                background: linear-gradient(-45deg,#00b1b3,#1d5086);
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                padding: 16px;
                background: linear-gradient(-45deg,#00b1b3,#1d5086);
            }

            .links > a {
                color: #636b6f;
                padding: 10px 25px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            img{
              width: 100%;
              height: 100px;
              object-fit: contain;
            } 
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="w3-content content">

                    <img src="{{ asset('storage/images/ch.png') }}" alt="LOGO" class="thumbnail">
                <div class="title m-b-md thumbnail w3-card-4 w3-text-pink">
                    Horizon Academy Student Management System
                </div>

                <div class="links">
                    @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/students') }}" class="w3-button w3-blue w3-xlarge">Home</a>
                                <a href="{{ route('logout') }}"  class="w3-button w3-blue w3-xlarge"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                            @else
                                <a href="{{ route('login') }}" class="w3-button w3-blue w3-xlarge">Login</a>
                                <a href="{{ route('register') }}" class="w3-button w3-blue w3-xlarge">Register</a>
                            @endauth
                       
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
