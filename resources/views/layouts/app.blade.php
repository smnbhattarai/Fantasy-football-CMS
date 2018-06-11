<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <title>@yield('title') {{ config('app.name', 'Fantasy Football') }}</title>

    <meta property="og:image" content="{{ asset('img/wc-2018-bg.jpg') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
<body>

    @include('partials.sitenav')

        <main class="py-4">
            @yield('content')
        </main>

    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}"></script>

    @include('partials.messages')

    @yield('script')

</body>
</html>
