<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="overflow-hidden">
    <img class="w-full h-full absolute -z-10  " src="{{ asset('assets/bg-kapal.jpg') }}" />

    @yield('content')

</body>

</html>
