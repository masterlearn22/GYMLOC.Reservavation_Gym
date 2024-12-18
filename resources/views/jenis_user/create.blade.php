@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Jenis User</h1>
    <form action="{{ route('jenis_user.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="ID_JENIS_USER" class="form-label">ID Jenis User</label>
            <input type="text" class="form-control @error('ID_JENIS_USER') is-invalid @enderror" id="ID_JENIS_USER" name="ID_JENIS_USER" value="{{ old('ID_JENIS_USER') }}">
            @error('ID_JENIS_USER')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="JENIS_USER" class="form-label">Jenis User</label>
            <input type="text" class="form-control @error('JENIS_USER') is-invalid @enderror" id="JENIS_USER" name="JENIS_USER" value="{{ old('JENIS_USER') }}">
            @error('JENIS_USER')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('jenis_user.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
