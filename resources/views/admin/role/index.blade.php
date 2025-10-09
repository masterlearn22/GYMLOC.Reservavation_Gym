@extends('admin.menu.layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-primary">Daftar Jenis User</h1>
    <a href="{{ route('role.create') }}" class="mb-3 btn btn-primary rounded-pill shadow-sm px-4 py-2">Tambah Jenis User</a>

    @if(session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif

    <div class="table-responsive shadow-lg rounded overflow-hidden">
        <table class="table table-hover table-bordered table-striped mb-0">
            <thead class="table-dark text-white">
                <tr>
                    <th>ID</th>
                    <th>Jenis User</th>
                    <th>Create By</th>
                    <th>Create Date</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jenisUsers as $role)
                <tr class="table-row">
                    <td>{{ $role->id_role }}</td>
                    <td>{{ $role->role }}</td>
                    <td>{{ $role->CREATE_BY }}</td>
                    <td>{{ $role->CREATE_DATE }}</td>
                    <td>
                        <a href="{{ route('role.edit', $role->id_role) }}" class="btn btn-warning btn-sm rounded-pill px-3 py-2">Edit</a>
                        <form action="{{ route('role.destroy', $role->id_role) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3 py-2" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

<style>
    /* Styling tombol yang lebih elegan */
    .btn {
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    /* Styling untuk tabel responsif dan bayangan */
    .table-responsive {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        background-color: #ffffff;
    }

    .table {
        border-radius: 15px;
        background-color: #fff; /* Set background tabel menjadi putih */
    }

    /* Styling untuk header tabel */
    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }

    .table-dark {
        background-color: #343a40;
        color: #fff;
    }

    /* Hover effect pada tabel */
    .table-row:hover {
        background-color: #ffffff !important; /* Warna latar belakang saat hover */
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .table-hover tbody tr:hover {
        background-color: #f5f5f5;
    }

    /* Styling untuk tombol Edit dan Hapus */
    .btn-sm {
        padding: 0.5rem 1rem;
    }

    /* Mengubah warna alert sukses */
    .alert-success {
        font-weight: 600;
        border-left: 5px solid #28a745;
    }

    /* Styling untuk kolom kosong ketika tidak ada data */
    .text-muted {
        font-style: italic;
        color: #6c757d;
    }
</style>
