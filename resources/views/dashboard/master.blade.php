<!doctype html>
<html lang="en">
<!--Start Head -->
@include('dashboard.partilas.head')
<!-- End Head -->
<body>
<div class="container-fluid position-relative d-flex p-0">
    @include('dashboard.partilas.Spinner')
    @include('dashboard.partilas.sidebar')
    <div class="content">
        @include('dashboard.partilas.nav')
        @yield('content')
        @include('dashboard.partilas.footer')
    </div>
</div>
@include('dashboard.partilas.scripts')
</body>
</html>
