<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.head')
</head>

<body>
    <div class="container">
        {{-- <header class="row">
            @include('includes.header')
        </header> --}}

        <div id="main" class="row">

            @yield('content')

        </div>
@include('includes.footers')
        @include('includes.footer')

    </div>
</body>

</html>
