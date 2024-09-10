<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Aspekt') }}</title>

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
