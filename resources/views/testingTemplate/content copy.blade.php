@extends('partials.app') @section('title', 'Detail Gym') @section('style')
<!-- Tambahkan style khusus untuk halaman ini jika diperlukan -->
<link rel="stylesheet" href="{{ asset('css/detail-gym.css') }}" />
@endsection @section('content')
<div class="container mt-4">
    <div class="card">
        <div class="row g-0">
            <!-- Bagian Gambar Gym -->
            <div class="col-md-4">
                <img
                    src="{{ asset('images/gym.jpg') }}"
                    class="img-fluid rounded-start"
                    alt="Gym Image"
                />
            </div>
            @extends('partials.app') @section('title', 'Detail Membership')
            @section('style')
            <!-- Tambahkan style khusus untuk halaman ini jika diperlukan -->
            <link rel="stylesheet" href="{{ asset('css/membership.css') }}" />
            @endsection @section('content')
            <div class="container mt-5">
                <!-- Bagian Hero atau Header -->
                <div class="text-center mb-5">
                    <h1 class="fw-bold">Bergabung dengan Membership FIT HUB</h1>
                    <p class="text-muted">
                        Mulai dari Rp249.000/bulan, nikmati akses bebas ke semua
                        klub dengan fasilitas premium dan kelas FIT HUB
                        sepuasnya.
                    </p>
                </div>

                <!-- Bagian Membership -->
                <div class="row justify-content-center">
                    <!-- Paket Membership -->
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold">
                                    Membership Bulanan
                                </h5>
                                <p class="text-muted">Rp249.000/bulan</p>
                                <ul class="list-unstyled">
                                    <li>
                                        <i
                                            class="bi bi-check-circle-fill text-success"
                                        ></i>
                                        Bebas olahraga di semua klub
                                    </li>
                                    <li>
                                        <i
                                            class="bi bi-check-circle-fill text-success"
                                        ></i>
                                        Fasilitas premium
                                    </li>
                                    <li>
                                        <i
                                            class="bi bi-check-circle-fill text-success"
                                        ></i>
                                        Akses ke semua kelas
                                    </li>
                                </ul>
                                <a href="#" class="btn btn-primary w-100 mt-3"
                                    >Daftar Sekarang</a
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Paket Membership Lain -->
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold">
                                    Membership Tahunan
                                </h5>
                                <p class="text-muted">Rp2.500.000/tahun</p>
                                <ul class="list-unstyled">
                                    <li>
                                        <i
                                            class="bi bi-check-circle-fill text-success"
                                        ></i>
                                        Hemat hingga 17%
                                    </li>
                                    <li>
                                        <i
                                            class="bi bi-check-circle-fill text-success"
                                        ></i>
                                        Bebas olahraga di semua klub
                                    </li>
                                    <li>
                                        <i
                                            class="bi bi-check-circle-fill text-success"
                                        ></i>
                                        Fasilitas premium
                                    </li>
                                    <li>
                                        <i
                                            class="bi bi-check-circle-fill text-success"
                                        ></i>
                                        Akses ke semua kelas
                                    </li>
                                </ul>
                                <a href="#" class="btn btn-primary w-100 mt-3"
                                    >Daftar Sekarang</a
                                >
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bagian Keunggulan -->
                <div class="mt-5">
                    <h3 class="text-center fw-bold">Kenapa Pilih FIT HUB?</h3>
                    <div class="row mt-4">
                        <div class="col-md-4 text-center">
                            <i class="bi bi-building fs-1 text-primary"></i>
                            <h5 class="mt-2">Akses Semua Klub</h5>
                            <p class="text-muted">
                                Nikmati kebebasan olahraga di berbagai lokasi
                                FIT HUB.
                            </p>
                        </div>
                        <div class="col-md-4 text-center">
                            <i
                                class="bi bi-person-video3 fs-1 text-primary"
                            ></i>
                            <h5 class="mt-2">Kelas Premium</h5>
                            <p class="text-muted">
                                Ikuti kelas kebugaran bersama instruktur
                                profesional.
                            </p>
                        </div>
                        <div class="col-md-4 text-center">
                            <i class="bi bi-shield-check fs-1 text-primary"></i>
                            <h5 class="mt-2">Fasilitas Aman</h5>
                            <p class="text-muted">
                                Kebersihan dan kenyamanan menjadi prioritas
                                utama.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endsection @section('scripts')
            <!-- Tambahkan skrip khusus untuk halaman ini -->
            <script>
                console.log("Halaman detail membership berhasil dimuat");
            </script>
            @endsection

            <!-- Bagian Informasi Gym -->
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title">Nama Gym</h3>
                    <p class="card-text">
                        Deskripsi singkat tentang gym. Contohnya, fasilitas
                        modern, tempat yang nyaman, dan berbagai layanan fitness
                        tersedia di sini.
                    </p>

                    <h5>Fasilitas:</h5>
                    <ul>
                        <li>Alat fitness lengkap</li>
                        <li>Studio kelas yoga</li>
                        <li>Kamar mandi dan loker</li>
                        <li>Personal trainer</li>
                    </ul>

                    <h5>Lokasi:</h5>
                    <p>Jl. Contoh Alamat No. 123, Jakarta</p>

                    <a href="#" class="btn btn-primary">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan konten lain jika diperlukan -->
</div>
@endsection @section('scripts')
<!-- Tambahkan skrip khusus untuk halaman ini jika diperlukan -->
<script>
    console.log("Halaman detail gym berhasil dimuat");
</script>
@endsection
