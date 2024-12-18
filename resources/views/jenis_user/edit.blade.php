@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Jenis User</h1>
    <form action="{{ route('jenis_user.update', $Role->ID_JENIS_USER) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="JENIS_USER" class="form-label">Jenis User</label>
            <input type="text" class="form-control @error('JENIS_USER') is-invalid @enderror" id="JENIS_USER" name="JENIS_USER" value="{{ old('JENIS_USER', $Role->JENIS_USER) }}">
            @error('JENIS_USER')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('jenis_user.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
