<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/jpeg" href="{{ asset('themes/alleywayMuse/assets/img/logo.jpg') }}">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <title>AlleywayMuse CoffeeShop</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- MEMANGGIL SCSS, JS, CSS PADA VITE --}}
    @vite([
        'resources/sass/app.scss',
        'resources/js/app.js',

        'resources/views/themes/alleywayMuse/assets/css/main.css',
        'resources/views/themes/alleywayMuse/assets/plugins/jqueryui/jquery-ui.css',

        'resources/views/themes/alleywayMuse/assets/js/main.js',
        'resources/views/themes/alleywayMuse/assets/plugins/jqueryui/jquery-ui.min.js',
    ])

</head>
<body>
    {{-- MEMANGGIL HEADER, CONTENT, DAN FOOTER --}}
    @include('themes.alleywayMuse.shared.header')
    @yield('content')
    @include('themes.alleywayMuse.shared.footer')
    
    {{-- MEMANGGIL SCRIPT JS JQUERY --}}
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>