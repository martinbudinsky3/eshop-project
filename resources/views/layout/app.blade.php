<!DOCTYPE html>
<html lang="sk">
<head>
    @include('layout.partials.head')
    @yield('custom-css')
    @yield('title')
</head>

<body>
    <!--Opaque layers-->
    <div id="opaque-layer-sm" class="opaque-layer pop-up d-none d-sm-none"></div>
    <div id="opaque-layer-lg" class="opaque-layer pop-up d-none d-lg-none"></div>

    @include('layout.partials.header') 
    @include('layout.partials.nav')
    
    @yield('content')
                
    @include('layout.partials.footer')
    
    @yield('external-scripts')
    <script src="{{ asset('js/index.js') }}"></script>
    @yield('custom-scripts')

</body>
</html>   