<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.header')
    @include('partials.styleGlobal')
    <style>
        .profile-container {
            position: relative;
            margin: 20px auto;
            max-width: 600px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .back-button {
            position: absolute;
            top: 15px;
            left: 15px;
        }

        .profile-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #ddd;
            margin-bottom: 20px;
        }

        .profile-info {
            width: 100%;
        }

        .profile-info th {
            text-align: left;
            padding: 10px 0;
            font-weight: normal;
            color: #555;
        }

        .profile-info td {
            padding: 10px 0;
            font-weight: bold;
            color: #333;
        }

        .saldo-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
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

        .action-buttons {
            margin-top: 20px;
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .btn {
            flex: 1;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="profile-container">
                <!-- Tombol Kembali -->
                <a href="/" class="btn btn-secondary back-button">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>

                <!-- Foto Profil -->
                <div class="text-center profile-photo-container">
                    @if($user->profile_photo)
                        <img class="profile-photo" src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo">
                    @else
                        <img class="profile-photo" src="{{ asset('assets/images/faces/default.jpg') }}" alt="Default Profile Photo">
                    @endif
                </div>

                <!-- Informasi Profil -->
                <table class="profile-info">
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
                                <span class="saldo-amount">Rp {{ number_format($user->saldo, 0, ',', '.') }}</span>
                                <div class="btn-topup">
                                    <a href="{{ route('profile.topup') }}" class="btn btn-success btn-sm">
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

                <!-- Tombol Aksi -->
                <div class="action-buttons">
                    <a href="{{ route('profile.edit', $user->id_user) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Edit Profil
                    </a>
                    
                    <a href="/reservations/view" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Detail Reservasi
                    </a>


                    @if (Auth::user()->id_role == '3')
                        <a href="{{ route('pihakgym.edit', $user->id_user) }}" class="btn btn-primary">
                            <i class="fas fa-building"></i> Edit Profil Gym
                        </a>
                    @elseif (Auth::user()->id_role == '1')
                        <a href="{{ route('request.gym') }}" class="btn btn-primary">
                            <i class="fas fa-building"></i> Buat Gym
                        </a>
                    @elseif (Auth::user()->id_role == '2')
                        <a href="{{ route('admin.index') }}" class="btn btn-primary">
                            <i class="fas fa-building"></i> Dashboard
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('partials.jspage')
    @include('partials.jsglobal')
</body>

</html>
