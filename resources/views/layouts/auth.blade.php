<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{$title}} &mdash; Stisla</title>

    {{-- CSS Template --}}
    @include('include.style')

    <!-- CSS Libraries (Tambahan jika di Butuhkan)-->
    @yield('cssLibraries')

</head>

<body>
    <div id="app">
        @yield('mainContent')
    </div>

    {{-- JS Template --}}
    @include('include.scripts')

    <!-- JS Libraies (Tambahan jika di perlukan) -->
    @yield('jsLibraries')

</body>
</html>
