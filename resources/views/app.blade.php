<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Aspekt') }}</title>

    @if(config('config.app.env') == 'production')
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-568MGTRLYW"></script>
        <script> window.dataLayer = window.dataLayer || []

            function gtag () {dataLayer.push(arguments)}

            gtag('js', new Date())
            gtag('config', 'G-568MGTRLYW')
        </script>
    @endif

    <!-- Cookie script CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@v2.8.9/dist/cookieconsent.css">
    <script defer src="https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@v2.8.9/dist/cookieconsent.js"></script>

    <!-- Scripts -->
    @routes
    @vite('resources/js/app.js')
    @inertiaHead
</head>
<body class="font-treb antialiased">
@inertia
@livewire('notifications')
<!-- Cookie script JS -->
<script defer src="https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@v2.8.9/dist/cookieconsent.js"></script>
@include('_includes.cookie-script')
</body>
</html>
