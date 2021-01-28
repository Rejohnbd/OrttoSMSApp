<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0' />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="" content="" />
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/skins-modes.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/single-page/css/single-page.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}" />
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('css/color11.css') }}" />
    @yield('styles')
</head>

<body class="app">
    @include('page_pertials.loader')
    <div class="page">
        <div class="page-main">
            @include('page_pertials.nav-top')
            @include('page_pertials.nav-menu')

            @yield('content')
        </div>

        @include('page_pertials.footer')
    </div>

    <a href="#top" id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('plugins/rating/rating-stars.js') }}"></script>
    <script src="{{ asset('plugins/input-mask/input-mask.min.js') }}"></script>
    <script src="{{ asset('plugins/horizontal-menu/horizontal-menu.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    @yield('scripts')
</body>

</html>