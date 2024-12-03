<h3>Permohonan Gym</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Gym</th>
            <th>Alamat</th>
            <th>Fasilitas</th>
            <th>Deskripsi</th>
            <th>Jam Operasional</th>
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
                <td>{{ $gym_group->first()->jam_operasional }}</td>
                <td>
                    <ul>
                        @foreach ($gym_group as $gym)
                            <li>{{ $gym->nama_kategori }}: {{ $gym->durasi ? $gym->durasi . ' bulan' : 'Per Sesi' }} - Rp {{ number_format($gym->harga, 0, ',', '.') }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <form action="{{ route('admin.approve.gym', $request->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Setujui</button>
                    </form>
                    <form action="{{ route('admin.reject.gym', $request->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Tolak</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada gym yang tersedia</td>
            </tr>
        @endforelse
    </tbody>
</table>
