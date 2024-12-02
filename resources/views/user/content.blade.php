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
