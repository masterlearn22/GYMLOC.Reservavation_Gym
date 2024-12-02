<!-- resources/views/profile/topup.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.header')
    @include('layout.styleGlobal')
    @include('layout.stylePage')
</head>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Top Up Saldo</h4>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @elseif(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form action="{{ route('profile.topup') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="amount">Jumlah Top Up</label>
                                <input type="number" name="amount" class="form-control" placeholder="Jumlah" min="1000" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Top Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layout.jspage')
    @include('layout.jsglobal')
</body>

</html>
