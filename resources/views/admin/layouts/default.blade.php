<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('admin.includes.head')
</head>

<body>
    <div class="container">
        

        <div id="main" class="row">
            <header class="row">
            @include('admin.includes.navbar')
        </header>
        @include('includes.error_message')

            @yield('content')

        </div>

        @include('admin.includes.footer')

    </div>
</body>

</html>
