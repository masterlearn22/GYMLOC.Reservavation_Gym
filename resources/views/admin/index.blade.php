@extends('admin.app')
@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <p class="card-text">{{ $usersCount }} total users</p>
                    <a href="{{ route('jenis_user.index') }}" class="btn btn-primary">Manage Users</a>
                </div>
            </div>
        </div>

    <!-- Display gym count that are pending -->
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pending Gyms</h5>
                    <p class="card-text">{{ $gymsCount }} gyms pending approval</p>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Manage Gyms</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Role</h5>
                    <p class="card-text">{{ $roleCount }} Total role</p>
                    <a href="{{ route('jenis_user.index') }}" class="btn btn-primary">Manage Role</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
