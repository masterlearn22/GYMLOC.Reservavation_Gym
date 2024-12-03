<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Gym</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .gym-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
        }
        .gym-card:hover {
            transform: translateY(-5px);
        }
        .gym-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .gym-card-body {
            padding: 15px;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h2 class="mb-4">Daftar Gym di <span id="city-name">[Nama Kota]</span></h2>
        <div class="row" id="gym-list">
            <!-- Contoh Kartu Gym -->
            <!-- Data akan dimuat dinamis dari backend -->
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Contoh data gym yang dimuat dari server (gunakan backend untuk data asli)
            const gyms = [
                { 
                    name: "Gym A", 
                    distance: 1.2, 
                    image: "https://via.placeholder.com/300x150", 
                    city: "Jakarta"
                },
                { 
                    name: "Gym B", 
                    distance: 3.5, 
                    image: "https://via.placeholder.com/300x150", 
                    city: "Jakarta"
                },
                { 
                    name: "Gym C", 
                    distance: 5.0, 
                    image: "https://via.placeholder.com/300x150", 
                    city: "Jakarta"
                }
            ];

            const cityName = new URLSearchParams(window.location.search).get('city');
            document.getElementById('city-name').textContent = cityName ? cityName : 'Semua Kota';

            const gymList = document.getElementById('gym-list');
            gyms.forEach(gym => {
                // Hanya tampilkan gym sesuai kota yang dipilih
                if (!cityName || gym.city.toLowerCase() === cityName.toLowerCase()) {
                    const gymCard = `
                        <div class="col-md-4 mb-4">
                            <div class="gym-card">
                                <img src="${gym.image}" alt="${gym.name}">
                                <div class="gym-card-body">
                                    <h5 class="gym-name">${gym.name}</h5>
                                    <p class="gym-distance text-muted">${gym.distance} km dari lokasi Anda</p>
                                    <button class="btn btn-primary btn-sm">Lihat Detail</button>
                                </div>
                            </div>
                        </div>
                    `;
                    gymList.innerHTML += gymCard;
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
