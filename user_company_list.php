<?php
include 'koneksi.php';
session_start();

// Cek session login
if (!isset($_SESSION['user_id'])) {
    echo "Session user tidak ditemukan. Silakan login terlebih dahulu.";
    exit;
}

// ambil data job ama nama perusahaanya
$query = "SELECT DISTINCT job_vacancies.*, companies.nama_perusahaan, companies.logo
          FROM job_vacancies
          JOIN companies ON job_vacancies.company_id = companies.id";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kerjakini - Daftar Perusahaan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            line-height: var(--golden-ratio);
            position: relative;
            overflow-x: hidden;
        }
        
        /* Typography */
        h1, h2, h3, h4 {
            font-weight: 600;
            line-height: 1.2;
        }
        
        /* Layout */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        /* Enhanced Navbar */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.25rem 2rem;
            background-color: var(--white);
            box-shadow: var(--box-shadow);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: calc(1rem * var(--golden-ratio));
            font-weight: 700;
            color: var(--primary-dark);
            letter-spacing: -0.5px;
            padding: 0.5rem 0;
            text-decoration: none;
        }
        
        .logo-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background-color: var(--primary-color);
            color: white;
            border-radius: 50%;
            font-weight: 700;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
        }
        
        .logo:hover .logo-icon {
            transform: rotate(15deg) scale(1.1);
            background-color: var(--primary-dark);
        }
        
        .nav-links {
            display: flex;
            gap: calc(1.5rem * var(--golden-ratio));
            list-style: none;
        }
        
        .nav-links a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            transition: var(--transition);
            position: relative;
            padding: 0.75rem 0.5rem;
            font-size: 1.05rem;
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0.5rem;
            left: 0.5rem;
            width: calc(100% - 1rem);
            height: 2px;
            background-color: var(--primary-color);
            transform: scaleX(0);
            transition: var(--transition);
            transform-origin: bottom right;
        }
        
        .nav-links a:hover {
            color: var(--primary-color);
        }
        
        .nav-links a:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }
        
        /* Dropdown Menu */
        .dropdown {
            display: none;
            position: absolute;
            background-color: var(--white);
            min-width: 160px;
            box-shadow: var(--box-shadow);
            border-radius: var(--border-radius);
            z-index: 1;
            right: 0;
            top: 100%;
            list-style: none;
            padding: 0.5rem 0;
        }
        
        .dropdown li {
            padding: 0.5rem 1rem;
            list-style: none;
        }
        
        .dropdown a {
            color: var(--text-dark);
            text-decoration: none;
            display: block;
            transition: var(--transition);
        }
        
        .dropdown a:hover {
            color: var(--primary-color);
            background-color: var(--bg-light);
        }
        
        .nav-links li:hover .dropdown {
            display: block;
        }
        
        /* Mobile Menu Button - Hidden by default */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--primary-dark);
            cursor: pointer;
        }
        
        /* Search Section */
        .search-section {
            padding: 4rem 0;
            background: linear-gradient(135deg, rgba(108, 99, 255, 0.05), rgba(255, 101, 132, 0.05));
            position: relative;
            overflow: hidden;
            text-align: center;
        }
        
        .search-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 80% 20%, rgba(108, 99, 255, 0.03) 0%, transparent 20%),
                radial-gradient(circle at 20% 80%, rgba(255, 101, 132, 0.03) 0%, transparent 20%);
            z-index: 0;
            pointer-events: none;
        }
        
        .search-section h1 {
            font-size: 2.5rem;
            color: var(--primary-dark);
            margin-bottom: 1rem;
        }
        
        .search-section p {
            color: var(--text-light);
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }
        
        .search {
            max-width: 600px;
            margin: 0 auto;
        }
        
        .search h2 {
            color: var(--primary-dark);
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }
        
        .search input[type="text"] {
            width: 100%;
            padding: 0.75rem 1.5rem;
            border: 1px solid #E5E7EB;
            border-radius: var(--border-radius);
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: var(--transition);
        }
        
        .search input[type="text"]:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.1);
        }

        .search-form {
            position: relative;
            z-index: 2;
        }
        
        /* Company List Section */
        .company-list.container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 1.5rem;
            padding: 3rem 0;
            text-align: center;
        }
        
        .company-list h2 {
            width: 100%;
            font-size: 2rem;
            color: var(--primary-dark);
            margin-bottom: 1rem;
        }
        
        .company-list p {
            width: 100%;
            color: var(--text-light);
            margin-bottom: 2rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .company-card {
            width: calc(33.33% - 1rem);
            background-color: var(--white);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .company-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
        }
        
        .company-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        .company-logo img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid var(--bg-light);
        }
        
        .company-info {
            flex: 1;
            margin-top: 1rem;
        }
        
        .company-info h3 {
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }
        
        .company-info p {
            color: var(--text-light);
            margin-bottom: 1rem;
        }
        
        .apply-button {
            display: inline-block;
            padding: 0.5rem 1.5rem;
            background-color: var(--primary-color);
            color: white;
            border-radius: var(--border-radius);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }
        
        .apply-button:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        /* Warning Section */
        .warning-section {
            padding: 3rem 0;
            background-color: rgba(108, 99, 255, 0.05);
            text-align: center;
        }
        
        .warning-section h3 {
            font-size: 1.5rem;
            color: var(--primary-dark);
            margin-bottom: 2rem;
        }
        
        .info {
            display: inline-block;
            width: 300px;
            padding: 1.5rem;
            margin: 0 1rem;
            background-color: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            vertical-align: top;
        }
        
        .info-logo {
            width: 60px;
            height: 60px;
            margin: 0 auto 1rem;
            background-color: var(--bg-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem;
        }
        
        .info-logo img {
            width: 100%;
            height: auto;
            object-fit: contain;
        }
        
        .info h4 {
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }
        
        .info p {
            color: var(--text-light);
        }
        
        /* Mobile Menu Styles */
        .mobile-menu {
            display: none;
            position: fixed;
            top: 80px;
            left: 0;
            width: 100%;
            background-color: var(--white);
            box-shadow: var(--box-shadow);
            z-index: 99;
            padding: 1rem 0;
            list-style: none;
        }
        
        .mobile-menu.active {
            display: block;
        }
        
        .mobile-menu li {
            position: relative;
        }
        
        .mobile-menu a {
            display: block;
            padding: 1rem 2rem;
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            transition: var(--transition);
        }
        
        .mobile-menu a:hover {
            background-color: var(--bg-light);
            color: var(--primary-color);
        }
        
        .mobile-dropdown {
            display: none;
            padding-left: 1.5rem;
            background-color: var(--bg-light);
            list-style: none;
            padding: 0;
        }
        
        .mobile-menu li.active .mobile-dropdown {
            display: block;
        }
        
        /* Background Patterns */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(108, 99, 255, 0.05) 0%, transparent 20%),
                radial-gradient(circle at 90% 80%, rgba(255, 101, 132, 0.05) 0%, transparent 20%);
            z-index: -1;
            pointer-events: none;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .company-card {
                width: calc(50% - 1rem);
            }
            
            .info {
                width: 45%;
                margin-bottom: 1rem;
            }
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 0 1.5rem;
            }
            
            nav {
                padding: 1rem 1.5rem;
            }
            
            .nav-links {
                display: none;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .info {
                width: 100%;
                margin: 0 0 1rem 0;
            }
            
            .company-card {
                width: 100%;
            }
        }
        
        @media (max-width: 480px) {
            .container {
                padding: 0 1rem;
            }
            
            .search-section h1 {
                font-size: 1.8rem;
            }
            
            .search-section p {
                font-size: 1rem;
            }
            
            .logo {
                font-size: 1.2rem;
            }
            
            .logo-icon {
                width: 30px;
                height: 30px;
                font-size: 0.9rem;
            }
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
            <li><a href="users_home.php">Cari Lowongan</a></li>
            <li><a href="#">Cari Perusahaan</a></li>
            <li><a href="user_community.php">Komunitas</a></li>
            <li>
                <a href="#">Username</a>
                <ul class="dropdown">
                    <li><a href="user_dashboard.php">Profile</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    
    <!-- Mobile Menu -->
    <ul class="mobile-menu" id="mobileMenu">
        <li><a href="users_home.php">Cari Lowongan</a></li>
        <li><a href="#">Cari Perusahaan</a></li>
        <li><a href="user_community.php">Komunitas</a></li>
        <li id="mobileUserMenu">
            <a href="javascript:void(0)">Username</a>
            <ul class="mobile-dropdown">
                <li><a href="user_dashboard.php">Profile</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </li>
    </ul>

    <!-- Search Section -->
    <section class="search-section">
        <div class="container">
            <h1>Kerjakini</h1>  
            <form action="" method="get" class="search-form">
                <div class="search">
                    <h2>Temukan Perusahaan Favorite mu</h2>
                    <input type="text" name="" id="" placeholder="Cari Perusahaan">
                </div>
            </form>
            <p>kupas tuntas terlebih dahulu sebelum mendaftar</p>
        </div>
    </section>

    <!-- Company List Section -->
    <section class="company-list container">
        <h2>Daftar Perusahaan</h2>
        <p>Temukan lowongan baru, ulasan, budaya perusahaan, fasilitas, dan tunjangan.</p>
        <?php while($row = mysqli_fetch_assoc($result)) : ?>
        <div class="company-card">
            <div class="company-logo">
                <img src="<?= htmlspecialchars($row['logo'] ?? 'images/default_logo.png') ?>" alt="Logo <?= htmlspecialchars($row['nama_perusahaan']) ?>">
            </div>
            <div class="company-info">
                <h3><?= htmlspecialchars($row['nama_perusahaan'])?></h3>
                <p><?= nl2br(htmlspecialchars($row['deskripsi']))?></p>
                <a href="user_company_view.php" class="apply-button">Lihat Lebih Lengkap</a>
            </div>
        </div>
        <?php endwhile; ?>
    </section>

    <!-- Warning Section -->
    <section class="warning-section container">
        <h3>Dapatkan gambaran yang jelas sebelum melamar</h3>
        <div class="info">
            <div class="info-logo">
                <img src="https://cdn-icons-png.flaticon.com/512/1570/1570887.png" alt="Culture Icon">
            </div>
            <h4>Budaya dan Nilai</h4>
            <p>cari tahu tentang budaya perusahaan</p>
        </div>
        <div class="info">
            <div class="info-logo">
                <img src="https://cdn-icons-png.flaticon.com/512/1570/1570930.png" alt="Review Icon">
            </div>
            <h4>Penilan dan Ulasan</h4>
            <p>Baca ulasan dari para karyawan</p>
        </div>
        <div class="info">
            <div class="info-logo">
                <img src="https://cdn-icons-png.flaticon.com/512/1570/1570954.png" alt="Benefits Icon">
            </div>
            <h4>Tunjangan dan Keuntungan</h4>
            <p>Temukan keuntungan yang penting bagi anda</p>
        </div>
    </section>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileUserMenu = document.getElementById('mobileUserMenu');
        
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('active');
            
            // Change icon based on menu state
            if (mobileMenu.classList.contains('active')) {
                this.textContent = '✕';
            } else {
                this.textContent = '☰';
            }
        });
        
        // Mobile Dropdown Toggle
        mobileUserMenu.addEventListener('click', function() {
            this.classList.toggle('active');
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!mobileMenu.contains(event.target) && event.target !== mobileMenuBtn) {
                mobileMenu.classList.remove('active');
                mobileMenuBtn.textContent = '☰';
            }
            
            if (!mobileUserMenu.contains(event.target)) { 
                mobileUserMenu.classList.remove('active');
            }
        });
    </script>
</body>
</html>
