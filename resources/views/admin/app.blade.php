<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Tambahkan sedikit styling untuk menu aktif */
        .list-group-item.active {
            background-color: #0d6efd;
            color: white;
            font-weight: bold;
        }

        .list-group-item.active a {
            color: white !important;
        }

        .list-group-item a {
            color: #212529;
            text-decoration: none;
        }

        .list-group-item:hover {
            background-color: #e9ecef;
        }
        .pricing-list {
            padding-left: 20px;
        }
    </style>
    @include('partials.header')
    @include('partials.styleGlobal')
   
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Admin Panel</a>
        </div>
    </nav>

    <div class="d-flex">
        <!-- Sidebar -->
        @include('partials.sidebar')

        <!-- Main Content -->
        <div class="p-4 flex-grow-1">
            @yield('content')
        </div>
    </div>

    @include('partials.jspage')
    @include('partials.jsglobal')
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
