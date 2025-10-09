@extends('admin.menu.layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 card-hover">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <p class="card-text">{{ $usersCount }} total users</p>
                    <a href="{{ route('user.index') }}" class="btn btn-primary btn-hover">Manage Users</a>
                </div>
            </div>
        </div>

        <!-- Display gym count that are pending -->
        <div class="col-md-4">
            <div class="card mb-4 card-hover">
                <div class="card-body">
                    <h5 class="card-title">Pending Gyms</h5>
                    <p class="card-text">{{ $gymsCount }} gyms pending approval and<br>
                    {{ $gymCount }} gyms 
                    </p>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-hover">Manage Gyms</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4 card-hover">
                <div class="card-body">
                    <h5 class="card-title">Role</h5>
                    <p class="card-text">{{ $roleCount }} Total role</p>
                    <a href="{{ route('role.index') }}" class="btn btn-primary btn-hover">Manage Role</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    /* Efek untuk card hover */
    .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%; /* Membuat card memiliki tinggi 100% */
        display: flex;
        flex-direction: column;
    }

    .card-hover:hover {
        transform: translateY(-10px); /* Timbul sedikit ke atas */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Efek bayangan */
    }

    /* Konsistensi ukuran untuk semua card */
    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%; /* Memastikan konten di dalam card terdistribusi secara merata */
    }

    .card {
        min-height: 200px; /* Menetapkan tinggi minimum untuk card */
        height: 100%;
    }

    /* Efek untuk button hover */
    .btn-hover {
        transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
    }

    .btn-hover:hover {
        background-color: white; /* Ganti warna latar belakang menjadi putih */
        color: #007bff; /* Ganti warna teks tombol menjadi biru */
        transform: scale(1.05); /* Memperbesar sedikit ukuran tombol */
    }

    /* Mengubah warna tombol ke warna yang lebih terang saat hover */
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: white; /* Teks tombol awal berwarna putih */
    }

    .btn-primary:hover {
        background-color: white;
        border-color: #007bff;
        color: #007bff; /* Teks berubah warna menjadi biru saat hover */
    }
</style>
