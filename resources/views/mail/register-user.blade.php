<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activate Mail</title>
</head>

<body>
    <h1>Thank you for signing up!</h1>
    Hello {{ $name }}
    <br>
    Your token {{ $token }}
    <br><br>
    We are excited to have you join us in Ace community!
    <br>
    Please click the below link to verify your email and activate your account!
    <br><br>
    link: <p>{{ $url }}</p>
    <hr>
    <a href="{{ $url }}" target="_blank">Click Here </a>to activate your account!
    <br><br>
    Thank you!
    <br>
</body>

</html>
