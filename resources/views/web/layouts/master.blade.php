<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RTO Exam')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @include('web.layouts.header.header-links')
    @stack('styles')
</head>

<body>
    @include('web.layouts.header.header')

    <main>
        @yield('content')
    </main>

    @include('web.layouts.footer.footer')
    @include('web.layouts.footer.footer-links')
    @include('web.layouts.common-js.common-js')

    @stack('scripts')
</body>

</html>