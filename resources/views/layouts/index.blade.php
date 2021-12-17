<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIPERU | {{ $title }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>

@if ($title == 'Register' || $title == 'Login')

    <body class="hold-transition @if ($title == 'Login')
        login-page
    @else
        register-page
    @endif ">
        @yield('body')
    </body>
    @include('layouts.script')
@else

    <body class="hold-transition sidebar-mini">

        <!-- Main content -->
        <div class="wrapper">
            <!-- Navbar -->
            @include('layouts.navbar')
            <!-- Main Sidebar Container -->
            @include('layouts.sidebar')
            <!-- Content -->
            @yield('body')
            <footer class="main-footer">
                @include('layouts.footer')
            </footer>
        </div>
        <!-- Script -->
        @include('layouts.script')
    </body>
@endif

</html>
