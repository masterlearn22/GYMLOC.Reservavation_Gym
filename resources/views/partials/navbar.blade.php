
    <div class="container top-0 position-sticky z-index-sticky">
        <div class="row">
            <div class="col-12">
                <nav class="top-0 mx-4 my-3 shadow navbar navbar-expand-lg blur border-radius-xl position-absolute start-0 end-0 z-index-fixed">
                    <div class="px-0 container-fluid">
                        <a class="flex-shrink-0 text-sm navbar-brand font-weight-bolder ms-sm-3 me-3"href="/" rel="tooltip"> <!-- Tambahkan me-3 di sini -->
                            GYMLOC
                        </a>
                        
                            <!-- Form Pencarian dengan Filter -->
                           
                        

                        <ul class="navbar-nav ms-auto d-flex align-items-center">
                            
                            <form action="{{ route('gym.search') }}" method="GET" class="d-flex align-items-center flex-grow-10">
                                <div class="input-group me-3 w-100">
                                    <span class="bg-white input-group-text border-end-0"><i class="fas fa-search"></i></span>
                                    <input type="search" 
                                           name="query" 
                                           class="form-control" 
                                           placeholder="Cari gym" 
                                           aria-label="Search"
                                           value="{{ request('query') }}" 
                                           style="padding-left: 10px;">
                                </div>
                            </form>
                        <!-- Form Pencarian dengan Filter -->
                      
                            <a class="text-sm navbar-brand font-weight-bolder ms-sm-3" data-bs-toggle="modal" data-bs-target="#searchModal" href="#" rel="tooltip">
                                Cari GYM
                            </a>
                            
                            <a class="text-sm navbar-brand font-weight-bolder ms-sm-3" href="{{route('gym.list')}}" rel="tooltip">
                                Daftar Gym
                            </a>
                            <a class="text-sm navbar-brand font-weight-bolder ms-sm-3" href="{{route('about.index')}}" rel="tooltip">
                                Tentang Kami
                            </a>
                            <li class="nav-item ms-2 d-flex align-items-center">
                                @if (Auth::check())
                                    <div class="dropdown">
                                        <a href="#" class="navbar-brand font-weight-bolder ms-sm-2 rounded-circle me-1" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            @if (Auth::user()->profile_photo)
                                                <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="profile" class="rounded-circle me-2" width="40" height="40" style="object-fit: cover;">
                                            @else
                                                <img src="{{ asset('assets/images/faces/default.jpg') }}" class="rounded-circle me-2" width="40" height="40" style="object-fit: cover;">
                                            @endif
                                            <span class="text-sm">{{ Auth::user()->name }}</span> <!-- Tambahkan span dengan kelas text-sm -->
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

<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Filter Pencarian Gym</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('gym.search') }}" method="GET" class="d-flex flex-column">
                
                    <select name="city" class="mb-3 form-select" id="cityList">
                        <option value="">Semua Kota</option>
                        <option value="jakarta" {{ request('city') == 'jakarta' ? 'selected' : '' }}>Jakarta</option>
                        <option value="bandung" {{ request('city') == 'bandung' ? 'selected' : '' }}>Bandung</option>
                        <option value="surabaya" {{ request('city') == 'surabaya' ? 'selected' : '' }}>Surabaya</option>
                        <option value="yogyakarta" {{ request('city') == 'yogyakarta' ? 'selected' : '' }}>Yogyakarta</option>
                    </select>
                
                    <select name="kategori" class="mb-3 form-select">
                        <option value="">Semua Kategori</option>
                        <option value="Per Sesi" {{ request('kategori') == 'Per Sesi' ? 'selected' : '' }}>Per Sesi</option>
                        <option value="1 Bulan" {{ request('kategori') == '1 Bulan' ? 'selected' : '' }}>1 Bulan</option>
                        <option value="3 Bulan" {{ request('kategori') == '3 Bulan' ? 'selected' : '' }}>3 Bulan</option>
                        <option value="6 Bulan" {{ request('kategori') == '6 Bulan' ? 'selected' : '' }}>6 Bulan</option>
                        <option value="12 Bulan" {{ request('kategori') == '12 Bulan' ? 'selected' : '' }}>12 Bulan</option>
                    </select>
                
                    <button class="btn btn-primary" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </div>
</div>

