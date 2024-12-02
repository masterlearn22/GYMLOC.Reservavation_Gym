<div class="container top-0 position-sticky z-index-sticky">
    <div class="row">
        <div class="col-12">
            <nav class="top-0 p-2 mx-4 my-3 shadow navbar navbar-expand-lg blur border-radius-xl z-index-fixed position-absolute start-0 end-0">
                <div class="px-0 container-fluid">
                    <a class="text-sm navbar-brand font-weight-bolder ms-sm-3" href="#" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
                        GYMLOC
                    </a>
                    <button class="shadow-none navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="mt-2 navbar-toggler-icon">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="pt-3 pb-2 collapse navbar-collapse py-lg-0 w-100" id="navigation">
                        <ul class="navbar-nav navbar-nav-hover ms-auto d-flex align-items-center">
                            <!-- Dropdown Pages -->
                            <li class="mx-2 nav-item dropdown dropdown-hover">
                                <a class="cursor-pointer nav-link ps-2 d-flex align-items-center font-weight-semibold" id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="material-symbols-rounded opacity-6 me-2 text-md">dashboard</i> Pages
                                    <img src="./assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-md-2">
                                </a>
                                <div class="p-3 mt-0 dropdown-menu dropdown-menu-animation ms-n3 dropdown-md border-radius-xl mt-lg-3" aria-labelledby="dropdownMenuPages">
                                    <div class="d-none d-lg-block">
                                        <h6 class="px-1 dropdown-header text-dark font-weight-bolder d-flex align-items-center">Landing Pages</h6>
                                        <a href="./pages/about-us.html" class="dropdown-item border-radius-md">
                                            <span>About Us</span>
                                        </a>
                                        <a href="./pages/contact-us.html" class="dropdown-item border-radius-md">
                                            <span>Contact Us</span>
                                        </a>
                                        <a href="./pages/author.html" class="dropdown-item border-radius-md">
                                            <span>Author</span>
                                        </a>
                                        <h6 class="px-1 mt-3 dropdown-header text-dark font-weight-bolder d-flex align-items-center">Account</h6>
                                        <a href="/login" class="dropdown-item border-radius-md">
                                            <span>Sign In</span>
                                        </a>
                                    </div>
                                    <div class="d-lg-none">
                                        <h6 class="px-1 dropdown-header text-dark font-weight-bolder d-flex align-items-center">Landing Pages</h6>
                                        <a href="./pages/about-us.html" class="dropdown-item border-radius-md">
                                            <span>About Us</span>
                                        </a>
                                        <a href="./pages/contact-us.html" class="dropdown-item border-radius-md">
                                            <span>Contact Us</span>
                                        </a>
                                        <a href="./pages/author.html" class="dropdown-item border-radius-md">
                                            <span>Author</span>
                                        </a>
                                        <h6 class="px-1 mt-3 dropdown-header text-dark font-weight-bolder d-flex align-items-center">Account</h6>
                                        <a href="/login" class="dropdown-item border-radius-md">
                                            <span>Sign In</span>
                                        </a>
                                    </div>
                                </div>
                            </li>

                            <!-- Add Profile Image and User's Name -->
                            <li class="nav-item ms-auto d-flex align-items-center">
                                <a href="{{route('profile.index')}}" class="nav-link d-flex align-items-center">
                                    <!-- Photo Profile -->
                                    @if (Auth::user()->profile_photo)
                                        <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="profile" class="rounded-circle" width="40" height="40" style="object-fit: cover;" />
                                    @else
                                        <img src="{{ asset('assets/images/faces/default.jpg') }}" class="rounded-circle" width="40" height="40" style="object-fit: cover;" />
                                    @endif
                                    <!-- User Name -->
                                    <span class="ms-2">{{ Auth::user()->name }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
