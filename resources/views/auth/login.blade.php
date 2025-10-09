<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assetssss/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assetssss/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assetssss/images/favicon.png') }}" />
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        section {
            background-image: url('assets/images/login.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            backdrop-filter: blur(10px);
        }

        .btn-primary {
            background-color: #ff69b4;
            border-color: #f4f4fb;
            color: #f4f4fb;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: black;
            color: #ff69b4;
            border-color: black;
        }

        .text-white a {
            color: #ffffff;
            text-decoration: none;
        }

        .text-white a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<section class="vh-100 d-flex align-items-center justify-content-center">
    <div class="col-lg-4">
        <div class="card shadow-lg">
            <div class="text-center mt-4">
                <div class="rounded-circle bg-white d-inline-flex align-items-center justify-content-center" style="width: 0px; height: 0px;">
                    <i class="mdi mdi-account" style="font-size: 40px; color: #2c2c54;"></i>
                </div>
            </div>
            <div class="card-body text-white">
                <h3 class="text-center mb-4">Login</h3>
                <form class="forms-sample" action="{{ route('login') }}" method="POST">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                    <div class="text-center mt-3">
                        <a href="/register" class="text-white">Belum Punya Akun? Register here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
