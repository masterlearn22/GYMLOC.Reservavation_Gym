
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
                            <li class="nav-item">
                                <form action="<?php echo e(route('gym.search')); ?>" method="GET" class="d-flex align-items-center flex-grow-10 mb-0">
                                    <div class="input-group me-3">
                                        <span class="bg-white input-group-text border-end-0"><i class="fas fa-search text-dark"></i></span>
                                        <input type="search" 
                                               name="query" 
                                               class="form-control" 
                                               placeholder="Cari gym" 
                                               aria-label="Search"
                                               value="<?php echo e(request('query')); ?>" 
                                               style="padding-left: 10px;">
                                    </div>
                                </form>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link font-weight-bolder" data-bs-toggle="modal" data-bs-target="#searchModal" href="#">
                                    Cari GYM
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link font-weight-bolder" href="<?php echo e(route('gym.list')); ?>">
                                    Daftar Gym
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link font-weight-bolder" href="<?php echo e(route('about.index')); ?>">
                                    Tentang Kami
                                </a>
                            </li>

                            <li class="nav-item ms-2">
                                <?php if(Auth::check()): ?>
                                    <div class="dropdown">
                                        <a href="#" class="nav-link font-weight-bolder p-0 d-flex align-items-center" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php if(Auth::user()->profile_photo): ?>
                                                <img src="<?php echo e(asset('storage/' . Auth::user()->profile_photo)); ?>" alt="profile" class="rounded-circle me-2" width="35" height="35" style="object-fit: cover;">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('assets/images/faces/default.jpg')); ?>" class="rounded-circle me-2" width="35" height="35" style="object-fit: cover;">
                                            <?php endif; ?>
                                            <span class="text-sm"><?php echo e(Auth::user()->name); ?></span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="userDropdown">
                                            <li><a class="dropdown-item font-weight-bold" href="<?php echo e(route('profile.index')); ?>">Profil Saya</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <form action="/logout" method="POST" class="m-0">
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" class="dropdown-item text-danger font-weight-bold">Logout</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                <?php else: ?>
                                    <a href="/login" class="nav-link font-weight-bolder">Login</a>
                                <?php endif; ?>
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
                <form action="<?php echo e(route('gym.search')); ?>" method="GET" class="d-flex flex-column">
                
                    <select name="city" class="mb-3 form-select" id="cityList">
                        <option value="">Semua Kota</option>
                        <option value="jakarta" <?php echo e(request('city') == 'jakarta' ? 'selected' : ''); ?>>Jakarta</option>
                        <option value="bandung" <?php echo e(request('city') == 'bandung' ? 'selected' : ''); ?>>Bandung</option>
                        <option value="surabaya" <?php echo e(request('city') == 'surabaya' ? 'selected' : ''); ?>>Surabaya</option>
                        <option value="yogyakarta" <?php echo e(request('city') == 'yogyakarta' ? 'selected' : ''); ?>>Yogyakarta</option>
                    </select>
                
                    <select name="kategori" class="mb-3 form-select">
                        <option value="">Semua Kategori</option>
                        <option value="Per Sesi" <?php echo e(request('kategori') == 'Per Sesi' ? 'selected' : ''); ?>>Per Sesi</option>
                        <option value="1 Bulan" <?php echo e(request('kategori') == '1 Bulan' ? 'selected' : ''); ?>>1 Bulan</option>
                        <option value="3 Bulan" <?php echo e(request('kategori') == '3 Bulan' ? 'selected' : ''); ?>>3 Bulan</option>
                        <option value="6 Bulan" <?php echo e(request('kategori') == '6 Bulan' ? 'selected' : ''); ?>>6 Bulan</option>
                        <option value="12 Bulan" <?php echo e(request('kategori') == '12 Bulan' ? 'selected' : ''); ?>>12 Bulan</option>
                    </select>
                
                    <button class="btn btn-outline-dark" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php /**PATH C:\laragon\www\GYMLOC.Reservavation_Gym-master\resources\views/partials/navbar.blade.php ENDPATH**/ ?>