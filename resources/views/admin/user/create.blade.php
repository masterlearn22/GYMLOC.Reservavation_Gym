@extends('admin.menu.layouts.app')


@section('content')
<form action="{{ route('user.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="no_hp" class="form-label">No HP</label>
        <input type="text" name="no_hp" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="wa" class="form-label">WhatsApp</label>
        <input type="text" name="wa" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="pin" class="form-label">PIN</label>
        <input type="text" name="pin" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="id_role" class="form-label">Role</label>
        <select name="id_role" class="form-control" required>
            @foreach ($roles as $role)
                <option value="{{ $role->id_role }}">{{ $role->role }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Tambah User</button>
</form>
@endsection