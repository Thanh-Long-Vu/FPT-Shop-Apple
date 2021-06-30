<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="{{ asset('/admin') }}">
    <link rel="icon" href="admin/favicon.ico.png">
    <title>@yield('title')</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="admin/css/simplebar.css">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    @yield('scriptHeader')
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="admin/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="admin/css/app-light.css" id="lightTheme" disabled>
    <link rel="stylesheet" href="admin/css/app-dark.css" id="darkTheme">
</head>

<body class="vertical  dark  ">
    <div class="wrapper">
        {{-- start topnav --}}
        @include("adminPage.layouts.topnav")
        {{-- end topnav --}}
        {{-- start sidebar --}}
        @include("adminPage.layouts.sidebar")
        {{-- end sidebar --}}
        @yield('content')
    </div> <!-- .wrapper -->   
    @yield('script')
</body>

</html>
