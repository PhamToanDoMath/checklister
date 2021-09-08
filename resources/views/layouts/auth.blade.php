<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui@3.4.0/dist/css/coreui.min.css" crossorigin="anonymous">

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body class="c-app flex-row align-items-center">
    @yield('content')

    <!-- Optional JavaScript -->
    <!-- Popper.js first, then CoreUI JS -->
    <script src="https://unpkg.com/@coreui/coreui@3.4.0/dist/js/coreui.bundle.min.js"></script>

 </body>
</html>