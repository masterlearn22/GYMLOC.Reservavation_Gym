<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('assetssss/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assetssss/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assetssss/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assetssss/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetssss/vendors/mdi/css/materialdesignicons.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assetssss/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assetssss/images/favicon.png') }}">

    <style>
        .form-control {
            height: 38px;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        button {
            padding: 10px;
            font-size: 14px;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Styling for the form container */
        .form-container {
            max-width: 500px; /* Increased width */
            margin: 0 auto;
        }

        .card {
            border-radius: 15px;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
        }

        /* Styling background */
        section {
            background-image: url('assets/images/login.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }

        /* Centering the login column */
        .login-column {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-text {
            display: none; /* Hide the text section */
        }

        /* Styling untuk button submit */
        button.btn-primary {
            background-color: #ff69b4; /* Warna pink */
            border-color: #ff69b4;
            transition: background-color 0.3s ease, color 0.3s ease; /* Animasi transisi */
        }

        button.btn-primary:hover {
            background-color: #060505; /* Warna putih saat hover */
            color: #ff69b4; /* Warna teks pink */
            border-color: #060505;
        }
    </style>
</head>

<body>
    <!-- Section: Design Block -->
    <section class="vh-100 d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <!-- Kolom Register -->
                <div class="col-lg-6"> <!-- Increased the width of the form column -->
                    <div class="card shadow-lg form-container">
                        <div class="text-center mt-1">
                            <div class="rounded-circle bg-white d-inline-flex align-items-center justify-content-center" style="width: 0px; height: 0px;">
                                <i class="mdi mdi-account" style="font-size: 40px; color: #2c2c54;"></i>
                            </div>
                        </div>
                        <div class="card-body text-white">
                            <h3 class="text-center mb-1">Register</h3>
                            <form class="forms-sample" action="{{ route('register') }}" method="POST">
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
                                <div class="form-group mb-1">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                                </div>
                                <div class="form-group mb-1">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                                </div>
                                <div class="form-group mb-1">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group mb-1">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                                <div class="text-center mt-1">
                                    <a href="/login" class="text-black">Already have an account? Login here</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
