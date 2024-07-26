<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body>
    <div id="app">
        <div class="main-wrapper">
            @include('partials.navbar')

            <div class="main-sidebar">
                @include('partials.sidebar')
            </div>

            <div class="main-content">
                <section class="section">
                    @yield('content')
                </section>
            </div>
            
            @include('partials.footer')
        </div>
    </div>

    <!-- JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
