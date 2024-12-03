<!-- index.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.header')
    @include('partials.styleGlobal')
    <style>
        .profile-info {
            margin-bottom: 20px;
        }

        .profile-info img {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #ddd;
        }

        .table-profile {
            width: 100%;
            border-collapse: collapse;
        }

        .table-profile th,
        .table-profile td {
            padding: 10px;
            text-align: left;
        }

        .saldo-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 15px;
        }

        .saldo-amount {
            font-size: 1.2em;
            font-weight: bold;
            color: #28a745;
        }

        .btn-topup {
            display: flex;
            align-items: center;
            gap: 10px;
        }
    </style>
</head>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="card-footer">
                            <a href="{{ url()->previous() }}" class="mt-3 btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                        <h4 class="card-title">Profil Saya</h4>

                        <!-- Tampilkan informasi profil pengguna -->
                        <table class="table-profile">
                            <tr>
                                <th>Foto Profil</th>
                                <td>
                                    @if ($user->profile_photo)
                                        <img src="{{ asset('storage/' . $user->profile_photo) }}"
                                            alt="Current Profile Photo" width="100" height="100">
                                    @else
                                        <img src="{{ asset('assets/images/faces/default.jpg') }}" width="100"
                                            height="100">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Saldo</th>
                                <td>
                                    <div class="saldo-section">
                                        <span class="saldo-amount">
                                            Rp {{ number_format($user->saldo, 0, ',', '.') }}
                                        </span>
                                        <div class="gap-2 d-flex">
                                            <a href="{{ route('profile.topup') }}" class="btn btn-success btn-sm btn-topup">
                                                <i class="fas fa-plus-circle"></i> Top Up
                                            </a>
                                            <a href="{{ route('profile.transaksi') }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-history"></i> Riwayat
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <!-- Tombol untuk mengedit profil -->
                        <div class="mt-3">
                            <a href="{{ route('profile.edit', $user->id_user) }}" class="btn btn-primary me-2">
                                <i class="fas fa-edit"></i> Edit Profil
                            </a>
                            
                            @if (Auth::user()->id_role == '2')
                                <a href="{{ route('pihakgym.edit', $user->id_user) }}" class="btn btn-primary">
                                    <i class="fas fa-building"></i> Edit Profil Gym
                                </a>
                                @elseif (Auth::user()->id_role == '1')
                                <a href="{{ route('request.gym') }}" class="btn btn-primary">
                                    <i class="fas fa-building"></i> Buat Gym
                                </a>
                                @elseif (Auth::user()->id_role == '3')
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
                                    <i class="fas fa-building"></i> Dashboard
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.jspage')
    @include('partials.jsglobal')
</body>
</html>