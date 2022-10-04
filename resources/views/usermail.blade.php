<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .email_box{
            font-family: Arial, Helvetica, sans-serif;
            background: #b3e6b5;
            padding: 16px; box-shadow: 1px 5px 10px rgba(0,0,0,.6); text-align:center
        }
    </style>
</head>
<body>

    <div class="email_box">
        <h1 class="text-center">Hi, {{ $user->firstname. ' '. $user->lastname }}</h1>
        <h2 class="text-center">Congratulations! You successfully created an account.</h2>

        <p class="text-center">Your User ID is : 
            <br> 
            <span class="fw-bold"> <i> <b>  {{$user->account_id}} </b> </i></span>
        </p>
        <p>Your password is <span class="fw-bold">
            <br>
            <i><b>{{$user->account_id.$user->lastname}}</b></i></span>
        </p>

        <hr>

        <p>to Login Please Verify your account.</p>

        <p>Click <a href="{{ url('/verifyEmail/'.$user->emailVerify_token)}}">here</a> to verify your account</p>
    </div>  
   
</body>
</html>

