<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Data Aplikasi Mobile')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

.card{

transition:.3s;

}

.card:hover{

transform:translateY(-8px);

box-shadow:0 15px 35px rgba(0,0,0,.2);

}

.btn{

border-radius:10px;

}

.table{

border-radius:10px;

overflow:hidden;

}

</style>

</head>
<body class="d-flex flex-column min-vh-100" style="background:#f4f7fc;">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-lg">

    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            📱 Mobile App Management
        </a>

        <button class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse"
            id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">
                        <i class="bi bi-house-door-fill"></i> Home
                    </a>
                </li>

                @auth

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mobile.index') }}">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>

                <li class="nav-item">

                    <form action="{{ route('logout') }}"
                        method="POST">

                        @csrf

                        <button class="btn btn-danger ms-3">

                            <i class="bi bi-box-arrow-right"></i>

                            Logout

                        </button>

                    </form>

                </li>

                @else

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </a>
                </li>

                @endauth

            </ul>

        </div>

    </div>

</nav>

<main class="container mt-4 flex-grow-1">

    @yield('content')

</main>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: '{{ session("success") }}',
    confirmButtonColor: '#0d6efd'
});
</script>
@endif

@if(session('error'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Gagal',
    text: '{{ session("error") }}',
    confirmButtonColor: '#dc3545'
});
</script>
@endif

@stack('scripts')

<footer class="bg-dark text-white text-center py-4">

    <div class="container">

        <h5 class="fw-bold">📱 Mobile App Management</h5>

        <p class="mb-1">
            Sistem Informasi Data Aplikasi Mobile
        </p>

        <small>
            © {{ date('Y') }} | UAS Rekayasa Web - Laravel 13
        </small>

    </div>

</footer>
</body>
</html>