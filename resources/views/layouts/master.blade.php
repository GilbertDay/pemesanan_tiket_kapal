<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>



@yield('content')




<script type="text/javascript" src="{{asset('js/frontend.js')}}"></script>

</html>
