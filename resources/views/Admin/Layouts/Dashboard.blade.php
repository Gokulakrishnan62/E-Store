<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/admin/dashboard.js') }}"></script>
    <script src="@yield('script-1')"></script>
    <script src="@yield('script-2')"></script>
    <script src="@yield('script-3')"></script>
    @vite('resources/css/app.css')
    <title>@yield('page-title')</title>
</head>
<body class="bg-gray-100">
<!-- Navbar -->
@include('Admin.Layouts.Navbar')

<!-- Main Content Area -->
<div class="content-area flex">
    <!-- Sidebar -->
    @include('Admin.Layouts.Sidebar')

    <!-- Main Content -->
    <div class="body-content flex-1 p-6">
        @section('body-content')
            {{-- our content --}}
        @show
    </div>
</div>
</body>
</html>
