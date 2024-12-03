<!-- resources/views/gym/edit.blade.php -->
<form action="{{ route('gym.edit', $gym->id) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama_gym">Nama Gym</label>
        <input type="text" name="nama_gym" class="form-control" value="{{ $gym->nama_gym }}" required>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" class="form-control" value="{{ $gym->alamat }}" required>
    </div>
    <div class="form-group">
        <label for="fasilitas">Fasilitas</label>
        <textarea name="fasilitas" class="form-control" required>{{ $gym->fasilitas }}</textarea>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" required>{{ $gym->deskripsi }}</textarea>
    </div>
    <div class="form-group">
        <label for="jam_operasional">Jam Operasional</label>
        <input type="text" name="jam_operasional" class="form-control" value="{{ $gym->jam_operasional }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Gym</button>
</form>
