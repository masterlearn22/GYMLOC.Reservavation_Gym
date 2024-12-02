<div class="container top-0 position-sticky z-index-sticky">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg blur shadow border-radius-xl top-0 position-absolute start-0 end-0 mx-4 my-3 z-index-fixed">
                <div class="container-fluid px-0">
                    <a class="navbar-brand font-weight-bolder text-sm ms-sm-3" href="#" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom">
                        GYMLOC
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">
                        <ul class="navbar-nav ms-auto d-flex align-items-center">
                            
                            <li class="nav-item ms-auto d-flex align-items-center">
                                <a href="./pages/about-us.html" class="nav-link d-flex align-items-center">About Us</a>
                                <a href="./pages/contact-us.html" class="nav-link d-flex align-items-center">Contact Us</a>
                                <a href="./pages/author.html" class="nav-link d-flex align-items-center">Author</a>
                            </li>
                            <!-- Profile Image and User's Name -->
                            <li class="nav-item ms-auto d-flex align-items-center">
                                @if (Auth::check())
                                    <a href="{{ route('profile.index') }}" class="nav-link d-flex align-items-center">
                                        <!-- Photo Profile -->
                                        @if (Auth::user()->profile_photo)
                                            <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="profile" class="rounded-circle" width="40" height="40" style="object-fit: cover;">
                                        @else
                                            <img src="{{ asset('assets/images/faces/default.jpg') }}" class="rounded-circle" width="40" height="40" style="object-fit: cover;">
                                        @endif
                                        <!-- User Name -->
                                        <span class="ms-2">{{ Auth::user()->name }}</span>
                                    </a>
                                @else
                                    <a href="/login" class="nav-link">
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
