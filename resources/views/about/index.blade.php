<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.header')
    @include('partials.styleGlobal')

    <!-- Menambahkan CSS untuk Kartu Informasi dan Banner -->
    <style>
        /* Banner Gambar Besar */
        .about-banner {
            position: relative;
            width: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .about-banner img {
            height: 100vh; /* Penuh satu layar */
            object-fit: cover;
            width: 100%;
        }

        /* Teks di atas Banner */
        .banner-text {
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 3rem;
            font-weight: bold;
            text-align: center;
            z-index: 2; /* Agar teks di atas gambar */
            opacity: 0.8;
            transition: color 0.3s ease-in-out, transform 0.3s ease-in-out;
            cursor: pointer;
        }

        .banner-text:hover {
            color: #00bcd4; /* Warna berubah saat hover */
            transform: translateX(-50%) scale(1.1); /* Efek perbesar saat hover */
        }

        .banner-text:active {
            color: #ff5722; /* Warna saat diklik */
        }

        /* Section Kenapa Gym Terbaik */
        .why-gym {
            text-align: center;
            padding: 50px 20px;
            background-color: #f8f9fa;
        }

        .why-gym h2 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 30px;
        }

        /* Grid Kartu */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        /* Kartu */
        .info-card {
            background-color: white;
            border: 1px solid #e6e6e6;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .info-card h3 {
            font-size: 2rem;
            color: #00bcd4;
            font-weight: bold;
        }

        .info-card h4 {
            font-size: 1rem;
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .info-card p {
            color: #7f8c8d;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        /* Section Baru yang Ditambahkan */
        .additional-section {
            background-color: #f2f2f2;
            padding: 40px 20px;
            text-align: center;
        }

        .additional-section h2 {
            font-size: 2rem;
            margin-bottom: 30px;
        }

        .additional-section p {
            font-size: 1rem;
            color: #555;
            line-height: 1.8;
        }
    </style>
</head>
<body>
    <!-- Banner Gambar Besar dengan Link -->
    <a href="https://link-tujuan-anda.com" class="about-banner">
        <img src="{{ asset('assets/images/banner2.jpeg') }}" alt="Tentang Kami" class="img-fluid">
        <!-- Teks yang akan ditimpa di atas banner -->
        <div class="banner-text">Tentang Kami</div>
    </a>

    <!-- Deskripsi dan Galeri Foto -->
    <div class="container my-5 about-description">
        <h2>Tentang Kami</h2>
        <p>GYMLOC adalah platform yang memudahkan Anda untuk menemukan gym yang sesuai dengan kebutuhanmu. Kami menyediakan berbagai pilihan gym terbaik yang dapat diakses dengan mudah di kotamu.</p>
        
        <h4>Galeri Foto</h4>
        <div class="row gallery">
            <div class="col-md-4">
                <img src="{{ asset('assets/images/gym1.jpg') }}" class="img-fluid" alt="Gym 1">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('assets/images/gym2.jpg') }}" class="img-fluid" alt="Gym 2">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('assets/images/gym3.jpg') }}" class="img-fluid" alt="Gym 3">
            </div>
        </div>
    </div>

    <!-- Menambahkan Section Baru di Bawah -->
    <div class="additional-section">
        <h2>Kenapa GYMLOC Gym Terbaik buat Kamu?</h2>
        <div class="card-grid">
            <!-- Kartu 1 -->
            <div class="info-card">
                <h3>100k+</h3>
                <h4>Member Aktif</h4>
                <p>Telah dipercaya oleh banyak orang untuk mendukung fitness journey mereka.</p>
            </div>
            <!-- Kartu 2 -->
            <div class="info-card">
                <h3>100+</h3>
                <h4>Klub Bebas Akses</h4>
                <p>Ada 100+ lokasi di berbagai kota yang bisa kamu kunjungi dengan bebas.</p>
            </div>
            <!-- Kartu 3 -->
            <div class="info-card">
                <h3>25</h3>
                <h4>Kota Se-Indonesia</h4>
                <p>Jelajahi kota-kota di Indonesia dan bebas kunjungi club di setiap perjalananmu.</p>
            </div>
            <!-- Kartu 4 -->
            <div class="info-card">
                <h3>600+</h3>
                <h4>Trainer</h4>
                <p>Pelatih kami sudah teredukasi dan berpengalaman dalam berbagai jenis kebugaran.</p>
            </div>
            <!-- Kartu 5 -->
            <div class="info-card">
                <h3>40+</h3>
                <h4>Kelas Fitness</h4>
                <p>Akses ke lebih dari 40 kelas fitness tanpa batas dengan instruktur profesional.</p>
            </div>
            <!-- Kartu 6 -->
            <div class="info-card">
                <h3>1500+</h3>
                <h4>Alat Premium</h4>
                <p>Nikmati peralatan dan fasilitas gym premium yang lengkap.</p>
            </div>
            <!-- Kartu 7 -->
            <div class="info-card">
                <h3>1</h3>
                <h4>Aplikasi</h4>
                <p>Olahraga semakin menyenangkan dengan aplikasi yang memudahkanmu.</p>
            </div>
        </div>
    </div>

    @include('partials.jspage')
    @include('partials.jsglobal')
</body>
</html>
