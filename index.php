<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kerjakini - Temukan Lowongan Kerja Terbaik</title>
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
            font-size: calc(1rem * var(--golden-ratio));
            font-weight: 700;
            color: var(--primary-dark);
            letter-spacing: -0.5px;
            padding: 0.5rem 0;
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
            padding: calc(5rem / var(--golden-ratio)) 0;
            background-color: var(--white);
            text-align: center;
            margin-bottom: 5rem;
        }
        
        .search-title {
            font-size: calc(2rem * var(--golden-ratio));
            margin-bottom: 1.5rem;
            color: var(--primary-dark);
            font-weight: 700;
        }
        
        .search-subtitle {
            font-size: 1.25rem;
            color: var(--text-light);
            margin-bottom: 3rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .search-container {
            display: flex;
            justify-content: center;
            gap: 1rem;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .search-input, .search-select {
            padding: 1rem 1.5rem;
            border: 1px solid #E5E7EB;
            border-radius: var(--border-radius);
            font-size: 1rem;
            flex: 1;
            min-width: 200px;
            transition: var(--transition);
        }
        
        .search-input:focus, .search-select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.1);
        }
        
        .search-input::placeholder {
            color: #9CA3AF;
        }
        
        /* Hero Section */
        .hero-section {
            padding: calc(8rem / var(--golden-ratio)) 0;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: var(--white);
            text-align: center;
            margin-bottom: 5rem;
            clip-path: ellipse(100% 60% at 50% 40%);
        }
        
        .hero-title {
            font-size: calc(2.5rem * var(--golden-ratio));
            margin-bottom: 2rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
        }
        
        .btn {
            padding: 1rem 2.5rem;
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-primary {
            background-color: var(--white);
            color: var(--primary-dark);
            border: 2px solid var(--white);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        .btn-outline {
            background-color: transparent;
            color: var(--white);
            border: 2px solid var(--white);
        }
        
        .btn-outline:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        /* Company Recommendations */
        .company-section {
            padding: 5rem 0;
        }
        
        .section-title {
            font-size: calc(2rem * var(--golden-ratio));
            margin-bottom: 3rem;
            color: var(--text-dark);
            text-align: center;
            position: relative;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -1rem;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border-radius: 2px;
        }
        
        .company-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        
        .company-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--box-shadow);
            text-align: center;
            transition: var(--transition);
            border-top: 4px solid transparent;
        }
        
        .company-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            border-top-color: var(--primary-color);
        }
        
        .company-logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin: 0 auto 1.5rem;
            border-radius: 50%;
            background-color: var(--bg-light);
            padding: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        
        .company-name {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }
        
        .job-count {
            color: var(--text-light);
            font-size: 0.875rem;
            background-color: var(--bg-light);
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            display: inline-block;
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
        }
        
        .mobile-menu.active {
            display: block;
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
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .search-title {
                font-size: 2.2rem;
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
            
            .search-container {
                flex-direction: column;
                gap: 1rem;
            }
            
            .search-input, .search-select {
                width: 100%;
            }
            
            .hero-buttons {
                flex-direction: column;
                gap: 1rem;
                align-items: center;
            }
            
            .hero-title {
                font-size: 2rem;
            }
            
            .search-title {
                font-size: 1.8rem;
            }
            
            .search-subtitle {
                font-size: 1rem;
                padding: 0 1rem;
            }
            
            .company-grid {
                grid-template-columns: 1fr;
                max-width: 400px;
                margin: 0 auto;
            }
            
            .hero-section {
                clip-path: none;
                padding: 4rem 0;
            }
        }
        
        @media (max-width: 480px) {
            .container {
                padding: 0 1rem;
            }
            
            .hero-title {
                font-size: 1.6rem;
            }
            
            .section-title {
                font-size: 1.5rem;
            }
            
            .btn {
                padding: 0.8rem 1.5rem;
                width: 100%;
                max-width: 250px;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="container">
        <div class="logo">Kerjakini</div>
        <button class="mobile-menu-btn" id="mobileMenuBtn">☰</button>
        <ul class="nav-links">
            <li><a href="user_company_list.php">Cari Lowongan</a></li>
            <li><a href="user_company_view.php">Cari Perusahaan</a></li>
            <li><a href="user_community.php">Komunitas</a></li>
            <li><a href="login.php">Masuk</a></li>
        </ul>
    </nav>
    
    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <a href="user_company_list.php">Cari Lowongan</a>
        <a href="user_company_view.php">Cari Perusahaan</a>
        <a href="user_community.php">Komunitas</a>
        <a href="login.php">Masuk</a>
    </div>
    
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
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h2 class="hero-title">Ubah karir mu menjadi lebih baik dengan bergabung bersama kami!</h2>
            <div class="hero-buttons">
                <a href="login.php" class="btn btn-primary">Masuk</a>
                <a href="register.php" class="btn btn-outline">Daftar</a>
            </div>
        </div>
    </section>
    
    <!-- Company Recommendations -->
    <section class="company-section">
        <div class="container">
            <h2 class="section-title">Rekomendasi Perusahaan</h2>
            <div class="company-grid">
                <div class="company-card">
                    <img src="images/navtan.jpg" alt="Navtan Animation" class="company-logo">
                    <div class="company-name">Navtan Animation</div>
                    <div class="job-count">79 Pekerjaan</div>
                </div>
                <div class="company-card">
                    <img src="images/jax.jpg" alt="JaxMediaTama" class="company-logo">
                    <div class="company-name">JaxMediaTama</div>
                    <div class="job-count">19 Pekerjaan</div>
                </div>
                <div class="company-card">
                    <img src="images/maven.jpg" alt="Maven Company" class="company-logo">
                    <div class="company-name">Maven Company</div>
                    <div class="job-count">9 Pekerjaan</div>
                </div>
                <div class="company-card">
                    <img src="images/joy.jpg" alt="JoyBoy Company" class="company-logo">
                    <div class="company-name">JoyBoy Company</div>
                    <div class="job-count">32 Pekerjaan</div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        
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
        });
    </script>
</body>
</html>