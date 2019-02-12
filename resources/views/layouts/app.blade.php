<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css" >
    <title>My Gallary</title>
</head>
<body>

    @include('inc.nav')
    <br><br>
    <div class="container">
        @include('inc.messages')
        @yield('content')
    </div>

</body>
</html>