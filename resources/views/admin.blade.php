@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <p class="card-text">{{ $usersCount }} total users</p>
                    <a href="{{ route('admin.users') }}" class="btn btn-primary">Manage Users</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Reservations</h5>
                    <p class="card-text">{{ $reservationsCount }} reservations made</p>
                    <a href="{{ route('admin.reservations') }}" class="btn btn-primary">Manage Reservations</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Classes</h5>
                    <p class="card-text">{{ $classesCount }} active classes</p>
                    <a href="{{ route('admin.classes') }}" class="btn btn-primary">Manage Classes</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
