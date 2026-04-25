<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.header')
    @include('partials.styleGlobal')
    @yield('style')
    <style>
        body {
            background-color: #121212 !important;
            color: #F3F4F6;
        }
        .navbar-light .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
        }
        .navbar-light .navbar-nav .nav-link:hover {
            color: #39FF14 !important;
        }
        .navbar-brand {
            color: #39FF14 !important;
            font-weight: 700;
        }
        /* Override default footer styles for dark mode */
        footer.footer {
            background-color: #1a1a1a !important;
            color: #a0aec0 !important;
            border-top: 1px solid #2d3748;
        }
        footer.footer a {
            color: #cbd5e1 !important;
        }
        footer.footer h6 {
            color: #fff !important;
        }
    </style>
</head>

<body class="index-page bg-dark-gym">
    @include('partials.navbar')
    
    <!-- Main Content Area -->
    <div class="main-content">
        @yield('content')
    </div>

    @include('partials.footer')
    @include('partials.jspage')
    @include('partials.jsglobal')
    
</body>
</html>
