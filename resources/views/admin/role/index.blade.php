@extends('admin.menu.layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Jenis User</h1>
    <a href="{{ route('role.create') }}" class="mb-3 btn btn-primary">Tambah Jenis User</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
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
            <tr>
                <td>{{ $role->id_role }}</td>
                <td>{{ $role->role }}</td>
                <td>{{ $role->CREATE_BY }}</td>
                <td>{{ $role->CREATE_DATE }}</td>
                <td>
                    <a href="{{ route('role.edit', $role->id_role) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('role.destroy', $role->id_role) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
