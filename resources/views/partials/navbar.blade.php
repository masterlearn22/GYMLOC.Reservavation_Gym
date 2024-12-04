<div class="container top-0 position-sticky z-index-sticky">
    <div class="row">
        <div class="col-12">
            <nav class="top-0 mx-4 my-3 shadow navbar navbar-expand-lg blur border-radius-xl position-absolute start-0 end-0 z-index-fixed">
                <div class="px-0 container-fluid">
                    <a class="text-sm navbar-brand font-weight-bolder ms-sm-3" href="/" rel="tooltip">
                        GYMLOC
                    </a>
                    <button class="shadow-none navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="pt-3 pb-2 collapse navbar-collapse w-100 py-lg-0" id="navigation">
                        <!-- Tambahkan Form Pencarian -->
                        <form action="{{ route('gym.search') }}" method="GET" class="d-flex me-auto ms-3 align-items-center">
                            <div class="input-group">
                                <span class="bg-white input-group-text border-end-0"><i class="fas fa-search"></i></span>
                                <input type="search" 
                                       name="query" 
                                       class="form-control border-start-0" 
                                       placeholder="Cari gym di kotamu..." 
                                       aria-label="Search"
                                       required>
                                <select name="city" class="form-select" style="max-width: 150px;">
                                    <option value="">Semua Kota</option>
                                    <option value="jakarta">Jakarta</option>
                                    <option value="bandung">Bandung</option>
                                    <option value="surabaya">Surabaya</option>
                                    <option value="yogyakarta">Yogyakarta</option>
                                </select>
                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                        </form>

                        <ul class="navbar-nav ms-auto d-flex align-items-center">
                            <li class="nav-item">
                                <a href="{{ route('gym.list') }}" class="nav-link d-flex align-items-center">Daftar Gym</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('about.index') }}" class="nav-link d-flex align-items-center">Tentang Kami</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link d-flex align-items-center">Kontak</a>
                            </li>
                            
                            <!-- Bagian Login/Profil -->
                            <li class="nav-item ms-2 d-flex align-items-center">
                                @if (Auth::check())
                                    <div class="dropdown">
                                        <a href="#" class="nav-link d-flex align-items-center dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            <!-- Photo Profile -->
                                            @if (Auth::user()->profile_photo)
                                                <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" 
                                                     alt="profile" 
                                                     class="rounded-circle me-2" 
                                                     width="40" 
                                                     height="40" 
                                                     style="object-fit: cover;">
                                            @else
                                                <img src="{{ asset('assets/images/faces/default.jpg') }}" 
                                                     class="rounded-circle me-2" 
                                                     width="40" 
                                                     height="40" 
                                                     style="object-fit: cover;">
                                            @endif
                                            {{ Auth::user()->name }}
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                            <li><a class="dropdown-item" href="{{ route('profile.index') }}">Profil Saya</a></li>
                                            <li><a class="dropdown-item" href="#">Keanggotaan</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <form action="/logout" method="POST" class="dropdown-item">
                                                    @csrf
                                                    <button type="submit" class="p-0 m-0 btn btn-link">Logout</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                @else
                                    <a href="/login" class="btn btn-sm btn-outline-primary">
                                        Login
                                    </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.querySelector('form[action="{{ route('gym.search') }}"]');
    
    searchForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const query = this.querySelector('input[name="query"]').value;
        const city = this.querySelector('select[name="city"]').value;
        
        // Redirect ke halaman hasil pencarian dengan parameter
        window.location.href = `{{ route('gym.search') }}?query=${encodeURIComponent(query)}&city=${encodeURIComponent(city)}`;
    });
});
</script>