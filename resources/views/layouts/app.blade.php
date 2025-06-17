<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">MAHASISWA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('mahasiswa*') ? 'active' : '' }}" href="{{ route('mahasiswa.index') }}">Data Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jenisketerangan.index') }}">Jenis Keterangan</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('status.index') }}" class="nav-link">Status</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jenjang.index') }}">Jenjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('history.index') }}">History</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Isi Konten -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Footer -->
     <!--<footer class="text-center mt-5 mb-3 text-muted">
       {{ date('Y') }}
    </footer>-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
