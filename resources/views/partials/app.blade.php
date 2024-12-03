<!DOCTYPE html>
<head>

    @include('partials.header')
    @include('partials.styleGlobal')
</head>

<body class="bg-gray-200 index-page">
    @include('partials.navbar')
    <div class="mx-3 card card-body blur shadow-blur mx-md-4 mt-n6">
        @yield('content')

    </div>
    @include('partials.footer')
    @include('partials.jspage')
    @include('partials.jsglobal')
</body>

</html>
