<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'E-Rapor') — SLB Insan Mutiara Pekanbaru</title>
    <meta name="description" content="@yield('description', 'E-Rapor SLB Insan Mutiara Pekanbaru — sistem informasi akademik dan laporan hasil belajar.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <main class="auth-shell">
        @yield('content')

        <footer class="auth-footer">
            @yield('footer')
            <p class="copyright">&copy; {{ date('Y') }} SLB Insan Mutiara Pekanbaru</p>
        </footer>
    </main>
</body>
</html>
