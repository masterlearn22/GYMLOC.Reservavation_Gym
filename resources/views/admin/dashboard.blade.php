@extends('admin.menu.layouts.app')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        
        <!-- Permohonan Pengajuan Gym -->
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-primary">Permohonan Pengajuan Gym</h4>
                    
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="table-dark text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Gym</th>
                                    <th>Alamat</th>
                                    <th>Kota</th>
                                    <th>Fasilitas</th>
                                    <th>Deskripsi</th>
                                    <th>Jam Buka</th>
                                    <th>Jam Tutup</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($gyms as $gym_id => $gym_group)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $gym_group->first()->nama_gym }}</td>
                                        <td>{{ $gym_group->first()->alamat }}</td>
                                        <td>{{ $gym_group->first()->city }}</td>
                                        <td>{{ $gym_group->first()->fasilitas }}</td>
                                        <td>{{ $gym_group->first()->deskripsi }}</td>
                                        <td>{{ $gym_group->first()->jam_buka }}</td>
                                        <td>{{ $gym_group->first()->jam_tutup }}</td>
                                        <td>
                                            <ul class="pricing-list">
                                                @foreach ($gym_group as $gym)
                                                    <li>
                                                        {{ $gym->nama_kategori }}: 
                                                        {{ $gym->durasi ? $gym->durasi . ' bulan' : 'Per Sesi' }} 
                                                        - Rp {{ number_format($gym->harga, 0, ',', '.') }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.approve.gym', $gym_group->first()->gym_id) }}" method="POST" class="mb-2">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm rounded-pill">Setujui</button>
                                            </form>
                                            <form action="{{ route('admin.reject.gym', $gym_group->first()->gym_id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm rounded-pill">Tolak</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">Tidak ada pengajuan gym</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daftar Pengguna yang Mengajukan Gym -->
        <div class="mt-4 col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-primary">Daftar Pengguna Yang Disetujui Sebagai Pihak Gym</h4>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="table-dark text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Gym</th>
                                    <th>Kota</th>
                                    <th>Nama Pemilik</th>
                                    <th>Email</th>
                                    <th>Tanggal Pengajuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($gymRequests as $request)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $request->nama_gym }}</td>
                                        <td>{{ $request->city }}</td>
                                        <td>{{ $request->user->name }}</td> <!-- Menampilkan nama pemilik gym -->
                                        <td>{{ $request->user->email }}</td>
                                        <td>{{ $request->created_at->format('d M Y H:i') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Belum Ada GYM yang Terdaftar</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

<style>
    /* Styling umum untuk tabel dan elemen */
    .table-responsive {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    /* Styling tabel */
    .table {
        border-radius: 8px;
        background-color: #fff;
    }

    .table th, .table td {
        text-align: center;
        vertical-align: middle;
        padding: 12px 15px;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    .table-hover tbody tr:hover {
        background-color: #e9ecef;
    }

    /* Styling tombol */
    .btn-sm {
        font-size: 14px;
        padding: 8px 12px;
        border-radius: 20px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-sm:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .alert {
        font-weight: 600;
        border-radius: 10px;
    }

    /* Styling judul dan card */
    .card-title {
        font-size: 24px;
        font-weight: 600;
    }
</style>
