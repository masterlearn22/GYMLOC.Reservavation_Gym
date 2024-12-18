<div class="collapse show" id="sidebarMenu">
    <div class="bg-light border-end vh-100">
        <ul class="list-group list-group-flush">
            <!-- Dashboard -->
            <li class="list-group-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
                <a href="{{route('admin.index')}}" class="text-decoration-none">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
            </li>

            <!-- Jenis User -->
            <li class="list-group-item {{ request()->routeIs('jenis_user.index') ? 'active' : '' }}">
                <a href="{{ route('jenis_user.index') }}" class="text-decoration-none">
                    <i class="fas fa-users-cog me-2"></i> Jenis User
                </a>
            </li>

            <!-- Daftar Gym -->
            <li class="list-group-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">
                    <i class="fas fa-dumbbell me-2"></i> List Daftar Gym
                </a>
            </li>

            <!-- Kembali -->
            <li class="list-group-item">
                <a href="{{ route('profile.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </li>
        </ul>
    </div>
</div>
