@extends('admin.menu.layouts.app')

@section('content')
<div class="container">
    <h1 class="text-primary mb-4">Daftar Menu</h1>

    <a href="{{ route('menu.create') }}" class="btn btn-success mb-3">Tambah Menu</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark text-white">
                <tr>
                    <th>MENU_ID</th>
                    <th>MENU_NAME</th>
                    <th>MENU_LINK</th>
                    <th>MENU_ICON</th>
                    <th>Pembuat</th>
                    <th>Akses User</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menu as $m)
                    <tr>
                        <td>{{ $m->MENU_ID }}</td>
                        <td>{{ $m->MENU_NAME }}</td>
                        <td>{{ $m->MENU_LINK }}</td>
                        <td>{{ $m->MENU_ICON }}</td>
                        <td>{{ $m->CREATE_BY }}</td>
                        <td>
                            @foreach ($m->settings as $setting)
                                {{ $setting->jenisUser->JENIS_USER ?? 'Tidak Ada Akses' }}
                            @endforeach
                        </td>                 
                        <td>
                            <a href="{{ route('menu.edit', $m->MENU_ID) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('menu.destroy', $m->MENU_ID) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus menu ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

<style>
    /* Styling untuk header */
    h1 {
        font-size: 2.5rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    /* Tabel dan Responsif */
    .table-responsive {
        margin-top: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        background-color: #fff;
    }

    .table {
        border-radius: 8px;
    }

    .table th, .table td {
        padding: 12px 15px;
        text-align: center;
        vertical-align: middle;
    }

    .table-dark {
        background-color: #343a40;
    }

    .table-dark th, .table-dark td {
        color: #fff;
    }

    /* Styling tombol */
    .btn {
        font-size: 14px;
        padding: 8px 12px;
        border-radius: 20px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-sm {
        font-size: 13px;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-warning:hover, .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    /* Styling alert */
    .alert {
        font-weight: 600;
        border-radius: 10px;
    }

    /* Styling untuk kolom */
    td {
        word-wrap: break-word;
    }
</style>
