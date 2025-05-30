<?php
include 'koneksi.php';
session_start();

// Cek session login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
if (!isset($_SESSION['user_id'])) {
    echo "Session user tidak ditemukan. Silakan login terlebih dahulu.";
    exit;
}

// Ambil username dari session untuk tampil di navbar
$username = $_SESSION['username'];

// Query untuk ambil data job dan nama perusahaan
$query = "SELECT job_vacancies.*, companies.nama_perusahaan
          FROM job_vacancies
          JOIN companies ON job_vacancies.company_id = companies.id";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kerjakini - Dashboard Pengguna</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
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
        }
        
        .search-title {
            font-size: 2.5rem;
            color: var(--primary-dark);
            margin-bottom: 1rem;
            text-align: center;
            position: relative;
        }
        
        .search-subtitle {
            color: var(--text-light);
            text-align: center;
            margin-bottom: 2rem;
            font-size: 1.1rem;
            position: relative;
        }
        
        .search-container {
            display: flex;
            gap: 1rem;
            position: relative;
            z-index: 1;
        }
        
        .search-input {
            flex: 1;
            padding: 0.75rem 1.5rem;
            border: 1px solid #E5E7EB;
            border-radius: var(--border-radius);
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: var(--transition);
        }
        
        .search-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.1);
        }
        
        .search-select {
            padding: 0.75rem 1.5rem;
            border: 1px solid #E5E7EB;
            border-radius: var(--border-radius);
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            color: var(--text-light);
            background-color: var(--white);
            transition: var(--transition);
        }
        
        .search-select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.1);
        }
        
        /* Jobs List */
        .list-job {
            padding: 3rem 0;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 1.5rem;
        }
        
        .job {
            background-color: var(--white);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            position: relative;
        }
        
        .job::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
            border-radius: var(--border-radius) 0 0 var(--border-radius);
        }
        
        .job:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        .job h2 {
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
            font-size: 1.3rem;
        }
        
        .job p {
            color: var(--text-light);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
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

        .user-menu {
            position: relative;
        }

        .mobile-dropdown {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            min-width: 160px;
            padding: 8px 0;
            z-index: 1000;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .mobile-dropdown.show {
            display: block;
        }

        .mobile-dropdown li {
            list-style: none;
        }

        .mobile-dropdown li a {
            display: block;
            padding: 10px 16px;
            color: #333;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.2s ease;
        }

        .mobile-dropdown li a:hover {
            background-color: #f2f2f2;
            color: #000;
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
            .search-title {
                font-size: 2rem;
            }
            
            .search-container {
                flex-direction: column;
            }
            
            .search-input,
            .search-select {
                width: 100%;
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
            
            .search-section {
                padding: 3rem 0;
            }
            
            .list-job {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 480px) {
            .container {
                padding: 0 1rem;
            }
            
            .search-title {
                font-size: 1.8rem;
            }
            
            .search-subtitle {
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
            <li><a href="#">Cari Lowongan</a></li>
            <li><a href="user_company_list.php">Cari Perusahaan</a></li>
            <li><a href="user_community.php">Komunitas</a></li>
            <li class="user-menu">
                <a href="javascript:void(0)"><?= htmlspecialchars($username) ?></a>
                <ul class="mobile-dropdown">
                    <li><a href="user_dashboard.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Mobile Menu -->
    <ul class="mobile-menu" id="mobileMenu">
        <li><a href="#">Cari Lowongan</a></li>
        <li><a href="user_company_list.php">Cari Perusahaan</a></li>
        <li><a href="user_community.php">Komunitas</a></li>
        <li class="user-menu">
            <a href="javascript:void(0)"><?= htmlspecialchars($username) ?></a>
            <ul class="mobile-dropdown">
                <li><a href="user_dashboard.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </li>
    </ul>

    <!-- Search Section -->
    <section class="search-section">
        <div class="container">
            <h1 class="search-title">Kerjakini</h1>
            <p class="search-subtitle">Temukan pekerjaan impianmu dengan mudah dan cepat</p>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Masukan Kata kunci..." />
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
    <section class="list-job container">
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <a href="user_aply.php?id=<?= $row['id'] ?>" style="text-decoration: none;">
                    <div class="job">
                        <h2><?= htmlspecialchars($row['judul_pekerjaan']) ?></h2>
                        <p><?= htmlspecialchars($row['nama_perusahaan']) ?></p>
                        <p>Lokasi: <?= htmlspecialchars($row['lokasi']) ?></p>
                        <p>Gaji: Rp <?= number_format($row['gaji'], 0, ',', '.') ?></p>
                        <p>Deskripsi: <?= nl2br(htmlspecialchars($row['deskripsi'])) ?></p>
                        <p>Syarat: <?= nl2br(htmlspecialchars($row['syarat'])) ?></p>
                    </div>
                </a>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Tidak ada lowongan pekerjaan yang tersedia saat ini.</p>
        <?php endif; ?>
    </section>

    <script>
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        // Ambil semua user-menu
        const userMenus = document.querySelectorAll('.user-menu');

        userMenus.forEach(menu => {
            const dropdown = menu.querySelector('.mobile-dropdown');

            menu.addEventListener('click', function (e) {
                e.stopPropagation();
                dropdown.classList.toggle('show');
            });

            // Tutup dropdown saat klik di luar
            document.addEventListener('click', function () {
                dropdown.classList.remove('show');
            });
        });

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('active');
        });
</script>

</body>
</html>
