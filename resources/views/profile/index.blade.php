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
            border: 3px solid    #ddd;
        }

        .table-profile {
            width: 10%;
            border-collapse: collapse;
        }

        .table-profile th,
        .table-profile td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
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
                            </tr>
                            <tr>
                                <th>Saldo</th>
                                <td>{{ number_format($user->saldo, 2, ',', '.') }} IDR</td>
                            </tr>
                        </table>

                        <!-- Tombol untuk mengedit profil -->
                        <a href="{{ route('profile.edit', $user->id_role) }}" class="btn btn-primary">Edit Profil</a>
                        @if (Auth::user()->id_role != 'gym')
                            <a href="{{ route('pihakgym.edit', $user->id_role) }}" class="btn btn-primary">Edit
                                Profil Gym</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.jspage')
    @include('partials.jsglobal')

</body>

</html>
