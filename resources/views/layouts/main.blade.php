<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{ asset('js/app.js')}}"></script>
</head>
<body>
    
    @include('layouts.menu')

    <div class="container mx-auto">
        @yield('content')
    </div>
    <!-- <div>
        FOOTER
    </div> -->
</html>