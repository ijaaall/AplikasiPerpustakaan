<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Beranda') | Perpustakaan SMKN 1 Wadaslintang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .navbar-app {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
    @stack('styles')
</head>

<body class="bg-light">

    @php
        // Menu muncul otomatis begitu route-nya sudah didaftarkan di web.php
        $menus = [
            ['Dashboard', 'dashboard', 'bi-speedometer2'],
            ['Petugas', 'petugas.index', 'bi-person-badge'],
            ['Buku', 'buku.index', 'bi-book'],
            ['Anggota', 'anggota.index', 'bi-people'],
            ['Peminjaman', 'peminjaman.index', 'bi-box-arrow-up-right'],
            ['Pengembalian', 'pengembalian.index', 'bi-box-arrow-in-down-left'],
        ];
    @endphp

    <nav class="navbar navbar-expand-lg navbar-dark navbar-app shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
                <i class="bi bi-book-half me-1"></i> Perpustakaan
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"
                aria-controls="navMenu" aria-expanded="false" aria-label="Buka menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @foreach ($menus as [$label, $routeName, $icon])
                        @if (Route::has($routeName))
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs($routeName, explode('.', $routeName)[0] . '.*') ? 'active fw-semibold' : '' }}"
                                    href="{{ route($routeName) }}">
                                    <i class="bi {{ $icon }} me-1"></i>{{ $label }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>

                <div class="d-flex align-items-center gap-3 text-white">
                    <span class="small"><i class="bi bi-person-circle me-1"></i>{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-light fw-semibold">
                            <i class="bi bi-box-arrow-right me-1"></i>Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="container py-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
