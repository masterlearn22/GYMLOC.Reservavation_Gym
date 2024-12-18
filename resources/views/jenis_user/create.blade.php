@extends('admin.menu.layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Jenis User</h1>
    <form action="{{ route('jenis_user.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_role" class="form-label">ID Jenis User</label>
            <input type="text" class="form-control @error('id_role') is-invalid @enderror" id="id_role" name="id_role" value="{{ old('id_role') }}">
            @error('id_role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Jenis User</label>
            <input type="text" class="form-control @error('role') is-invalid @enderror" id="role" name="role" value="{{ old('role') }}">
            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('jenis_user.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
