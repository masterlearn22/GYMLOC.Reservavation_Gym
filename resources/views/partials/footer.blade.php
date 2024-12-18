<footer class="pt-5 mt-5 footer" style="background-color: #102C57; padding: 40px 0;">
    <style>
        /* Atur Semua Teks Menjadi Putih */
        .footer {
            color: white; /* Warna teks default */
        }

        /* Footer Title (GYMLOC, Company) */
        .footer-title {
            color: white; /* Judul berwarna putih */
        }

        /* Footer Links */
        .footer-link {
            color: white; /* Tautan teks berwarna putih */
            text-decoration: none; /* Hilangkan underline */
        }

        /* Hilangkan semua efek hover */
        .footer-link:hover, .footer-link:focus, .footer-title:hover, .footer-title:focus {
            color: white; /* Tetap putih tanpa efek */
            text-shadow: none; /* Hilangkan bayangan teks */
            transform: none; /* Tidak ada transformasi */
            text-decoration: none; /* Tidak ada underline tambahan */
        }

        /* Footer Social Media Icons */
        .footer-link i {
            color: white; /* Ikon berwarna putih */
        }

        .footer-link i:hover {
            color: white; /* Tetap putih tanpa efek */
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="mb-4 col-md-3 ms-auto">
                <div>
                    <a href="https://www.creative-tim.com/product/material-kit">
                        <img src="./assets/img/logo-ct-dark.png" class="mb-3 footer-logo" alt="main_logo">
                    </a>
                    <h6 class="mb-4 font-weight-bolder footer-title">GYMLOC</h6>
                </div>
                <div>
                    <ul class="flex-row d-flex ms-n3 nav">
                        <li class="nav-item">
                            <a class="nav-link pe-1 footer-link" href="https://www.facebook.com/CreativeTim" target="_blank">
                                <i class="text-lg fab fa-facebook opacity-8"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-1 footer-link" href="https://twitter.com/creativetim" target="_blank">
                                <i class="text-lg fab fa-twitter opacity-8"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-1 footer-link" href="https://dribbble.com/creativetim" target="_blank">
                                <i class="text-lg fab fa-dribbble opacity-8"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-1 footer-link" href="https://github.com/creativetimofficial" target="_blank">
                                <i class="text-lg fab fa-github opacity-8"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-1 footer-link" href="https://www.youtube.com/channel/UCVyTG4sCw-rOvB9oHkzZD1w" target="_blank">
                                <i class="text-lg fab fa-youtube opacity-8"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mb-4 col-md-8 col-sm-6 col-6">
                <div>
                    <h6 class="text-sm footer-title">Company</h6>
                    <ul class="flex-column ms-n3 nav">
                        <li class="nav-item">
                            <a class="nav-link footer-link" href="{{ route('about.index') }}">
                                Tentang Kami
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link footer-link" href="https://www.creative-tim.com/templates/free" target="_blank">
                                Freebies
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link footer-link" href="https://www.creative-tim.com/templates/premium" target="_blank">
                                Premium Tools
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link footer-link" href="https://www.creative-tim.com/blog" target="_blank">
                                Blog
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-12">
                <div class="text-center">
                    <p class="my-4 text-sm text-white font-weight-normal">
                        All rights reserved. Copyright ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> GYMLOC.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
