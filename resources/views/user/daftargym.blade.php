@extends('partials.app') 

@section('content')
<section class="py-5" id="gym-locations">
    <div class="container">
        <div class="row">
            <div class="mt-5 text-center row my-sm-5">
                <div class="mx-auto col-lg-8">
                    <span class="mb-3 badge bg-success" id = "gymsearch">Temukan Gym Terbaik</span>
                    <h2 class="display-4">Pilih Gym Sesuai Kebutuhanmu</h2>
                    <p class="lead">Kami menyediakan berbagai pilihan gym dengan fasilitas terlengkap di berbagai kota</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <!-- Hasil Search Gym -->
                <div class="mt-4 row">
                    @forelse($gyms as $gym)
                    <div class="mb-4 col-md-6">
                        <div class="card h-100 gym-card">
                            {{-- <div class="p-0 mx-3 mt-3 card-header position-relative z-index-1">
                                <a href="{{ route('gym.show', $gym->gym_id) }}" class="d-block">
                                    <img src="{{ asset('storage/' . $gym->foto) }}" 
                                         class="shadow-lg img-fluid border-radius-lg move-on-hover"
                                         alt="{{ $gym->nama_gym }}">
                                </a>
                            </div> --}}
                            <div class="pt-6 card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">{{ $gym->nama_gym }}</h5>
                                    <span class="badge bg-success">Tersedia</span>
                                </div>
                                <p class="mt-2 text-sm">
                                <i class="fas fa-map-marker-alt me-1"></i> {{ $gym->city }}
                                </p>
                                <p class="mt-2 text-sm">
                                    <i class="fas fa-map-marker-alt me-1"></i>Rp {{ number_format($gym->harga) }}
                                </p>
                                <p class="mt-2 text-sm">
                                    <i class="fas fa-map-marker-alt me-1"></i>Rp {{ number_format($gym->harga)}}
                                </p>
                                <div class="mt-3 d-flex justify-content-between align-items-center">
                                    <div class="rating">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star {{ $i <= 4 ? 'text-warning' : 'text-muted' }}"></i>
                                        @endfor
                                    </div>
                                    <a href="{{ route('gym.show', $gym->gym_id) }}" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <p class="text-center">Tidak ada gym yang sesuai dengan filter Anda.</p>
                    </div>
                    @endforelse
                </div>
                
                <!-- Paginasi -->
                <div class="d-flex justify-content-center">
                    {{ $gyms->withQueryString()->links() }}
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection