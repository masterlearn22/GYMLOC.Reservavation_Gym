@extends('admin.menu.layouts.app')


@section('content')
<h1>Data User</h1>
<a href="{{ route('user.create') }}" class="btn btn-primary">Create New User</a>
<!-- Tabel Data Warga -->
<table id="myTable" class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Jenis User</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id_user }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role ? $user->role->role : 'belom ada' }}</td>
                <!-- Tampilkan Jenis User -->
                <td>
                    <a href="{{ route('user.edit', $user->id_user) }}" class="btn btn-light">Edit</a>
                    <form action="{{ route('user.destroy', $user->id_user) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-dark">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
<!-- Inisialisasi DataTables -->

<script>
$(document).ready(function() {
$('#myTable').DataTable({
"paging": true, // Menampilkan pagination
"searching": true, // Menampilkan kotak pencarian
"ordering": true, // Mengaktifkan pengurutan kolom
"info": true, // Menampilkan informasi jumlah data
});
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>