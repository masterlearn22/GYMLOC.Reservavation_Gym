@extends('admin.menu.layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Permohonan Pengajuan Gym</h4>
                        
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

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Gym</th>
                                    <th>Alamat</th>
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
                                                <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                                            </form>
                                            <form action="{{ route('admin.reject.gym', $gym_group->first()->gym_id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Belum ada gym yang tersedia</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Daftar Pengguna yang Mengajukan Gym -->
            <div class="mt-4 col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Pengguna Yang Disetujui Sebagai Pihak Gym</h4>
                        
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($gymRequests as $request)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $request->name }}</td>
                                        <td>{{ $request->email }}</td>
                                        <td>{{ $request->created_at->format('d M Y H:i') }}</td>
                                        <td>
                                            <a href="{{ route('admin.user.detail', ['id' => $request->id_user]) }}" class="btn btn-info btn-sm">Detail</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada pengajuan gym</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection