<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.header')
    @include('partials.styleGlobal')
</head>
<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detail Pengguna</h4>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table">
                                    <tr>
                                        <th>Nama</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Bergabung</th>
                                        <td>{{ $user->created_at->format('d M Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status Pengajuan Gym</th>
                                        <td>
                                            @if($user->is_gym_requested)
                                                <span class="badge bg-success">Disetujui</span>
                                            @else
                                                <span class="badge bg-secondary">Menunggu Persetujuan</span>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <a href="{{ route('admin.dashboard') }}" class="mt-3 btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.jspage')
    @include('partials.jsglobal')
</body>
</html>