@extends('partials.app')
@section('content')
    <header class="header-2">
        <div class="relative page-header min-vh-75" style="background-image: url('./assets/images/index.jpeg')">
            <span class="mask bg-gradient-dark opacity-4"></span>
            <div class="container">
                <div class="row">
                    <div class="mx-auto text-center col-lg-7">
                        <h1 class="pt-3 text-white font-weight-black mt-n5">GYMLOC</h1>
                        <p class="mt-3 text-white lead">Temukan kemudahan dalam mencari gym di sekitar <br /> Harga
                            Termurah dan Terdekat</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="pt-3 pb-4" id="count-stats">
        <div class="container">
            <div class="row">
                <div class="py-3 mx-auto col-lg-9">
                    <div class="row">
                        <div class="col-md-4 position-relative">
                            <div class="p-3 text-center">
                                <h1 class="text-gradient text-dark"><span id="state1" countTo="100">0</span>+</h1>
                                <h5 class="mt-3">Lokasi Gym</h5>
                                <p class="text-sm font-weight-normal">Tersebar di berbagai kota</p>
                            </div>
                            <hr class="vertical dark">
                        </div>
                        <div class="col-md-4 position-relative">
                            <div class="p-3 text-center">
                                <h1 class="text-gradient text-dark"><span id="state2" countTo="50">0</span>+</h1>
                                <h5 class="mt-3">Fasilitas Lengkap</h5>
                                <p class="text-sm font-weight-normal">Peralatan modern dan berkualitas</p>
                            </div>
                            <hr class="vertical dark">
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 text-center">
                                <h1 class="text-gradient text-dark" id="state3" countTo="25">0</h1>
                                <h5 class="mt-3">Kota Tersedia</h5>
                                <p class="text-sm font-weight-normal">Jangkauan luas di seluruh Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-5 my-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="mt-4 col-lg-4 ms-auto me-auto p-lg-4 mt-lg-0">
                    <div class="rotating-card-container">
                        <div class="mt-5 card card-rotate card-background card-background-mask-primary shadow-dark mt-md-0">
                            <div class="front front-background"
                                style="background-image: url(https://asset.kompas.com/crops/MUiHPEJKwJknhjbHQTINeA3BkTI=/0x0:0x0/1200x800/data/photo/2021/05/08/60961de48b31a.jpg); background-size: cover;">
                                <div class="text-center card-body py-7">
                                    <i class="my-3 text-4xl text-white material-symbols-rounded">touch_app</i>
                                    <h3 class="text-white">Cari Gym <br /> di Kotamu</h3>
                                    <p class="text-white opacity-8">Gymloc memudahkan anda mencari gym dengan beberapa
                                        fasilitas</p>
                                </div>
                            </div>
                            <div class="back back-background"
                                style="background-image: url(https://asset.kompas.com/crops/fg6z7bDQSPNA625RFOFP1ndlKac=/0x0:3000x2000/1200x800/data/photo/2024/03/26/66023bbbb5ce3.jpg); background-size: cover;">
                                <div class="text-center card-body pt-7">
                                    <h3 class="text-white">Explore More</h3>
                                    <p class="text-white opacity-8"> Kamu akan di berikan list.
                                    </p>
                                    <a href="(menuju ke location/list gym)" target="_blank"
                                        class="mx-auto mt-3 btn btn-white btn-sm w-50">Start with Gymloc</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 ms-auto">
                    <div class="row justify-content-start">
                        <div class="col-md-6">
                            <div class="info">
                                <i class="text-3xl material-symbols-rounded text-gradient text-success">fitness_center</i>
                            <h5 class="mt-3 font-weight-bolder">Peralatan Lengkap</h5>
                            <p>Gym dengan peralatan terbaru dan berkualitas tinggi</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info">
                                <i class="text-3xl material-symbols-rounded text-gradient text-success">groups</i>
                            <h5 class="mt-3 font-weight-bolder">Instruktur Profesional</h5>
                            <p>Dibimbing oleh pelatih berpengalaman dan tersertifikasi</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 row justify-content-start">
                        <div class="mt-3 col-md-6">
                            <i class="text-3xl material-symbols-rounded text-gradient text-success">local_activity</i>
                            <h5 class="mt-3 font-weight-bolder">Harga Terjangkau</h5>
                            <p>Berbagai pilihan paket dengan harga kompetitif</p>
                        </div>
                        <div class="mt-3 col-md-6">
                            <div class="info">
                                <i class="text-3xl material-symbols-rounded text-gradient text-success">schedule</i>
                            <h5 class="mt-3 font-weight-bolder">Jam Fleksibel</h5>
                            <p>Buka dari pagi hingga malam, sesuai kebutuhan Anda</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-7">
        <div class="container">
            <div class="row">
                <div class="mx-auto text-center col-lg-8">
                    <h2 class="mb-0 font-weight-bolder">Apa Kata Member Kami</h2>
                    <p class="lead">Pengalaman nyata dari mereka yang telah bergabung</p>
                </div>
            </div>
            <div class="mt-6 row">
                <!-- Testimoni 1-3 disesuaikan dengan konteks gym -->
            </div>
        </div>
    </section>


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
        <div class="row">
            <div class="col-md-8">
                <div class="mt-4 row">
                    <div class="mb-4 col-md-6">
                        <div class="card h-100 gym-card">
                            <div class="p-0 mx-3 mt-3 card-header position-relative z-index-1">
                                <a href="#" class="d-block">
                                    <img src="{{ asset('assets/img/gym-jakarta.jpg') }}" class="shadow-lg img-fluid border-radius-lg move-on-hover">
                                </a>
                            </div>
                            <div class="pt-3 card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Gym Central Jakarta</h5>
                                    <span class="badge bg-success">Terdekat</span>
                                </div>
                                <p class="mt-2 text-sm">
                                    <i class="fas fa-map-marker-alt me-1"></i> Jakarta Pusat
                                </p>
                                <div class="mt-3 d-flex justify-content-between align-items-center">
                                    <div class="rating">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-muted"></i>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 col-md-6">
                        <div class="card h-100 gym-card">
                            <div class="p-0 mx-3 mt-3 card-header position-relative z-index-1">
                                <a href="#" class="d-block">
                                    <img src="{{ asset('assets/img/gym-bandung.jpg') }}" class="shadow-lg img-fluid border-radius-lg move-on-hover">
                                </a>
                            </div>
                            <div class="pt-3 card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Gym Fitness Bandung</h5>
                                    <span class="badge bg-primary">Promo</span>
                                </div>
                                <p class="mt-2 text-sm">
                                    <i class="fas fa-map-marker-alt me-1"></i> Bandung
                                </p>
                                <div class="mt-3 d-flex justify-content-between align-items-center">
                                    <div class="rating">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-auto mt-5 col-md-4 mt-md-0">
                <div class="position-sticky" style="top:100px !important">
                    <div class="text-white card bg-gradient-dark">
                        <div class="card-body">
                            <h4 class="text-white">Temukan Gym Ideal Anda</h4>
                            <p>Gunakan filter pencarian kami untuk menemukan gym sesuai kebutuhan:</p>
                            <form>
                                <div class="mb-3">
                                    <label class="text-white form-label">Lokasi</label>
                                    <select class="form-control">
                                        <option>Pilih Kota</option>
                                        <option>Jakarta</option>
                                        <option>Bandung</option>
                                        <option>Surabaya</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="text-white form-label">Fasilitas</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="weightTraining">
                                        <label class="text-white form-check-label" for="weightTraining">
                                            Weight Training
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="cardio">
                                        <label class="text-white form-check-label" for="cardio">
                                            Cardio
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-white w-100">Cari Gym</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-gray-100 py-7" id="gym-benefits">
    <div class="container">
        <div class="row">
            <div class="mx-auto text-center col-lg-8">
                <h2 class="mb-4 font-weight-bolder">Kenapa Memilih Gymloc?</h2>
                <p class="lead">Kami menyediakan pengalaman fitness terbaik dengan berbagai keunggulan</p>
            </div>
        </div>
        <div class="mt-5 row">
            <div class="col-md-4">
                <div class="border-0 shadow-lg card card-body h-100">
                    <div class="text-center">
                        <div class="mb-3 text-center icon icon-shape bg-gradient-primary shadow-primary rounded-circle">
                            <i class="text-lg fas fa-dumbbell opacity-10"></i>
                        </div>
                        <h5>Peralatan Modern</h5>
                        <p>Dilengkapi peralatan fitness tercanggih dan terawat</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="border-0 shadow-lg card card-body h-100">
                    <div class="text-center">
                        <div class="mb-3 text-center icon icon-shape bg-gradient-success shadow-success rounded-circle">
                            <i class="text-lg fas fa -dumbbell opacity-10"></i>
                        </div>
                        <h5>Pelatih Bersertifikat</h5>
                        <p>Pelatih profesional siap membantu Anda mencapai tujuan fitness</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="border-0 shadow-lg card card-body h-100">
                    <div class="text-center">
                        <div class="mb-3 text-center icon icon-shape bg-gradient-danger shadow-danger rounded-circle">
                            <i class="text-lg fas fa-calendar-check opacity-10"></i>
                        </div>
                        <h5>Jadwal Fleksibel</h5>
                        <p>Jam buka yang fleksibel untuk menyesuaikan dengan rutinitas Anda</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" id="testimonials">
    <div class="container">
        <div class="row">
            <div class="mx-auto text-center col-lg-8">
                <h2 class="mb-4 font-weight-bolder">Apa Kata Member Kami</h2>
                <p class="lead">Dengarkan pengalaman mereka yang telah bergabung dengan kami</p>
            </div>
        </div>
        <div class="mt-5 row">
            <div class="col-md-4">
                <div class="border-0 shadow-lg card card-body">
                    <p class="text-center">"Saya sangat puas dengan fasilitas dan pelatih di Gym Central Jakarta. Sangat membantu dalam mencapai tujuan fitness saya!"</p>
                    <h6 class="text-center">- Rina S.</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="border-0 shadow-lg card card-body">
                    <p class="text-center">"Gym Fitness Bandung memiliki peralatan yang sangat baik dan pelatih yang profesional. Saya sangat merekomendasikannya!"</p>
                    <h6 class="text-center">- Andi P.</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="border-0 shadow-lg card card-body">
                    <p class="text-center">"Fasilitas yang lengkap dan suasana yang nyaman membuat saya betah berolahraga di sini!"</p>
                    <h6 class="text-center">- Siti A.</h6>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="text-white py-7 bg-gradient-dark" id="cta">
    <div class="container">
        <div class="row">
            <div class="mx-auto text-center col-md-8">
                <h3 class="mb-0">Siap untuk memulai perjalanan fitness Anda?</h3>
                <p class="mb-5">Bergabunglah dengan kami dan temukan gym terbaik di dekat Anda!</p>
                <a href="#gym-locations" class="btn btn-light btn-lg">Cari Gym Sekarang</a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
@endsection
