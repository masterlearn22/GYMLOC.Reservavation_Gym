<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.header')
    @include('partials.styleGlobal')
    <style>
        .pricing-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<section class="py-7">
    <div class="container">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h4 class="card-title">Riwayat Transaksi</h4>
            <a href="{{ route('gym.list') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <img src="{{ asset('storage/' . $gym->foto) }}" 
                     class="rounded shadow-lg img-fluid" 
                     alt="{{ $gym->nama_gym }}">
            </div>
            <div class="col-lg-6">
                <h2 class="mb-3">{{ $gym->nama_gym }}</h2>
                <div class="mb-3 rating">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star {{ $i <= 4 ? 'text-warning' : 'text-muted' }}"></i>
                    @endfor
                </div>
               
                
                <div class="row">
                    <div class="col-md-6">
                        <h5>Lokasi</h5>
                        <p><i class="fas fa-map-marker-alt me-2"></i>{{ $gym->alamat }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5>Jam Operasional</h5>
                        <p><i class="far fa-clock me-2"></i>{{ $gym->jam_operasional }}</p>
                    </div>
                </div>

                <h5 class="mt-4">Fasilitas</h5>
                <ul class="list-group">
                    @php
                        $fasilitas = explode(',', $gym->fasilitas);
                    @endphp
                    @foreach($fasilitas as $f)
                        <li class="list-group-item">
                            <i class="fas fa-check-circle text-success me-2"></i>{{ trim($f) }}
                        </li>
                    @endforeach
                </ul>
                <p class="text-dark">{{ $gym->deskripsi }}</p>

                <div class="mt-4">
                    <a href="#" class="btn btn-primary">Booking Sekarang</a>
                    <a href="{{ route('gym.list') }}" class="btn btn-outline-secondary ms-2">Kembali ke Daftar Gym</a>
                </div>
            </div>
        </div>
    </div>
</section>
@include('partials.jspage')
@include('partials.jsglobal')
</body>
</html>