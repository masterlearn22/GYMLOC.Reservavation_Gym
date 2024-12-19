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
                        <!-- Form Pencarian dengan Filter -->
                        <form action="{{ route('gym.search') }}" method="GET" class="d-flex align-items-center">
                            <div class="input-group me-3">
                                <span class="bg-white input-group-text border-end-0"><i class="fas fa-search"></i></span>
                                <input type="search" 
                                       name="query" 
                                       class="form-control border-start-0" 
                                       placeholder="Cari gym" 
                                       aria-label="Search"
                                       value="{{ request('query') }}">
                            </div>
                        
                            <select name="city" class="form-select me-3" style="max-width: 150px;" id="cityList">
                                <option value="">Semua Kota</option>
                                <option value="jakarta" {{ request('city') == 'jakarta' ? 'selected' : '' }}>Jakarta</option>
                                <option value="bandung" {{ request('city') == 'bandung' ? 'selected' : '' }}>Bandung</option>
                                <option value="surabaya" {{ request('city') == 'surabaya' ? 'selected' : '' }}>Surabaya</option>
                                <option value="yogyakarta" {{ request('city') == 'yogyakarta' ? 'selected' : '' }}>Yogyakarta</option>
                            </select>
                        
                            <select name="kategori" class="form-select me-3" style="max-width: 200px;">
                                <option value="">Semua Kategori</option>
                                <option value="Per Sesi" {{ request('kategori') == 'Per Sesi' ? 'selected' : '' }}>Per Sesi</option>
                                <option value="1 Bulan" {{ request('kategori') == '1 Bulan' ? 'selected' : '' }}>1 Bulan</option>
                                <option value="3 Bulan" {{ request('kategori') == '3 Bulan' ? 'selected' : '' }}>3 Bulan</option>
                                <option value="6 Bulan" {{ request('kategori') == '6 Bulan' ? 'selected' : '' }}>6 Bulan</option>
                                <option value="12 Bulan" {{ request('kategori') == '12 Bulan' ? 'selected' : '' }}>12 Bulan</option>
                            </select>
                        
                            <button class="btn btn-primary w-25" type="submit">Cari</button>
                        </form>

                        <ul class="navbar-nav ms-auto d-flex align-items-center">
                            <a class="text-sm navbar-brand font-weight-bolder ms-sm-3" href="{{route('gym.list')}}" rel="tooltip">
                                Daftar Gym
                            </a>
                            <a class="text-sm navbar-brand font-weight-bolder ms-sm-3" href="{{route('about.index')}}" rel="tooltip">
                                Tentang Kami
                            </a>
                            <li class="nav-item ms-2 d-flex align-items-center">
                                @if (Auth::check())
                                    <div class="dropdown">
                                        <a href="#" class="navbar-brand font-weight-bolder ms-sm-2ounded-circle me-1" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            @if (Auth::user()->profile_photo)
                                                <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="profile" class="rounded-circle me-2" width="40" height="40" style="object-fit: cover;">
                                            @else
                                                <img src="{{ asset('assets/images/faces/default.jpg') }}" class="rounded-circle me-2" width="40" height="40" style="object-fit: cover;">
                                            @endif
                                            {{ Auth::user()->name }}
                                        </a>
                                        <ul class="dropdown-menu navbar-brand font-weight-bolder ms-sm-3" aria-labelledby="userDropdown">
                                            <li><a class="text-sm dropdown-item navbar-brand font-weight-bolder ms-sm-3" href="{{ route('profile.index') }}">Profil Saya</a></li>
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
                                    <a href="/login" class="btn btn-sm btn-outline-primary">Login</a>
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
    // const provinces = [32, 33, 34,35]; // ID untuk Jawa Barat, Jawa Tengah, Jawa Timur

    // Mengambil data kota untuk setiap provinsi
    provinces.forEach(provinceId => {
        fetch(`https://emsifa.github.io/api-wilayah-indonesia/api/regencies/35.json`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                const cityList = document.getElementById('cityList');
                data.forEach(city => {
                    const option = document.createElement('option'); // Buat elemen option
                    option.value = city.id; // Set nilai option ke ID kota
                    option.textContent = city.name; // Set teks option ke nama kota
                    cityList.appendChild(option); // Tambahkan option ke dropdown
                });
            })
            .catch(error => {
                console.error('Error fetching city data:', error);
            });
    });
</script>
