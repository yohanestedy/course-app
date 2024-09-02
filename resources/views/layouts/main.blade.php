<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $title }} &mdash; CourseApp</title>

    {{-- CSS Template --}}
    @include('include.style')

    {{-- CSS Libraries (jika di perlukan) --}}
    @yield('cssLibraries')

</head>

<body>

    <div id="app">
        <div class="main-wrapper">

            {{-- NAVBAR --}}
            @include('include.navbar')

            {{-- SIDEBAR --}}
            @include('include.sidebar')

            <!-- MAIN CONTENT -->
            <div class="main-content">
                @yield('mainContent')
            </div>

            {{-- FOOTER --}}
            @include('include.footer')
        </div>
    </div>

    {{-- JS Template --}}
    @include('include.scripts')

    <!-- JS Libraies (Tambahan jika di perlukan) -->
    @yield('jsLibraries')

</body>

</html>
