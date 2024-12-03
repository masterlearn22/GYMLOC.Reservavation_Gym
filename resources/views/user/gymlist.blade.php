@extends('partials.app')

@section('content')
<section class="py-5" id="gym-locations">
    <div class="container">
        <div class="row">
            <div class="mt-5 text-center row my-sm-5">
                <div class="mx-auto col-lg-8">
                    <span class="mb-3 badge bg-success">Temukan Gym Terbaik</span>
                    <h2 class="display-4">Pilih Gym Sesuai Kebutuhanmu</h2>
                    <p class="lead">Kami menyediakan berbagai pilihan gym dengan fasilitas terlengkap di berbagai kota</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- Daftar Gym -->
            <div class="col-md-8">
                <ul class="list-unstyled">
                    <!-- Gym 1 -->
                    <li class="mb-3">
                        <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded">
                            <div>
                                <h5 class="text-primary">FIT HUB BENDUNGAN HILIR</h5>
                                <p class="text-muted mb-0">Jl. Bendungan Hilir No.10, RT.1/RW.4, Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10210</p>
                            </div>
                            <button class="btn btn-icon">
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        </div>
                    </li>
                    <!-- Gym 2 -->
                    <li class="mb-3">
                        <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded">
                            <div>
                                <h5 class="text-primary">FIT HUB MENARA DUTA</h5>
                                <p class="text-muted mb-0">Jalan H. R. Rasuna Said No.Kav B/09, RT.5/RW.1, Kuningan, Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12910</p>
                            </div>
                            <button class="btn btn-icon">
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        </div>
                    </li>
                    <!-- Gym 3 -->
                    <li class="mb-3">
                        <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded">
                            <div>
                                <h5 class="text-primary">FIT HUB SUNTER ALTIRA</h5>
                                <p class="text-muted mb-0">Altira Business Park Blok A01-A03 Lantai 2, Jakarta, DKI Jakarta 14350</p>
                            </div>
                            <button class="btn btn-icon">
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        </div>
                    </li>
                    <!-- Gym 4 -->
                    <li class="mb-3">
                        <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded">
                            <div>
                                <h5 class="text-primary">FIT HUB TEBET</h5>
                                <p class="text-muted mb-0">Jl. Prof. DR. Soepomo No.30, RT.13/RW.2, Tebet Barat, Kec. Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12810</p>
                            </div>
                            <button class="btn btn-icon">
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        </div>
                    </li>
                    <!-- Tambahan 11 gym lainnya -->
                    @for ($i = 5; $i <= 15; $i++)
                    <li class="mb-3">
                        <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded">
                            <div>
                                <h5 class="text-primary">FIT HUB GYM KE-{{ $i }}</h5>
                                <p class="text-muted mb-0">Alamat Gym Ke-{{ $i }}, Jakarta</p>
                            </div>
                            <button class="btn btn-icon">
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        </div>
                    </li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Tambahkan styling langsung -->
<style>
    .btn-icon {
        background-color: #1f3a57; /* Warna biru tua */
        border: none;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%; /* Bentuk lingkaran */
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-icon i {
        color: #ffffff; /* Warna putih untuk ikon */
        font-size: 1.5rem; /* Ukuran ikon */
        transition: transform 0.3s ease;
    }

    .btn-icon:hover {
        background-color: #2a4969; /* Warna saat hover */
        transform: scale(1.1); /* Sedikit memperbesar tombol */
    }

    .btn-icon:hover i {
        transform: scale(1.2); /* Sedikit memperbesar ikon */
    }

    .rounded {
        border-radius: 10px;
    }

    .text-primary {
        color: #1f3a57; /* Warna biru tua untuk judul gym */
    }

    .list-unstyled li {
        border: 1px solid #eaeaea; /* Garis pembatas */
        border-radius: 10px;
        overflow: hidden;
        background: white;
    }
</style>

<!-- Tambahkan Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@endsection
