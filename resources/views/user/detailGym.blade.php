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
                        <p><i class="far fa-clock me-2"></i>{{ $gym->jam_buka }} - {{ $gym->jam_tutup }}</p>
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
                <h5 class="mt-4">Deskripsi</h5>
                <p class="text-dark">{{ $gym->deskripsi }}</p>

               

                <h5 class="mt-4">Harga Per Sesi</h5>
                <ul class="list-group">
                    @foreach($prices as $price)
                        <li class="list-group-item">
                            <strong>{{ $price->nama_kategori }}</strong>: {{ $price->durasi }} menit - Rp {{ number_format($price->harga, 0, ',', '.') }}
                        </li>
                    @endforeach
                </ul>

                <div class="mt-4">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookingModal">Booking Sekarang</button>
                    <a href="{{ route('gym.list') }}" class="btn btn-outline-secondary ms-2">Kembali ke Daftar Gym</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal Booking -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Booking Sesi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="session" class="form-label">Pilih Sesi</label>
                        <select class="form-select" id="session" name="category_id" required>
                            @foreach($prices as $price)
                                <option value="{{ $price->category_id }}">
                                    {{ $price->nama_kategori }}: {{ $price->durasi }} menit - Rp {{ number_format($price->harga, 0, ',', '.') }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Konfirmasi Booking</button>
                </form>
            </div>
        </div>
    </div>
</div>


</section>
@include('partials.jspage')
@include('partials.jsglobal')
</body>
</html>