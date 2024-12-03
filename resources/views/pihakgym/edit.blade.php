<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.header')
    @include('partials.styleGlobal')
    <style>
        .pricing-group {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pengajuan Gym Baru</h4>
                        <div class="card-footer">
                            <a href="{{route('profile.index')}}" class="mt-3 btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('pihakgym.update', $gym->gym_id) }}" method="POST">
                            @csrf
                            <!-- Informasi Gym -->
                            <div class="mb-3">
                                <label for="nama_gym" class="form-label">Nama Gym</label>
                                <input type="text" id="nama_gym" name="nama_gym" class="form-control"
                                    value="{{ old('nama_gym', $gym->nama_gym) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">Kota</label>
                                <input type="text" id="city" name="city" class="form-control"
                                    value="{{ old('city', $gym->city) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" id="alamat" name="alamat" class="form-control"
                                    value="{{ old('alamat', $gym->alamat) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="fasilitas" class="form-label">Fasilitas</label>
                                <textarea id="fasilitas" name="fasilitas" class="form-control" required>{{ old('fasilitas', $gym->fasilitas) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control" required>{{ old('deskripsi', $gym->deskripsi) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="jam_operasional" class="form-label">Jam Operasional</label>
                                <input type="text" id="jam_operasional" name="jam_operasional" class="form-control"
                                    placeholder="Contoh: 08:00 - 22:00"
                                    value="{{ old('jam_operasional', $gym->jam_operasional) }}" required>
                            </div>

                            <!-- Harga Berdasarkan Kategori -->
                            <div>
                                <h5 class="mb-3">Harga Berdasarkan Kategori</h5>

                                <!-- Per Sesi -->
                                <div class="row pricing-group">
                                    <div class="col-md-4">
                                        <label for="kategori_1" class="form-label">Kategori</label>
                                        <input type="text" id="kategori_1" name="kategori[]" class="form-control"
                                            value="Per Sesi" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="durasi_1" class="form-label">Durasi</label>
                                        <input type="number" id="durasi_1" name="durasi[]" class="form-control"
                                            value="{{ old('durasi.0', $previousPrices->where('nama_kategori', 'Per Sesi')->first()->durasi ?? '') }}"
                                            readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="harga_1" class="form-label">Harga</label>
                                        <input type="number" id="harga_1" name="harga[]" class="form-control"
                                            value="{{ old('harga.0', $previousPrices->where('nama_kategori', 'Per Sesi')->first()->harga ?? '') }}">
                                    </div>
                                </div>

                                <!-- 1 Bulan -->
                                <div class="row pricing-group">
                                    <div class="col-md-4">
                                        <label for="kategori_2" class="form-label">Kategori</label>
                                        <input type="text" id="kategori_2" name="kategori[]" class="form-control"
                                            value="1 Bulan" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="durasi_2" class="form-label">Durasi</label>
                                        <input type="number" id="durasi_2" name="durasi[]" class="form-control"
                                            value="{{ old('durasi.1', $previousPrices->where('nama_kategori', '1 Bulan')->first()->durasi ?? 1) }}"
                                            readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="harga_2" class="form-label">Harga</label>
                                        <input type="number" id="harga_2" name="harga[]" class="form-control"
                                            value="{{ old('harga.1', $previousPrices->where('nama_kategori', '1 Bulan')->first()->harga ?? '') }}">
                                    </div>
                                </div>

                                <!-- 3 Bulan -->
                                <div class="row pricing-group">
                                    <div class="col-md-4">
                                        <label for="kategori_3" class="form-label">Kategori</label>
                                        <input type="text" id="kategori_3" name="kategori[]" class="form-control"
                                            value="3 Bulan" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="durasi_3" class="form-label">Durasi</label>
                                        <input type="number" id="durasi_3" name="durasi[]" class="form-control"
                                            value="{{ old('durasi.2', $previousPrices->where('nama_kategori', '3 Bulan')->first()->durasi ?? 3) }}"
                                            readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="harga_3" class="form-label">Harga</label>
                                        <input type="number" id="harga_3" name="harga[]" class="form-control"
                                            value="{{ old('harga.2', $previousPrices->where('nama_kategori', '3 Bulan')->first()->harga ?? '') }}">
                                    </div>
                                </div>

                                <!-- 6 Bulan -->
                                <div class="row pricing-group">
                                    <div class="col-md-4">
                                        <label for="kategori_4" class="form-label">Kategori</label>
                                        <input type="text" id="kategori_4" name="kategori[]" class="form-control"
                                            value="6 Bulan" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="durasi_4" class="form-label">Durasi</label>
                                        <input type="number" id="durasi_4" name="durasi[]" class="form-control"
                                            value="{{ old('durasi.3', $previousPrices->where('nama_kategori', '6 Bulan')->first()->durasi ?? 6) }}"
                                            readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="harga_4" class="form-label">Harga</label>
                                        <input type="number" id="harga_4" name="harga[]" class="form-control"
                                            value="{{ old('harga.3', $previousPrices->where('nama_kategori', '6 Bulan')->first()->harga ?? '') }}">
                                    </div>
                                </div>

                                <!-- 12 Bulan -->
                                <div class="row pricing-group">
                                    <div class="col-md-4">
                                        <label for="kategori_5" class="form-label">Kategori</label>
                                        <input type="text" id="kategori_5" name="kategori[]" class="form-control"
                                            value="12 Bulan" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="durasi_5" class="form-label">Durasi</label>
                                        <input type="number" id="durasi_5" name="durasi[]" class="form-control"
                                            value="{{ old('durasi.4', $previousPrices->where('nama_kategori', '12 Bulan')->first()->durasi ?? 12) }}"
                                            readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="harga_5" class="form-label">Harga</label>
                                        <input type="number" id="harga_5" name="harga[]" class="form-control"
                                            value="{{ old('harga.4', $previousPrices->where('nama_kategori', '12 Bulan')->first()->harga ?? '') }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Submit -->
                            <button type="submit" class="btn btn-primary">Update Gym</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.jspage')
    @include('partials.jsglobal')
</body>

</html>
