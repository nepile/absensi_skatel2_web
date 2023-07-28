<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | Error</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    
    {{-- main content --}}
    <div class="container-fluid">
        @yield('content-error')
    </div>
    
    
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
</body>
</html>