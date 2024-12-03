<!-- resources/views/profile/topup.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.header')
    @include('partials.styleGlobal')
    <style>
        .payment-method {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 20px;
        }
        .payment-method label {
            position: relative;
            cursor: pointer;
        }
        .payment-method input[type="radio"] {
            display: none;
        }
        .payment-method .payment-card {
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            width: 150px;
            transition: all 0.3s ease;
        }
        .payment-method input[type="radio"]:checked + .payment-card {
            border-color: #007bff;
            box-shadow: 0 0 10px rgba(0,123,255,0.3);
        }
        .payment-method img {
            max-width: 80px;
            max-height: 50px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="mx-auto col-md-8 grid-margin stretch-card">
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
                                <input type="number" name="amount" class="form-control" placeholder="Minimal Rp 10.000" min="10000" required>
                                <small class="form-text text-muted">Minimal top up Rp 10.000</small>
                            </div>

                            <div class="form-group">
                                <label>Pilih Metode Pembayaran</label>
                                <div class="payment-method">
                                    <!-- E-Wallet -->
                                    <label>
                                        <input type="radio" name="payment_method" value="gopay" required>
                                        <div class="payment-card">
                                            <img src="{{ asset('assets/images/payment/gopay-logo.png') }}" alt="GoPay">
                                            <p>GoPay</p>
                                        </div>
                                    </label>
                                    <label>
                                        <input type="radio" name="payment_method" value="dana">
                                        <div class="payment-card">
                                            <img src="{{ asset('assets/images/payment/dana-logo.png') }}" alt="DANA">
                                            <p>DANA</p>
                                        </div>
                                    </label>
                                    <label>
                                        <input type="radio" name="payment_method" value="ovo">
                                        <div class="payment-card">
                                            <img src="{{ asset('assets/images/payment/ovo-logo.png') }}" alt="OVO">
                                            <p>OVO</p>
                                        </div>
                                    </label>

                                    <!-- Bank Transfer -->
                                    <label>
                                        <input type="radio" name="payment_method" value="bca">
                                        <div class="payment-card">
                                            <img src="{{ asset('assets/images/payment/bca-logo.png') }}" alt="Bank BCA">
                                            <p>Bank BCA</p>
                                        </div>
                                    </label>
                                    <label>
                                        <input type="radio" name="payment_method" value="mandiri">
                                        <div class="payment-card">
                                            <img src="{{ asset('assets/images/payment/mandiri-logo.png') }}" alt="Bank Mandiri">
                                            <p>Bank Mandiri</p>
                                        </div>
                                    </label>
                                    <label>
                                        <input type="radio" name="payment_method" value="bni">
                                        <div class="payment-card">
                                            <img src="{{ asset('assets/images/payment/bni-logo.png') }}" alt="Bank BNI">
                                            <p>Bank BNI</p>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="unique_code">Kode Unik</label>
                                <input type="text" name="unique_code" class="form-control" placeholder="Masukkan kode unik (opsional)">
                                <small class="form-text text-muted">Kode unik dapat membantu identifikasi pembayaran Anda</small>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">
                                Lanjutkan Top Up
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.jspage')
    @include('partials.jsglobal')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const amountInput = document.querySelector('input[name="amount"]');
            
            amountInput.addEventListener('input', function() {
                // Pastikan minimal 10.000
                if (this.value < 10000) {
                    this.setCustomValidity('Minimal top up Rp 10.000');
                } else {
                    this.setCustomValidity('');
                }
            });
        });
    </script>
</body>
</html>