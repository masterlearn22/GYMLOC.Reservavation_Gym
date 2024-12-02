<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Gym</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .card {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mb-4 text-center">Sistem Reservasi Gym</h1>

        <!-- Form untuk Membuat Reservasi -->
        <div class="card">
            <div class="card-header">
                <h5>Buat Reservasi Baru</h5>
            </div>
            <div class="card-body">
                <form action="/reservations/store" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="id_user" class="form-label">Id User</label>
                        <input type="number" id="id_user" name="id_user" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="gym_id" class="form-label">Gym ID</label>
                        <input type="number" id="gym_id" name="gym_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_reservasi" class="form-label">Tanggal Reservasi</label>
                        <input type="date" id="tgl_reservasi" name="tgl_reservasi" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                        <input type="time" id="waktu_mulai" name="waktu_mulai" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
                        <input type="time" id="waktu_selesai" name="waktu_selesai" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="total_harga" class="form-label">Total Harga</label>
                        <input type="number" id="total_harga" name="total_harga" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Buat Reservasi</button>
                </form>

            </div>
        </div>
        <!-- List Reservasi -->
        <div class="card">
            <div class="card-header">
                <h5>Daftar Reservasi</h5>
            </div>
            <div class="card-body">
                <ul id="reservationList" class="list-group">
                    <!-- Data akan diisi melalui JavaScript -->
                </ul>
            </div>
        </div>
    </div>

    <!-- Script untuk Mengelola Data -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const reservationForm = document.getElementById('reservationForm');
            const reservationList = document.getElementById('reservationList');

            // Fungsi untuk memuat daftar reservasi
            function loadReservations() {
                axios.get('/reservations')
                    .then(response => {
                        reservationList.innerHTML = ''; // Kosongkan list sebelumnya
                        response.data.forEach(reservation => {
                            const listItem = document.createElement('li');
                            listItem.classList.add('list-group-item');
                            listItem.innerHTML = `
                                <strong>Reservasi ID:</strong> ${reservation.reservasi_id} <br>
                                <strong>Gym:</strong> ${reservation.gym.nama_gym} <br>
                                <strong>User:</strong> ${reservation.user.nama} <br>
                                <strong>Tanggal:</strong> ${reservation.tgl_reservasi} <br>
                                <strong>Status:</strong> ${reservation.status ? 'Selesai' : 'Belum Dibayar'}
                            `;
                            reservationList.appendChild(listItem);
                        });
                    })
                    .catch(error => {
                        console.error('Gagal memuat daftar reservasi:', error);
                    });
            }

            // Event untuk submit form reservasi

            // Load daftar reservasi saat halaman dimuat
            loadReservations();
        });
    </script>
</body>

</html>
