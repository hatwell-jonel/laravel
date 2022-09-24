<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    @include('inc.links')


    <style>
        body{
            background: linear-gradient(180deg, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0.5) 100%),
            url(https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=932&q=80) no-repeat center/cover;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;
        }
      
        .login_box{
            margin-top: 50px;
            background-color: #f4f4f4;
            width: 650px;
            border-radius: 10px;
            box-shadow: 1px 10px 10px rgba(0,0,0,0.5);
        }

        .login_box-left{
            padding: 20px 10px 20px 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .login_box-left p{
            text-align: center;
            color: #7B1006;
            font-size: 2rem;
        }
        .login_box-left p:nth-last-of-type(1){
            color: #7B1006;
            font-weight: bold;
        }

        .login_box-right{
            padding-bottom:21px;
            background-color: #7B1006;
        }

        .forgot_password{
            color: #F9F361;
        }

        .login_btn{
            letter-spacing: 1px;
            font-weight: bold;
            color: #7B1006;
            background-color: #E6D932;
            text-transform: uppercase;
        }

        .login_btn:hover{
            border: 1px solid white;
            background-color: transparent;
            color: white;
        }

        .school_logo{
            width: 150px;
            height: 150px;
            margin: auto;
            
        }
    </style>
</head>
<body>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
