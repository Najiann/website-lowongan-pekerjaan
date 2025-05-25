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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kerjakini - Komunitas</title>
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
        
        /* Community Content Styles */
        .community-container {
            padding: 3rem 0;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .community-container h1 {
            font-size: 2.5rem;
            color: var(--primary-dark);
            margin-bottom: 1rem;
            text-align: center;
        }
        
        .community-container p.subtitle {
            color: var(--text-light);
            margin-bottom: 2rem;
            text-align: center;
            font-size: 1.1rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        
        /* Article Grid */
        .article-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .article-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
        }
        
        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        
        .article-image {
            height: 200px;
            overflow: hidden;
        }
        
        .article-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }
        
        .article-card:hover .article-image img {
            transform: scale(1.05);
        }
        
        .article-content {
            padding: 1.5rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .article-content h3 {
            color: var(--primary-dark);
            margin-bottom: 0.75rem;
            font-size: 1.25rem;
        }
        
        .article-excerpt {
            color: var(--text-light);
            margin-bottom: 1.5rem;
            flex: 1;
        }
        
        .read-more {
            display: inline-block;
            padding: 0.5rem 1.5rem;
            background-color: var(--primary-color);
            color: white;
            border-radius: var(--border-radius);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            align-self: flex-start;
        }
        
        .read-more:hover {
            background-color: var(--primary-dark);
        }
        
        /* Article Detail Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1000;
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
            overflow-y: auto;
            padding: 2rem;
        }
        
        .modal-overlay.active {
            display: block;
            opacity: 1;
        }
        
        .article-modal {
            max-width: 800px;
            margin: 2rem auto;
            background-color: var(--white);
            border-radius: var(--border-radius);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transform: translateY(-20px);
            transition: transform 0.3s ease;
        }
        
        .modal-overlay.active .article-modal {
            transform: translateY(0);
        }
        
        .modal-header {
            padding: 1.5rem;
            background-color: var(--primary-dark);
            color: white;
            position: relative;
        }
        
        .modal-header h2 {
            color: white;
            margin-right: 2rem;
        }
        
        .close-modal {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        .modal-content {
            padding: 2rem;
            max-height: 70vh;
            overflow-y: auto;
        }
        
        .modal-content img {
            max-width: 100%;
            height: auto;
            border-radius: var(--border-radius);
            margin: 1rem 0;
        }
        
        .modal-content h3 {
            color: var(--primary-dark);
            margin: 1.5rem 0 1rem;
            font-size: 1.5rem;
        }
        
        .modal-content p {
            margin-bottom: 1rem;
            line-height: 1.7;
        }
        
        .modal-content ul, .modal-content ol {
            margin-left: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .modal-content li {
            margin-bottom: 0.5rem;
        }
        
        .modal-content span.subheading {
            display: block;
            font-weight: 600;
            color: var(--primary-dark);
            margin: 1.5rem 0 0.5rem;
            font-size: 1.1rem;
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
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .article-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
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
            
            .community-container h1 {
                font-size: 2rem;
            }
            
            .modal-overlay {
                padding: 1rem;
            }
            
            .modal-content {
                padding: 1.5rem;
            }
        }
        
        @media (max-width: 480px) {
            .container {
                padding: 0 1rem;
            }
            
            .logo {
                font-size: 1.2rem;
            }
            
            .logo-icon {
                width: 30px;
                height: 30px;
                font-size: 0.9rem;
            }
            
            .article-grid {
                grid-template-columns: 1fr;
            }
            
            .modal-header {
                padding: 1rem;
            }
            
            .close-modal {
                top: 1rem;
                right: 1rem;
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
        <li><a href="users_home.php">Cari Lowongan</a></li>
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

    <!-- Community Section -->
    <section class="community-container container">
        <h1>Komunitas</h1>
        <p class="subtitle">Temukan artikel dan saran dari para mentor profesional dalam bidangnya masing-masing</p>
        
        <div class="article-grid">
            <!-- Article Card 1 -->
            <div class="article-card" data-article="article1">
                <div class="article-image">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Team Building">
                </div>
                <div class="article-content">
                    <h3>Mengenal Apa Itu Team Building: Proses Penting di Tempat Kerja</h3>
                    <p class="article-excerpt">Team building adalah cara bagus untuk memperkuat hubungan antar-karyawan. Aktivitas ini dapat mendorong kamu untuk bersosialisasi dengan para rekan kerja...</p>
                    <a href="#" class="read-more">Baca Selengkapnya</a>
                </div>
            </div>
            
            <!-- Article Card 2 -->
            <div class="article-card" data-article="article2">
                <div class="article-image">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Networking">
                </div>
                <div class="article-content">
                    <h3>Tips Membangun Networking di Dunia Kerja</h3>
                    <p class="article-excerpt">Networking adalah salah satu kunci sukses dalam karir. Berikut beberapa tips untuk membangun jaringan profesional yang kuat...</p>
                    <a href="#" class="read-more">Baca Selengkapnya</a>
                </div>
            </div>
            
            <!-- Article Card 3 -->
            <div class="article-card" data-article="article3">
                <div class="article-image">
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Interview">
                </div>
                <div class="article-content">
                    <h3>Cara Menghadapi Interview Kerja dengan Percaya Diri</h3>
                    <p class="article-excerpt">Interview kerja bisa menjadi momen yang menegangkan, tetapi dengan persiapan yang baik Anda bisa tampil percaya diri...</p>
                    <a href="#" class="read-more">Baca Selengkapnya</a>
                </div>
            </div>
            
            <!-- Article Card 4 -->
            <div class="article-card" data-article="article4">
                <div class="article-image">
                    <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Productivity">
                </div>
                <div class="article-content">
                    <h3>10 Cara Meningkatkan Produktivitas Kerja</h3>
                    <p class="article-excerpt">Produktivitas bukan tentang bekerja lebih keras, tapi bekerja lebih cerdas. Temukan strategi untuk meningkatkan efisiensi kerja Anda...</p>
                    <a href="#" class="read-more">Baca Selengkapnya</a>
                </div>
            </div>
            
            <!-- Article Card 5 -->
            <div class="article-card" data-article="article5">
                <div class="article-image">
                    <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Leadership">
                </div>
                <div class="article-content">
                    <h3>Kembangkan Skill Kepemimpinan di Tempat Kerja</h3>
                    <p class="article-excerpt">Kepemimpinan adalah skill yang bisa dipelajari dan dikembangkan. Berikut cara mengasah kemampuan memimpin dalam karir Anda...</p>
                    <a href="#" class="read-more">Baca Selengkapnya</a>
                </div>
            </div>
            
            <!-- Article Card 6 -->
            <div class="article-card" data-article="article6">
                <div class="article-image">
                    <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Work-Life Balance">
                </div>
                <div class="article-content">
                    <h3>Menjaga Keseimbangan Kerja dan Kehidupan Pribadi</h3>
                    <p class="article-excerpt">Work-life balance yang baik penting untuk kesehatan mental dan produktivitas. Temukan cara menciptakan keseimbangan yang sehat...</p>
                    <a href="#" class="read-more">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Article Modal -->
    <div class="modal-overlay" id="articleModal">
        <div class="article-modal">
            <div class="modal-header">
                <h2 id="modalTitle">Judul Artikel</h2>
                <button class="close-modal" id="closeModal">&times;</button>
            </div>
            <div class="modal-content" id="modalContent">
                <!-- Article content will be inserted here -->
            </div>
        </div>
    </div>

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
        
        // Article Modal Functionality
        const articleCards = document.querySelectorAll('.article-card');
        const articleModal = document.getElementById('articleModal');
        const modalTitle = document.getElementById('modalTitle');
        const modalContent = document.getElementById('modalContent');
        const closeModal = document.getElementById('closeModal');
        
        // Article data
        const articles = {
            article1: {
                title: "Mengenal Apa Itu Team Building: Proses Penting di Tempat Kerja",
                content: `
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Team Building">
                    <p>Team building adalah cara bagus untuk memperkuat hubungan antar-karyawan. Aktivitas ini dapat mendorong kamu untuk bersosialisasi dengan para rekan kerja. Menurut Harvard Business Review, kegiatan sosialisasi bisa meningkatkan komunikasi hingga 50%.</p>
                    
                    <span class="subheading">Apa itu team building?</span>
                    <p>Team building artinya upaya strategis untuk meningkatkan efektivitas dan kerjasama tim dalam suatu organisasi atau perusahaan. Upaya ini melibatkan pendekatan menyeluruh untuk membentuk ikatan yang lebih kuat di antara anggota tim.</p>
                    
                    <span class="subheading">Manfaat team building di tempat kerja</span>
                    <p>Menurut SurfOffice, team building adalah salah satu investasi terbaik yang bisa dilakukan oleh perusahaan. Sebab, aktivitas tersebut menyimpan sejumlah manfaat berikut:</p>
                    
                    <ol>
                        <li><strong>Meningkatkan komunikasi dan kolaborasi tim</strong> - Proses tersebut dapat meningkatkan komunikasi dan kolaborasi di antara karyawan.</li>
                        <li><strong>Membangun kepercayaan dan rasa saling menghormati</strong> - Team building memberi kesempatan bagimu untuk mengenal rekan kerja secara lebih dekat.</li>
                        <li><strong>Meningkatkan motivasi dan engagement karyawan</strong> - Mengikuti team building artinya kamu akan menghabiskan banyak waktu dengan rekan kerja.</li>
                        <li><strong>Memperkuat budaya kerja yang positif</strong> - Ketika hubungan antar-karyawan semakin erat, budaya kerja yang positif pun akan terbentuk.</li>
                        <li><strong>Meningkatkan kinerja tim dan pencapaian tujuan</strong> - Hubungan yang baik antar-karyawan juga dapat memperlancar kolaborasi kerja sehari-hari.</li>
                    </ol>
                    
                    <span class="subheading">Jenis-jenis team building</span>
                    <p>Untuk mencapai berbagai tujuan team building, perusahaan perlu merancang aktivitas yang tepat. Secara umum, terdapat lima jenis umum team building:</p>
                    
                    <ul>
                        <li><strong>Aktivitas fisik</strong> - Pada umumnya berlangsung di luar ruangan dan melibatkan fisik dan strategi.</li>
                        <li><strong>Aktivitas kreatif</strong> - Bertujuan untuk meningkatkan kreativitas karyawan.</li>
                        <li><strong>Aktivitas sosial</strong> - Bertujuan untuk membuatmu lebih mengenal diri sendiri serta para rekan kerja.</li>
                        <li><strong>Aktivitas berbasis tantangan</strong> - Melibatkan studi kasus untuk mengasah kemampuan problem-solving.</li>
                        <li><strong>Aktivitas diskusi</strong> - Biasanya berupa pelatihan atau workshop untuk meningkatkan skill karyawan.</li>
                    </ul>
                `
            },
            article2: {
                title: "Tips Membangun Networking di Dunia Kerja",
                content: `
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Networking">
                    <p>Networking adalah salah satu kunci sukses dalam karir. Berikut beberapa tips untuk membangun jaringan profesional yang kuat:</p>
                    
                    <span class="subheading">1. Mulailah dari lingkaran terdekat</span>
                    <p>Jangan ragu untuk memulai dari rekan kerja di perusahaan Anda saat ini. Bangun hubungan yang baik dengan kolega di berbagai departemen.</p>
                    
                    <span class="subheading">2. Hadiri acara profesional</span>
                    <p>Seminar, workshop, dan konferensi industri adalah tempat yang bagus untuk bertemu orang-orang dengan minat yang sama.</p>
                    
                    <span class="subheading">3. Manfaatkan media sosial profesional</span>
                    <p>Platform seperti LinkedIn sangat berguna untuk memperluas jaringan dan tetap terhubung dengan kolega.</p>
                    
                    <span class="subheading">4. Berikan nilai tambah</span>
                    <p>Jangan hanya memikirkan apa yang bisa Anda dapatkan dari jaringan, tapi juga apa yang bisa Anda berikan kepada mereka.</p>
                    
                    <span class="subheading">5. Jaga hubungan</span>
                    <p>Networking bukan hanya tentang bertemu orang baru, tapi juga tentang memelihara hubungan yang sudah ada.</p>
                `
            },
            article3: {
                title: "Cara Menghadapi Interview Kerja dengan Percaya Diri",
                content: `
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Interview">
                    <p>Interview kerja bisa menjadi momen yang menegangkan, tetapi dengan persiapan yang baik Anda bisa tampil percaya diri:</p>
                    
                    <span class="subheading">1. Lakukan riset tentang perusahaan</span>
                    <p>Ketahui visi, misi, nilai-nilai, produk/layanan, dan perkembangan terbaru perusahaan.</p>
                    
                    <span class="subheading">2. Persiapkan jawaban untuk pertanyaan umum</span>
                    <p>Seperti "Ceritakan tentang diri Anda", "Apa kelebihan dan kekurangan Anda?", "Mengapa Anda ingin bekerja di sini?"</p>
                    
                    <span class="subheading">3. Latihan dengan mock interview</span>
                    <p>Mintalah teman atau mentor untuk melakukan simulasi interview dengan Anda.</p>
                    
                    <span class="subheading">4. Siapkan pertanyaan untuk interviewer</span>
                    <p>Ini menunjukkan minat dan antusiasme Anda terhadap posisi tersebut.</p>
                    
                    <span class="subheading">5. Jaga penampilan dan bahasa tubuh</span>
                    <p>Berpakaian profesional, jabat tangan dengan tegas, dan jaga kontak mata.</p>
                `
            }
        };
        
        // Open modal when article card is clicked
        articleCards.forEach(card => {
            card.addEventListener('click', function(e) {
                // Don't open modal if read more link was clicked
                if (e.target.classList.contains('read-more')) {
                    e.preventDefault();
                }
                
                const articleId = this.getAttribute('data-article');
                const article = articles[articleId];
                
                if (article) {
                    modalTitle.textContent = article.title;
                    modalContent.innerHTML = article.content;
                    articleModal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                }
            });
        });
        
        // Close modal
        closeModal.addEventListener('click', function() {
            articleModal.classList.remove('active');
            document.body.style.overflow = 'auto';
        });
        
        // Close modal when clicking outside
        articleModal.addEventListener('click', function(e) {
            if (e.target === this) {
                articleModal.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });
        
        // Close modal with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && articleModal.classList.contains('active')) {
                articleModal.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });
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