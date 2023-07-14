<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | Sistem Informasi Absensi | SMK Telkom 2 Medan</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="icon" href="{{ asset('img/logo.png') }}">
</head>
<body>

    @yield('content-auth')

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>