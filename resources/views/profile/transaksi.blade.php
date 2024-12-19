<!-- resources/views/profile/transactions.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.header')
    @include('partials.styleGlobal')
</head>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="mx-auto col-md-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4 d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Riwayat Transaksi</h4>
                            <a href="{{ route('profile.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>

                        <!-- Filter Transaksi -->
                        <form action="{{ route('transaksi') }}" method="GET" class="mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <select name="type" class="form-control">
                                        <option value="">Semua Jenis</option>
                                        <option value="topup" {{ request('type') == 'topup' ? 'selected' : '' }}>Top Up
                                        </option>
                                        <option value="pembayaran"
                                            {{ request('type') == 'pembayaran' ? 'selected' : '' }}>Pembayaran</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="status" class="form-control">
                                        <option value="">Semua Status</option>
                                        <option value="success" {{ request('status') == 'success' ? 'selected' : '' }}>
                                            Berhasil</option>
                                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>
                                            Gagal</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="date" name="start_date" class="form-control"
                                        value="{{ request('start_date') }}">
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                    <a href="{{ route('transaksi') }}" class="btn btn-secondary">Reset</a>
                                </div>
                            </div>
                        </form>

                        <!-- Tabel Transaksi -->
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Jenis Transaksi</th>
                                        <th>Jumlah</th>
                                        <th>Metode</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->created_at->format('d M Y') }}</td>
                                            <td>{{ ucfirst($transaction->type) }}</td>
                                            <td>Rp {{ number_format($transaction->amount, 0, ',', '.') }}</td>
                                            <td>{{ ucfirst($transaction->method) }}</td>
                                            <td>
                                                <span
                                                    class="badge 
                                                        {{ $transaction->status == 'success'
                                                            ? 'bg-success'
                                                            : ($transaction->status == 'pending'
                                                                ? 'bg-warning'
                                                                : 'bg-danger') }}">
                                                    {{ ucfirst($transaction->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('transaction.details', $transaction->id) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i> Detail
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada transaksi</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    @include('partials.jspage')
    @include('partials.jsglobal')
</body>

</html>
