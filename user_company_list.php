<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kerjakini - Dashboard Pengguna</title>
    <style>
        :root {
            --golden-ratio: 1.618;
            --primary-color: #6C63FF;
            --primary-dark: #2E25B4;
            --secondary-color: #FF6584;
            --bg-light: #F3F4F6;
            --white: #ffffff;
            --text-dark: #1F2937;
            --text-light: #6B7280;
            --border-radius: 0.5rem;
            --box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="container">
        <a href="#" class="logo">
            <span class="logo-icon">K</span>
            <span>erjakini</span>
        </a>
        <button class="mobile-menu-btn" id="mobileMenuBtn">☰</button>
        <ul class="nav-links">
            <li><a href="#">Cari Lowongan</a></li>
            <li><a href="#">Cari Perusahaan</a></li>
            <li><a href="#">Komunitas</a></li>
            <li>
                <a href="#">Username</a>
                <ul class="dropdown">
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    
    <!-- Mobile Menu -->
    <ul class="mobile-menu" id="mobileMenu">
        <li><a href="#">Cari Lowongan</a></li>
        <li><a href="#">Cari Perusahaan</a></li>
        <li><a href="#">Komunitas</a></li>
        <li id="mobileUserMenu">
            <a href="javascript:void(0)">Username</a>
            <ul class="mobile-dropdown">
                <li><a href="#">Profile</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </li>
    </ul>

    <!-- Search Section -->
    <section class="search-section">
        <div class="container">
            <h1 class="search-title">Kerjakini</h1>
            <p class="search-subtitle">Temukan pekerjaan impianmu dengan mudah dan cepat</p>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Masukan Kata kunci...">
                <select class="search-select">
                    <option>Semua Klasifikasi</option>
                    <option value="">IT & Software</option>
                    <option value="">Marketing</option>
                    <option value="">Keuangan</option>
                    <option value="">Desain</option>
                </select>
                <select class="search-select">
                    <option>Lokasi Bekerja...</option>
                    <option>Jakarta</option>
                    <option>Bandung</option>
                    <option>Surabaya</option>
                    <option>Bali</option>
                </select>
            </div>
        </div>
    </section>

    <!-- Jobs List -->
     <section class="list-job">
        <div class="job">
            <h2>Kuli bangunan</h2>
            <p>Maven Company</p>
            <p>lokasi: Depok, Jawa barat</p>
            <p>Gaji: Rp. 2.000.000</p>
            <p>Deskripsi: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
     </section>
</body>
</html>