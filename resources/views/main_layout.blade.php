<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Movies Database</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>

    </head>
    <body>
        @yield('content')
        <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    
        <script src="{{mix('js/app.js')}}"></script>
    </body>
</html>
