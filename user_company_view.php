<?php
include "koneksi.php";
session_start();

// Cek session login
if (!isset($_SESSION['user_id'])) {
    echo "Session user tidak ditemukan. Silakan login terlebih dahulu.";
    exit;
}

$user_id = $_SESSION['user_id'];

// Ambil data perusahaan berdasarkan user_id
$queryCompany = mysqli_query($conn, "SELECT * FROM companies WHERE user_id = $user_id");
$company = mysqli_fetch_assoc($queryCompany);

if (!$company) {
    echo "Perusahaan tidak ditemukan.";
    exit;
}

$company_id = $company['id'];

// Ambil semua lowongan kerja berdasarkan company_id
$queryJobs = mysqli_query($conn, "SELECT * FROM job_vacancies WHERE company_id = $company_id");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kerjakini - Perusahaan</title>
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
        
        /* Company Profile Section */
        .company-profile {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 2rem;
            padding: 3rem 0;
        }
        
        .company-profileall, .joball {
            flex: 1;
            min-width: 300px;
            background-color: var(--white);
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--box-shadow);
        }
        
        .company-profileall h1, .joball h1 {
            font-size: 1.8rem;
            color: var(--primary-dark);
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
        }
        
        .company-profileall h1::after, .joball h1::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border-radius: 2px;
        }
        
        .header-company {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .header-company img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary-color);
        }
        
        .header-company h1 {
            font-size: 1.8rem;
            color: var(--primary-dark);
            margin: 0;
        }
        
        .body-company {
            background: var(--white);
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            margin-top: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .body-company::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
        }

        .company-detail {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .detail-item {
            flex: 1 1 200px;
            display: flex;
            align-items: flex-start;
            gap: 1rem;
        }

        .detail-icon {
            width: 24px;
            height: 24px;
            background-color: rgba(108, 99, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            flex-shrink: 0;
        }

        .detail-content h3 {
            font-size: 0.9rem;
            color: var(--text-light);
            margin-bottom: 0.25rem;
            font-weight: 500;
        }

        .detail-content p {
            font-size: 1rem;
            color: var(--text-dark);
            font-weight: 500;
            margin: 0;
            line-height: 1.4;
        }

        .company-description {
            background: rgba(243, 244, 246, 0.5);
            border-left: 3px solid var(--primary-color);
            padding: 1.5rem;
            border-radius: 0 var(--border-radius) var(--border-radius) 0;
            margin-top: 1.5rem;
            position: relative;
        }

        .company-description::before {
            content: 'Tentang Kami';
            position: absolute;
            top: -12px;
            left: 20px;
            background: var(--white);
            padding: 0 10px;
            font-size: 0.85rem;
            color: var(--primary-dark);
            font-weight: 600;
        }

        .company-description p {
            color: var(--text-dark);
            line-height: 1.8;
            margin: 0;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .body-company {
                padding: 1.5rem;
            }
            
            .detail-item {
                flex: 1 1 100%;
            }
            
            .company-description {
                padding: 1.25rem;
            }
        }
        
        .information-job {
            margin-bottom: 2rem;
            padding: 1.5rem;
            background-color: var(--bg-light);
            border-radius: var(--border-radius);
            transition: var(--transition);
        }
        
        .information-job:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        
        .information-job h2 {
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }
        
        .information-job p {
            color: var(--text-light);
            margin-bottom: 0.5rem;
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
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .company-profile {
                flex-direction: column;
            }
            
            .company-profileall, .joball {
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
            
            .company-profileall, .joball {
                padding: 1.5rem;
            }
        }
        
        @media (max-width: 480px) {
            .container {
                padding: 0 1rem;
            }
            
            .header-company {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
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
            <li><a href="user_company_list.php">Cari Perusahaan</a></li>
            <li><a href="user_community.php">Komunitas</a></li>
            <li>
                <a href="#">Username</a>
                <ul class="dropdown">
                    <li><a href="user_dashboard.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    
    <!-- Mobile Menu -->
    <ul class="mobile-menu" id="mobileMenu">
        <li><a href="users_home.php">Cari Lowongan</a></li>
        <li><a href="user_company_list.php">Cari Perusahaan</a></li>
        <li><a href="user_community.php">Komunitas</a></li>
        <li id="mobileUserMenu">
            <a href="javascript:void(0)">Username</a>
            <ul class="mobile-dropdown">
                <li><a href="user_dashboard.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </li>
    </ul>
    
    <!-- Company Profile Section -->
    <section class="container company-profile">
            <div class="company-profileall">
                <h1>Profile Perusahaan</h1>
                <div class="header-company">
                    <img src="<?= htmlspecialchars($row['logo'] ?? 'images/default_logo.png') ?>" alt="Logo <?= htmlspecialchars($row['nama_perusahaan']) ?>">
                    <h1><?= htmlspecialchars($company['name']) ?></h1>
                </div>
                <div class="body-company">
                    <div class="company-detail">
                        <div class="detail-item">
                            <div class="detail-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </div>
                            <div class="detail-content">
                                <h3>Email Perusahaan</h3>
                                <p><?= htmlspecialchars($company['email']) ?></p>
                            </div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                            </div>
                            <div class="detail-content">
                                <h3>Nomor Telepon</h3>
                                <p><?= htmlspecialchars($company['phone']) ?></p>
                            </div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                            </div>
                            <div class="detail-content">
                                <h3>Alamat Perusahaan</h3>
                                <p><?= htmlspecialchars($company['address']) ?></p>
                            </div>
                        </div>
                </div>
                
                <div class="company-description">
                    <p><?= nl2br(htmlspecialchars($company['description'])) ?></p>
                </div>
            </div>
        </div>
        <div class="joball">
            <h1>Ada Loker Nihh!!!</h1>
            <?php while ($job = mysqli_fetch_assoc($query_jobs)): ?>
            <div class="information-job">
                <h2><?= htmlspecialchars($job['title']) ?></h2>
                <p>Lokasi:</strong> <?= htmlspecialchars($job['location']) ?></p>
                <p><strong>Gaji:</strong> Rp. <?= number_format($job['salary'], 0, ',', '.') ?></p>
                <p><?= nl2br(htmlspecialchars($job['description'])) ?></p>
            </div>
        <?php endwhile; ?>
        <?php if (mysqli_num_rows($query_jobs) == 0): ?>
            <p><em>Belum ada lowongan dari perusahaan ini.</em></p>
        <?php endif; ?>
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