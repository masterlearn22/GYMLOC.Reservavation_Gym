@extends('admin.app')

@section('content')
<div class="container">
    <h1>Edit Jenis User</h1>
    <form action="{{ route('jenis_user.update', $Role->id_role) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="role" class="form-label">Jenis User</label>
            <input type="text" class="form-control @error('role') is-invalid @enderror" id="role" name="role" value="{{ old('role', $Role->role) }}">
            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('jenis_user.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
