<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #002f34;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar a {
            color: white;
            font-size: 0.9rem;
            margin-right: 20px;
            transition: color 0.3s ease;
        }

        .navbar a:hover {
            color: #ff0066;
        }

        .search-section {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
        }

        .search-section .btn {
            background-color: #ff0066;
            color: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .search-section .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-container {
            margin-top: 20px;
        }

        .card {
            border: none;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .cta-section {
            background-color: #ff0066;
            color: white;
            padding: 30px;
            margin-bottom: 30px;
            border-radius: 10px;
            text-align: center;
        }

        .cta-section button {
            background-color: white;
            color: #ff0066;
            font-weight: bold;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .cta-section button:hover {
            background-color: #ff4081;
            transform: scale(1.05);
        }

        .footer {
            background-color: #002f34;
            color: white;
            padding: 20px;
            font-size: 0.8rem;
        }

        .footer a {
            color: #aaa;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: #ff0066;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fa fa-briefcase"></i> KerjaKini</a>
            <div class="collapse navbar-collapse justify-content-end">
                <a href="#" class="text-decoration-none">Cari Lowongan</a>
                <a href="#">Lihat Profil</a>
                <a href="#">Sumber Daya Karir</a>
                <a href="login.php" class="btn btn-outline-light">Masuk</a>
            </div>
        </div>
    </nav>

    <!-- Search Section -->
    <div class="search-section text-center">
        <div class="container">
            <h3 class="mb-4">Cari Lowongan</h3>
            <form class="row g-2">
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Masukkan kata kunci">
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option value="">Semua Klasifikasi</option>
                        <option value="1">IT</option>
                        <option value="3">Marketing</option>
                        <option value="3">Bodyguard</option>
                        <option value="4">Pengasuh Anak</option>
                        <option value="5">Asisten</option>
                        <option value="6">Sekertaris</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="Masukkan lokasi">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Company Cards -->
    <div class="container card-container">
        <h4 class="mb-4">Temukan perusahaan Anda berikutnya</h4>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col">
                <div class="card">
                    <img src="navtan.jpg" class="card-img-top" alt="Company Logo">
                    <div class="card-body">
                        <h5 class="card-title">Navtan Animation</h5>
                        <p class="card-text">79 Pekerjaan</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="joy.jpg" class="card-img-top" alt="Company Logo">
                    <div class="card-body">
                        <h5 class="card-title">JoyBoy Company</h5>
                        <p class="card-text">30 Pekerjaan</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="jax.jpg" class="card-img-top" alt="Company Logo">
                    <div class="card-body">
                        <h5 class="card-title">JaxMediaTama</h5>
                        <p class="card-text">35 Pekerjaan</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="maven.jpg" class="card-img-top" alt="Company Logo">
                    <div class="card-body">
                        <h5 class="card-title">Maven Company</h5>
                        <p class="card-text">25 Pekerjaan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="container cta-section mt-5">
        <h3>"Hello" karir dan gaji lebih baik</h3>
        <p>Dapatkan tips & fiturnya</p>
        <button class="btn">Mulai Sekarang</button>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="container d-flex justify-content-between">
            <p>Hak cipta © 2024 KerjaKini</p>
            <div>
                <a href="#">Tentang Kami</a> |
                <a href="#">Kontak</a> |
                <a href="#">Privasi</a>
            </div>
        </div>
    </div>
</body>

</html>
