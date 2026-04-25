@extends('partials.app-dark')

@section('style')
<style>
    /* Modern Gym Dark Theme CSS */
    :root {
        --gym-dark: #121212;
        --gym-card: rgba(30, 30, 30, 0.7);
        --neon-accent: #39FF14; /* Neon Green */
        --neon-glow: 0 0 10px rgba(57, 255, 20, 0.5), 0 0 20px rgba(57, 255, 20, 0.3);
        --text-light: #F3F4F6;
        --text-muted: #9CA3AF;
    }

    body {
        background-color: var(--gym-dark);
        color: var(--text-light);
        font-family: 'Inter', sans-serif;
    }

    /* Hero Section */
    .hero-modern {
        position: relative;
        height: 100vh;
        min-height: 600px;
        background-image: url('https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&w=2070&auto=format&fit=crop');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hero-overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(to bottom, rgba(18, 18, 18, 0.7) 0%, rgba(18, 18, 18, 1) 100%);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        padding: 0 20px;
    }

    .title-neon {
        font-weight: 900;
        font-size: 4.5rem;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 20px;
    }

    .title-neon span {
        color: var(--neon-accent);
        text-shadow: var(--neon-glow);
    }

    .subtitle-modern {
        font-size: 1.25rem;
        color: var(--text-muted);
        max-width: 600px;
        margin: 0 auto 40px auto;
    }

    .btn-neon {
        background-color: transparent;
        color: var(--neon-accent);
        border: 2px solid var(--neon-accent);
        padding: 12px 35px;
        font-size: 1.1rem;
        font-weight: 600;
        border-radius: 30px;
        text-transform: uppercase;
        transition: all 0.3s ease;
        box-shadow: var(--neon-glow);
        text-decoration: none;
        display: inline-block;
    }

    .btn-neon:hover {
        background-color: var(--neon-accent);
        color: var(--gym-dark);
        box-shadow: 0 0 20px rgba(57, 255, 20, 0.8);
        transform: translateY(-3px);
    }

    /* Stats Section */
    .stats-container {
        margin-top: -80px;
        position: relative;
        z-index: 10;
    }

    .stat-card {
        background: var(--gym-card);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 30px 20px;
        text-align: center;
        transition: transform 0.3s ease;
        height: 100%;
    }

    .stat-card:hover {
        transform: translateY(-10px);
        border-color: var(--neon-accent);
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 800;
        color: var(--neon-accent);
        margin-bottom: 10px;
        text-shadow: var(--neon-glow);
    }

    .stat-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #fff;
        margin-bottom: 5px;
    }

    .stat-desc {
        color: var(--text-muted);
        font-size: 0.9rem;
    }

    /* Section Headings */
    .section-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: #fff;
        margin-bottom: 15px;
        text-transform: uppercase;
    }
    .section-title span {
        color: var(--neon-accent);
    }
    .section-subtitle {
        color: var(--text-muted);
        font-size: 1.1rem;
        margin-bottom: 50px;
    }

    /* Glass Cards (Gym List & Benefits) */
    .glass-card {
        background: var(--gym-card);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.3s ease;
        height: 100%;
    }

    .glass-card:hover {
        transform: translateY(-5px);
        border-color: rgba(57, 255, 20, 0.3);
        box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    }

    .gym-img-container {
        position: relative;
        height: 200px;
        overflow: hidden;
        background-color: #222;
    }

    .gym-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .glass-card:hover .gym-img-container img {
        transform: scale(1.1);
    }

    .gym-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background-color: var(--neon-accent);
        color: var(--gym-dark);
        font-weight: bold;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
    }

    .gym-info {
        padding: 20px;
    }

    .gym-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #fff;
        margin-bottom: 10px;
    }

    .gym-address {
        color: var(--text-muted);
        font-size: 0.9rem;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }
    .gym-address i {
        color: var(--neon-accent);
        margin-right: 8px;
    }

    .btn-outline-neon {
        border: 1px solid var(--neon-accent);
        color: var(--neon-accent);
        background: transparent;
        padding: 8px 20px;
        border-radius: 8px;
        font-size: 0.9rem;
        transition: 0.3s;
        text-decoration: none;
    }
    
    .btn-outline-neon:hover {
        background: var(--neon-accent);
        color: var(--gym-dark);
    }

    /* Benefits Icons */
    .benefit-icon {
        width: 60px;
        height: 60px;
        background: rgba(57, 255, 20, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px auto;
        color: var(--neon-accent);
        font-size: 1.5rem;
        box-shadow: inset 0 0 10px rgba(57,255,20,0.2);
    }

    /* Filter Sidebar */
    .filter-card {
        background: linear-gradient(145deg, #1e1e1e, #121212);
        border: 1px solid #333;
        border-radius: 16px;
        padding: 25px;
    }
    .filter-card .form-label {
        color: #fff;
        font-weight: 600;
    }
    .filter-card .form-select {
        background-color: #2a2a2a;
        border: 1px solid #444;
        color: #fff;
    }
    .filter-card .form-select:focus {
        border-color: var(--neon-accent);
        box-shadow: none;
    }
    .btn-solid-neon {
        background-color: var(--neon-accent);
        color: var(--gym-dark);
        border: none;
        font-weight: bold;
        padding: 10px;
        border-radius: 8px;
        transition: 0.3s;
    }
    .btn-solid-neon:hover {
        background-color: #32e612;
        transform: translateY(-2px);
    }

    /* Pagination Override */
    .pagination .page-link {
        background-color: #222;
        border-color: #333;
        color: #fff;
    }
    .pagination .page-item.active .page-link {
        background-color: var(--neon-accent);
        border-color: var(--neon-accent);
        color: var(--gym-dark);
    }
</style>
@endsection

@section('content')
<!-- Modern Hero Section -->
<header class="hero-modern">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="title-neon">Unleash Your <span>Potential</span></h1>
        <p class="subtitle-modern">Temukan kemudahan mencari gym di sekitarmu dengan harga terbaik dan fasilitas terlengkap. Mulai transformasi dirimu sekarang.</p>
        <a href="#gym-locations" class="btn-neon">Cari Gym Sekarang</a>
    </div>
</header>

<!-- Statistics Section -->
<section class="stats-container pb-5">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-md-4 col-sm-6">
                <div class="stat-card">
                    <div class="stat-number" id="state1" countTo="{{ $gymCount }}">{{ $gymCount }}+</div>
                    <h5 class="stat-title">Lokasi Gym</h5>
                    <p class="stat-desc">Tersebar di berbagai kota</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="stat-card">
                    <div class="stat-number" id="state2" countTo="{{ $facilityCount }}">{{ $facilityCount }}+</div>
                    <h5 class="stat-title">Fasilitas Lengkap</h5>
                    <p class="stat-desc">Peralatan modern dan berkualitas</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="stat-card">
                    <div class="stat-number" id="state3" countTo="{{ $cityCount }}">{{ $cityCount }}</div>
                    <h5 class="stat-title">Kota Tersedia</h5>
                    <p class="stat-desc">Jangkauan luas di seluruh Indonesia</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gym Locations Section -->
<section class="py-5" id="gym-locations">
    <div class="container">
        <div class="row mb-5 text-center">
            <div class="col-12">
                <h2 class="section-title">Pilih Gym <span>Terbaikmu</span></h2>
                <p class="section-subtitle">Berbagai pilihan gym dengan fasilitas terlengkap di sekitarmu</p>
            </div>
        </div>

        <div class="row">
            <!-- Sidebar Filter -->
            <div class="col-lg-3 col-md-4 mb-4">
                <div class="filter-card position-sticky" style="top: 100px;">
                    <h4 class="text-white mb-3">Filter Pencarian</h4>
                    <form action="#gym-locations" method="GET">
                        <div class="mb-4">
                            <label class="form-label">Kota</label>
                            <select name="city" class="form-select">
                                <option value="">Semua Kota</option>
                                <option value="jakarta" {{ request('city') == 'jakarta' ? 'selected' : '' }}>Jakarta</option>
                                <option value="bandung" {{ request('city') == 'bandung' ? 'selected' : '' }}>Bandung</option>
                                <option value="surabaya" {{ request('city') == 'surabaya' ? 'selected' : '' }}>Surabaya</option>
                                <option value="yogyakarta" {{ request('city') == 'yogyakarta' ? 'selected' : '' }}>Yogyakarta</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-solid-neon w-100">Terapkan Filter</button>
                    </form>
                </div>
            </div>

            <!-- Gym Grid -->
            <div class="col-lg-9 col-md-8">
                <div class="row g-4">
                    @forelse($gyms as $gym)
                    <div class="col-xl-4 col-lg-6 col-md-12">
                        <div class="glass-card">
                            <div class="gym-img-container">
                                @if($gym->foto)
                                    <img src="{{ asset('storage/' . $gym->foto) }}" alt="{{ $gym->nama_gym }}">
                                @else
                                    <img src="https://images.unsplash.com/photo-1540497077202-7c8a3999166f?auto=format&fit=crop&w=800&q=80" alt="Gym Placeholder">
                                @endif
                                <span class="gym-badge">Tersedia</span>
                            </div>
                            <div class="gym-info">
                                <h3 class="gym-title">{{ $gym->nama_gym }}</h3>
                                <div class="gym-address">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>{{ Str::limit($gym->alamat, 40) }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <div class="rating">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star {{ $i <= 4 ? 'text-warning' : 'text-muted' }} small"></i>
                                        @endfor
                                    </div>
                                    <a href="{{ route('gym.show', $gym->gym_id) }}" class="btn-outline-neon">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="glass-card p-5 text-center">
                            <i class="fas fa-search fa-3x text-muted mb-3"></i>
                            <h4 class="text-white">Tidak ada gym ditemukan</h4>
                            <p class="text-muted">Cobalah mengubah filter pencarian Anda.</p>
                        </div>
                    </div>
                    @endforelse
                </div>
                
                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-5">
                    {{ $gyms->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="py-5" style="background-color: #0f0f0f;" id="gym-benefits">
    <div class="container">
        <div class="row mb-5 text-center">
            <div class="col-12">
                <h2 class="section-title">Kenapa Memilih <span>Gymloc?</span></h2>
                <p class="section-subtitle">Pengalaman fitness terbaik dengan berbagai keunggulan</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="glass-card p-4 text-center">
                    <div class="benefit-icon">
                        <i class="fas fa-dumbbell"></i>
                    </div>
                    <h4 class="text-white mb-3">Peralatan Modern</h4>
                    <p class="text-muted">Dilengkapi peralatan fitness tercanggih, terawat, dan berstandar internasional.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="glass-card p-4 text-center">
                    <div class="benefit-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <h4 class="text-white mb-3">Pelatih Bersertifikat</h4>
                    <p class="text-muted">Pelatih profesional yang siap membantu Anda mencapai body goals dengan efektif.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="glass-card p-4 text-center">
                    <div class="benefit-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h4 class="text-white mb-3">Jadwal Fleksibel</h4>
                    <p class="text-muted">Jam operasional yang fleksibel untuk menyesuaikan dengan padatnya rutinitas Anda.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-5" id="testimonials">
    <div class="container">
        <div class="row mb-5 text-center">
            <div class="col-12">
                <h2 class="section-title">Apa Kata <span>Member Kami</span></h2>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="glass-card p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="text-warning me-2">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-muted font-italic mb-4">"Saya sangat puas dengan fasilitas dan pelatih di Gymloc. Sangat memudahkan dalam mencari tempat latihan terdekat!"</p>
                    <h6 class="text-white mb-0">- Rina S., Jakarta</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="glass-card p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="text-warning me-2">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                    <p class="text-muted font-italic mb-4">"Pilihan gym-nya banyak banget dan harganya transparan. Sistem booking-nya juga super gampang. Recommended!"</p>
                    <h6 class="text-white mb-0">- Andi P., Bandung</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="glass-card p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="text-warning me-2">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-muted font-italic mb-4">"Fasilitas yang lengkap dan suasana gym yang nyaman bikin betah olahraga. UI website-nya juga keren abis!"</p>
                    <h6 class="text-white mb-0">- Siti A., Surabaya</h6>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 text-center mt-4">
    <div class="container">
        <div class="glass-card p-5" style="border-color: var(--neon-accent); box-shadow: 0 0 30px rgba(57,255,20,0.1);">
            <h2 class="section-title mb-3">Mulai Transformasimu <span>Sekarang</span></h2>
            <p class="text-muted mb-4 lead">Bergabunglah dengan ribuan member lainnya dan temukan gym impianmu.</p>
            <a href="#gym-locations" class="btn-solid-neon px-5 py-3 text-uppercase" style="font-size: 1.1rem; letter-spacing: 1px;">Eksplor Gym</a>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
@endsection
