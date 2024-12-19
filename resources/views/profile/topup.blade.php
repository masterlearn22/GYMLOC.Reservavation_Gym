
<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.header')
    @include('partials.styleGlobal')
    <style>
        /* Existing styles */
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

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1050;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
        }
        .modal-dialog {
            max-width: 500px;
            margin: 1.75rem auto;
        }
        .modal-content {
            position: relative;
            display: flex;
            flex-direction: column;
            width: 100%;
            pointer-events: auto;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0,0,0,.2);
            border-radius: .3rem;
            outline: 0;
        }
        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
        }
        .modal-body {
            position: relative;
            flex: 1 1 auto;
            padding: 1rem;
        }
        .modal-footer {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 1rem;
            border-top: 1px solid #e9ecef;
        }
    </style>
</head>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="mx-auto col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        
                            <a href="{{ route('profile.index')}}" class="mt-3 btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                       
                        <h4 class="card-title">Top Up Saldo</h4>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @elseif(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form id="topupForm" action="{{ route('process.topup') }}" method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <label for="amount">Jumlah Top Up</label>
                                <input type="number" name="amount" id="amountInput" class="form-control" min="10000" required>
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

                            <button type="button" id="confirmTopupBtn" class="btn btn-primary btn-block">
                                Lanjutkan Top Up
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Konfirmasi Modal -->
    <div class="modal fade" id="topupConfirmModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Top Up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda akan melakukan top up dengan detail:</p>
                    <table class="table">
                        <tr>
                            <th>Jumlah Top Up</th>
                            <td id="modalAmount"></td>
                        </tr>
                        <tr>
                            <th>Metode Pembayaran</th>
                            <td id="modalMethod"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" id="confirmSubmitBtn" class="btn btn-primary">Konfirmasi</button>
                </div>
            </div>
        </div>
    </div>

    @include('partials.jspage')
    @include('partials.jsglobal')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const amountInput = document.getElementById('amountInput');
            const confirmTopupBtn = document.getElementById('confirmTopupBtn');
            const topupConfirmModal = $('#topupConfirmModal');
            const confirmSubmitBtn = document.getElementById('confirmSubmitBtn');
            const topupForm = document.getElementById('topupForm');

            // Amount validation
            amountInput.addEventListener('input', function() {
                if (this.value < 10000) {
                    this.setCustomValidity('Minimal top up Rp 10.000');
                } else {
                    this.setCustomValidity('');
                }
            });

            // Open confirmation modal
            confirmTopupBtn.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Validate form before showing modal
                if (!topupForm.checkValidity()) {
                    topupForm.reportValidity();
                    return;
                }

                // Get selected payment method
                const selectedMethod = document.querySelector('input[name="payment_method"]:checked');
                
                if (!selectedMethod) {
                    alert('Silakan pilih metode pembayaran');
                    return;
                }

                // Populate modal with details
                document.getElementById('modalAmount').textContent = 
                    'Rp ' + new Intl.NumberFormat('id-ID').format(amountInput.value);
                document.getElementById('modalMethod').textContent = 
                    selectedMethod.value.toUpperCase();

                topupConfirmModal .modal('show');
            });

            // Confirm submission
            confirmSubmitBtn.addEventListener('click', function() {
                topupForm.submit();
            });
        });
    </script>
</body>
</html>