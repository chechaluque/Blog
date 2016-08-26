<!doctype html>
<html lang="en">
<head>
    @include('partials._head')
</head>
    <body>
    @include('partials.header')

    <div class="container">
        @include('partials.messages')
        @yield('content')

    </div>
    @include('partials.footer')
    @include('partials.javascript')
    @yield('scripts')
</body>
</html>